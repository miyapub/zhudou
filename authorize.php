<?
session_start();
if (isset($_SESSION['user_id'])) {
    //
    $user_id=$_SESSION['user_id'];
    $user_name=$_SESSION['name'];
}else{
    //public
    header("location: login.php");
}