<?
session_start();
require "conn.php";
require "nav.php";
?>


<div>
<ul class="list-group">
<?
$sql ="SELECT users.id as user_id,users.name as user_name,lists.title as list_title,lists.id as list_id FROM `users`,`lists` WHERE users.id=lists.user_id"; //SQL语句
$result = mysql_query($sql,$conn); //查询
while($row = mysql_fetch_array($result)){
    ?>
    <li class="list-group-item">
        <a href="list.php?id=<?=$row['list_id']?>"><?=$row['list_title']?></a>
    </li>
    <?
}
?>
</ul>
</div>


<div>
<ul class="list-group">
<?
$sql ="SELECT * FROM `projects`"; //SQL语句
$result = mysql_query($sql,$conn); //查询
while($row = mysql_fetch_array($result)){
    ?>
    <li class="list-group-item">
        <a href="project.php?id=<?=$row['id']?>"><?=$row['title']?></a>
    </li>
    <?
}
?>
</ul>
</div>


<?
require "footer.php";
mysql_close();
?>
