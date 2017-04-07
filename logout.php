<?php
session_start();
session_destroy();
require "conn.php";
require "nav.php";
//header("location: index.php");
?>




<div class="box-outer">
            <div class="box-inner">
                <div class="boxbar">
                    <h2>成功退出</h2>
                    <!--<a data-cmd="x-wot" href="#" class="closebutton"></a>-->
                </div>
                <div class="boxcontent">
                    <div id="wot-cnt">
                        已经成功退出，您可以重新<a href="login.php">登录</a>，或随便<a href="index.php">逛逛</a>
                    </div>
                </div>
            </div>
        </div>
<?
require "footer.php";
mysql_close();
?>