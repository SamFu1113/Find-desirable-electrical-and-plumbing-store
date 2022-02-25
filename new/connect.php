<?php
/**
 * @数据库链接
 * @2010 helloweba.com,All Rights Reserved.
 * @http://www.helloweba.com
 * -----------------------------------------------------------------------------
 * @author: Liurenfei
 * @update: 2010-10-26
*/
$host="localhost";
$db_user="root";
$db_pass="fengshen";
$db_name="demo";
$timezone="Asia/Shanghai";

$link=mysql_connect($host,$db_user,$db_pass);
mysql_select_db($db_name,$link);
mysql_query("SET names UTF8");

header("Content-Type: text/html; charset=utf-8");
?>
