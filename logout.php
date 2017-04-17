<?php
session_start();
session_destroy();
require "conn.php";
//header("location: index.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>logout</title>
    <link rel="stylesheet" href="css/style.css?v=3.3">
    <body>

<?
require "n.php";
?>


<div class="box">
    <div class="tags-name">
        退出登录
    </div>
</div>
<div class="box">
    已经成功退出，您可以重新<a href="login.php">登录</a>
</div>
<?
require "f.php";
mysql_close();
?>

    </body>
</html>