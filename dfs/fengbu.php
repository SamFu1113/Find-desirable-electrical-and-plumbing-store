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
<body>
<?php

if($_SESSION['username'] != null)
{
  $user = $_SESSION['username'];
	echo'<p><a href = "USER.php">用戶</a></p> ';
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
		$SQL = mysql_query("select `google地圖 from `company` where `公司名稱` = \"全家\" ")
    //$map = ....;	
	?>			
    				  <frameset cols="25%,50%,25%">
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

      

        <!-- comment area  -->
      


      <?php
          if($_POST['Comment']!='')
          {
            
            $comment=$_POST['Comment'];

            $data=mysql_query("INSERT INTO `comment` (`comment_ID`, `user`, `date`, `time`, `comment`, `company_ID`) VALUES ('3', '$user', '2018-06-13', '04:17:26.000000', '$comment', '$feng');");  
          } 

           $data=mysql_query("SELECT * FROM `comment` where `company_ID` = '$feng';"); 
           $data_row = mysql_num_rows($data);  
           echo "Comment_Area<br>";
           for ($j=0;$j<$data_row;$j++) {
              $rs=mysql_fetch_row($data); 
              for ($i=0;$i<6;$i++)
                echo $rs[$i] . '/';
              echo '<br>';
           }

      ?>
      <form action="" method="post">
            　comment: <textarea cols="50" rows="5" name="Comment">輸入你想要寫的內容...</textarea>
            　<input type="submit" value="送出表單">
            </form>
</body>
