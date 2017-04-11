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
        $sql="select created_by from `projects` WHERE `projects`.`id` = $project_id";
        $result = mysql_query($sql,$conn);
        if($row = mysql_fetch_array($result)){
            //选出该project的创建者 user_id
            $created_by=$row['created_by'];


            $can_del=false;

            //如果是所有者
            if($created_by===$user_id){
                $can_del=true;
            }

            //如果是超级管理员

            if($is_admin===1 || $is_admin==="1"){
                $can_del=true;
            }

            //如果删除密码正确


            //如果可以删除

            if($can_del){
                $sql="DELETE FROM `projects` WHERE `projects`.`id` = $project_id";
                $result = mysql_query($sql,$conn);
                echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"0;url='projects.php'\">";
            }else{
                echo "403";
            }

        }else{
            echo "id is not found";
        }
    }
    ?>



<?
require "footer.php";
mysql_close();
?>