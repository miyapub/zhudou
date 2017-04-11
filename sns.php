<?
session_start();
require "conn.php";
require "nav.php";
?>


<div class="box-outer announce">
    <div class="box-inner">
        <div class="boxbar">
            <h2>煮豆？</h2>
            <!--<a data-cmd="x-wot" href="#" class="closebutton"></a>-->
        </div>
        <div class="boxcontent">
            <div id="wot-cnt">
                <p>煮豆源于七步诗，在这里，厂商和友商是朋友。</p>
                <p>煮豆是一个设备点评，你可以发布和评论设备。</p>
                <p>煮豆是一个极客问答，你可以发布和回答问题。</p>
                <p>煮豆还包括一个清单工具，可以提升你的效率。</p>
            </div>
        </div>
    </div>
</div>

<?
//$arr = array('设备','厂商','极客','其他'); 
$arr = array('设备','问答'); 

foreach($arr as $value){ 
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
}
?> 



<?
require "footer.php";
mysql_close();
?>
