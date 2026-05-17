<?php
include("include/protect.php");
include("include/dbconnect.php");
extract($_POST);
$msg="";

$qry=mysql_query("select * from park_amt where vehicle='Car'");
$row=@mysql_fetch_array($qry);
$car=$row['amount'];

$qry2=mysql_query("select * from park_amt where vehicle='Bike'");
$row2=@mysql_fetch_array($qry2);
$bike=$row2['amount'];

$qry3=mysql_query("select * from park_amt where vehicle='Van'");
$row3=@mysql_fetch_array($qry3);
$van=$row3['amount'];

$qry4=mysql_query("select * from park_amt where vehicle='Lorry'");
$row4=@mysql_fetch_array($qry4);
$lorry=$row4['amount'];

$qry5=mysql_query("select * from park_amt where vehicle='Bus'");
$row5=@mysql_fetch_array($qry5);
$bus=$row5['amount'];


if(isset($btn))
{
mysql_query("update park_amt set amount='$amount1' where vehicle='Car'");
mysql_query("update park_amt set amount='$amount2' where vehicle='Bike'");
mysql_query("update park_amt set amount='$amount3' where vehicle='Van'");
mysql_query("update park_amt set amount='$amount4' where vehicle='Lorry'");
mysql_query("update park_amt set amount='$amount5' where vehicle='Bus'");
$msg="Updated...";
header("location:fix_amount.php");
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
        <p class="txt1">Fix Amount  Details</p>
        <p class="msg2"><?php echo $msg; ?></p>
        <table width="451" height="127" border="0" cellpadding="5" cellspacing="0">
          <tr>
            <td>Car -  amount per day </td>
            <td><input type="text" name="amount1" value="<?php echo $car; ?>">
Rs. </td>
          </tr>
          <tr>
            <td>Bike</td>
            <td><input type="text" name="amount2" value="<?php echo $bike; ?>">
Rs. </td>
          </tr>
          <tr>
            <td>Van</td>
            <td><input type="text" name="amount3" value="<?php echo $van; ?>">
Rs. </td>
          </tr>
          <tr>
            <td>Lorry</td>
            <td><input type="text" name="amount4" value="<?php echo $lorry; ?>"> 
            Rs. </td>
          </tr>
          <tr>
            <td>Bus</td>
            <td><input type="text" name="amount5" value="<?php echo $bus; ?>">
Rs. </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="btn" value="Update"></td>
          </tr>
        </table>
        <p class="txt1">&nbsp;</p>
        <p>&nbsp; </p>
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
