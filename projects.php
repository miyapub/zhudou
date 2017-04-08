<?
session_start();
require "conn.php";
require "nav.php";
?>

<a href="create_project.php">创建一个</a>

<?
$value=mysql_real_escape_string($_GET['tag']);
?>

<div class="box-outer top-box">
        <div class="box-inner">
            <div class="boxbar">
                <h2><a class="post" href="projects.php?tag=<?=$value?>"><?=$value?></a></h2>
                <div class="opts-btn">
                    <a class="post" href="create_project.php?tag=<?=$value?>">发布</a>
                </div>
            </div>
            <div class="boxcontent">
                <div id="c-threads">
                    <?
                    $sql ="SELECT * FROM `projects` where tags like '$value' ORDER BY id desc LIMIT 0,5"; //SQL语句
                    $result = mysql_query($sql,$conn); //查询
                    while($row = mysql_fetch_array($result)){
                        ?>
                        <div class="c-thread">
                            <div class="c-board"><?=$row['title']?></div>
                            <a href="project.php?id=<?=$row['id']?>" class="boardlink">
                                <img alt="" class="c-thumb" src="<?=$row['pic']?>" width="99" height="99">
                            </a>
                            <!--<div class="c-teaser"><b>xxx</b>xxx</div>-->
                        </div>
                        <?
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>


<?
require "footer.php";
mysql_close();
?>