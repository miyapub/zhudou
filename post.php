<?
session_start();
require "conn.php";
require "authorize.php";
require "nav.php";
?>


<?
$method = $_SERVER['REQUEST_METHOD'];
if($method==='POST'){
    ?>

    <?

    ?>

    <?
}else{
    ?>





    <?
}
mysql_close();
?>