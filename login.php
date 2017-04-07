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
    if($num_rows===1){
        $row = mysql_fetch_array($result);
        if($row['pass']===$pass){
            $_SESSION['user_id']=$row['id'];
            $_SESSION['user_name']=$row['name'];
            echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"0;url='index.php'\">";
        }else{
            ?>
            密码错误，请重新<a href="login.php">登录</a>。
            <?
        }
    }else{
        ?>
        没有该用户，请立刻<a href="reg.php">注册</a>
        <?
    }
    ?>
    <?
}else{
    ?>

    <div class="box-outer">
            <div class="box-inner">
                <div class="boxbar">
                    <h2>登录</h2>
                    <!--<a data-cmd="x-wot" href="#" class="closebutton"></a>-->
                </div>
                <div class="boxcontent">
                    <div id="wot-cnt">
                            <form method="post">
                                <div class="form-group">
                                    <input class="form-control" placeholder="账号" name="name" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="密码" name="pass" type="text">
                                </div>
                                <input class="btn btn-primary" type="submit" value="登录" />
                                <a href="reg.php">注册</a>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    <?
}
?>

<?
require "footer.php";
mysql_close();
?>