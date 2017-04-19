<?
session_start();
require "conn.php";
require "ip.php";
?>
<?
$id=mysql_real_escape_string($_GET['id']);
$sql ="SELECT * FROM `article` where id=$id";
$result = mysql_query($sql,$conn);
if($row = mysql_fetch_array($result)){

}else{

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?$row['name']?></title>
    <link rel="stylesheet" href="css/style.css?v=<?=$css_version?>">
    <body>
    

<?
require "n.php";
?>

<div class="box">
    <div class="tags-name">
        <?=$row['title']?>
    </div>
</div>
<div class="box">
    <?=$row['text']?>
</div>




<?
require "f.php";
mysql_close();
?>
