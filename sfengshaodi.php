<?php session_start(); ?>
<?php
include 'connect.php';
$username=$_SESSION['username']; 
if($_POST['name']!='' or $_POST['type']!=''or $_POST['city']!='' or $_POST['area']!=''  )
{
	
	$name=$_POST['name'];
	$type=$_POST['type'];
	$city=$_POST['city'];
	$area=$_POST['area'];
	if($_POST['name']!='')
	{
		$data=mysql_query("select * from `fcompany` where  name like '%$name%' or ID like '%$name%' ");
	}
	if($_POST['name']=='')
	{
		$data=mysql_query("select * from `fcompany` where  type like  '%$type%'  and CITY like  '%$city%' ");
		if($_POST['area']!='')
		{
			$data=mysql_query("select * from `fcompany` where  type like '%$type%' and  CITY like  '%$city%'  and AREA like  '%$area%'    ");	
		}	
	}
	
}
else
{
	$data=mysql_query("select * from `fcompany`  ");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
 
 <script type="text/javascript" src="script.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>fengshaodi</title>
<link rel=stylesheet type="text/css" href="fengshaodi.css">
<style>


</style>

<script>
var x = document.getElementById("demo");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    x.innerHTML = "Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude;
}
function getdistance($lng1,$lat1,$lng2,$lat2){


    $radLat1=deg2rad($lat1);//deg2rad()函数将角度转换为弧度

    $radLat2=deg2rad($lat2);

    $radLng1=deg2rad($lng1);

    $radLng2=deg2rad($lng2);

    $a=$radLat1-$radLat2;

    $b=$radLng1-$radLng2;

    $s=2*asin(sqrt(pow(sin($a/2),2)+cos($radLat1)*cos($radLat2)*pow(sin($b/2),2)))*6378.137*1000;

    return $s;

}
</script>
</head>

<body>
<div id ="mei"><img  src="image/head.jpg" width="1910px" height="400px" /></div>
<div style ="height:190px"></div>
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

<form id="form1" name="form1" method="post" action="">
<li><?php

	if( $username!= null)
	echo "<a href= USER.php >用戶</a>";

?></li>
<li><a href="#">搜索&nbsp <input type="text" name="name" id="name" /></a></li>

<li><a href="#">種類</a>
  <ul>
  
    <li><input name="type" type="radio" id="radio" value="%" checked="checked" />不拘</li>
    <li><input type="radio" name="type" id="radio2" value="玻璃" />玻璃    </li>	
    <li><input type="radio" name="type" id="radio3" value="掃地" />掃地</li>
    <li><input type="radio" name="type" id="radio3" value="水电" />水电</li>
    <li><input type="radio" name="type" id="radio3" value="五金" />五金</li>
    <li><input type="radio" name="type" id="radio3" value="輕鋼架" />輕鋼架</li>
    <li><input type="radio" name="type" id="radio3" value="門窗安裝" />門窗安裝</li>
    <li><input type="radio" name="type" id="radio3" value="室內裝修" />室內裝修</li>
    <li><input type="radio" name="type" id="radio3" value="鎖行" />鎖行</li>
  </ul>
</li>
<li><a href="#">城市</a>
  <ul class="gundong">
