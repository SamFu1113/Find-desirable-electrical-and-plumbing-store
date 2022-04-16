<?php session_start(); ?>
<?php

include 'connect.php';

$username=$_SESSION['username']; 
$data=mysql_query("select * from  register where username='$username' ");
if (isset($_POST['submit']))
{
   logout();
}
?>
<?php
  function   logout()
  {
    session_destroy();
    header('Location: fengshaodi.php');
  }
?>
<!DOCTYPE HTML>
<html>
<head>
<link rel=stylesheet type="text/css" href="fengshaodi.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>USERS</title>
<style>
#mei
{margin-top: -350px;}
#inf{border:1px solid skyblue; padding:50px}
#kuai{	width:800px;
		margin:0 auto;
		margin-top: 20px;
		}
.biaoshitu{width:200px;height:200px;}

.company {background:skyblue; width:800px;border:1px solid black;font-size:22px;display:inline-block;}

.title {text-decoration:none;}
</style>
</head>

<body>
<div id ="mei"><img  src="image/head.jpg" width="1910px" height="400px" /></div>
<div id="top">
  
  <div id="nav">
<ul>
<li>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </li>
<li>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </li>
<li>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </li>
<li>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </li>
<li>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </li>
<li>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</li>
<li>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</li>
<li>
<a href="fengshaodi.php">首頁</a>
</li>
<li><?php
$username=$_SESSION['username'];
if($username != null)
{
  echo'<a href = "USER.php">用戶</a>';
}
else
{
    echo'<a href = "JavaScript:void(0)" onclick = "openDialog()">登錄</a> ';
}
?></li>
<li>
    <a href="forum.php">論壇</a>
</li>
</ul>
</form>

</div></div>
<div id ="kuai">
   <?php 
  		if($username=="fengshaodi")
		{
			echo "你是管理者<a href=companyManager.php>進入管理者頁面</a>";
		}
		$rs=mysql_fetch_row($data);
		?>
		<div id="inf">
			<?php 
			echo "<h1>Hello  " . $rs[2];
			echo "</h1><br>你的信息：<br><br>";
			echo "城市:" . $rs[3]. "<br><br>";
			echo "地區:" . $rs[4]. "<br><br>";
			echo "詳細地址:".$rs[5]."<br><br>";
			echo "phone:" . $rs[6] . "<br>";
			echo "email:" . $rs[7];?>
		</div>
		<?php
			echo '<br><form action="#" method="post"><input type="submit" name="submit" value="登出">';
		?>
		<?php echo "<br><br>你的收藏<br><br>";
		$hascompany=mysql_query("SELECT distinct * from fcompany NATURAL JOIN usercollection  where username='$username'");
		
		for($j=1;$j<=mysql_num_rows($hascompany);$j++)
		{
			$js=mysql_fetch_row($hascompany);
			
			
			
			?>
			<div class="company">
			
           <?php echo "<img align=middle class=biaoshitu src=image/".$js[3]."/".$js[4].".jpg";?>
		   <a href="#"></a><?php echo "<a class=title href=fengbu.php?id=".$js[0].">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$js[1]."</a>"; ?>
			
             
            
            </div>
			<br><br><br>
	<?php	}?>
</html>          
</div>	

</body>
</html>