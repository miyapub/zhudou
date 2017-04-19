<?
session_start();
require "conn.php";
require "authorize.php";
require "ip.php";
?>
  <?
$method = $_SERVER['REQUEST_METHOD'];
if($method==='POST'){
    $code=strtoupper(mysql_real_escape_string($_POST['code']));
    if($_SESSION['code']!=$code){
        echo "code error";
        exit;
    }
    $md5=md5_file($_FILES["file"]["tmp_name"]);
    $tmp_arr = explode('.',$_FILES["file"]["name"]);
    $ext_name=$tmp_arr[count($tmp_arr)-1];
    
    $file="avatars/".$md5.".".$ext_name;
    
    //
    $file=str_replace(".php",".zip",$file);
    if (file_exists($file)){
    }else{
        move_uploaded_file($_FILES["file"]["tmp_name"],$file);
    }
    if($file==="avatars/."){
        $file=NULL;
    }
    $sql="UPDATE `users` SET `avatar` = '$file' WHERE `users`.`id` = $user_id;";
    mysql_query($sql,$conn);
    $_SESSION['avatar']=$file;
    echo "ok";
    ?>
    <script>
      window.parent.avatar.src='<?=$file?>';
    </script>
    <?
    exit;
    
}
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
            <div class="tags-name">
              用户设置
            </div>
          </div>

          <div class="box">
            <img id="avatar" src="<?=$_SESSION['avatar']?>" alt="" width="80" height="90">
            <iframe class="msg" name="msg"></iframe>
            <form method="post" enctype="multipart/form-data" target="msg">
              <div class="check-code-pan">
                <input type="text" class="check-code" placeholder="验证码" name="code" /><img class="code" src="code.php?id=<?=rand()?>" alt="">
              </div>
              <input type="file" name="file" id="file" />
              <input class="btn-post" type="submit" value="更新">
            </form>
          </div>







          <?
require "f.php";
mysql_close();
?>