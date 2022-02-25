<?php
mysql_connect("localhost","root","12345678");//連結伺服器
mysql_select_db("資料庫作業");//選擇資料庫
mysql_query("set names utf8");//以utf8讀取資料，讓資料可以讀取中文
$data=mysql_query("select * from course");//選擇從member資料表中讀取所有的資料

if($_POST['CourseNo']!=''){
 $CourseNo=$_POST['CourseNo'];

 $data=mysql_query("select * from course where CourseNo like '%$CourseNo%' "); 
}else{
 $data=mysql_query("select * from member");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>資料庫網頁建置</title>

<style>
	.xiaotiao{
		height:100px;
		width:800px;
		border:1px solid black;
		margin:0 auto;
		padding:20px;
	}
	#dakuai{
		border:1px solid black;
		margin:500px auto;


</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  CourseNo
  : 
  <label for="textfield"></label>
  <input type="text" name="textfield" id="textfield" />
  <input type="submit" name="button" id="button" value="搜尋" />
</form>
<p>

</p>
		<div id="dakuai">
			  <?php
              for($i=1;$i<=mysql_num_rows($data);$i++){
            $rs=mysql_fetch_row($data);
            ?>
            <div class="xiaotiao" >
                CourseNo: <?php echo $rs[0]?><br>
                CrsDesc: <?php echo $rs[1]?><br>
                CrsUnits: <?php echo $rs[2]?><br>
            </div>
            <br />
            <?php
              }
              ?>
              
         </div>
<p>&nbsp;</p>
</body>
</html>