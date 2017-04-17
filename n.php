<div class="global-nav">
    <div class="box">
        <h1 class="logo">

        </h1>
        <?
        if(strpos($_SERVER['PHP_SELF'], "index")>0){
            $index_on="on";
        } 
        if(strpos($_SERVER['PHP_SELF'], "news")>0){
            $news_on="on";
        } 
        if(strpos($_SERVER['PHP_SELF'], "projects")>0){
            $projects_on="on";
        } 
        ?>
        <ul class="menu">
            <li class="menu-item <?=$index_on?>">
                <a href="index.php">首页</a>
            </li>
            <!--
            <li class="menu-item <?=$news_on?>">
                <a href="news.php">新鲜事儿</a>
            </li>-->
            <li class="menu-item <?=$projects_on?>">
                <a href="projects.php">设备列表</a>
            </li>
        
        </ul>
        <ul class="user-opts clear">        
        <?
            if(isset($_SESSION['user_id'])){
                ?>
                <li>
                    <a href="user.php"><?=$_SESSION['user_name']?></a>
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
                <li>
                    <a href="a.php">关于</a>
                </li>
                <?
            }
            
        ?>
        <?
            if($_SESSION['is_admin']==="1"){
        ?>
            <li>
                <a href="add_project.php">添加设备</a>
            </li>
        <?
            }
        ?>
        </ul>
    </div>
</div>
<div class="nav"></div>