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




          <?
$tag=mysql_real_escape_string($_GET['tag']);
$sql ="SELECT * FROM `projects` WHERE tags LIKE '$tag' ORDER BY id DESC"; //SQL语句
$result = mysql_query($sql,$conn); //查询
while($row = mysql_fetch_array($result)){
    ?>
            <div class="stream-items">
              <div class="new-status status-wrapper">
                <div class="status-item">
                  <div class="mod">
                    <div class="hd">
                      <div class="usr-pic">
                        <a href="project.php?id=<?=$row['id']?>"><img src="<?=$row['pic']?>" alt="<?=$row['title']?>"></a>
                      </div>
                      <div class="text">
                        <a href="project.php?id=<?=$row['id']?>" class="lnk-people">
                          <?=$row['title']?>
                        </a>
                      </div>
                    </div>
                    <div class="bd editor">
                      <div class="block note-block">
                        <div class="pic">
                          <div class="pic-wrap">
                            <!--
                            <a href="project.php?id=<?=$row['id']?>"><img src="<?=$row['pic']?>"></a>-->
                            <span class="valign"></span>
                          </div>
                        </div>

                        <div class="content">
                          <div class="title">
                            <a href="project.php?id=<?=$row['id']?>">
                              <?=$row['project_title']?>
                            </a>
                          </div>
                          <p>
                            <?=$row['text']?>
                          </p>
                        </div>
                      </div>
                      <div class="attachment">
                      </div>
                      <div class="actions">
                        <span class="created_at" title="<?=$row['time']?>">
    <?=$row['time']?><span class="ghost"><!--来自 <a href="https://www.douban.com/interest/1/1/">热门精选</a>--></span>
                        </span>
                        <span class="cp">
    <?
    if($_SESSION['is_admin']==="1"){
        ?>
        <a class="delete" href="delete_project.php?id=<?=$row['id']?>">删除</a>
        <a class="btn-edit" href="edit_project.php?id=<?=$row['id']?>">编辑</a>
        <?
    }
    ?>
    </span>
                      </div>
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