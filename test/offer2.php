<?php
mysql_connect("localhost","root","12345678");//連結伺服器
mysql_select_db("fsd");//選擇資料庫
mysql_query("set names utf8");//以utf8讀取資料，讓資料可以讀取中文
if($_POST['OffYear']!='' or $_POST['sex']!=''){
 $city=$_POST['OffYear'];
 $sex=$_POST['sex'];
 $data=mysql_query("select * from offering where OffYear like '%$OffYear%' and memSex like '$sex'"); 
}else{
 $data=mysql_query("select * from offering");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>資料篩選</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <p>year：
    <input name="OffYear" type="text" id="city" value="<?php echo $OffYear?>" />
  </p>
  
    <input type="submit" name="button" id="button" value="搜尋" />
  </p>
</form>
<p></p>
<table width="700" border="1">
   <tr>
    <td >OfferNo</td>
    <td >CourseNo</td>
    <td >OffLocation</td>
    <td >OffDays</td>
    <td >OffTerm</td>
    <td >OffYear</td>
    <td >FacSSN</td>
    <td>OffTime</td>
   
  </tr>
  <?php
  for($i=1;$i<=mysql_num_rows($data);$i++){
$rs=mysql_fetch_row($data);
?>
  <tr>
    <td><?php echo $rs[0]?></td>
    <td><?php echo $rs[1]?></td>
    <td><?php echo $rs[2]?></td>
    <td><?php echo $rs[3]?></td>
    <td><?php echo $rs[4]?></td>
    <td><?php echo $rs[5]?></td>
    <td><?php echo $rs[6]?></td>
    <td><?php echo $rs[7]?></td>
   
  </tr>
  
  <?php
}
?>
</table>
<p>&nbsp;</p>
</body>
</html>