<?php
mysql_connect("localhost","root","12345678");//連結伺服器
mysql_select_db("20180501");//選擇資料庫
mysql_query("set names utf8");//以utf8讀取資料，讓資料可以讀取中文
$data=mysql_query("select * from `table 1`");//從contact資料庫中選擇所有的資料表
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>123</title>
<style>
	.tiao{
		border:10px black solid;
		width:30%;
		height=200px;
		margin:50px auto;
		padding-left:400px;
		padding-top:20px;
		padding-bottom:20px;
			}
</style>
</head>

<body>
<p>

</p>

<?php
for($i=1;$i<=mysql_num_rows($data);$i++){
	$rs=mysql_fetch_row($data);
?>
  <div class="tiao">
  	
    <div><?php echo $rs[0]?></div>
    <div><?php echo $rs[1]?></div>
    <div><?php echo $rs[2]?></div>
    <div><?php echo $rs[3]?></div>   
  </div>
  </tr>
<?php
}
?>
</table>
<p>&nbsp;</p>
</body>
</html&gt