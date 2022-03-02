<?php session_start(); ?>
<?php
mysql_connect("localhost","root","12345678");//連結伺服器
mysql_select_db("馮少迪");//選擇資料庫
mysql_query("set names utf8");//以utf8讀取資料，讓資料可以讀取中文
$username=$_SESSION['username'];
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Mange</title>
</head>

<body>

<?php 
if ($username!="fengshaodi")
{
	echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."fengshaodi.php"."\""."</script>";   
}
echo '<a onclick="out()" href="fengshaodi.php">登出</a>  <br><br>';
?>
<form name="form1" method="post" action="">
  <p>companyID: 
    <label for="CID"></label>
  <input type="text" name="CID" id="CID">
  </p>
  <p>companyname:
    <input type="text" name="CID2" id="CID2">
  </p>
  <p>city: 
    <input type="text" name="CID3" id="CID3">
</p>
  <p>area: 
    <input type="text" name="CID4" id="CID4">
</p>
  <p>type:  
    <input type="text" name="CID5" id="CID5">
  </p>
  <p>&nbsp;</p>
</form>
<script>
function out()
{
	<?php  $_SESSION['username']="";?>
	
}

</script>
</body>
</html>