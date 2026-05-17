<?php
include("include/protect.php");
include("include/dbconnect.php");
extract($_POST);
$msg="";

$id=$_REQUEST['id'];

$q1=mysql_query("select * from parking where park_id=$id");
$r1=mysql_fetch_array($q1);

if(isset($btn2))
{
			
$gq=mysql_query("select * from park_details where park_id=$id order by id desc");
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

$up2=mysql_query("update parking set status=0 where park_id=$id");
$up3=mysql_query("update park_details set out_date='$out_date',amount='$tot_amt' where id=$cid");
		
?>
<script language="javascript">
alert("OUT operation success");
window.location.href="print2.php?id=<?php echo $id; ?>";
</script>
<?php
//header("location:admin.php");
}
?>
<html>
<head>
<title><?php include("include/title.php"); ?></title>
<link href="style.css" rel="stylesheet" type="text/css">
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
      <td height="38" align="center" valign="middle"><p class="txt1">&nbsp;</p>
        <p class="txt1">Parking Details </p>
        <p class="msg2">&nbsp;</p>
        <table width="405" height="114" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFF99" bgcolor="#FFFF99">
          <tr>
            <th align="left" scope="col"><?php echo $r1['vehicle']." No:". $r1['car_no']; ?></th>
          </tr>
          <tr>
            <th align="right" scope="col"><?php echo $r1['cur_date']; ?></th>
          </tr>
          <tr>
            <th scope="col"><h2>Your Parking number: <?php echo $id; ?></h2></th>
          </tr>
          <tr>
            <td align="center"><h2>Your row number <?php echo $r1['vrow']; ?></h2></td>
          </tr>
        </table>
        <p>&nbsp;</p>
        <p>
          <input name="btn2" type="submit" value="   Out   " />
</p>
        <p><a href="print.php?id=<?php echo $id; ?>" target="_blank"></a> </p>
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
