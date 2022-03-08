<?php session_start(); ?>
<?php

mysql_connect("localhost","root","fengshen");//連結伺服器
mysql_select_db("comment");//選擇資料庫
mysql_query("set names utf8");//以utf8讀取資料，讓資料可以讀
echo '<a href="fengshaodi.php">登出</a>  <br><br>';

$username=$_SESSION['username'];
$data=mysql_query("select * from  register where username='$username'");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>USERS</title>
</head>

<body>
<div id ="kuai">
   <?php 
   $rs=mysql_fetch_row($data);
   echo "<p>賬號</p>".$rs[0];
   ?>
             
		
</div>	
</body>
</html>