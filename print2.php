<?php
include("include/protect.php");
include("include/dbconnect.php");
extract($_POST);
$msg="";

$id=$_REQUEST['id'];
$q1=mysql_query("select * from park_details where park_id=$id order by id desc");
$r1=mysql_fetch_array($q1);
?>
<html>
<head>
<title><?php include("include/title.php"); ?></title>
<style type="text/css">
body
{
font-family:Arial, Helvetica, sans-serif;
font-size:12px;
}
.border {
	border: 1px solid #000000;
}
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <p>&nbsp;</p>
  <table width="480" height="149" border="0" align="center" cellpadding="0" cellspacing="0" class="border">
    <tr>
      <td align="center" scope="col"><h3>Parking Details </h3></td>
    </tr>
    <tr>
      <td align="right" scope="col">&nbsp;</td>
    </tr>
    <tr>
      <td><strong>Parking ID : <?php echo $id; ?></strong></td>
    </tr>
    <tr>
      <td align="center"><p>&nbsp;</p>
        <table width="377" height="137" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="116" scope="col">Name</td>
          <td width="98" scope="col">: <?php echo $r1['name']; ?></td>
        </tr>
        <tr>
          <td>Contact No. </td>
          <td>: <?php echo $r1['contact']; ?></td>
        </tr>
        <tr>
          <td>Address</td>
          <td>: <?php echo $r1['address']; ?></td>
        </tr>
        <tr>
          <td>Vechile</td>
          <td>: <?php echo $r1['vehicle']; ?></td>
        </tr>
        <tr>
          <td>Vehicle No. </td>
          <td>: <?php echo $r1['car_no']; ?></td>
        </tr>
        <tr>
          <td>Start Date </td>
          <td>: <?php echo $r1['in_date']; ?></td>
        </tr>
        <tr>
          <td>End Date </td>
          <td>: <?php echo $r1['out_date']; ?></td>
        </tr>
        <tr>
          <td>Total Hours </td>
          <td>: <?php 
		  $days=(strtotime($r1['out_date'])-strtotime($r1['in_date']))/(60*60);
		  
		  echo $days; ?></td>
        </tr>
        <tr>
          <td>Amount</td>
          <td>: <?php echo $r1['amount']; ?></td>
        </tr>
      </table>
      <p>&nbsp;</p></td>
    </tr>
  </table>
  <p align="center">&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>
