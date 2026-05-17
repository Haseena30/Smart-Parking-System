<?php
session_start();
include("include/dbconnect.php");
extract($_POST);
$msg="";
if(isset($login))
{
 if(trim($uname=="")) { $msg = "Enter the Username"; }
 else if(trim($pwd=="")) { $msg = "Enter the Password"; }
	else
	{
		
			$qry = "SELECT * FROM user_reg WHERE username='$uname' && password='$pwd'";
			$exe=mysql_query($qry);
			$res = mysql_fetch_array($exe);
			$num=mysql_num_rows($exe);
				if($num==1)
				{
				$_SESSION['vehicle'] = $res['vehicle'];
				$_SESSION['uname']=$uname;
				echo $_SESSION['vehicle'];
				header("location:user_book.php");
				}
			
		else
		{
		$msg="Login Incorrect!";
		}
	}	
}

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
      <td align="center" class="heading"><?php include("include/title.php"); ?></td>
    </tr>
    <tr>
      <td align="center" class="subhead"><?php include("include/link_home.php"); ?></td>
    </tr>
    <tr>
      <td align="center" valign="top"><p>&nbsp;</p>
        <p class="style1">&nbsp;</p>
        <table width="385" height="171" border="0" cellpadding="5" cellspacing="0" class="border">
          <tr>
            <td colspan="2" align="center" class="menu"><strong>User Login</strong></td>
          </tr>
          <tr>
            <td colspan="2" class="msg"><?php echo $msg; ?></td>
          </tr>
          <tr>
            <td width="94">Username</td>
            <td width="90"><input type="text" name="uname" /></td>
          </tr>
          <tr>
            <td>Password</td>
            <td><input type="password" name="pwd" /></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><p>
              <input type="submit" name="login" value="Login" />
            </p>
              <p><a href="user_reg.php">New User</a> </p></td>
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
