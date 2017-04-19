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
            活跃会员
          </div>
        </div>
        <div class="box">


          
            <?
$sql ="SELECT * FROM `users` ORDER BY id desc"; //SQL语句
$result = mysql_query($sql,$conn); //查询
while($row = mysql_fetch_array($result)){
    ?>
              <div class="stream-items">
                <div class="new-status status-wrapper">
                  <div class="status-item">
                    <div class="mod">
                      <div class="hd">
                        <div class="usr-pic">
                          <a href="profile.php?id=<?=$row['id']?>"><img src="<?=$row['avatar']?>" alt="<?=$row['name']?>"></a>
                        </div>
                        <div class="text">
                          <a href="profile.php?id=<?=$row['id']?>" class="lnk-people">
                            <?=$row['name']?>
                          </a>
                        </div>
                      </div>
                      <div class="actions">
                        <span class="cp">
                            <?
                            if($_SESSION['is_admin']==="1"){
                                ?>
                                <a href="edit_user.php?id=<?=$row['id']?>">delete</a>
                                <?
                            }
                            ?>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        <?
}
?>
         </div>


          




          <?
require "f.php";
mysql_close();
?>