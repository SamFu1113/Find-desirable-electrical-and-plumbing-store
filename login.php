<?php session_start(); ?>
<?php
$link=mysql_connect("localhost","root","fengshen");//链接数据库
header("Content-type:text/html;charset=utf-8");
if($link)
{
  $select=mysql_select_db("馮少迪",$link);
  if($select)
  {
    if(isset($_POST["subl"]))
    {
      $name=$_POST["usernamel"];
      $password=$_POST["passwordl"];
      if($name==""||$password=="")//判断是否为空
      {
        echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."請填寫正确的信息！"."\"".")".";"."</script>";
        echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."fengshaodi.php"."\""."</script>";
        exit;
      }
      $str="select password from register where username="."'"."$name"."'";
      mysql_query('SET NAMES UTF8');      $result=mysql_query($str,$link);
      $pass=mysql_fetch_row($result);
      $pa=$pass[0];
      if($pa==$password)//判断密码与注册时密码是否一致
      {
		$_SESSION['username'] = $name;
        echo"登錄成功！";
        echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."fengshaodi.php"."\""."</script>";
      }
	  else
      {  
        echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."登錄失敗！"."\"".")".";"."</script>";
        echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."fengshaodi.php"."\""."</script>";
      }
    }
     
  }
}
?>