<li><input name="type" type="radio" id="radio" value="%" checked="checked" />不拘<ul><li></li></ul></li>
   <li> <input type="radio" name="city" id="radio22" value="臺北市" />臺北市

   	<ul class="gundong">
                                <li>	<input type="radio" name="area" id="radio333" value=	"中正區"	/>	中正區	</li>
            <li>	<input type="radio" name="area" id="radio334" value=	"大同區"	/>	大同區	</li>
            <li>	<input type="radio" name="area" id="radio335" value=	"中山區"	/>	中山區	</li>
            <li>	<input type="radio" name="area" id="radio336" value=	"松山區"	/>	松山區	</li>
            <li>	<input type="radio" name="area" id="radio337" value=	"大安區"	/>	大安區	</li>
            <li>	<input type="radio" name="area" id="radio338" value=	"萬華區"	/>	萬華區	</li>
            <li>	<input type="radio" name="area" id="radio339" value=	"信義區"	/>	信義區	</li>
            <li>	<input type="radio" name="area" id="radio340" value=	"士林區"	/>	士林區	</li>
            <li>	<input type="radio" name="area" id="radio341" value=	"北投區"	/>	北投區	</li>
            <li>	<input type="radio" name="area" id="radio342" value=	"內湖區"	/>	內湖區	</li>
            <li>	<input type="radio" name="area" id="radio343" value=	"南港區"	/>	南港區	</li>
            <li>	<input type="radio" name="area" id="radio344" value=	"文山區"	/>	文山區	</li>

    </ul>
   </li>       
    <li><input type="radio" name="city" id="radio33" value="新北市" />新北市
    	<ul>
                                    <li>	<input type="radio" name="area" id="radio348" value=	"板橋區"	/>	板橋區	</li>
                <li>	<input type="radio" name="area" id="radio349" value=	"新莊區"	/>	新莊區	</li>
                <li>	<input type="radio" name="area" id="radio350" value=	"中和區"	/>	中和區	</li>
                <li>	<input type="radio" name="area" id="radio351" value=	"永和區"	/>	永和區	</li>
                <li>	<input type="radio" name="area" id="radio352" value=	"土城區"	/>	土城區	</li>
                <li>	<input type="radio" name="area" id="radio353" value=	"樹林區"	/>	樹林區	</li>
                <li>	<input type="radio" name="area" id="radio354" value=	"三峽區"	/>	三峽區	</li>
                <li>	<input type="radio" name="area" id="radio355" value=	"鶯歌區"	/>	鶯歌區	</li>
                <li>	<input type="radio" name="area" id="radio356" value=	"三重區"	/>	三重區	</li>
                <li>	<input type="radio" name="area" id="radio357" value=	"蘆洲區"	/>	蘆洲區	</li>
                <li>	<input type="radio" name="area" id="radio358" value=	"五股區"	/>	五股區	</li>
                <li>	<input type="radio" name="area" id="radio359" value=	"泰山區"	/>	泰山區	</li>
                <li>	<input type="radio" name="area" id="radio360" value=	"林口區"	/>	林口區	</li>
                <li>	<input type="radio" name="area" id="radio361" value=	"八裏區"	/>	八裏區	</li>
                <li>	<input type="radio" name="area" id="radio362" value=	"淡水區"	/>	淡水區	</li>
                <li>	<input type="radio" name="area" id="radio363" value=	"三芝區"	/>	三芝區	</li>
                <li>	<input type="radio" name="area" id="radio364" value=	"石門區"	/>	石門區	</li>
                <li>	<input type="radio" name="area" id="radio365" value=	"金山區"	/>	金山區	</li>
                <li>	<input type="radio" name="area" id="radio366" value=	"萬裏區"	/>	萬裏區	</li>
                <li>	<input type="radio" name="area" id="radio367" value=	"汐止區"	/>	汐止區	</li>
                <li>	<input type="radio" name="area" id="radio368" value=	"瑞芳區"	/>	瑞芳區	</li>
                <li>	<input type="radio" name="area" id="radio369" value=	"貢寮區"	/>	貢寮區	</li>
                <li>	<input type="radio" name="area" id="radio370" value=	"平溪區"	/>	平溪區	</li>
                <li>	<input type="radio" name="area" id="radio371" value=	"雙溪區"	/>	雙溪區	</li>
                <li>	<input type="radio" name="area" id="radio372" value=	"新店區"	/>	新店區	</li>
                <li>	<input type="radio" name="area" id="radio373" value=	"深坑區"	/>	深坑區	</li>
                <li>	<input type="radio" name="area" id="radio374" value=	"石碇區"	/>	石碇區	</li>
                <li>	<input type="radio" name="area" id="radio375" value=	"坪林區"	/>	坪林區	</li>
                <li>	<input type="radio" name="area" id="radio376" value=	"烏來區"	/>	烏來區	</li>

        </ul>
    </li>
   <li> <input type="radio" name="city" id="radio33" value="桃園市" />桃園市
   		<ul>

                        <li>	<input type="radio" name="area" id="radio399" value=	"桃園區"	/>	桃園區	</li>
        <li>	<input type="radio" name="area" id="radio400" value=	"中壢區"	/>	中壢區	</li>
        <li>	<input type="radio" name="area" id="radio401" value=	"平鎮區"	/>	平鎮區	</li>
        <li>	<input type="radio" name="area" id="radio402" value=	"八德區"	/>	八德區	</li>
        <li>	<input type="radio" name="area" id="radio403" value=	"楊梅區"	/>	楊梅區	</li>
        <li>	<input type="radio" name="area" id="radio404" value=	"蘆竹區"	/>	蘆竹區	</li>
        <li>	<input type="radio" name="area" id="radio405" value=	"大溪區"	/>	大溪區	</li>
        <li>	<input type="radio" name="area" id="radio406" value=	"龍潭區"	/>	龍潭區	</li>
        <li>	<input type="radio" name="area" id="radio407" value=	"龜山區"	/>	龜山區	</li>
        <li>	<input type="radio" name="area" id="radio408" value=	"大園區"	/>	大園區	</li>
        <li>	<input type="radio" name="area" id="radio409" value=	"觀音區"	/>	觀音區	</li>
        <li>	<input type="radio" name="area" id="radio410" value=	"新屋區"	/>	新屋區	</li>
        <li>	<input type="radio" name="area" id="radio411" value=	"復興區"	/>	復興區	</li>

        </ul>
   </li>
    <li><input type="radio" name="city" id="radio33" value="臺中市" />臺中市
    	<ul>
                                  <li>	<input type="radio" name="area" id="radio415" value=	"中區"	/>	中區	</li>
                    <li>	<input type="radio" name="area" id="radio416" value=	"東區"	/>	東區	</li>
                    <li>	<input type="radio" name="area" id="radio417" value=	"南區"	/>	南區	</li>
                    <li>	<input type="radio" name="area" id="radio418" value=	"西區"	/>	西區	</li>
                    <li>	<input type="radio" name="area" id="radio419" value=	"北區"	/>	北區	</li>
                    <li>	<input type="radio" name="area" id="radio420" value=	"北屯區"	/>	北屯區	</li>
                    <li>	<input type="radio" name="area" id="radio420" value=	"西屯區"	/>	西屯區	</li>
                    <li>	<input type="radio" name="area" id="radio420" value=	"南屯區"	/>	南屯區	</li>
                    <li>	<input type="radio" name="area" id="radio420" value=	"太平區"	/>	太平區	</li>
                    <li>	<input type="radio" name="area" id="radio420" value=	"大里區"	/>	大里區	</li>
                    <li>	<input type="radio" name="area" id="radio420" value=	"霧峰區"	/>	霧峰區	</li>
                    <li>	<input type="radio" name="area" id="radio420" value=	"烏日區"	/>	烏日區	</li>
                    <li>	<input type="radio" name="area" id="radio420" value=	"豐原區"	/>	豐原區	</li>
                    <li>	<input type="radio" name="area" id="radio420" value=	"后里區"	/>	后里區	</li>
                    <li>	<input type="radio" name="area" id="radio420" value=	"石岡區"	/>	石岡區	</li>
                    <li>	<input type="radio" name="area" id="radio420" value=	"東勢區"	/>	東勢區	</li>
                    <li>	<input type="radio" name="area" id="radio420" value=	"新社區"	/>	新社區	</li>
                    <li>	<input type="radio" name="area" id="radio420" value=	"潭子區"	/>	潭子區	</li>
                    <li>	<input type="radio" name="area" id="radio420" value=	"大雅區"	/>	大雅區	</li>
                    <li>	<input type="radio" name="area" id="radio420" value=	"神岡區"	/>	神岡區	</li>
                    <li>	<input type="radio" name="area" id="radio420" value=	"大肚區"	/>	大肚區	</li>
                    <li>	<input type="radio" name="area" id="radio420" value=	"沙鹿區"	/>	沙鹿區	</li>
                    <li>	<input type="radio" name="area" id="radio420" value=	"龍井區"	/>	龍井區	</li>
                    <li>	<input type="radio" name="area" id="radio420" value=	"梧棲區"	/>	梧棲區	</li>
                    <li>	<input type="radio" name="area" id="radio420" value=	"清水區"	/>	清水區	</li>
                    <li>	<input type="radio" name="area" id="radio420" value=	"大甲區"	/>	大甲區	</li>
                    <li>	<input type="radio" name="area" id="radio420" value=	"外埔區"	/>	外埔區	</li>
                    <li>	<input type="radio" name="area" id="radio420" value=	"大安區"	/>	大安區	</li>
                    <li>	<input type="radio" name="area" id="radio420" value=	"和平區"	/>	和平區	</li>
                

        </ul>
    </li>
    <li><input type="radio" name="city" id="radio33" value="臺南市" />臺南市
    	<ul>
                <li>	<input type="radio" name="area" id="radio420" value=	"中西區"	/>	中西區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"東區"	/>	東區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"南區"	/>	南區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"北區"	/>	北區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"安平區"	/>	安平區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"安南區"	/>	安南區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"永康區"	/>	永康區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"歸仁區"	/>	歸仁區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"新化區"	/>	新化區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"左鎮區"	/>	左鎮區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"玉井區"	/>	玉井區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"楠西區"	/>	楠西區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"南化區"	/>	南化區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"仁德區"	/>	仁德區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"關廟區"	/>	關廟區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"龍崎區"	/>	龍崎區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"官田區"	/>	官田區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"麻豆區"	/>	麻豆區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"佳里區"	/>	佳里區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"西港區"	/>	西港區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"七股區"	/>	七股區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"將軍區"	/>	將軍區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"學甲區"	/>	學甲區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"北門區"	/>	北門區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"新營區"	/>	新營區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"後壁區"	/>	後壁區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"白河區"	/>	白河區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"東山區"	/>	東山區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"六甲區"	/>	六甲區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"下營區"	/>	下營區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"柳營區"	/>	柳營區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"鹽水區"	/>	鹽水區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"善化區"	/>	善化區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"大內區"	/>	大內區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"山上區"	/>	山上區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"新市區"	/>	新市區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"安定區"	/>	安定區	</li>
       	
        </ul>
        
    </li>
    <li><input type="radio" name="city" id="radio33" value="高雄市" />高雄市
    	<ul>
                <li>	<input type="radio" name="area" id="radio420" value=	"楠梓區"	/>	楠梓區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"左營區"	/>	左營區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"鼓山區"	/>	鼓山區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"三民區"	/>	三民區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"鹽埕區"	/>	鹽埕區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"前金區"	/>	前金區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"新興區"	/>	新興區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"苓雅區"	/>	苓雅區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"前鎮區"	/>	前鎮區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"旗津區"	/>	旗津區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"小港區"	/>	小港區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"鳳山區"	/>	鳳山區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"大寮區"	/>	大寮區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"鳥松區"	/>	鳥松區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"林園區"	/>	林園區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"仁武區"	/>	仁武區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"大樹區"	/>	大樹區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"大社區"	/>	大社區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"岡山區"	/>	岡山區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"路竹區"	/>	路竹區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"橋頭區"	/>	橋頭區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"梓官區"	/>	梓官區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"彌陀區"	/>	彌陀區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"永安區"	/>	永安區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"燕巢區"	/>	燕巢區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"田寮區"	/>	田寮區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"阿蓮區"	/>	阿蓮區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"茄萣區"	/>	茄萣區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"湖內區"	/>	湖內區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"旗山區"	/>	旗山區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"美濃區"	/>	美濃區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"內門區"	/>	內門區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"杉林區"	/>	杉林區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"甲仙區"	/>	甲仙區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"六龜區"	/>	六龜區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"茂林區"	/>	茂林區	</li>
                <li>	<input type="radio" name="area" id="radio420" value=	"桃源區"	/>	桃源區	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"那瑪夏區"	/>	那瑪夏區	</li>
        
        </ul>
    </li>
    <li><input type="radio" name="city" id="radio33" value="基隆市" />基隆市
    	<ul>
                    <li>	<input type="radio" name="area" id="radio420" value=	"仁愛區"	/>	仁愛區	</li>
            <li>	<input type="radio" name="area" id="radio420" value=	"中正區"	/>	中正區	</li>
            <li>	<input type="radio" name="area" id="radio420" value=	"信義區"	/>	信義區	</li>
            <li>	<input type="radio" name="area" id="radio420" value=	"中山區"	/>	中山區	</li>
            <li>	<input type="radio" name="area" id="radio420" value=	"安樂區"	/>	安樂區	</li>
            <li>	<input type="radio" name="area" id="radio420" value=	"暖暖區"	/>	暖暖區	</li>
            <li>	<input type="radio" name="area" id="radio420" value=	"七堵區"	/>	七堵區	</li>

        </ul>
    </li>
    <li><input type="radio" name="city" id="radio33" value="新竹市" />新竹市
    <ul>
            <li>	<input type="radio" name="area" id="radio420" value=	"東區"	/>	東區	</li>
        <li>	<input type="radio" name="area" id="radio420" value=	"北區"	/>	北區	</li>
        <li>	<input type="radio" name="area" id="radio420" value=	"香山區"	/>	香山區	</li>

    </ul>
    </li>
    <li><input type="radio" name="city" id="radio33" value="嘉義市" />嘉義市
    <ul>
                <li>	<input type="radio" name="area" id="radio420" value=	"東區"	/>	東區	</li>
        <li>	<input type="radio" name="area" id="radio420" value=	"西區"	/>	西區	</li>

    </ul>
    </li>
    <li><input type="radio" name="city" id="radio33" value="新竹縣" />新竹縣
    <ul>
            <li>	<input type="radio" name="area" id="radio420" value=	"竹北市"	/>	竹北市	</li>
        <li>	<input type="radio" name="area" id="radio420" value=	"竹東鎮"	/>	竹東鎮	</li>
        <li>	<input type="radio" name="area" id="radio420" value=	"新埔鎮"	/>	新埔鎮	</li>
        <li>	<input type="radio" name="area" id="radio420" value=	"關西鎮"	/>	關西鎮	</li>
        <li>	<input type="radio" name="area" id="radio420" value=	"湖口鄉"	/>	湖口鄉	</li>
        <li>	<input type="radio" name="area" id="radio420" value=	"新豐鄉"	/>	新豐鄉	</li>
        <li>	<input type="radio" name="area" id="radio420" value=	"峨眉鄉"	/>	峨眉鄉	</li>
        <li>	<input type="radio" name="area" id="radio420" value=	"寶山鄉"	/>	寶山鄉	</li>
        <li>	<input type="radio" name="area" id="radio420" value=	"北埔鄉"	/>	北埔鄉	</li>
        <li>	<input type="radio" name="area" id="radio420" value=	"芎林鄉"	/>	芎林鄉	</li>
        <li>	<input type="radio" name="area" id="radio420" value=	"橫山鄉"	/>	橫山鄉	</li>
        <li>	<input type="radio" name="area" id="radio420" value=	"尖石鄉"	/>	尖石鄉	</li>
        <li>	<input type="radio" name="area" id="radio420" value=	"五峰鄉"	/>	五峰鄉	</li>

    </ul>
    </li>
    <li><input type="radio" name="city" id="radio33" value="苗栗縣" />苗栗縣
    <ul>
    <li>	<input type="radio" name="area" id="radio420" value=	"苗栗市"	/>	苗栗市	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"頭份市"	/>	頭份市	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"竹南鎮"	/>	竹南鎮	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"後龍鎮"	/>	後龍鎮	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"通霄鎮"	/>	通霄鎮	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"苑裡鎮"	/>	苑裡鎮	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"卓蘭鎮"	/>	卓蘭鎮	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"造橋鄉"	/>	造橋鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"西湖鄉"	/>	西湖鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"頭屋鄉"	/>	頭屋鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"公館鄉"	/>	公館鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"銅鑼鄉"	/>	銅鑼鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"三義鄉"	/>	三義鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"大湖鄉"	/>	大湖鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"獅潭鄉"	/>	獅潭鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"三灣鄉"	/>	三灣鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"南庄鄉"	/>	南庄鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"泰安鄉"	/>	泰安鄉	</li>

    </ul>
    </li>
    <li><input type="radio" name="city" id="radio33" value="彰化縣" />彰化縣
    <ul>
    <li>	<input type="radio" name="area" id="radio420" value=	"彰化市"	/>	彰化市	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"員林市"	/>	員林市	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"和美鎮"	/>	和美鎮	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"鹿港鎮"	/>	鹿港鎮	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"溪湖鎮"	/>	溪湖鎮	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"二林鎮"	/>	二林鎮	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"田中鎮"	/>	田中鎮	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"北斗鎮"	/>	北斗鎮	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"花壇鄉"	/>	花壇鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"芬園鄉"	/>	芬園鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"大村鄉"	/>	大村鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"永靖鄉"	/>	永靖鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"伸港鄉"	/>	伸港鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"線西鄉"	/>	線西鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"福興鄉"	/>	福興鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"秀水鄉"	/>	秀水鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"埔心鄉"	/>	埔心鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"埔鹽鄉"	/>	埔鹽鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"大城鄉"	/>	大城鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"芳苑鄉"	/>	芳苑鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"竹塘鄉"	/>	竹塘鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"社頭鄉"	/>	社頭鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"二水鄉"	/>	二水鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"田尾鄉"	/>	田尾鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"埤頭鄉"	/>	埤頭鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"溪州鄉"	/>	溪州鄉	</li>

    </ul>
    </li>
    <li><input type="radio" name="city" id="radio33" value="南投縣" />南投縣
    <ul>
    <li>	<input type="radio" name="area" id="radio420" value=	"南投市"	/>	南投市	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"埔里鎮"	/>	埔里鎮	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"草屯鎮"	/>	草屯鎮	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"竹山鎮"	/>	竹山鎮	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"集集鎮"	/>	集集鎮	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"名間鄉"	/>	名間鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"鹿谷鄉"	/>	鹿谷鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"中寮鄉"	/>	中寮鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"魚池鄉"	/>	魚池鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"國姓鄉"	/>	國姓鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"水里鄉"	/>	水里鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"信義鄉"	/>	信義鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"仁愛鄉"	/>	仁愛鄉	</li>

    </ul>
    </li>
    <li><input type="radio" name="city" id="radio33" value="雲林縣" />雲林縣
    <ul>
    	<li>	<input type="radio" name="area" id="radio420" value=	"斗六市"	/>	斗六市	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"斗南鎮"	/>	斗南鎮	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"虎尾鎮"	/>	虎尾鎮	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"西螺鎮"	/>	西螺鎮	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"土庫鎮"	/>	土庫鎮	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"北港鎮"	/>	北港鎮	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"林內鄉"	/>	林內鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"古坑鄉"	/>	古坑鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"大埤鄉"	/>	大埤鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"莿桐鄉"	/>	莿桐鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"褒忠鄉"	/>	褒忠鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"二崙鄉"	/>	二崙鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"崙背鄉"	/>	崙背鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"麥寮鄉"	/>	麥寮鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"臺西鄉"	/>	臺西鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"東勢鄉"	/>	東勢鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"元長鄉"	/>	元長鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"四湖鄉"	/>	四湖鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"口湖鄉"	/>	口湖鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"水林鄉"	/>	水林鄉	</li>

    </ul>
    </li>
    
    <li><input type="radio" name="city" id="radio33" value="雲林縣" />嘉義縣
    <ul>
    <li>	<input type="radio" name="area" id="radio420" value=	"太保市"	/>	太保市	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"朴子市"	/>	朴子市	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"布袋鎮"	/>	布袋鎮	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"大林鎮"	/>	大林鎮	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"民雄鄉"	/>	民雄鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"溪口鄉"	/>	溪口鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"新港鄉"	/>	新港鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"六腳鄉"	/>	六腳鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"東石鄉"	/>	東石鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"義竹鄉"	/>	義竹鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"鹿草鄉"	/>	鹿草鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"水上鄉"	/>	水上鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"中埔鄉"	/>	中埔鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"竹崎鄉"	/>	竹崎鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"梅山鄉"	/>	梅山鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"番路鄉"	/>	番路鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"大埔鄉"	/>	大埔鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"阿里山鄉"	/>	阿里山鄉	</li>

    </ul>
    </li>
    <li><input type="radio" name="city" id="radio33" value="屏東縣" />屏東縣
    <ul>
    <li>	<input type="radio" name="area" id="radio420" value=	"屏東市"	/>	屏東市	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"潮州鎮"	/>	潮州鎮	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"東港鎮"	/>	東港鎮	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"恆春鎮"	/>	恆春鎮	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"萬丹鄉"	/>	萬丹鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"長治鄉"	/>	長治鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"麟洛鄉"	/>	麟洛鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"九如鄉"	/>	九如鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"里港鄉"	/>	里港鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"鹽埔鄉"	/>	鹽埔鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"高樹鄉"	/>	高樹鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"萬巒鄉"	/>	萬巒鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"內埔鄉"	/>	內埔鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"竹田鄉"	/>	竹田鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"新埤鄉"	/>	新埤鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"枋寮鄉"	/>	枋寮鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"新園鄉"	/>	新園鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"崁頂鄉"	/>	崁頂鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"林邊鄉"	/>	林邊鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"南州鄉"	/>	南州鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"佳冬鄉"	/>	佳冬鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"琉球鄉"	/>	琉球鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"車城鄉"	/>	車城鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"滿州鄉"	/>	滿州鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"枋山鄉"	/>	枋山鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"霧臺鄉"	/>	霧臺鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"瑪家鄉"	/>	瑪家鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"泰武鄉"	/>	泰武鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"來義鄉"	/>	來義鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"春日鄉"	/>	春日鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"獅子鄉"	/>	獅子鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"牡丹鄉"	/>	牡丹鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"三地門鄉"	/>	三地門鄉	</li>

    </ul>
    </li>
    <li><input type="radio" name="city" id="radio33" value="宜蘭縣" />宜蘭縣
    <ul>
    	<li>	<input type="radio" name="area" id="radio420" value=	"宜蘭市"	/>	宜蘭市	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"頭城鎮"	/>	頭城鎮	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"羅東鎮"	/>	羅東鎮	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"蘇澳鎮"	/>	蘇澳鎮	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"礁溪鄉"	/>	礁溪鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"壯圍鄉"	/>	壯圍鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"員山鄉"	/>	員山鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"冬山鄉"	/>	冬山鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"五結鄉"	/>	五結鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"三星鄉"	/>	三星鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"大同鄉"	/>	大同鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"南澳鄉"	/>	南澳鄉	</li>

    </ul>
    </li>
    <li><input type="radio" name="city" id="radio33" value="花蓮縣" />花蓮縣
    <ul>
    <li>	<input type="radio" name="area" id="radio420" value=	"花蓮市"	/>	花蓮市	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"鳳林鎮"	/>	鳳林鎮	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"玉里鎮"	/>	玉里鎮	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"新城鄉"	/>	新城鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"吉安鄉"	/>	吉安鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"壽豐鄉"	/>	壽豐鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"光復鄉"	/>	光復鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"豐濱鄉"	/>	豐濱鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"瑞穗鄉"	/>	瑞穗鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"富里鄉"	/>	富里鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"秀林鄉"	/>	秀林鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"萬榮鄉"	/>	萬榮鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"卓溪鄉"	/>	卓溪鄉	</li>

    </ul>
    </li>
    <li><input type="radio" name="city" id="radio33" value="臺東縣" />臺東縣
    <ul>
    <li>	<input type="radio" name="area" id="radio420" value=	"臺東市"	/>	臺東市	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"成功鎮"	/>	成功鎮	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"關山鎮"	/>	關山鎮	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"長濱鄉"	/>	長濱鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"池上鄉"	/>	池上鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"東河鄉"	/>	東河鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"鹿野鄉"	/>	鹿野鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"卑南鄉"	/>	卑南鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"大武鄉"	/>	大武鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"綠島鄉"	/>	綠島鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"太麻里鄉"	/>	太麻里鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"海端鄉"	/>	海端鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"延平鄉"	/>	延平鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"金峰鄉"	/>	金峰鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"達仁鄉"	/>	達仁鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"蘭嶼鄉"	/>	蘭嶼鄉	</li>

    </ul>
    </li>
    <li><input type="radio" name="city" id="radio33" value="澎湖縣" />澎湖縣
    <ul>
    <li>	<input type="radio" name="area" id="radio420" value=	"馬公市"	/>	馬公市	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"湖西鄉"	/>	湖西鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"白沙鄉"	/>	白沙鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"西嶼鄉"	/>	西嶼鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"望安鄉"	/>	望安鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"七美鄉"	/>	七美鄉	</li>

    </ul>
    </li>
   <li><input type="radio" name="city" id="radio33" value="金門縣" />金門縣
   <ul>
   <li>	<input type="radio" name="area" id="radio420" value=	"金城鎮"	/>	金城鎮	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"金湖鎮"	/>	金湖鎮	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"金沙鎮"	/>	金沙鎮	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"金寧鄉"	/>	金寧鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"烈嶼鄉"	/>	烈嶼鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"烏坵鄉"	/>	烏坵鄉	</li>

   </ul>
   </li>
   <li><input type="radio" name="city" id="radio33" value="連江縣" />連江縣
   <ul>
   <li>	<input type="radio" name="area" id="radio420" value=	"南竿鄉"	/>	南竿鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"北竿鄉"	/>	北竿鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"莒光鄉"	/>	莒光鄉	</li>
