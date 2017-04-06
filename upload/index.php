<?
session_start();
require "conn.php";
require "nav.php";
?>


<div class="jumbotron">
  <h1>todoist</h1>
  <p>让生活更加精细</p>
  <p><a class="btn btn-primary btn-lg" href="my_lists.php" role="button">进入我的列表</a></p>
</div>



<?
require "footer.php";
mysql_close();
?>
