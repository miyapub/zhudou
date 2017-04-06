<?
session_start();
require "conn.php";
require "authorize.php";
require "nav.php";
?>


<?
$method = $_SERVER['REQUEST_METHOD'];
if($method==='POST'){
    
    ?>

    <?
    $title=mysql_real_escape_string($_POST['title']);
    $sql="INSERT INTO `lists` (`id`, `title`, `user_id`, `time`) VALUES (NULL, '$title', '$user_id', CURRENT_TIMESTAMP);";
    //$sql=mysql_real_escape_string($sql);
    $result = mysql_query($sql,$conn);
    $list_id=mysql_insert_id($conn);
    echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"0;url='list.php?id=$list_id'\">";
    ?>

    <?=$title?>

    <?
}else{
    ?>


    <form action="" method="post">
        <div class="form-group">
            <input class="form-control" placeholder="列表名称" name="title" type="text">
        </div>
        <input class="btn btn-primary" type="submit" value="添加列表">
    </form>


    <?
}
mysql_close();
?>