<?php
include("include/protect.php");
include("include/dbconnect.php");
extract($_POST);
$msg="";

$q1=mysql_query("select * from parking where vehicle='$vehicle' &&  status=0 && emp='0' order by park_id limit 0,1");
$r1=mysql_fetch_array($q1);
$num=mysql_num_rows($q1);
$park_id=$r1['park_id'];

if(isset($btn1))
{
	if($num>0)
	{
		if(trim($cno)=="")
		{
		$msg="Enter the Car No.";
		}
		else
		{
			$q3=mysql_query("select * from parking where car_no=$cno && status=1");
			$num2=mysql_num_rows($q3);
			
			if($num2==0)
			{
			
		
				$vq1=mysql_query("select * from parking where vehicle='$vehicle'");
				while($vr1=mysql_fetch_array($vq1))
				{
				$va1[]=$vr1['park_id'];
				}
				$vb1=array_chunk($va1,5);
					
				for($x=0;$x<count($vb1);$x++)
				{
				
				
					for($i=0;$i<5;$i++)
					{
					
						if($vb1[$x][$i]==$pid)
						{
						$y=$x+1;
						$rmsg="Your $vehicle row number $y";
						$vrow=$y;
						
						}
					}
					
				}
			
			echo $message="Your parking number is $pid , $rmsg";
			//////////////
			
			$up=mysql_query("update parking set car_no=$cno,status=1,name='$name',contact='$contact',address='$address',vname='$vname',vrow='$vrow' where park_id=$pid");
			$mon=date('m');
			$yr=date('Y');
			
			$mq=mysql_query("select max(id) from park_details");
			$mr=mysql_fetch_array($mq);
			$id=$mr['max(id)']+1;
			$in_date=date("d-m-Y");
			
			$aq=mysql_query("select * from park_amt");
			$ar=mysql_fetch_array($aq);
			$amount=$ar['amount'];
			
			$ins=mysql_query("insert into park_details(id,name,contact,address,vehicle,park_id,car_no,in_date,amount,month,year) values($id,'$name','$contact','$address','$vehicle','$pid',$cno,'$in_date',$amount,$mon,$yr)");
			
			$fname="ad".$pid.".mp3";
			?>
		<script language="javascript">
	//window.location.href="webtts/tts_serverside_google.php?id=<?php echo $pid; ?>&txt=<?php echo $message; ?>&filename=<?php echo $fname; ?>";
	window.location.href = "print.php?id=<?php echo $pid;?> ";
		</script>
		<?php
			
			//header("location:admin.php");
			}
			else
			{
			$msg="This Car No. Alread Exist!";
			}
		}
	}
	else
	{
	$msg="No parking place available!";
	}
}

if(isset($btn2))
{
			
$gq=mysql_query("select * from park_details where car_no=$cno2 order by id desc");
$gr=mysql_fetch_array($gq);
$in_date=$gr['in_date'];
$cid=$gr['id'];
$pid=$gr['park_id'];
$amt=$gr['amount'];
			
$out_date=date("d-m-Y");

$days=(strtotime($out_date)-strtotime($in_date))/(60*60*24);
	if($days>0)
	{
$tot_amt=$amt*$days;
	}
	else
	{
$tot_amt=$amt;	
	}

$up2=mysql_query("update parking set status=0 where car_no=$cno2");
$up3=mysql_query("update park_details set out_date='$out_date',amount='$tot_amt' where id=$cid");
		
?>
<script language="javascript">
alert("OUT operation success");
window.location.href="admin.php";
</script>
<?php
//header("location:admin.php");
}
?>
<html>
<head>
<title><?php include("include/title.php"); ?></title>
<link href="style.css" rel="stylesheet" type="text/css">
<script language="javascript">
function validate()
{
	if(document.form1.name.value=="")
	{
	alert("Enter the Name..");
	document.form1.name.focus();
	return false;
	}
	if(document.form1.contact.value=="")
	{
	alert("Enter the Mobile No..");
	document.form1.contact.focus();
	return false;
	}
	if(isNaN(document.form1.contact.value))
	{
	alert("Incorrect Number!");
	document.form1.contact.focus();
	return false;
	}
	if(document.form1.contact.value.length!=10)
	{
	alert("10 digits allowed for Mobile No.!");
	document.form1.contact.focus();
	return false;
	}
	if(document.form1.address.value=="")
	{
	alert("Enter the Address..");
	document.form1.address.focus();
	return false;
	}
	if(document.form1.vname.value=="")
	{
	alert("Enter the Vehicle Name..");
	document.form1.vname.focus();
	return false;
	}
	if(document.form1.cno.value=="")
	{
	alert("Enter the Vehicle No.");
	document.form1.cno.focus();
	return false;
	}
return true;	
}
</script>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      <td width="100%" align="center" class="heading"><?php include("include/title.php"); ?></td>
    </tr>
    <tr>
      <td align="center" class="subhead"><?php include("include/link_admin.php"); ?></td>
    </tr>
    <tr>
      <td height="38" align="center" valign="middle" class="msg"><?php echo $msg; ?></td>
    </tr>
    <tr>
      <td align="center" valign="top"><p>&nbsp;</p>
      <p>Select Vehicle
        <select name="vehicle">
          <option value="">-Vehicle-</option>
          <option <?php if($vehicle=="Bike") echo "selected"; ?>>Bike</option>
          <option <?php if($vehicle=="Car") echo "selected"; ?>>Car</option>
          <option <?php if($vehicle=="Van") echo "selected"; ?>>Van</option>
          <option <?php if($vehicle=="Lorry") echo "selected"; ?>>Lorry</option>
          <option <?php if($vehicle=="Bus") echo "selected"; ?>>Bus</option>
        </select>
