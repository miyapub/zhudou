<?
session_start();
require "conn.php";
require "ip.php";
?>

  <?
$name=mysql_real_escape_string($_POST["name"]);
$pass=mysql_real_escape_string($_POST["pass"]);
$method = $_SERVER['REQUEST_METHOD'];
if($method==='POST'){
    $sql="SELECT * FROM `users` where `users`.name='$name'";
    $result = mysql_query($sql,$conn);
    $num_rows = mysql_num_rows($result);
    if($num_rows===0){
        //register
        $sql="INSERT INTO `users` (`id`, `name`, `pass`, `time`) VALUES (NULL, '$name', '$pass', CURRENT_TIMESTAMP);";
        $result = mysql_query($sql,$conn);
        //$user_id=mysql_insert_id($conn);
        //$_SESSION['user_id']=$user_id;
        //header("location: login.php");
        //echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"5;url='login.php'\">";
        ?>


    注册成功，请<a href="login.php" target="_parent">登录</a>。

    <?
        exit;
    }else{
        ?>

      用户名已经被注册了
      <?
        exit;
    }
    ?>
        <?
}
?>

          <!DOCTYPE html>
          <html lang="en">

          <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>新用户注册</title>
            <link rel="stylesheet" href="css/style.css?v<?=$css_version?>">

            <body>



              <?
require "n.php";
?>
                <div class="box">
                  <div class="tags-name">
                    注册
                  </div>
                </div>

                <div class="box">
                  <iframe class="msg" name="msg"></iframe>
                  <form method="post" target="msg">
                    <input class="form-control" placeholder="账号" name="name" type="text">

                    <input class="form-control" placeholder="密码" name="pass" type="text">

                    <input class="btn-reg" type="submit" value="注册" />
                  </form>
                </div>

                <?
require "f.php";
mysql_close();
?>

            </body>

          </html>