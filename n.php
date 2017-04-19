<div class="global-nav">
  <div class="box">
    <a href="index.php" class="logo">

    </a>
    <?
if(strpos($_SERVER['PHP_SELF'], "index")>0){
    $index_on="on";
}
if(strpos($_SERVER['PHP_SELF'], "news")>0){
    $news_on="on";
}
if(strpos($_SERVER['QUERY_STRING'], "device")>0){
    $device_on="on";
}
if(strpos($_SERVER['QUERY_STRING'], "company")>0){
    $company_on="on";
}
if(strpos($_SERVER['QUERY_STRING'], "event")>0){
    $event_on="on";
}
if(strpos($_SERVER['PHP_SELF'], "users")>0){
    $users_on="on";
}
if(strpos($_SERVER['PHP_SELF'], "articles")>0){
    $articles_on="on";
}



$sql="select count(id) as count from projects where tags like 'device'";
$result = mysql_query($sql,$conn);
$rows = mysql_fetch_array($result);
$TotalDevice=$rows['count'];

$sql="select count(id) as count from projects where tags like 'company'";
$result = mysql_query($sql,$conn);
$rows = mysql_fetch_array($result);
$TotalCompany=$rows['count'];

$sql="select count(id) as count from projects where tags like 'event'";
$result = mysql_query($sql,$conn);
$rows = mysql_fetch_array($result);
$TotalEvent=$rows['count'];


$sql="select count(id) as count from articles";
$result = mysql_query($sql,$conn);
$rows = mysql_fetch_array($result);
$TotalArticles=$rows['count'];

$sql="select count(id) as count from users";
$result = mysql_query($sql,$conn);
$rows = mysql_fetch_array($result);
$TotalUsers=$rows['count'];

?>
      <ul class="menu">
        <li class="menu-item <?=$index_on?>">
          <a href="index.php">首页</a>
        </li>
        <!--
<li class="menu-item <?=$news_on?>">
<a href="news.php">新鲜事儿</a>
</li>-->
        <li class="menu-item <?=$device_on?>">
          <a href="projects.php?tag=device">设备(<?=$TotalDevice?>)</a>
        </li>

        <li class="menu-item <?=$company_on?>">
          <a href="projects.php?tag=company">公司(<?=$TotalCompany?>)</a>
        </li>

        <li class="menu-item <?=$event_on?>">
          <a href="projects.php?tag=event">事件(<?=$TotalEvent?>)</a>
        </li>

        <li class="menu-item <?=$articles_on?>">
          <a href="articles.php">文章(<?=$TotalArticles?>)</a>
        </li>


        <li class="menu-item <?=$users_on?>">
          <a href="users.php">会员(<?=$TotalUsers?>)</a>
        </li>
        <li>
          <a href="about.php">关于</a>
        </li>

      </ul>
      <ul class="user-opts clear">
        <?
if(isset($_SESSION['user_id'])){
    ?>
          <li>
            <a href="user.php">
              <?=$_SESSION['user_name']?>
            </a>
          </li>
          <li>
            <a href="logout.php">退出</a>
          </li>
          <?
}else{
    ?>
            <li>
              <a href="login.php" class="signin">登录</a>
            </li>
            <?
}

?>
              <?
if($_SESSION['is_admin']==="1"){
    ?>
                <li>
                  <a href="add_project.php">添加</a>
                </li>
                <?
}
?>
      </ul>
  </div>
</div>
<div class="nav"></div>