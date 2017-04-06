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
    $list_id=mysql_real_escape_string($_POST['list_id']);
    ?>

    <?
    
    $sql="INSERT INTO `tasks` (`id`, `title`, `list_id`, `time`) VALUES (NULL, '$title', '$list_id', CURRENT_TIMESTAMP);";
    $result = mysql_query($sql,$conn);
    //$list_id=mysql_insert_id($conn);
    //echo $sql;
    echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"0;url='list.php?id=$list_id'\">";
    ?>

    <?
}
?>

<?
if($method==='GET'){
?>

    <?
    $list_id=$_GET['list_id'];
    ?>

    <form action="" method="post">
        <div class="form-group">
            <input type="hidden" name="list_id" value="<?=$list_id?>">
            <input class="form-control" placeholder="任务名称" name="title" type="text">
        </div>
        <input class="btn btn-primary" type="submit" value="添加任务">
    </form>


    <?
}
?>
<?
mysql_close();
?>