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
    <title>
      <?=$row['title']?>
    </title>
    <link rel="stylesheet" href="css/style.css?v=<?=$css_version?>">

    <body>
      <?
require "n.php";
?>

        <div class="box">
          <div class="tags-name">
            详细信息
          </div>
        </div>

        <?

if(isset($row)){
    ?>
          <div class="box">
            <h2><?=$row['title']?></h2>
            <div>
              <?=$row['text']?>
            </div>
            <div>

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

          <div class="box">
            <div class="tags-name">
              评论
            </div>
          </div>


          <div class="box">


            <?
    $sql ="SELECT comments.created_by as user_id,users.avatar as avatar,comments.text as comment_text,comments.pic as pic,users.name as user_name, comments.time as time FROM `comments`,users WHERE comments.created_by=users.id and comments.project_id=$id";
    $result = mysql_query($sql,$conn);
    while($row = mysql_fetch_array($result)){
        ?>

              <div class="stream-items">
                <div class="new-status status-wrapper">
                  <div class="status-item">
                    <div class="mod">
                      <div class="hd">
                        <div class="usr-pic">
                          <a href="profile.php?id=<?=$row['user_id']?>"><img src="<?=$row['avatar']?>" alt="<?=$row['title']?>"></a>
                        </div>
                        <div class="text">
                          <a href="profile.php?id=<?=$row['user_id']?>" class="lnk-people">
                            <?=$row['user_name']?>
                          </a> 发表了评论:
                          <p class="lnk-people">
                            <?=$row['comment_text']?>
                          </p>
                        </div>
                        <div class="text">


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
                      <div class="actions">
                        <span class="created_at" title="<?=$row['time']?>">
        <?=$row['time']?><span class="ghost"><!--来自 <a href="https://www.douban.com/interest/1/1/">热门精选</a>--></span>
                        </span>
                        <span class="cp">
        <?
        if($_SESSION['is_admin']==="1"){
            ?>
            <a class="delete" href="del_comment.php?id=<?=$row['id']?>">delete</a>
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


          <div class="box">
            <div class="tags-name">
              发表评论
            </div>
          </div>
          <div class="box">
            <?
    if(isset($_SESSION['user_id'])){
        ?>



              <iframe class="msg" name="msg"></iframe>
              <form action="save_comment.php" method="post" enctype="multipart/form-data" target="msg">
                <input type="hidden" name="project_id" value="<?=$id?>">
                <div class="check-code-pan">
                  <input type="text" class="check-code" placeholder="验证码" name="code" /><img class="code" src="code.php?id=<?=rand()?>" alt="">
                </div>

                <div>
                  <textarea placeholder="输入您的评论" name="text"></textarea>
                </div>
                <input type="file" name="file" id="file" />
                <input type="submit" class="btn-post" value="提交评论">
              </form>


              <?
    }else{
        ?>
                <a href="login.php">登录后才能发表评论</a>
                <?
    }
    ?>
          </div>


          <?
}
require "f.php";
mysql_close();
?>

    </body>

  </html>