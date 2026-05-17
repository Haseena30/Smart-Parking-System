<?php 

include("include/dbconnect.php");
extract($_POST);

$cdate = date("d-m-Y");

  

                if ((isset($btn))=="Register")
				{
            
			$q = mysql_query("select * from user_reg where username='$uname'");
			$r = mysql_fetch_array($q);
			$unamee = $r['username'];
			if($uname==$unamee)
			{
			$msg = "UserName already Exists..!";
			}
			else{
		$qry =mysql_query("select max(id) as maxid from user_reg");
                   $rs = mysql_fetch_array($qry);
                    $id2 = $rs['maxid'] + 1;
					
                  $ins =mysql_query("insert into user_reg(id,name,contact,address,email,bank,cardno,amount,carno,carname,vehicle,username,password,rdate) values(".$id2.",'".$name."','".$contact."','".$address."','".$email."','$bank','$acct',5000,'$carno','$carname','$vehicle','" .$uname. "','".$pass."','".$cdate."')");
                    //out.print(ins);

               if($ins==1)
			   {
		?>
		<script type="text/javascript">
		alert("Successfully Registered..!");
		window.location.href="user.php";
		</script>
		
		<?php
			   }
				}}
?>

<html>
<head>
<title><?php include("include/title.php"); ?></title>
<link href="style.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="javascript">
function validate()
{
	if(document.form1.name.value=="")
	{
	alert("Enter the Name");
	document.form1.name.focus();
	return false;
	}
	if(document.form1.contact.value=="")
	{
	alert("Enter the Contatc No.");
	document.form1.contact.focus();
	return false;
	}
	if(document.form1.email.value=="")
	{
	alert("Enter the E-mail");
	document.form1.email.focus();
	return false;
	}
	if(document.form1.uname.value=="")
	{
	alert("Enter the Username");
	document.form1.uname.focus();
	return false;
	}
	if(document.form1.pass.value=="")
	{
	alert("Enter the Password");
	document.form1.pass.focus();
	return false;
	}
	if(document.form1.pass.value!=document.form1.cpass.value)
	{
	alert("Both password are not equals!");
	document.form1.cpass.select();
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
      <td align="center" class="heading"><?php include("include/title.php"); ?></td>
    </tr>
    <tr>
      <td align="center" class="subhead"><?php include("include/link_user.php"); ?></td>
    </tr>
    <tr>
      <td align="center" valign="top"><p>&nbsp;</p>
        <p class="style1">&nbsp;</p>
        <table width="392" height="271" border="0" align="center" cellpadding="5" cellspacing="0" class="bg2" style="background-color:#99cc66;">
                    <tr>
                      <td colspan="2" align="center" bgcolor="#FFFFFF" style="color:#FF0000"><?php echo $msg; ?></td>
                    </tr>
                    <tr>
                      <td colspan="2" align="center" bgcolor="#EAF4AE" height="50"><strong>User Registration </strong></td>
                    </tr>
                    <tr>
                      <td width="127" align="left" bgcolor="#FFFFFF">Name</td>
                      <td width="245" align="left" bgcolor="#FFFFFF"><input type="text" name="name" /></td>
                    </tr>
                    <tr>
                      <td align="left" bgcolor="#FFFFFF">Contact No. </td>
                      <td align="left" bgcolor="#FFFFFF"><input type="text" name="contact" /></td>
                    </tr>
                    <tr>
                      <td align="left" bgcolor="#FFFFFF">E-mail</td>
                      <td align="left" bgcolor="#FFFFFF"><input type="text" name="email" /></td>
                    </tr>
                    <tr>
                      <td align="left" bgcolor="#FFFFFF">Address</td>
                      <td align="left" bgcolor="#FFFFFF"><textarea name="address"></textarea></td>
                    </tr>
                    <tr>
                      <td align="left" bgcolor="#FFFFFF">Select Vehicle </td>
                      <td align="left" bgcolor="#FFFFFF">
					  <select name="vehicle">
          <option value="">-Vehicle-</option>
          <option <?php if($vehicle=="Bike") echo "selected"; ?>>Bike</option>
          <option <?php if($vehicle=="Car") echo "selected"; ?>>Car</option>
        </select>
&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="left" bgcolor="#FFFFFF">Vehicle No </td>
                      <td align="left" bgcolor="#FFFFFF"><input type="text" name="carno" /></td>
                    </tr>
                    <tr>
                      <td align="left" bgcolor="#FFFFFF">Vehicle Name </td>
                      <td align="left" bgcolor="#FFFFFF"><input type="text" name="carname" /></td>
                    </tr>
                    <tr>
                      <td align="left" bgcolor="#FFFFFF">Bank name </td>
                      <td align="left" bgcolor="#FFFFFF"><select name="bank">
					  <option value="">--Select--</option>
					  <option value="Canara">Axis Bank</option>
					  <option value="Canara">Canara Bank</option>
					  <option value="Canara">Indian Bank</option>
					  <option value="Canara">SBI Bank</option>
					  </select></td>
                    </tr>
                    <tr>
                      <td align="left" bgcolor="#FFFFFF">Account No. </td>
                      <td align="left" bgcolor="#FFFFFF"><input type="text" name="acct"></td>
                    </tr>
                    <tr>
                      <td align="left" bgcolor="#FFFFFF">Username</td>
                      <td align="left" bgcolor="#FFFFFF"><input type="text" name="uname" /></td>
                    </tr>
                    <tr>
                      <td align="left" bgcolor="#FFFFFF">Password</td>
                      <td align="left" bgcolor="#FFFFFF"><input type="password" name="pass" /></td>
                    </tr>
                    <tr>
                      <td align="left" bgcolor="#FFFFFF">Confirm Password </td>
                      <td align="left" bgcolor="#FFFFFF"><input type="password" name="cpass" /></td>
                    </tr>
                    <tr>
                      <td colspan="2" align="center" bgcolor="#FFFFFF"><input type="submit" name="btn" value="Register" onClick="return validate()" /></td>
                    </tr>
        </table>
        <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p><a href="user_reg.php"></a></p>      
      <p>&nbsp;</p>
      <p>&nbsp;</p>      <p>&nbsp;</p></td>
    </tr>
    <tr>
      <td align="center" class="foot">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
