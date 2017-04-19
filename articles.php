<?
session_start();
require "conn.php";
require "ip.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>煮豆，一个健康设备的评论列表</title>
    <link rel="stylesheet" href="css/style.css?v=<?=$css_version?>">
    <body>
    

<?
require "n.php";
?>

<div class="box">
    <div class="tags-name">
        专栏文章
    </div>
</div>
<div class="box">


    <div class="box">
        
                <ul>
                    <?
                    $sql ="SELECT * FROM `articles` ORDER BY id desc"; //SQL语句
                    $result = mysql_query($sql,$conn); //查询
                    while($row = mysql_fetch_array($result)){
                        ?>
                        <li>
                                <div class="c-board">
                                    <a href="project.php?id=<?=$row['id']?>">
                                    
                                        
                                        <?
                                            $tmp_arr = explode('.',$row['pic']); 
                                            $ext_name=$tmp_arr[count($tmp_arr)-1];
                            
                                            if($ext_name==="jpg" || $ext_name==="gif" || $ext_name==="jpeg" || $ext_name==="png"){
                                                ?>
                                                <img src="<?=$row['pic']?>" alt="<?=$row['title']?>" width="88" >
                                                <?
                                            }
                                            ?>
                                    </a>
                                </div>
                                
                                    
                                    <!--<img alt="" class="c-thumb" src="<?=$row['file']?>" width="99" height="99">-->
                                
                                <div class="c-teaser">
                                    <a href="project.php?id=<?=$row['id']?>">
                                        <?=$row['title']?>
                                    </a>
                                </div>
                            </li>
                            <?
                        }
                    ?>
                </ul>
            


</div>

</div>


<?
require "f.php";
mysql_close();
?>
