<?
require "conn.php";
require "ip.php";
$id=mysql_real_escape_string($_GET['id']);
$pid=mysql_real_escape_string($_GET['pid']);

if($pid===0 || $pid==="0"){
    //post
    $sql="DELETE FROM `posts` WHERE `posts`.`id` = $id";

    $result = mysql_query($sql,$conn);

    $sql="DELETE FROM `posts` WHERE `posts`.`pid` = $id";

    $result = mysql_query($sql,$conn);

    $return_url="index.php";
}else{
    //Replys
    $sql="DELETE FROM `posts` WHERE `posts`.`id` = $id";
    $result = mysql_query($sql,$conn);
    $return_url="post.php?id=$pid";
}


echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"0;url='$return_url'\">";
mysql_close();
?>