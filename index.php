<?
session_start();
require "conn.php";
require "nav.php";
?>


<div class="box-outer announce">
    <div class="box-inner">
        <div class="boxbar">
            <h2>煮豆是什么？</h2>
            <!--<a data-cmd="x-wot" href="#" class="closebutton"></a>-->
        </div>
        <div class="boxcontent">
            <div id="wot-cnt">
                <p>让生活更加精细</p>
                <p>煮豆有两部分构成，一部分是设备评论，另一部分是物品清单。</p>
                <p>在决定购买设备之前，我们一般先看评论，但是商品下的评论是卖家掌控的，你无法获得可观的评论，因为无法做出正确的选择。</p>
                <p>我们知道，在网店上购买的设备，有些不好用，或者效果不好，这个时候，你不能给出负面评论，因为，他们会想尽办法让你删除评论。</p>
                <p>所以，煮豆是一个第三方的评论。你可以把我们想象成设备领域的大众点评或豆瓣。</p>
                <p>为了提高效率，让煮豆更实用，第二个部分是物品清单。你也可以把它作为待办事项，它是一个工具，可以提高你的效率。</p>
            </div>
        </div>
    </div>
</div>





<div class="box-outer">
    <div class="box-inner">
        <div class="boxbar">
            <h2><a class="post" href="lists.php">公开清单</a></h2>
            <div class="opts-btn">
                <a class="post" href="create_list.php">post</a>
            </div>
        </div>

        <div class="boxcontent">
            <div id="wot-cnt">
                <ul>
                <?
                $sql ="SELECT users.id as user_id,users.name as user_name,lists.title as list_title,lists.id as list_id FROM `users`,`lists` WHERE lists.is_public=1 and users.id=lists.user_id"; //SQL语句
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
            </div>
        </div>
    </div>
</div>





<div class="box-outer top-box">
    <div class="box-inner">
        <div class="boxbar">
            <h2><a class="post" href="projects.php">设备</a></h2>
            <div class="opts-btn">
                <a class="post" href="create_project.php?tag=设备">post</a>
            </div>
        </div>
        <div class="boxcontent">
            <div id="c-threads">
                <?
                $sql ="SELECT * FROM `projects` where tags like '设备' ORDER BY id desc LIMIT 0,5"; //SQL语句
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


<div class="box-outer top-box">
    <div class="box-inner">
        <div class="boxbar">
            <h2><a class="post" href="projects.php">厂商</a></h2>
            <div class="opts-btn">
                <a class="post" href="create_project.php?tag=厂商">post</a>
            </div>
        </div>
        <div class="boxcontent">
            <div id="c-threads">
                <?
                $sql ="SELECT * FROM `projects` where tags like '厂商' ORDER BY id desc LIMIT 0,5"; //SQL语句
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

<div class="box-outer top-box">
    <div class="box-inner">
        <div class="boxbar">
            <h2><a class="post" href="projects.php">其他</a></h2>
            <div class="opts-btn">
                <a class="post" href="create_project.php?tag=其他">post</a>
            </div>
        </div>
        <div class="boxcontent">
            <div id="c-threads">
                <?
                $sql ="SELECT * FROM `projects` where tags like '其他' ORDER BY id desc LIMIT 0,5"; //SQL语句
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
