<?php session_start(); ?>
<?php

$link=mysql_connect("localhost","root","fengshen");//链接数据库
header("Content-type:text/html;charset=utf-8");
if($link)
  {  
    //echo"链接数据库成功";
    $select=mysql_select_db("馮少迪",$link);//选择数据库
    if($select)
    {
      //echo"选择数据库成功！";
      if(isset($_POST["sub"]))
      {
        $name=$_POST["username"];
        $password1=$_POST["password"];//获取表单数据
        $password2=$_POST["password2"];
		$nickname=$_POST["name"];
        if($name==""||$password1==""||$nickname=="")//判断是否填写
        {
          echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."請填寫完成！"."\"".")".";"."</script>";
          echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."register.html"."\""."</script>";    
          exit;
        }
        if($password1==$password2)//确认密码是否正确
        {
          $str="select count(*) from register where username="."'"."$name"."'";
          $result=mysql_query($str,$link);
          $pass=mysql_fetch_row($result);
          $pa=$pass[0];
          if($pa==1)//判断数据库表中是否已存在该用户名
          {
           
          echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."該用戶名已被註冊"."\"".")".";"."</script>";
          echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."register.html"."\""."</script>";   
          exit; 
          }          
          mysql_query("INSERT INTO `register` (`username`, `password`, `name`, `city`, `area`, `Nostreet`, `phone`, `email`) VALUES ('$name', '$password1', '$nickname', NULL, NULL, NULL, NULL, NULL);");//将注册信息插入数据库表中
          //echo"$sql";
         // mysql_query($sql,$link);
          mysql_query('SET NAMES UTF8');
          $close=mysql_close($link);
          if($close)
          {
  		   //$_SESSION['username'] = $name;
            //echo"数据库关闭";
            //echo"注册成功！";
			echo "<script type='text/javascript'>";
			echo "alert('註冊成功');";
			echo "window.location.href = 'fengshaodi.php';";
			echo "</script>";
            //echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."fengshaodi.php"."\""."</script>";    
          }
        }
        else
        {
          echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."密碼不一致！"."\"".")".";"."</script>";
          echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."register.html"."\""."</script>";    
        }
      }
    }
  }
?>