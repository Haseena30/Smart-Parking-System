<?php
session_start();
include("include/dbconnect.php");
extract($_POST);
$msg="";


?>
<html>
<head>
<title><?php include("include/title.php"); ?></title>
<link href="style.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      <td colspan="2" align="center" class="heading"><?php include("include/title.php"); ?></td>
    </tr>
    <tr>
      <td colspan="2" align="center" class="subhead"><?php include("include/link_home.php"); ?></td>
    </tr>
    <tr>
      <td width="76%" align="center" valign="top"><p>&nbsp;</p>
        <h3><strong>VIP PARKING </strong></h3>
        <?php
$q1=mysql_query("select * from parking where vehicle='Car' && vip='1'");
while($r1=mysql_fetch_array($q1))
{
$park[]=$r1['park_id'];
}
$d1=array_chunk($park,5);



?>
<table width="759" height="238" border="1" cellpadding="5" cellspacing="0">
          <?php
		  foreach($d1 as $d2)
		  {
		  ?>
		  <tr>
            <?php
			foreach($d2 as $d3)
			{
			echo "<td>";
			$q2=mysql_query("select * from parking where park_id=$d3");
			$r2=mysql_fetch_array($q2);	
				if($r2['status']==1)
				{
				echo '<table width="148" height="70" border="0" cellpadding="5" cellspacing="0" class="border2">
					  <tr>
						<td width="70"><strong>Parking No. </strong></td>
						<td width="52">'.$d3.'</td>
					  </tr>
					  <tr>
						<td>Name</td>
						<td>'.$r2['name'].'</td>
					  </tr>
					   <tr>
						<td>Contact</td>
						<td>'.$r2['contact'].'</td>
					  </tr>
					   <tr>
						<td>Vehicle Name</td>
						<td>'.$r2['vname'].'</td>
					  </tr>
					  <tr>
						<td>Car No.</td>
						<td>'.$r2['car_no'].'</td>
					  </tr>
					</table>';
				}
				else
				{
				echo '<table width="148" height="70" border="0" cellpadding="5" cellspacing="0" class="border3">
					  <tr>
						<td width="70"><strong>Parking No. </strong></td>
						<td width="52">'.$d3.'</td>
					  </tr>
					  <tr>
						<td colspan="2" align="center" class="txt1">EMPTY!!!</td>
					  </tr>
					</table>';
				}
			echo "</td>";	
			}
			?>
          </tr>
		  <?php
		  }
		  ?>
        </table>
		
		
		
        <p>&nbsp;</p>
        <p><a href="employee.php">Click to Employee Bike Parking</a> </p></td>
      <td width="24%" align="center" valign="top"><p>&nbsp;</p>
        <p><img src="images/japanesecarpark.jpg" width="305" height="269"></p>
        <p><img src="images/08112008536.jpg" width="305" height="250"></p></td>
    </tr>
    <tr>
      <td colspan="2" align="center" class="foot">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
