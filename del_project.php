<?
session_start();
require "conn.php";
require "authorize.php";
require "nav.php";
?>

    <?

    if (isset($_SESSION['user_id'])) {
        //do something
        $project_id=mysql_real_escape_string($_GET['id']);
        $sql="DELETE FROM `projects` WHERE `projects`.`id` = $project_id";
        $result = mysql_query($sql,$conn); //查询
        if($row['user_id']===$_SESSION['user_id'] || $_SESSION['is_admin']===1 || $_SESSION['is_admin']==="1"){
            echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"0;url='projects.php'\">";
        }
    }
    ?>



<?
require "footer.php";
mysql_close();
?>