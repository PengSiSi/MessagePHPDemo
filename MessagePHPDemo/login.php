<?php
header("Content-type: text/html; charset=utf-8");
session_start(); // 登录之后要把所包含登录的页面连接起来，开启session

// 数据库参数
$servername = "localhost";
$usernameDB = "root";
$passwordDB = "pengsi";

// 取得用户名和密码
$username = $_POST['username'];
$password = $_POST['password'];

$flag = connectDBFindUser($servername, $usernameDB, $passwordDB );
if ($flag) {
// 登录成功跳转到首页
    header('location:./index.html');
} else {
    echo '用户名或者密码错误';
}

// 连接数据库
function connectDBFindUser($servername, $usernameDB, $passwordDB) {


    // 创建连接
    $dbname = "MessageDB";
    $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

    // 检测连接
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    }

    // 连接成功,数据库查找用户名和密码比对
    $sql = "SELECT id, username, password FROM Users";
    $result = $conn->query($sql);

    // 声明全局变量
    global $username,$password;

    if ($result->num_rows > 0) {
        // 输出数据
        while($row = $result->fetch_assoc()) {
//            echo "id: " . $row["id"]. " - Name: " . $row["username"]. " " . $row["password"]. "<br>";
            // 数据库查找到数据
             $name = $row["username"];
             $pwd = $row["password"];
//            echo $name . $pwd;

            if ($name == $username && $pwd == $password) {

//                echo '用户名密码正确';
                return true;
            } else {
//                echo '用户名或者密码错误';
            }
        }
    } else {
        echo "0 结果";
    }
    $conn->close();
}

?>