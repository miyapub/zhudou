<?
session_start();
require "conn.php";
require "nav.php";
if (isset($_GET['id'])) {
    $list_id=$_GET['id'];
    $sql ="SELECT users.id as user_id,users.name as user_name,lists.title as list_title,lists.id as list_id FROM `users`,`lists` WHERE users.id=lists.user_id and `lists`.id=$list_id";
    $result = mysql_query($sql,$conn); //查询
    if($row = mysql_fetch_array($result)){
    ?>
    <h3><?=$row['list_title']?></h3>

    created by <?=$row['user_name']?>


    <?
    if (isset($_SESSION['user_id'])) {
        //do something
        if($row['user_id']===$_SESSION['user_id']){
            ?>
            <a href="create_task.php?list_id=<?=$list_id?>">创建任务</a>
            <?
        }
    }
    ?>


    <ul class="list-group">
    <?
    $sql="select * from tasks where tasks.list_id=$list_id";
    $result = mysql_query($sql,$conn);
    while($row = mysql_fetch_array($result)){
        ?>
        <li class="list-group-item">
            <?=$row['title']?>
        </li>
        <?
    }
    ?>
    </ul>
    <?
    }
}
?>


<?

?>


<?
require "footer.php";
mysql_close();
?>