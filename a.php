<?
require "conn.php";
require "ip.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>关于煮豆</title>
    <link rel="stylesheet" href="css/style.css?v=<?=$css_version?>">
    <body>
    

<?
require "n.php";
?>

<?
$sql="select count(id) as count from projects";
$result = mysql_query($sql,$conn);
$rows = mysql_fetch_array($result);
$TotalProjects=$rows['count'];
?>

<div class="box">
    <div class="main">
        <h2>关于煮豆</h2>
        <p>煮豆是一个健康设备的评论列表</p>
        <p><b>设备数量:</b> <a href="admin.php"><?=$TotalProjects?></a></p>
    </div>
</div>



<?
require "f.php";
mysql_close();
?>