<li>	<input type="radio" name="area" id="radio420" value=	"東引鄉"	/>	東引鄉	</li>

   </ul>
   </li>
  </ul>
</li>
       
</li>

<li><input type="submit" name="button" id="submit" value="提交" /></li>
<li style="color:white;">&nbsp&nbsp <a href="confirm.php" >公司認領</a></li>
</ul>
</form>

</div></div>

<div id="light" class="white_content">
    <form method="post" action="login.php">
    账号：
    <input type="text" name="usernamel"><br/><br/>
    密码：
    <input type="password" name="passwordl">
    <input type="submit" value="登录" name="subl">
     <a href = "register.html">没有账号，注册</a>
    </form>
    <a href = "javascript:void(0)" onclick = "closeDialog()">點這裏關閉本窗口</a>
</div> 
<div id="fade" class="black_overlay"></div> 





	

  <div id ="kuai" >
	<?php
          for($i=1;$i<=mysql_num_rows($data);$i++)
          {
            $rs=mysql_fetch_row($data);
			$feng=$rs[0];
        ?>  	
        		
      		  <div class =" xiaokuai">
              <?php 
                    	if(empty($rs[4]))
						{	
							$rs[4]=0;
						}
						
                        
                     
                     ?>
              <?php echo "<img class=biaoshitu src=image/".$rs[3]."/".$rs[4].".jpg> ";?>
             		 <div><?php echo "<a style=font-size:20px text href=fengbu.php?id=$rs[0]> $rs[1]</a>"?></div>              
                     <div>
                     </div>
                     <?php echo " $rs[10]"; ?>
                
                  
                 
			  </div>
              
             
			  
      <?php
          }
    ?>
