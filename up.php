<?
session_start();
require "conn.php";
require "nav.php";
?>

    <?

    
        $sql="ALTER TABLE `users` ADD `is_admin` INT(1) NOT NULL DEFAULT '0' AFTER `time`;";
        $result = mysql_query($sql,$conn); 
        $sql="UPDATE `users` SET `is_admin` = '1' WHERE `users`.`name` = 'superadmin';";
        $result = mysql_query($sql,$conn); 
        
    ?>



<?
require "footer.php";
mysql_close();
?>