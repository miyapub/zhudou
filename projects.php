<?
session_start();
require "conn.php";
require "nav.php";
?>

<a href="create_project.php">创建一个</a>

<?
$sql ="SELECT * FROM `projects`"; //SQL语句
$result = mysql_query($sql,$conn); //查询
while($row = mysql_fetch_array($result)){
    ?>
    <?=$row['title']?>
    <?
}
?>

<div class="row">
  <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail">
      <img src="..." alt="...">
    </a>
  </div>
  ...
</div>


<?
require "footer.php";
mysql_close();
?>