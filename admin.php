<?
session_start();
require "conn.php";
require "authorize.php";
require "is_admin.php";
require "ip.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>zhudou</title>
    <link rel="stylesheet" href="css/style.css?v=3.3">
    <body>
    

<?
require "admin_nav.php";
?>




<div class="box-outer top-box">
    <div class="box-inner">
        <div class="boxbar">
            <h2>posts</h2>
            <div class="opts-btn">
                <!--<a class="post" href="create_project.php?tag=<?=$value?>">发布</a>-->
            </div>
        </div>
        <div class="boxcontent">
            <ul>
                <?
                $sql ="SELECT * FROM `posts` WHERE pid=0 ORDER BY id desc LIMIT 0,5"; //SQL语句
                $result = mysql_query($sql,$conn); //查询
                while($row = mysql_fetch_array($result)){
                    ?>
                    <li>
                            <div class="c-board">
                                <a href="post.php?id=<?=$row['id']?>">
                                    Anonymous <?=$row['time']?>
                                    <?=$row['text']?>
                                    <?=$row['file']?>
                                </a>
                            </div>
                            
                                
                                <!--<img alt="" class="c-thumb" src="<?=$row['file']?>" width="99" height="99">-->
                            
                            <div class="c-teaser">
                                can be <b>deleted</b> by anyone! <a href="del.php?id=<?=$row['id']?>&pid=<?=$row['pid']?>">delete</a>
                            </div>
                        </li>
                        <?
                    }
                ?>
            </ul>
        </div>
    </div>
</div> 











<?
require "f.php";
mysql_close();
?>
