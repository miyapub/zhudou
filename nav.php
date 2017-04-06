<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <body>
        
            
            
<div>
<?
if (isset($_SESSION['user_name'])) {
    //do something
    ?>
    <?=$_SESSION['user_name']?>
    <a href="index.php">首页</a>
    <a href="public.php">随便看看</a>
    <a href="my_lists.php">我的列表</a>
    <a href="create_list.php">创建列表</a>
    <a href="logout.php">退出</a>
    <?
}else{
    ?>
    <a href="login.php">登录</a>
    <a href="public.php">随便看看</a>
    <?
}
?>
</div>