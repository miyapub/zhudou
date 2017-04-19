<?
session_start();
require "conn.php";
require "ip.php";
?>
  <?
$id=mysql_real_escape_string($_GET['id']);
$sql ="SELECT * FROM `users` where id=$id";
$result = mysql_query($sql,$conn);
if($row = mysql_fetch_array($result)){
    
}else{
    
}
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>
        <?$row['name']?>
      </title>
      <link rel="stylesheet" href="css/style.css?v=<?=$css_version?>">

      <body>


        <?
require "n.php";
?>

          <div class="box">
            <div class="tags-name">
              <?=$row['name']?>
            </div>
          </div>
          <div class="box">
            <?
$sql ="SELECT comments.id as comment_id,comments.time as time,users.id as user_id,users.name as user_name,users.avatar as avatar,comments.text as text,projects.id as project_id,projects.title as project_title,projects.pic as project_pic FROM comments,users,projects where comments.created_by=users.id AND comments.project_id=projects.id and users.id=$id order by comments.id desc";
$result = mysql_query($sql,$conn);
while($row = mysql_fetch_array($result)){
    ?>
              <div class="stream-items">
                <div class="new-status status-wrapper">
                  <div class="status-item">
                    <div class="mod">
                      <div class="hd">
                        <div class="usr-pic">
                          <a href="profile.php?id=<?=$row['user_id']?>"><img src="<?=$row['avatar']?>" alt="<?=$row['user_name']?>"></a>
                        </div>
                        <div class="text">
                          <a href="profile.php?id=<?=$row['user_id']?>" class="lnk-people">
                            <?=$row['user_name']?>
                          </a> 发表了评论:
                        </div>
                      </div>
                      <div class="bd editor">
                        <div class="block note-block">
                          <div class="pic">
                            <div class="pic-wrap">
                              <a href="project.php?id=<?=$row['project_id']?>"><img src="<?=$row['project_pic']?>"></a>
                              <span class="valign"></span>
                            </div>
                          </div>

                          <div class="content">
                            <div class="title">
                              <a href="project.php?id=<?=$row['project_id']?>">
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
                          <span class="created_at" title="2017-04-14 07:28:01">
    <?=$row['time']?><span class="ghost"><!--来自 <a href="https://www.douban.com/interest/1/1/">热门精选</a>--></span>
                          </span>
                          <span class="cp">
    <?
    if($_SESSION['is_admin']==="1"){
        ?>
        <a class="delete" href="delete_comment.php?id=<?=$row['comment_id']?>">delete</a>
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