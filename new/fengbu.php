<?php session_start(); ?>
<?php
mysql_connect("localhost","root","fengshen");//連結伺服器
mysql_select_db("comment");//選擇資料庫
mysql_query("set names utf8");//以utf8讀取資料，讓資料可以讀取中文
$data=mysql_query("select * from `company`  ");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>fengbu1</title>
<style type="text/css"> 
.starWrapper{border:1px solid #FFCC00;padding:5px;width:90px;} 
.starWrapper img{cursor:pointer;} 
#comment_area{border: 2px solid #555555;
              border-radius: 15px; 
              width: 400px;
              height: 200px;}
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
              margin-left: 117px;
              line-height: 30px;
             }
#comment_content{border: 2px solid #555555;
                 border-radius: 15px; 
                 width: 375px;
                 height: 100px;
                 margin-top: 5px;
                 margin-left: 10px;
                 word-break: break-all;
                 line-height: 30px;
                 }
#comment_rating{border: 2px solid #555555;
                border-radius: 15px; 
                width: 30px;
                height: 30px;
                text-align: center;
                float: right;
                margin-top: -143px;
                margin-right: 20px;
                line-height: 30px;
               }
</style> 
<script type="text/javascript">/*
function rate(obj,oEvent){ 
  //================== 
  // 圖片地址設置 
  //================== 
  var imgSrc = 'http://www.jb51.net/upload/20080508122008586.gif'; //沒有填色的星星
  var imgSrc_2 = 'http://www.jb51.net/upload/20080508122010810.gif'; //打分後有顏色的星星
  //--------------------------------------------------------------------------- 
  if(obj.rateFlag) return; 
  var e = oEvent || window.event; 
  var target = e.target || e.srcElement;  
  var imgArray = obj.getElementsByTagName("img"); 
  for(var i=0;i<imgArray.length;i++){ 
     imgArray[i]._num = i; 
     imgArray[i].onclick=function(){ 
      if(obj.rateFlag) return; 
      obj.rateFlag=true; 
  //    alert(this._num+1);       //this._num+1這個數字寫入到數據庫中,作為評分的依據
     }; 
  } 
  if(target.tagName=="IMG"){ 
     for(var j=0;j<imgArray.length;j++){ 
      if(j<=target._num){ 
       imgArray[j].src=imgSrc_2; 
      } else { 
       imgArray[j].src=imgSrc; 
      } 
     } 
  } else { 
     for(var k=0;k<imgArray.length;k++){ 
      imgArray[k].src=imgSrc; 
     } 
  } 
}
</script> 
<body>

<?php

if($_SESSION['username'] != null)
{
  $user = $_SESSION['username'];
	echo'<p><a href = "USER.php">用戶</a> ';
  echo'<a href = "Sfengshaodi.php">主頁</a></p> ';
}
?>


	<?php
		$feng=$_GET['id'];
		echo $feng . '<br>';
		//echo"fsd"; 
		for($i=1;$i<=mysql_num_rows($data);$i++)
		{
			$rs=mysql_fetch_row($data);
			if($feng==$rs[0])
			{	
		//$SQL = mysql_query("select `google地圖 from `company` where `公司名稱` = \"全家\" ")
    //$map = ....;	
	?>			
    			<!--	  <frameset cols="25%,50%,25%">
    					  <?php echo "<frame src=$rs[10]>";?>
                          <frame src="/example/html/frame_b.html">
                          <frame src="/example/html/frame_c.html">

              </frameset>
				<div><?php echo $rs[1]?></div>
              	<div><?php echo $rs[2]?></div>
              	<div><?php echo $rs[3]?></div>
              	<div><?php echo "<img src=$rs[4]> ";?> </div><br>
     <?php }?>
  <?php }?>
  
          <iframe
          width="600"
          height="450"
          frameborder="0" style="border:0"
          src=https://www.google.com/maps/embed/v1/place?key=AIzaSyBA6lXghCNwrY4BWH7upMdID_vjD-d2yTg&q=<?php  ?>46.414382,10.013988
 allowfullscreen>
          </iframe>
               <div id="map"></div>
        <script>
          function initMap() {
            // Create a map object and specify the DOM element for display.
            var map = new google.maps.Map(document.getElementById('map'), {
              center: {lat: -34.397, lng: 150.644},
              zoom: 8
            });
          }
    
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"
        async defer></script>

      
-->
        <!-- comment area  -->
      
      <form action="" method="post">Comment:<br><textarea cols="50" rows="5" name="Comment"></textarea>
      <select name="rate" method="post">
        <option>請選擇評分</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
      </select>
      <input type="submit" value="確認">
      </form>
<!--      <p class="starWrapper" onmouseover="rate(this,event)"> 
      <img src="http://www.jb51.net/upload/20080508122008586.gif" title="極差" />
      <img src="http://www.jb51.net/upload/20080508122008586.gif" title="較差" />
      <img src="http://www.jb51.net/upload/20080508122008586.gif" title="普通" />
      <img src="http://www.jb51.net/upload/20080508122008586.gif" title="較好" />
      <img src="http://www.jb51.net/upload/20080508122008586.gif" title="極好" /></p> -->
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
                  mysql_query("INSERT INTO `comment` (`comment_ID`, `user_ID`, `year`, `month`, `day`, `hour`, `minute`, `second`, `content`, `rating`, `company_ID`) VALUES ('$comment_row' +1, '$user', '$year', '$month', '$day', '$hour', '$minute', '$second', '$comment', '$rate' , '$feng');");  
                }
      ?>

      <?php
           $data=mysql_query("SELECT user_ID, year, month, day, hour, minute, second, content, rating FROM `comment` where `company_ID` = '$feng';"); 
           $data_row = mysql_num_rows($data);  
           echo "Comment_Area<br>";
           
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
</body>
