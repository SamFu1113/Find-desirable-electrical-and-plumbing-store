<?php session_start(); ?>
<?php
mysql_connect("localhost","root","fengshen");//連結伺服器
mysql_select_db("test3");//選擇資料庫
mysql_query("set names utf8");//以utf8讀取資料，讓資料可以讀取
$name=$_POST['name'];

$username=$_SESSION['username']; 



?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>无标题文档</title>

<style>
.kuai
{
	margin:0 auto;
	display:inline-block;
	width:500px;
	height:100px;
	font-size:15px;
}
#dakuai

{
	width:80%;
	margin:0 auto;
	overflow:scroll;
height:500px;
}
</style>
</head>

<body>




                          
<form name="form" method="post" action="">
            
             
               <label><br>
                 <br>
               統一編號</label>
              ：
  <input type="text" name="cid" id="companyname">
              </p>
              <p>城市：
                <label for="city"></label>
                <select name="city" id="city">
                  <option value="嘉義市">嘉義市</option>
                  <option value="基隆市">基隆市</option>
                  <option value="宜蘭縣">宜蘭縣</option>
                  <option value="屏東縣">屏東縣</option>
                  <option value="彰化縣">彰化縣</option>
                  <option value="新北市">新北市</option>
                  <option value="桃園市">桃園市</option>
                  <option value="澎湖縣">澎湖縣</option>
                  <option value="臺中市">臺中市</option>
                  <option value="臺北市">臺北市</option>
                  <option value="臺南市">臺南市</option>
                  <option value="臺東縣">臺東縣</option>
                  <option value="花蓮縣">花蓮縣</option>
                  <option value="苗栗縣">苗栗縣</option>
                  <option value="連江縣">連江縣</option>
                  <option value="金門縣">金門縣</option>
                  <option value="雲林縣">雲林縣</option>
                  <option value="高雄市">高雄市</option>
                </select>
              </p>
              <p>
                地區：
                  <input type="text" name="area" id="address2">
  </p>
              <p>詳細地址：
                <input type="text" name="address" id="address3">
              </p>
  <p>
                <label>*聯絡人：
                  <input type="text" name="people" id="people">
<br>
                </label>
                <br>
                <label>*聯絡電話</label>
                ：
                <input type="text" name="phone" id="phone">
<br>
</p>
              <p>*E-mail：
                <input type="text" name="email" id="email">
<br>
                <input type="radio" name="tiaokuan" id="radio" value="yes">
                <label for="radio"></label>
                我已經完全了解店家會員<a href="服務條款.html" >服務條款</a>的相關說明                <br>
              </p>
<input type="submit" name="sub" id="submit2" value="sub" >
</form>
            <p>&nbsp;</p>
          
            
            <?php 
				
				if(isset($_POST["sub"]))
				{
					
							if( $username!= null)
							{
								$cid=$_POST['cid'];
								$city=$_POST['city'];
								$area=$_POST['area'];
								$address=$_POST['address'];
								$number=$_POST['number'];
								$people=$_POST['people'];
								$phone=$_POST['phone'];
								$email=$_POST['email'];
								
								$tiaokuan=$_POST["tiaokuan"];
								if($cid==""||$city==""||$area=""||$address=""||$number=""||$people==""||$phone==""||$email=="")
								{
								  echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."请填写完成！"."\"".")".";"."</script>";
								  echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."confirm.php"."\""."</script>";    
								  
								}
								$hascompany=mysql_query("select  ID from fcompany where ID='$cid'  ");
								for($j=1;$j<=mysql_num_rows($hascompany);$j++)
								{
									$js=mysql_fetch_row($hascompany);
									
									$company=$js[0];
								}
								echo $company;
								if($company != $cid)
								{	
									 echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."不存在公司！"."\"".")".";"."</script>";
								 	 echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."confirm.php"."\""."</script>";    
								} 
								if($tiaokuan != "yes" )
								{
									echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."請同意條款！"."\"".")".";"."</script>";
									echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."confirm.php"."\""."</script>";  
								}
								
									mysql_query("UPDATE register SET name= '$people'  WHERE username = '$username' ");
									mysql_query("UPDATE register SET city= '$city'  WHERE username ='$username'");
									
									mysql_query("UPDATE register SET area= '$area'  WHERE username = '$username' ");
									mysql_query("(UPDATE register SET Nostreet= $address  WHERE username = '$username' ");
									
									mysql_query("UPDATE register SET phone= '$phone'  WHERE username = '$username' ");
									mysql_query("UPDATE register SET email= '$email'  WHERE username = '$username' ");
									mysql_query(" insert into userconfirm (username,cid) values ('$username','$cid') ") ;
									echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."已完成認領,請等待審核！"."\"".")".";"."</script>";
									echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."fengshaodi.php"."\""."</script>";   
							}
								
							else
							{
								echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."請先登錄！"."\"".")".";"."</script>";
								echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."fengshaodi.php"."\""."</script>";    
							}
				}
				
				  
				
			?>
           
</body>
</html>