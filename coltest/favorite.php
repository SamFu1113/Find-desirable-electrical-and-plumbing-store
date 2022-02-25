
<?php
    // 创建连接
    error_reporting(0);
    $servername = "localhost";
    $user = "root";
    $password = "12345678";
    $dbname = "馮少迪";
    $conn = new mysqli($servername, $user, $password,$dbname);
    mysqli_query($conn,'set names utf8');

    // 检测连接
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    } 

    //获取前端传来的数据
    $title = $_POST['title'];

    //根据username查询并更改相应的user_favorite
    $sql = "SELECT user_favorite FROM my_favorite";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $temp = $user_favorite = $row['user_favorite'];

    //更新添加user_favorite的内容，并存储覆盖
    $temp .= $title . ';';
    $sql = "UPDATE my_favorite SET user_favorite='$temp'";
    $result = mysqli_query($conn,$sql); 
    
    echo $temp;//向前端输出内容

    //与数据库断开连接
    $conn->close();     
?>