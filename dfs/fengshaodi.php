
<?php
mysql_connect("localhost","root","12345678");//連結伺服器
mysql_select_db("馮少迪");//選擇資料庫
mysql_query("set names utf8");//以utf8讀取資料，讓資料可以讀取中文
if($_POST['city']!='' or $_POST['type']!='')
{
	$city=$_POST['city'];
	$type=$_POST['type'];
	$data=mysql_query("select * from `company` where `公司地址` like  '%$city%' and `公司類別` like '%$type%'  ");	
}
else
{
	$data=mysql_query("select * from `company`  ");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
 
 <script type="text/javascript" src="script.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FSD</title>
<style>
 .tiao
 {
	 border: 1px solid blue;
 }
#kuai
{
	overflow:scroll;
	height:800px;
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
</style>
</head>

<body>
<?php


	echo'<p><a href = "JavaScript:void(0)" onclick = "openDialog()">登錄</a></p> ';

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





	
<form id="form1" name="form1" method="post" action="">
  <p>
        city:
        
        <input type="text" name="city" id="city" />
  </p>
  
  <p>
        種類：
        
          <input name="type" type="radio" id="radio" value="%" checked="checked" />不拘
        
        	<input type="radio" name="type" id="radio2" value="玻璃" />玻璃       
        	<input type="radio" name="type" id="radio3" value="掃地" />掃地
            <input type="radio" name="type" id="radio3" value="水电" />水电
            <input type="radio" name="type" id="radio3" value="五金" />五金
            <input type="radio" name="type" id="radio3" value="輕鋼架" />輕鋼架
            <input type="radio" name="type" id="radio3" value="門窗安裝" />門窗安裝
            <input type="radio" name="type" id="radio3" value="室內裝修" />室內裝修
            <input type="radio" name="type" id="radio3" value="鎖行" />鎖行
  </p>
  
  <p>&nbsp;</p>
  <p>
    <input type="submit" name="button" id="button" value="提交" />
  </p>
  <p>&nbsp;</p>
</form>

<div id ="kuai">
	<?php
          for($i=1;$i<=mysql_num_rows($data);$i++)
          {
            $rs=mysql_fetch_row($data);
			$feng=$rs[0];
        ?>  	
        		
      		  
              <div><?php echo "<a href=fengbu.php?id=$rs[0]> $rs[1]</a>"?></div>
              <div><?php echo $rs[8];echo $rs[9];echo $rs[2];?></div>
              <div><?php echo $rs[3]?></div>
             
			  
      <?php
          }
    ?>
</div>	

<p>&nbsp</p>
</body>
</html>