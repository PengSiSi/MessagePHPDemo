<?php

header("Content-type: text/html; charset=utf-8");

// 获取用户输入和选择的
$date = $_POST['date'];
$message = $_POST['message'];
//echo $date . $message;

// 数据库数据
$servername = "localhost";
$username = "root";
$password = "pengsi";
$dbname = "MessageDB";

// 添加至数据库
// 1.创建连接
$dbname = "MessageDB";
$conn = new mysqli($servername, $username, $password, $dbname);

// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
//echo '连接成功';

// 当前日期
//$currentDate = date("Y/m/d");
global $message, $date;

$sql = "INSERT INTO Messages (date, content) VALUES ('$date', '$message')";

if ($conn->query($sql) === TRUE) {
//    echo "新记录插入成功";
    echo '您留言成功了哟！！！';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// 关闭数据库
$conn->close();

?>

