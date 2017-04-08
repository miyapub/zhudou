<?
session_start();
require "conn.php";
require "nav.php";
?>


<h3><a class="post" href="create_project.php">post</a></h3>

<?
if (isset($_GET['id'])) {
    ?>

    <?
    $project_id=mysql_real_escape_string($_GET['id']);
    $sql ="SELECT users.id as user_id,projects.text as content,projects.ip as ip,users.name as user_name,projects.title as project_title,projects.pic as pic FROM `users`,`projects` WHERE users.id=projects.created_by and `projects`.id=$project_id";

    $result = mysql_query($sql,$conn); //查询

    if($row = mysql_fetch_array($result)){
    ?>
    <h3><?=$row['project_title']?></h3>

    <div>
        <img src="<?=$row['pic']?>" alt="...">
    </div>

    


        <div>
            created by <?=$row['user_name']?>
        </div>
        <div>
            <?=$row['content']?>
        </div>
        <div>
            from <?=$row['ip']?>
        </div>
        
        <?

        
        $sql ="SELECT users.id as user_id,comments.text as comment,comments.ip as ip,users.name as user_name FROM `users`,`comments` WHERE users.id=comments.created_by and `comments`.project_id=$project_id";
        $result = mysql_query($sql,$conn); //查询
        while($row = mysql_fetch_array($result)){

            ?>

            <div>
            
            <?=$row['user_name'];?> : <?=$row['comment'];?>
            
            </div>

            

            <?
        }
        ?>


        
        <div class="box-outer">
            <div class="box-inner">
                <div class="boxbar">
                    <h2>发布评论</h2>
                    <!--<a data-cmd="x-wot" href="#" class="closebutton"></a>-->
                </div>
                <div class="boxcontent">
                    <div id="wot-cnt">
                        <h4>你的ip：<?=$ip?> 已被我们记录，切勿发布违法内容！</h4>
                        <form action="create_comment.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="project_id" value="<?=$project_id?>">
                            <textarea placeholder="评论" name="comment"></textarea>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="file" name="file" id="file" /> 
                        </div>
                        <input class="btn" type="submit" value="添加">
                    </form>
                    </div>
                </div>
            </div>
        </div>
        


    <?
    }
    ?>

        

    <?

    if (isset($_SESSION['user_id'])) {
        //do something
        if($row['user_id']===$_SESSION['user_id'] || $_SESSION['is_admin']===1 || $_SESSION['is_admin']==="1"){
            ?>
            <a href="edit_project.php?id=<?=$project_id?>">编辑</a>
            <a href="del_project.php?id=<?=$project_id?>">删除</a>
            <?
        }
    }
    ?>

    <?
}
?>

<?
require "footer.php";
mysql_close();
?>