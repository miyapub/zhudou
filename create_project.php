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
    ?>

    <?
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 800000))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);

      $pic=$_FILES["file"]["name"];

      //$md5=md5_file($pic);
      $pic="upload/".$_FILES['file']['name'];
      $sql="INSERT INTO `projects` (`id`, `title`, `pic`,`created_by`, `time`) VALUES (NULL, '$title', '$pic','$user_id', CURRENT_TIMESTAMP);";
        $result = mysql_query($sql,$conn);
        $project_id=mysql_insert_id($conn);
        echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"0;url='project.php?id=$project_id'\">";
      }
    }
  }
else
  {
  echo "Invalid file";
  }
    
    
    ?>

    <?
}
?>

<?
if($method==='GET'){
?>



    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input class="form-control" placeholder="名称" name="title" type="text">
        </div>
        <div class="form-group">
            <input class="form-control" type="file" name="file" id="file" /> 
        </div>
        
        <input class="btn btn-primary" type="submit" value="添加">
    </form>


    <?
}
?>
<?
mysql_close();
?>