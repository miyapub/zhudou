<?
session_start();
require "conn.php";
require "nav.php";
?>

    <?

    
        $sql="ALTER TABLE `users` ADD `avatar` VARCHAR(200) NOT NULL DEFAULT 'avatar' AFTER `time`;";
        $result = mysql_query($sql,$conn); 
        
        
    ?>



<?
require "footer.php";
mysql_close();
?>