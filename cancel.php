<?php
session_start();
include("include/protect.php");
include("include/dbconnect.php");
$uname = $_SESSION['uname'];
$vehicle = $_SESSION['vehicle'];
echo $uname;
extract($_POST);
$msg="";

$query = mysql_query("select * from user_reg where username='$uname'");
$res  = mysql_fetch_array($query);
$acct = $res['cardno'];
$act = $_REQUEST['act'];
if($act=="ok")
{

$up2=mysql_query("update parking set status=0 where park_id=".$_REQUEST['id']."");

$up3 = mysql_query("delete from park_details where in_date = '".$_REQUEST['time']."'");
?>
<script type="text/javascript">
alert("Your amount Rs.20 Will be credited your account no <?php echo $acct;?>");
</script>
<?php

}

?>
<html>
<head>
<title><?php include("include/title.php"); ?></title>
<link href="style.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style3 {
	font-size: 14px;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      <td width="100%" align="center" class="heading"><?php include("include/title.php"); ?></td>
    </tr>
    <tr>
      <td align="center" class="subhead"><?php include("include/link_user.php"); ?></td>
    </tr>
    <tr>
      <td height="38" align="center" valign="middle"><p class="txt1">&nbsp;</p>
        <p class="txt1">Cancel Booking</p>
        <p class="txt1">
	<?php 

	$q =mysql_query("select * from 	parking where name='$uname' and vehicle='$vehicle' and status='2'");
	$r = mysql_fetch_array($q);
	$num = mysql_num_rows($q);
	if($num>0)
	{
	?>
		<p class="msg2">Note: 10 Rs. Will be deducted while you cancel the booking park id. 
		<table border="1" cellpadding="10">
  <tr>
    <td bgcolor="#FFE9D2"><span class="style3">Parking No. </span></td>
    <td bgcolor="#FFE9D2"><?php echo $r['park_id']; ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFE9D2"><strong>Name</strong></td>
    <td bgcolor="#FFE9D2"><?php echo $r['name']; ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFE9D2"><strong>Contact</strong></td>
    <td bgcolor="#FFE9D2"><?php echo $r['contact'];?></td>
  </tr>
  <tr>
    <td bgcolor="#FFE9D2"><strong>Vehicle Name:</strong></td>
    <td bgcolor="#FFE9D2"><?php echo $r['vname'];?></td>
  </tr>
  <tr>
    <td bgcolor="#FFE9D2"><strong>Vehicle No: </strong></td>
    <td bgcolor="#FFE9D2"><?php echo $r['car_no'];?></td>
  </tr>
  <tr>
    <td colspan="2" align="center" bgcolor="#FFE9D2"><a href="cancel.php?act=ok&time=<?php echo $r['timing_in'];?>&id=<?php echo $r['park_id'];?>">Cancel</a></td>
    </tr>
</table>
<?php
}else {

echo ' You have Not Yet Book any Ticket.....';


}
?>

		 </p>
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
