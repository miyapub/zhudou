<?
session_start();
require "conn.php";
require "ip.php";
require "authorize.php";
$method = $_SERVER['REQUEST_METHOD'];
if($method==='POST'){
    //$tags=mysql_real_escape_string($_POST['tags']);
    $code=mysql_real_escape_string($_POST['code']);
    $project_id=mysql_real_escape_string($_POST['project_id']);
    $text=mysql_real_escape_string($_POST['text']);
    //$comment=mysql_real_escape_string($_POST['comment']);
    /*
    if($_FILES["file"]["type"]==="application/octet-stream"){
        
    }*/


    
    if($_SESSION['code']!=$code){
        echo "code error";
        exit;
    }

    $user_id=$_SESSION['user_id'];

    $md5=md5_file($_FILES["file"]["tmp_name"]);
    $tmp_arr = explode('.',$_FILES["file"]["name"]); 
    $ext_name=$tmp_arr[count($tmp_arr)-1];  

    $file="upload/".$md5.".".$ext_name;

    //
    $file=str_replace(".php",".zip",$file);

    if (file_exists($file)){
    }else{
        move_uploaded_file($_FILES["file"]["tmp_name"],$file);
    }
    if($file==="upload/."){
        $file=NULL;
    }

    $sql="INSERT INTO `comments` (`id`, `created_by`, `pic`, `text`, `time`, `ip`, `project_id`, `list_id`, `task_id`, `comment_id`) VALUES (NULL, '$user_id', '$file', '$text', CURRENT_TIMESTAMP, '$ip', '$project_id', '0', '0', '0');";
    $result = mysql_query($sql,$conn);
    $id=mysql_insert_id($conn);

    echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"0;url='project.php?id=$project_id'\">";
    
}
mysql_close();
?>