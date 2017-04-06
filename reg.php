<?
session_start();
require "conn.php";
require "nav.php";
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
        注册成功，请<a href="login.php">登录</a>。
        <?
    }else{
        ?>
        用户名已经被注册了，请重新注册
        <form method="post">
            <div class="form-group">
                <input class="form-control" placeholder="账号" name="name" type="text">
            </div>
            <div class="form-group">
                <input <input class="form-control" placeholder="密码" name="pass" type="text">
            </div>
            <input class="btn btn-primary" type="submit" value="reg" />
        </form>
        <?
    }
    ?>
    <?
}else{
    ?>
    <form method="post">
        <div class="form-group">
            <input class="form-control" placeholder="账号" name="name" type="text">
        </div>
        <div class="form-group">
            <input <input class="form-control" placeholder="密码" name="pass" type="text">
        </div>
        <input class="btn btn-primary" type="submit" value="注册" />
    </form>
    <?
}
?>

<?
require "footer.php";
mysql_close();
?>