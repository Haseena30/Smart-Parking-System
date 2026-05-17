<?php
include("include/protect.php");
include("include/dbconnect.php");
extract($_POST);
$msg="";

if(isset($btn))
{
$q1=mysql_query("select * from parking where vehicle='$vehicle' order by park_id");
$num=@mysql_num_rows($q1);
}
else
{
$q1=mysql_query("select * from parking where vehicle='Car' order by park_id");
$num=@mysql_num_rows($q1);

}
if($_REQUEST['act']=="del")
{
$pid=$_REQUEST['pid'];
mysql_query("delete from parking where park_id=$pid");
header("location:view_park.php");
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
        <p class="txt1">Parking Place  Details</p>
        <p class="txt1">
           <select name="vehicle">
          <option>-Vehicle-</option>
          <option <?php if($vehicle=="Bike") echo "selected"; ?>>Bike</option>
          <option <?php if($vehicle=="Car") echo "selected"; ?>>Car</option>
          <option <?php if($vehicle=="Van") echo "selected"; ?>>Van</option>
          <option <?php if($vehicle=="Lorry") echo "selected"; ?>>Lorry</option>
          <option <?php if($vehicle=="Bus") echo "selected"; ?>>Bus</option>
        </select>
          &nbsp;
          <input type="submit" name="btn" value="Submit">
        </p>
        <table width="469" border="1" cellspacing="0" cellpadding="5">
        <tr>
          <td width="82" align="center" class="menu">Sno.</td>
          <td width="232" align="center" class="menu">Parking ID </td>
          <td width="117" align="center" class="menu">Action</td>
        </tr>
		<?php
		$i=0;
		$tamt=0;
		while($r1=mysql_fetch_array($q1))
		{ $i++;
	
		?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $r1['park_id']; ?></td>
          <td><a href="view_park.php?act=del&pid=<?php echo $r1['park_id']; ?>">Delete</a></td>
        </tr>
		<?php
		}
		?>
      </table>
      <p><strong><a href="add_park.php">Click to Add New Park ID </a></strong></p>
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
