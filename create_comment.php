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
    $comment=mysql_real_escape_string($_POST['comment']);
    $project_id=mysql_real_escape_string($_POST['project_id']);
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

          $comment.="<img src='$pic_file' />";


          $comment=mysql_real_escape_string($comment);
          
        
     }
  }

  if(isset($comment)){
            
            $sql="INSERT INTO `comments` (`id`, `created_by`, `text`, `time`,`ip`, `project_id`, `list_id`, `task_id`, `comment_id`) VALUES (NULL, '$user_id', '$comment', CURRENT_TIMESTAMP, '$ip','$project_id', '0', '0', '0');";
            $result = mysql_query($sql,$conn);
            //echo $sql;
          }
          //echo $md5;
          //echo $pic_file;
          //echo $sql;
          echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"0;url='project.php?id=$project_id'\">";

    
    ?>
    <?
}
?>


<?
require "footer.php";
mysql_close();
?>