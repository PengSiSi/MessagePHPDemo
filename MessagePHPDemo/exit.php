<?php

header("Content-type: text/html; charset=utf-8");
session_start();
unset($_SESSION['username']);
header("location: login.html");
?>