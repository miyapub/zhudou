<?
session_start();
require "conn.php";
require "ip.php";
require "authorize.php";
require "is_admin.php";
$method = $_SERVER['REQUEST_METHOD'];
if($method==='POST'){
    //$tags=mysql_real_escape_string($_POST['tags']);
    $code=mysql_real_escape_string($_POST['code']);
    $title=mysql_real_escape_string($_POST['title']);
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
    $sql="INSERT INTO `projects` (`id`, `tags`, `title`, `pic`, `text`, `created_by`, `time`, `ip`) VALUES (NULL, 'device', '$title', '$file', '$text', '$user_id', CURRENT_TIMESTAMP, '$ip')";
    $result = mysql_query($sql,$conn);
    $id=mysql_insert_id($conn);

    echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"0;url='project.php?id=$id'\">";
    
}
mysql_close();
?>