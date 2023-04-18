<?php session_start(); ?>
<?php
include 'connect.php';
$data=mysql_query("select * from fcompany  ");
$username=$_SESSION['username'] 
?>
<!DOCTYPE html>
<html>
<head>
  <link rel=stylesheet type="text/css" href="fengshaodi.css">
<style>
#mei
{margin-top: -350px;}
#text{margin-top:10px;
	text-align:left;
	padding:30px;
	width:800px;
	border:1px solid skyblue;
	background-color:skyblue;
	border-radius: 15px;
	}
#map { width:200px;height:100px;margin:0 auto;display:none;}
.biaoshitu{width:500px;height:500px;align:top;}
#but{width:200px;height:50px;background-color:skyblue;}
#comment{width:800px;background-color:green;}
#comment_area{border: 2px solid #0066FF;
              border-radius: 15px; 
              width: 800px;
              height: 200px;
              margin: 0px auto;
              background-color: #CCEEFF;}
#comment_name{
			        border: 2px solid #555555;
              border-radius: 15px; 
              width: 150px;
              height: 30px;
              text-align: center;
              margin-top: 10px;
              margin-left: 10px; 
              line-height: 30px;
              color: #4400CC;
             }
#comment_time{border: 2px solid #555555;
              border-radius: 15px; 
              width: 500px;
              height: 30px;
              text-align: center;
              margin-top: -35px;
              margin-left: 177px;
              line-height: 30px;
              color: #4400CC;
             }
#comment_content{border: 2px solid #555555;
                 border-radius: 15px; 
                 width: 750px;
                 height: 100px;
                 margin-top: 30px;
                 margin-left: 10px;
                 word-break: break-all;
                 line-height: 30px;
                 color: #4400CC;
                 }
#comment_rating{border: 2px solid #555555;
                border-radius: 15px; 
                width: 90px;
                height: 30px;
                text-align: center;
                float: right;
                margin-top: -167px;
                margin-right: 20px;
                line-height: 30px;
                color: #4400CC;
               }
body{background-image: linear-gradient( to bottom right , pink, blue);
}
</style>
<script type="text/javascript" src="script.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>fengbu</title>

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
<center>
<form id="form1" name="form1" method="post" action="">

 
 	<?php 
	$feng=$_GET['id'];
	
	
	$already="已收藏"; 
	
    if($username=="")
	{
		$already="請先登錄"; 
	}
	
    	  
		$hascompany=mysql_query("select  ID from usercollection where ID='$feng' and username='$username' ");
		for($j=1;$j<=mysql_num_rows($hascompany);$j++)
		{
			$js=mysql_fetch_row($hascompany);
			
			$company=$js[0];
		}
		
		
		if($company!=$feng)
		{
			
			$already="收藏";
			
		}
	?>
 <!--<script>
	function Collect()
	{
		<?php 
		if($company!=$feng)
		{
			mysql_query("insert into usercollection (username,ID) values ('$username','$feng')");
		}
		if($username!= null)
		{
			echo 'document.getElementById("but").innerHTML="已收藏"';
		}
		?>
	}
	</script>-->
<?php
	for($i=1;$i<=mysql_num_rows($data);$i++)
	{
		$rs=mysql_fetch_row($data);
		if($feng==$rs[0])
		{	
			if(empty($rs[4]))
			{
				$rs[4]=0;
			}
	?>		

				<div id="text">
					
							<div><?php echo "種類: ".$rs[3]?></div><br> 
									<?php echo "統一編號：".$rs[0]?> 
								<div><?php echo "公司名稱：".$rs[1]?></div>
								<?php
									if($rs[5]!=null)
									{
										echo "電話：" . $rs[5] . "<br>";
									}
								?>
								<div><?php echo "地址：".$rs[6].$rs[7].$rs[2]?></div><br> 	
							  <?php echo "<button type=button id =but  onclick=Collect()>".$already."</button>";?>
							  
							  <div><?php echo "<br>公司圖片: <br><br><img class=biaoshitu src=image/".$rs[3]."/".$rs[4].".jpg> ";?> </div>
								
				  
				  
					<!--
					<div><?php echo $rs[8];echo ",";echo $rs[9]?></div>
					<div><?php echo "<iframe  id=map src=https://www.google.com/maps/embed/v1/place?key=AIzaSyC36cy_XwZzrvlZolvhMplZUwJeDJOZiUY&q=25.0519005,121.525881199999 allowfullscreen><br>";?></div>
					<div><?php //echo "<iframe  id=map src=https://www.google.com/maps/embed/v1/place?key=AIzaSyC36cy_XwZzrvlZolvhMplZUwJeDJOZiUY&q=".$rs[8].",".$rs[9]." allowfullscreen><br>";?></div>
					<button onclick=map()> google地图</div>-->
					<div>
					<script>
						
					</script>
					
					</div>
					</div>
				  
	<?php }?>



<?php }?>
  <form id="comment" action="" method="post"><br><em style="font-size:30px;color:orange;">Comment:</em><br><br><textarea cols="85" rows="5" name="Comment"></textarea><br>
      <select name="rate" method="post">
        <option>請選擇評分</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
      </select>
      <input type="submit" value="確認">
      </form></center>
 <?php
                if($_SESSION['username'] != null&&$_POST['Comment']!=''&&$_POST['rate']!='請選擇評分')
                {
                  date_default_timezone_set('Asia/Taipei');
                  $year = date("Y");
                  $month = date("m");
                  $day = date("d");
                  $hour = date("H");
                  $minute = date("i");
                  $second = date("s");
                  $comment=$_POST['Comment'];
                  $rate=$_POST['rate'];
                  $comment_sql=mysql_query("SELECT * FROM `comment`;");
                  $comment_row = mysql_num_rows($comment_sql);
                  $comment_num = (int) $comment_row;
                  mysql_query("INSERT INTO `comment` (`comment_ID`, `user_ID`, `year`, `month`, `day`, `hour`, `minute`, `second`, `content`, `rating`, `company_ID`) VALUES ('$comment_row' +1, '$username', '$year', '$month', '$day', '$hour', '$minute', '$second', '$comment', '$rate' , '$feng');");  
                }
      ?>

      <?php
           $data=mysql_query("SELECT name, year, month, day, hour, minute, second, content, rating FROM `comment` INNER JOIN `register` ON comment.user_ID=register.username where `company_ID` = '$feng'"); 
           $data_row = mysql_num_rows($data);  
           //echo "<center><br><p style='font-size:20px;color:orange;'>Comment_Area</p></center><br>";
		   echo "<br>";
           
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
                  echo "<div id=comment_content>";
                  echo "&nbsp" . $rs[$i];
                  echo "</div>";
                }
                else{
                  echo "<div id=comment_rating>";
				  echo "評分：";
                  echo $rs[$i];
                  echo "</div>";
                }
              }
              echo "</div>";
              echo '<br>';
           }
         /* for ($j=0;$j<$data_row;$j++) {
              echo "<div id=comment_area>";
              $rs=mysql_fetch_row($data); 
              for ($i=0;$i<8;$i++)
                echo $rs[$i] . '/'; 
              echo "</div>";
              echo '<br>';
           }*/
      ?>     

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

</body>
