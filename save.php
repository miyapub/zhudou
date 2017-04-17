<?
session_start();
require "conn.php";
require "ip.php";
$method = $_SERVER['REQUEST_METHOD'];
if($method==='POST'){
    //$tags=mysql_real_escape_string($_POST['tags']);
    $secret_code=mysql_real_escape_string($_POST['secret_code']);
    $code=mysql_real_escape_string($_POST['code']);
    $text=mysql_real_escape_string($_POST['text']);
    $pid=mysql_real_escape_string($_POST['pid']);
    //$comment=mysql_real_escape_string($_POST['comment']);
    /*
    if($_FILES["file"]["type"]==="application/octet-stream"){
        
    }*/


    
    if($_SESSION['code']!=$code){
        echo "code error";
        exit;
    }

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
    $sql="INSERT INTO `posts` (`id`, `secret_code`, `file`, `text`, `time`, `ip`, `tag`, `pid`) VALUES (NULL, '$secret_code', '$file', '$text', CURRENT_TIMESTAMP, '$ip', 'tag', '$pid');";
    $result = mysql_query($sql,$conn);
    $id=mysql_insert_id($conn);

    if($pid===0 || $pid==="0"){
        echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"0;url='post.php?id=$id'\">";
    }else{
        echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"0;url='post.php?id=$pid'\">";
    }
    
}
mysql_close();
?>