&nbsp;
<input type="submit" name="btn22" value="Submit">
</p>
      <?php
	  if($_REQUEST['vehicle'])
	  {
	  ?>
	  <table width="927" height="210" border="0">
        <tr>
          <td align="center"><table width="283" height="171" border="0" cellpadding="5" cellspacing="0" class="border">
            <tr>
              <td align="center" class="menu">ENTRY - IN </td>
            </tr>
            <tr>
              <td>Name</td>
            </tr>
            <tr>
              <td><input type="text" name="name"></td>
            </tr>
            <tr>
              <td>Contact No. </td>
            </tr>
            <tr>
              <td><input type="text" name="contact"></td>
            </tr>
            <tr>
              <td>Address</td>
            </tr>
            <tr>
              <td><textarea name="address"></textarea></td>
            </tr>
            <tr>
              <td>Vehicle Name </td>
            </tr>
            <tr>
              <td><input type="text" name="vname"></td>
            </tr>
            <tr>
              <td>Parking No </td>
            </tr>
            <tr>
              <td><input type="text" name="pid" value="<?php echo $park_id; ?>" readonly="" /></td>
            </tr>
            <tr>
              <td>Vehicle No. </td>
            </tr>
            <tr>
              <td><input type="text" name="cno" /></td>
            </tr>
            <tr>
              <td align="center"><input name="btn1" type="submit" value="Entry" onClick="return validate()" /></td>
            </tr>
          </table></td>
          <td align="center"><table width="235" height="171" border="0" cellpadding="5" cellspacing="0" class="border">
            <tr>
              <td align="center" class="menu">ENTRY - OUT </td>
            </tr>
            <tr>
              <td>Enter the Vehicle No. </td>
            </tr>
            <tr>
              <td><input type="text" name="cno2" value="<?php echo $_REQUEST['cno2']; ?>">
			  <input type="submit" name="btn3" value="Submit">
			  			  
			  </td>
            </tr>
            <tr>
              <td align="center">
			  <?php
			  if(isset($btn3))
			  {
			  $q2=mysql_query("select * from parking where vehicle='$vehicle' && car_no='$cno2'");
				$r2=mysql_fetch_array($q2);
				
				//header("location:msg_view2.php?id=".$r2['park_id']);
				
			  ?>
			  <table width="90%" border="0" align="center" cellpadding="5" cellspacing="0" class="border3">
                <tr>
                  <th scope="col"><?php echo "Parking ID :".$r2['park_id']; ?></th>
                </tr>
                <tr>
                  <td align="center"><?php echo "<br>Parking Row :".$r2['vrow']; ?></td>
                </tr>
              </table>
			  <br><input name="btn2" type="submit" value="   Out   " />
			  <?php
			  }
			  ?>
			  </td>
            </tr>
          </table></td>
        </tr>
      </table>
	  <?php
	  }
	  ?>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
    </tr>
    <tr>
      <td align="center" class="foot">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
