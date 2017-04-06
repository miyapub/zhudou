<?
$sql="select count(users.id) as count from users";
$result = mysql_query($sql,$conn);
$rows = mysql_fetch_array($result);
$count=$rows['count'];
?>


<div>
注册用户<?=$count?>人
</div>


</body>
</html>