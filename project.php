<?
session_start();
require "conn.php";
require "ip.php";
$method = $_SERVER['REQUEST_METHOD'];
if($method==='GET'){
    $id=mysql_real_escape_string($_GET['id']);
    $sql ="SELECT * FROM `projects` WHERE id=$id"; 
    $result = mysql_query($sql,$conn);
    $row = mysql_fetch_array($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$row['title']?></title>
    <link rel="stylesheet" href="css/style.css?v=<?=$css_version?>">
    <body>
<?
require "n.php";
?>
<?

    if(isset($row)){
        ?>
        <div class="box-outer top-box">
            <div class="box-inner">
                    <div class="boxbar">
                        <h2><?=$row['title']?></h2>
                    </div>
                    <div class="boxcontent">
                        <div class="stat-cell">
                            <?=$row['text']?>
                            
                                        <?
                                        $tmp_arr = explode('.',$row['pic']); 
                                        $ext_name=$tmp_arr[count($tmp_arr)-1];
                        
                                        if($ext_name==="jpg" || $ext_name==="gif" || $ext_name==="jpeg" || $ext_name==="png"){
                                            ?>
                                            <img src="<?=$row['pic']?>" alt="">
                                            <?
                                        }else{
                                            ?>
                                            <?=$row['pic']?>
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
                        <h2>评论</h2>
                    </div>
                    <div class="boxcontent">
                        <div class="stat-cell">
                            <ul>
                                <?
                                $sql ="SELECT comments.created_by as user_id,users.avatar as avatar,comments.text as text,comments.pic as pic,users.name as user_name, comments.time as time FROM `comments`,users WHERE comments.created_by=users.id and comments.project_id=$id"; 
                                $result = mysql_query($sql,$conn);
                                while($row = mysql_fetch_array($result)){
                                    ?>
                                    <li>
                                        <div>
                                            <?=$row['time']?>
                                        </div>
                                        <div>
                                            <a href="profile.php?id=<?=$row['user_id']?>">
                                                <?=$row['user_name']?>
                                                <img src="<?=$row['avatar']?>" alt="" width="50" height="50">
                                            </a>
                                            
                                        </div>
                                        <div>
                                            <?=$row['text']?>
                                        </div>

                                        
                                        
                                        <div>
                                            <?
                                            $tmp_arr = explode('.',$row['file']); 
                                            $ext_name=$tmp_arr[count($tmp_arr)-1];
                                            
                                            if($ext_name==="jpg" || $ext_name==="gif" || $ext_name==="jpeg" || $ext_name==="png"){
                                                ?>
                                                <img src="<?=$row['file']?>" alt="">
                                                <?
                                            }else{
                                                ?>
                                                <?=$row['file']?>
                                                <?
                                            }
                                            ?>
                                        </div>
                                        
                                        

                                        <div>
                                            <?
                                            if($_SESSION['is_admin']==="1"){
                                                ?>
                                                    <a href="delete_comment.php?id=<?=$row['id']?>">delete</a>
                                                <?
                                            }
                                            ?>
                                        </div>
                                        
                                        
                                    </li>
                                    <?
                                }
                                ?>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div> 
            
            
            <?
            if(isset($_SESSION['user_id'])){
                ?>
                <div class="box-outer top-box">
                    <div class="box-inner">
                        <div class="boxbar">
                            <h2>发表评论</h2>
                        </div>
                        <div class="boxcontent">
                            <div class="stat-cell">
                                <form action="save_comment.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="project_id" value="<?=$id?>">
                                    <div>
                                        <input type="text" name="code" /><img src="code.php?id=<?=rand()?>" alt="">
                                    </div>
                                    
                                    <div>
                                        <textarea placeholder="text" name="text"></textarea>
                                    </div>
                                    <input type="file" name="file" id="file" /> 
                                    <input type="submit" value="post">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?
            }
            ?>
            

        <?
    }
require "f.php";
mysql_close();
?>

</body>
</html>