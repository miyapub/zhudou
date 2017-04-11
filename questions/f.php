<?
$sql="select count(id) as count from posts";
$result = mysql_query($sql,$conn);
$rows = mysql_fetch_array($result);
$TotalPosts=$rows['count'];
?>
<div class="box-outer top-box" id="site-stats">
    <div class="box-inner">
        <div class="boxbar">
            <h2>Stats</h2>
        </div>
        <div class="boxcontent">
            <div class="stat-cell"><b>Total Posts:</b> <?=$TotalPosts?></div>
        </div>
    </div>
</div>

<div class="footer">
    <span>Copyright © 2003-2017 zhudou.org All rights reserved.</span>
</div>