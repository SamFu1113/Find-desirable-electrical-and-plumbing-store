<?php session_start();?>
<?php
include 'connect.php';
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
 
 <script type="text/javascript" src="script.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>fengshaodi</title>
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
#comment_area{border: 2px solid #555555;
              border-radius: 15px; 
              width: 400px;
              height: 400px;
             }
#comment_name{border: 2px solid #555555;
              border-radius: 15px; 
              width: 100px;
              height: 30px;
              text-align: center;
              margin-top: 10px;
              margin-left: 10px;
              line-height: 30px;　
             }
#comment_time{border: 2px solid #555555;
              border-radius: 15px; 
              width: 220px;
              height: 30px;
              text-align: center;
              margin-top: -35px;
              margin-left: 120px;
              line-height: 30px;　
             }
#title
{   border-radius: 15px; 
    width: 365px; 
    min-height: 35px; 
    max-height: 300px;
    margin-top: 10px;
    margin-left: 10px;
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
    width: 365px; 
    min-height: 240px; 
    max-height: 500px;
    margin-top: 10px;
    margin-left: 10px;
    padding: 3px; 
    outline: 0; 
    border: 2px solid #a0b3d6; 
    font-size: 18px; 
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
<a href="post_article.php">發表文章</a>
</li>
</ul>
</form>
<?php
           $data=mysql_query("SELECT register.name, year, month, day, hour, minute, second, title, content FROM `forum` INNER JOIN `register` on forum.user_ID=register.username"); 
           $data_row = mysql_num_rows($data);  
           echo "<br><br>";
           
           for ($j=0;$j<$data_row;$j++) {
              echo "<div id=comment_area>";
              $rs=mysql_fetch_row($data); 
              for ($i=0;$i<9;$i++){
                if ($i==0) {
                  echo "<div id=comment_name>";
                  echo $rs[$i];
                  echo "</div>";
                }
                elseif ($i>=1 &&$i<=6) {
                  echo "<div id=comment_time>";
                  for ($i=1; $i < 7; $i++) {
                    switch ($i) {
                       case '1':
                         echo $rs[$i] . '年';
                         break;
                       case '2':
                         echo $rs[$i] . '月';
                         break;
                       case '3':
                         echo $rs[$i] . '日';
                         break;
                       case '4':
                         echo $rs[$i] . '點';
                         break;
                       case '5':
                         echo $rs[$i] . '分';
                         break;
                       case '6':
                         echo $rs[$i] . '秒';
                         break;
                       default:
                         echo "ERROR";
                         break;
                     } 
                  } 
                  echo "</div>";
                  $i--;
                }
                elseif ($i==7) {
                  echo "<div id=title>";
                  echo "&nbsp" . $rs[$i];
                  echo "</div>";
                }
                else{
                  echo "<div id=content>";
                  echo $rs[$i];
                  echo "</div>";
                }
              }
              echo "</div>";
              echo '<br>';
           }
      ?>     

</div>
<div id="light" class="white_content">
    <form method="post" action="login.php">
    帳號：
    <input type="text" name="usernamel"><br/><br/>
    密碼：
    <input type="password" name="passwordl">
    <input type="submit" value="登錄" name="subl">
     <a href = "register.html">沒有帳號，註冊</a>
    </form>
    <a href = "javascript:void(0)" onclick = "closeDialog()">點這裏關閉本窗口</a>
</div> 
<div id="fade" class="black_overlay"></div> 





	


<p>&nbsp</p>
</body>
</html>