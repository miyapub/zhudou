<?
session_start();
require "conn.php";
require "authorize.php";
require "nav.php";
?>


<?
$method = $_SERVER['REQUEST_METHOD'];
if($method==='POST'){
    
    ?>

    <?
    $title=mysql_real_escape_string($_POST['title']);
    $tags=mysql_real_escape_string($_POST['tags']);
    $text=mysql_real_escape_string($_POST['text']);
    $comment=mysql_real_escape_string($_POST['comment']);
    $pic_file=NULL;
    ?>

    <?
    if ((($_FILES["file"]["type"] === "image/gif") || ($_FILES["file"]["type"] === "image/jpeg") || ($_FILES["file"]["type"] === "image/png") || ($_FILES["file"]["type"] === "image/pjpeg")) && ($_FILES["file"]["size"] < 800000)){
      if ($_FILES["file"]["error"] > 0){
        echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
      }else{
        //echo "Upload: " . $_FILES["file"]["name"] . "<br />";
        //echo "Type: " . $_FILES["file"]["type"] . "<br />";
        //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
        //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";


          $extname=".png";

          if($_FILES["file"]["type"] === "image/gif"){
            $extname=".gif";
          }

          if($_FILES["file"]["type"] === "image/jpeg"){
            $extname=".jpg";
          }

          if($_FILES["file"]["type"] === "image/pjpeg"){
            $extname=".jpg";
          }

          if($_FILES["file"]["type"] === "image/png"){
            $extname=".png";
          }
          
          $md5=md5_file($_FILES["file"]["tmp_name"]);
          $pic_file="upload/".$md5.$extname;

          if (file_exists($pic_file)){
          }else{
            move_uploaded_file($_FILES["file"]["tmp_name"],$pic_file);
          }

        
     }
  }

              $sql="INSERT INTO `projects` (`id`, `tags`, `title`, `pic`,`text`,`created_by`, `time`,`ip`) VALUES (NULL, '$tags','$title', '$pic_file','$text','$user_id', CURRENT_TIMESTAMP,'$ip');";
          $result = mysql_query($sql,$conn);
          $project_id=mysql_insert_id($conn);

          //insert comment
          if(isset($comment)){
            $sql="INSERT INTO `comments` (`id`, `created_by`, `text`, `time`,`ip`, `project_id`, `list_id`, `task_id`, `comment_id`) VALUES (NULL, '$user_id', '$comment', CURRENT_TIMESTAMP, '$ip','$project_id', '0', '0', '0');";
            $result = mysql_query($sql,$conn);
            //echo $sql;
          }
          //echo $md5;
          //echo $pic_file;
          echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"0;url='project.php?id=$project_id'\">";
    ?>
    <?
}
?>

<?
if($method==='GET'){
?>


    <div class="box-outer">
        <div class="box-inner">
            <div class="boxbar">
                <h2>发布</h2>
                <!--<a data-cmd="x-wot" href="#" class="closebutton"></a>-->
            </div>
            <div class="boxcontent">
                <div id="wot-cnt">
                    <h4>你的ip：<?=$ip?> 已被我们记录，切勿发布违法内容！</h4>
                    <form action="" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                          <input class="form-control" placeholder="名称" name="title" type="text">
                      </div>
                      <div class="form-group">
                          <input class="form-control" placeholder="tage" name="tags" type="text" value="<?=$_GET['tag']?>">
                      </div>
                      <div class="form-group">
                          <textarea placeholder="介绍" name="text"></textarea>
                      </div>
                      <div class="form-group">
                          <textarea class="form-control" placeholder="评论" name="comment"></textarea>
                      </div>
                      <div class="form-group">
                          <input class="form-control" type="file" name="file" id="file" /> 
                      </div>
                      <input class="btn" type="submit" value="添加">
                  </form>
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