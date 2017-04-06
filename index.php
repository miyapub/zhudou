<?
session_start();
require "conn.php";
require "nav.php";
?>


<div class="jumbotron">
  <h1>煮豆</h1>
  <p>让生活更加精细</p>
  <p><a class="btn btn-primary btn-lg" href="projects.php" role="button">关于</a></p>
</div>


<div>
<?
if (isset($_SESSION['user_id'])) {
    //do something
    $user_id=$_SESSION['user_id']
    ?>
    
    </ul>
    <?
    $sql ="SELECT users.id as user_id,users.name as user_name,lists.title as list_title,lists.id as list_id FROM `users`,`lists` WHERE users.id=$user_id and users.id=lists.user_id"; //SQL语句
    $result = mysql_query($sql,$conn); //查询
    while($row = mysql_fetch_array($result)){
        ?>
        <li>
            <a href="list.php?id=<?=$row['list_id']?>"><?=$row['list_title']?></a>
        </li>
    <?
    }
    ?>
    </ul>
    <?
?>
    <?
}else{
    //public
    ?>
    <?
}
?>
</div>


<?
require "footer.php";
mysql_close();
?>
