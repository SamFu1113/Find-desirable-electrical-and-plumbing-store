<?php session_start();?>
<?php
mysql_connect("localhost","root","fengshen");//連結伺服器
mysql_select_db("comment");//選擇資料庫
mysql_query("set names utf8");//以utf8讀取資料，讓資料可以讀取中文

if($_POST['name']!='' or $_POST['type']!=''or $_POST['city']!='' or $_POST['area']!=''  )
{
	
	$name=$_POST['name'];
	$type=$_POST['type'];
	$city=$_POST['city'];
	$area=$_POST['area'];
	if($_POST['name']!='')
	{
		$data=mysql_query("select * from `fcompany` where  name like '%$name%' or ID like '%$name%' ");
	}
	if($_POST['name']=='')
	{
		$data=mysql_query("select * from `fcompany` where  type like  '%$type%'  and CITY like  '%$city%' ");
		if($_POST['area']!='')
		{
			$data=mysql_query("select * from `fcompany` where NAME like  '%$name%' and TYPE like '%$type%' and AREA like  '%$area%' ");	
		}	
	}
	
}
else
{
	$data=mysql_query("select * from `fcompany`  ");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>fengshaodi</title>
<script type="text/javascript">
	function error()
	{
		alert("發文失敗");
	}
</script>
<style>
 .tiao
 {
	 border: 1px solid blue;
 }
#kuai
{
	margin:0 auto;
	overflow:scroll;
	height:3000px;
	width:60%;
	
}
.xiaokuai
{
	display:inline-block;
	width:32%;
	height:600px;
	margin:5px;
	border:1px solid gray;
}
.biaoshitu
{
	
	width:400px;
	height:500px;
}
.black_overlay{ 
	  display: none; 
	  position: absolute; 
	  top: 0%; 
	  left: 0%; 
	  width: 100%; 
	  height: 100%; 
	  background-color: black; 
	  z-index:1001; 
	  -moz-opacity: 0.8; 
	  opacity:.80; 
	  filter: alpha(opacity=88); 
  } 
.white_content { 
	display: none; 
	position: absolute; 
	top: 25%; 
	left: 25%; 
	width: 55%; 
	height: 55%; 
	padding: 20px; 
	border: 10px solid orange; 
	background-color: white; 
	z-index:1002; 
	overflow: auto; 
} 
#diqu
{
	width：400px;
	border:1px solid black;
}
input
{
	border:1px solid black;
	display:inline-block;
}
ul,li {margin:0;padding:0;}
#top{height:40px;}
#nav {background:#518EFD;height:60px;line-height:60px;}
#nav li {list-style-type:none;float:left;font-size:20px;}
#nav li a {
 text-decoration:none;
 padding:0px 15px;
 color:#fff;
 display:inline-block;
}
#nav li a:hover {background:#23A2A0;}
#nav li ul {display:none;background:#23A2A0;position:absolute;}
#nav li ul li {float:none;}


#nav li:hover ul {display:block;}
#nav li:hover ul li a:hover {background:#1E9BE3;}
#nav li ul li a:hover ul {display:block;}
#nav li ul li a:hover ul li a:hover {background:#1E9BE3;}
#nav ul li:hover ul li ul {
					background:yellow;
					visibility:hidden;
					margin-top: -60px;
					margin-right: 0;
					margin-bottom: 0;
					margin-left: 85px;
					width: 100%;}
					
#nav ul li ul li:hover ul {
					/* 觸動第二層時，顯示第三層 */
					visibility:visible;
				}
#submit,#name {
    padding:5px 15px; 
    background:white; 
    border:0 none;
    cursor:pointer;
    -webkit-border-radius: 5px;
    border-radius: 5px; 
}
.gundong
{
	height:500px;
	width:200px;
	overflow-x: hidden;
        overflow-y: scroll;
}
#title
{	border-radius: 15px; 
	width: 400px; 
    min-height: 35px; 
    max-height: 300px;
    margin-top: 10px;
    padding: 3px; 
    outline: 0; 
    border: 2px solid #a0b3d6; 
    font-size: 22px; 
    word-wrap: break-word;
    overflow-x: hidden;
    overflow-y: auto;
    _overflow-y: visible; }
#content
{
	border-radius: 15px; 
	width: 400px; 
    min-height: 120px; 
    max-height: 500px;
    _height: 120px; 
    margin-top: 10px;
    padding: 3px; 
    outline: 0; 
    border: 2px solid #a0b3d6; 
    font-size: 14px; 
    word-wrap: break-word;
    overflow-x: hidden;
    overflow-y: auto;
    _overflow-y: visible;
}
</style>
</head>

<body>

<div id="top">
</div>
<div id="nav">
<ul>
<form id="form1" name="form1" method="post" action="">
<li>
<a href="sfengshaodi.php">首頁</a>
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
</div>
<?php
$send=0;  
?>
<form action="#" method="post">
<div id="title" name='title'>
標題:<br><textarea cols="50" rows="2" name="title"></textarea>
</div>
<div id="content" name='content'>
內文:<br><textarea cols="50" rows="20" name="content"></textarea>
</div>
<br><input type="submit" value="發表">
</form>
<?php  
	
	$title=$_POST['title'];
	$content=$_POST['content'];
	if($_SESSION['username'] != null&&$_POST['title']!=''&&$_POST['content']!='')
    {
        date_default_timezone_set('Asia/Taipei');
        $year = date("Y");
        $month = date("m");
        $day = date("d");
        $hour = date("H");
        $minute = date("i");
        $second = date("s");
        $article_sql=mysql_query("SELECT * FROM `forum`;");
        $article_row = mysql_num_rows($article_sql);
        $article_num = (int) $article_row;
        mysql_query("INSERT INTO `forum` (`article_ID`, `user_ID`, `name`, `year`, `month`, `day`, `hour`, `minute`, `second`, `title`, `content`) VALUES ('$article_row'+1, '$username', '', '$year', '$month', '$day', '$hour', '$minute', '$second', '$title', '$content');"); 
        echo "<script type='text/javascript'>";
    	echo "alert('成功發佈文章');";
    	echo "window.location.href = 'forum.php';";
		echo "</script>";

    }
    else if(isset($_POST['title'])||$_POST['content'])
    {
    	echo "<script type='text/javascript'>";
    	echo "alert('發文失敗');";
    	echo "</script>";
    }
?>
<div id="light" class="white_content">
    <form method="post" action="login.php">
    账号：
    <input type="text" name="usernamel"><br/><br/>
    密码：
    <input type="password" name="passwordl">
    <input type="submit" value="登录" name="subl">
     <a href = "register.html">没有账号，注册</a>
    </form>
    <a href = "javascript:void(0)" onclick = "closeDialog()">點這裏關閉本窗口</a>
</div> 
<div id="fade" class="black_overlay"></div> 
<p>&nbsp</p>
</body>
</html>