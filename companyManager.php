<?php session_start(); ?>
<?php
include 'connect.php';
$username=$_SESSION['username'];
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Mange</title>
</head>

<body>

<?php 

echo '<a onclick="out()" href="fengshaodi.php">登出</a>  <br><br>';
?>
<a href = "companyManager.php">conpany</a>
<a href = "usermanage.php">user</a>
<a href = "usercollectionman.php">collention</a>
<a href = "userconfirmman.php">confirm</a>
<a href = "commentman.php">comment</a>
<form name="form1" method="post" action="">
  <p>&nbsp;</p>
  <p>companyID: 
    <label for="CID"></label>
  <input type="text" name="CID" id="CID">
  </p>
  <p>companyname:
    <input type="text" name="CNAME" id="CID2">
  </p>
  <p>city: 
    <input type="text" name="CITY" id="CID3">
</p>
  <p>area: 
    <input type="text" name="AREA" id="CID4">
</p>
  <p>type:
    <label for="select"></label>
    <select name="select" id="select">
    </select>
  </p>
  <p>company data:</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
<script>
function out()
{
	<?php  $_SESSION['username']="";?>
	
}

</script>
<?php
	if($_POST['CID']!='' or $_POST['CNAME']!=''or $_POST['CITY']!='' or $_POST['TYPE']!='')
	{
		
		$CID=$_POST['CID'];
		$CNAME=$_POST['CNAME'];
		$CITY=$_POST['CITY'];
		$AREA=$_POST['AREA'];
		$TYPE=$_POST['TYPE'];
		if($_POST['CID']!='' )
		{
			$data=mysql_query("select * from `fcompany` where  ID like '%$CID%' ");
		}
		 if($_POST['CNAME']!='')
		 {
			 $data=mysql_query("select * from `fcompany` where  NAME like '%$CNAME%' ");
		 }
		if($_POST['CNAME']=='' and $_POST['CID']=='')
		{
			$data=mysql_query("select * from `fcompany` where  type like  '%$TYPE%'  and CITY like  '%$CITY%' ");
			if($_POST['area']!='')
			{
				$data=mysql_query("select * from `fcompany` where  type like '%$type%' and  CITY like  '%$city%'  and AREA like  '%$AREA%'    ");	
			}	
		}
		
	}
	else
	{
		$data=mysql_query("select * from `fcompany`  ");
	}
?>
</body>
</html>