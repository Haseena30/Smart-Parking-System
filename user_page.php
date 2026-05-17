<?php
include("include/protect.php");
include("include/dbconnect.php");
extract($_POST);
$uname=$_SESSION['uname'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php include("include/title.php"); ?></title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body><form id="form1" name="form1" method="post" action="">
  <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="border">
    <tr>
      <td align="center" class="heading"><?php include("include/title.php"); ?></td>
    </tr>
    <tr>
      <td class="subhead"><?php include("include/link_user.php"); ?>	  </td>
    </tr>
    <tr>
      <td align="center" valign="top"><p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
    </tr>
    <tr>
      <td align="center" class="subhead">&nbsp;</td>
    </tr>
  </table>
</form>

</body>
</html>
