<?php
include("include/protect.php");
include("include/dbconnect.php");
extract($_POST);
$msg="";

$cmonth=date("m");
$cyear=date("Y");

if(isset($btn))
{
$q1=mysql_query("select * from park_details where month=$month && year=$year");
}
else
{
$q1=mysql_query("select * from park_details where month=$cmonth && year=$cyear");
}
$num=@mysql_num_rows($q1);


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
        <p class="txt1">Booking Details</p>
        <p class="txt1">
          <select name="month">
		  <option value="">-Select-</option>
		  <?php
		  $mq=mysql_query("select distinct(month) from park_details order by month");
		  while($mr=mysql_fetch_array($mq))
		  {
		  ?>
		  <option <?php if($mr['month']==$month) echo "selected"; ?>><?php echo $mr['month']; ?></option>
		  <?php
		  }
		  ?>
          </select>
          &nbsp;&nbsp;
          <select name="year">
		  <option value="">-Select-</option>
		  <?php
		  $yq=mysql_query("select distinct(year) from park_details order by year");
		  while($yr=mysql_fetch_array($yq))
		  {
		  ?>
		  <option <?php if($yr['year']==$year) echo "selected"; ?>><?php echo $yr['year']; ?></option>
		  <?php
		  }
		  ?>
          </select>
          &nbsp;
          <input type="submit" name="btn" value="Submit">
        </p>
        <table width="875" border="1" cellspacing="0" cellpadding="5">
        <tr>
          <td align="center" class="menu">Sno.</td>
          <td align="center" class="menu">Parking ID </td>
          <td align="center" class="menu">Owner Name </td>
          <td align="center" class="menu">Contact No. </td>
          <td align="center" class="menu">Vehicle</td>
          <td align="center" class="menu">Vehicle No. </td>
          <td align="center" class="menu">In Date </td>
          <td align="center" class="menu">Out Date </td>
          <td align="center" class="menu">Amount</td>
        </tr>
		<?php
		$i=0;
		$tamt=0;
		while($r1=mysql_fetch_array($q1))
		{ $i++;
		$tamt+=$r1['amount'];
		?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $r1['park_id']; ?></td>
          <td><?php echo $r1['name']; ?></td>
          <td><?php echo $r1['contact']; ?></td>
          <td><?php echo $r1['vehicle']; ?></td>
          <td><?php echo $r1['car_no']; ?></td>
          <td><?php echo $r1['in_date']; ?></td>
          <td><?php if($r1['out_date']) echo $r1['out_date']; else echo "-"; ?></td>
          <td><?php echo $r1['amount']; ?></td>
        </tr>
		<?php
		}
		?>
      </table>
      <p><strong>Total Amount : Rs. <?php echo $tamt; ?></strong></p>
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
