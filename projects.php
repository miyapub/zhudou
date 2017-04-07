<?
session_start();
require "conn.php";
require "nav.php";
?>

<a href="create_project.php">创建一个</a>

<div class="row">
<?
$sql ="SELECT * FROM `projects`"; //SQL语句
$result = mysql_query($sql,$conn); //查询
while($row = mysql_fetch_array($result)){
    ?>
        <div class="col-sm-2 col-md-2">
          <div class="thumbnail">
            <img src="<?=$row['pic']?>" alt="...">
            <div class="caption">
              <h3><?=$row['title']?></h3>
              <p></p>
              <p><a href="project.php?id=<?=$row['id']?>" class="btn btn-primary" role="button">查看</a>
            </div>
          </div>
        </div>
    <?
}
?>
</div>


<?
require "footer.php";
mysql_close();
?>