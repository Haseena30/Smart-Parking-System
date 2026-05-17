<?php
include("include/protect.php");
include("include/dbconnect.php");
extract($_POST);
$msg="";


if(isset($btn))
{
$q1=mysql_query("select * from parking where park_id=$park_id");
$num=@mysql_num_rows($q1);
	if($num==0)
	{
mysql_query("insert into parking(vehicle,park_id) values('$vehicle',$park_id)");
header("location:view_park.php");
	}
	else
	{
	$msg="This Park ID already exist!";
	}

}
?>
<html>
<head>
<title><?php include("include/title.php"); ?></title>
<link href="style.css" rel="stylesheet" type="text/css"></head>

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
        <p class="txt1">Add Parking Place</p>
        <p style="color:#FF0000"><?php echo $msg; ?></p>
        <table width="340" border="1" cellspacing="0" cellpadding="5">
		
        <tr>
          <td>Vehicle Type </td>
          <td><select name="vehicle">
            <option value="">-Vehicle-</option>
            <option>Bike</option>
            <option>Car</option>
            <option>Van</option>
            <option>Lorry</option>
            <option>Bus</option>
          </select></td>
        </tr>
        <tr>
          <td width="82">Park ID </td>
          <td width="232"><input type="text" name="park_id"></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="btn" value="Submit"></td>
        </tr>
      </table>
      <p><strong><a href="view_park.php">Back</a></strong></p>
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