</div>


<div id="pages" style="font-size:22px;"></div>
<script>
var obj = document.getElementById("kuai");  //获取内容层   
var pages = document.getElementById("pages");         //获取翻页层   
var pgindex=1;                                      //当前页   
window.onload = function()                             //重写窗体加载的事件   
{   
    var allpages = Math.ceil(parseInt(obj.scrollHeight)/parseInt(obj. offsetHeight));//获取页面数量   
	var currentpages=1;
    pages.innerHTML = "<b>共"+allpages+"頁</b>";     //输出页面数量   
   
    pages.innerHTML += " <a href=\"javascript:gotopage('-1');\">上一页</a>  <a href=\"javascript:gotopage('1');\">下一页</a>"   
	current.innerHTML="第"+currentpages+"頁";
}   
function gotopage(value){ 
  
try{   
 
 if(value=="-1")
 {showPage(pgindex-1);currentpages++; current.innerHTML="第"+currentpages+"頁";}
 else
 {showPage(pgindex+1);  currentpages--; current.innerHTML="第"+currentpages+"頁"; }

 
 
 
 
 }catch(e){   
    
 }   
}   
function showPage(pageINdex)   
{   
    obj.scrollTop=(pageINdex-1)*parseInt(obj.offsetHeight);  //根据高度，输出指定的页   
    pgindex=pageINdex;   
}   
</script>   


<p>&nbsp </p>
<div id ="foot">
<div style ="height:150px;"></div>
            <div id ="wenzi">
                  關於我們 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                Get App&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                 如何買廣告&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                 常見問題&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                 連絡我們&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                 服務條款
                </div>
  <div style ="height:20px;"></div>
               <p style="text-align:center;">@ffengshaodi.org </p>
             
            
</div>
</body>
</html>