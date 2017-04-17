<?
require "conn.php";
require "ip.php";
$method = $_SERVER['REQUEST_METHOD'];
if($method==='GET'){
    $id=mysql_real_escape_string($_GET['id']);
    $sql ="SELECT * FROM `posts` WHERE id=$id"; 
    $result = mysql_query($sql,$conn);
    $row = mysql_fetch_array($result);
    if($row['verify']===0 || $row['verify']==='0'){
        echo 'wating for verify';
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$row['text']?></title>
    <link rel="stylesheet" href="css/style.css?v=3.3">
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
                        <h2>[post by Anonymous]</h2>
                        
                    </div>
                    <div class="boxcontent">
                        <div class="stat-cell">
                            Anonymous <?=$row['time']?>
                            <?=$row['text']?>
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
                            <a href="del.php?id=<?=$row['id']?>&pid=<?=$row['pid']?>">delete</a>
                        </div>
                    </div>
            </div>
        </div>
            

           <div class="box-outer top-box">
                <div class="box-inner">
                    <div class="boxbar">
                        <h2>[Replys]</h2>
                    </div>
                    <div class="boxcontent">
                        <div class="stat-cell">
                            <ul>
                                <?
                                $sql ="SELECT * FROM `posts` WHERE pid=$id"; 
                                $result = mysql_query($sql,$conn);
                                while($row = mysql_fetch_array($result)){
                                    ?>
                                    <li>

                                        Anonymous <?=$row['time']?>
                                        <?=$row['text']?>
                                        
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
                                        <a href="del.php?id=<?=$row['id']?>&pid=<?=$row['pid']?>">delete</a>
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
                        <h2>[Post a Reply]</h2>
                    </div>
                    <div class="boxcontent">
                        <div class="stat-cell">
                            <form action="save.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="pid" value="<?=$id?>">
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
require "f.php";
mysql_close();
?>

</body>
</html>