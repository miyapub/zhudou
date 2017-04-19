<?
session_start();
session_start();
require "conn.php";
?>

  <?
$method = $_SERVER['REQUEST_METHOD'];
if($method==='POST'){
    $code=strtoupper(mysql_real_escape_string($_POST['code']));
    if($_SESSION['code']!=$code){
        echo "code error";
        exit;
    }
    $name=mysql_real_escape_string($_POST["name"]);
    $pass=mysql_real_escape_string($_POST["pass"]);
    
    $sql="SELECT * FROM `users` where `users`.name='$name'";
    $result = mysql_query($sql,$conn);
    $num_rows = mysql_num_rows($result);
    if($num_rows===1){
        $row = mysql_fetch_array($result);
        if($row['pass']===$pass){
            $_SESSION['user_id']=$row['id'];
            $_SESSION['user_name']=$row['name'];
            $_SESSION['is_admin']=$row['is_admin'];
            $_SESSION['avatar']=$row['avatar'];
            //echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"0;url='index.php'\">";
            echo "<script>window.parent.location.href='index.php'</script>";
            exit;
        }else{
            echo "密码错误";
            exit;
        }
    }else{
        echo "没有该用户";
        exit;
    }
    
}
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>login</title>
      <link rel="stylesheet" href="css/style.css?v=3.3">

      <body>

        <?
require "n.php";
?>

          <div class="box">
            <div class="tags-name">
              登录
            </div>
          </div>
          <div class="box">
            <iframe class="msg" name="msg"></iframe>
            <form method="post" target="msg">
              <input placeholder="账号" name="name" type="text">
              <input placeholder="密码" name="pass" type="password">
              <div class="check-code-pan">
                <input type="text" class="check-code" placeholder="验证码" name="code" /><img class="code" src="code.php?id=<?=rand()?>" alt="">
              </div>
              <input class="btn-login" type="submit" value="登录" />
              <a href="reg.php">注册</a>
            </form>
          </div>


          <?
require "f.php";
mysql_close();
?>

      </body>

    </html>