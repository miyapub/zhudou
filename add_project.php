<?
session_start();
require "conn.php";
require "ip.php";
require "authorize.php";
require "is_admin.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>添加设备</title>
    <link rel="stylesheet" href="css/style.css?v=<?=$css_version?>">
    <body>
    

<?
require "n.php";
?>




<div class="box-outer top-box">
    <div class="box-inner">
        <div class="boxbar">
            <h2>add project</h2>
        </div>
        <div class="boxcontent">
            <form action="save_project.php" method="post" enctype="multipart/form-data">
                    <div>
                        <input type="text" name="code" /><img src="code.php?id=<?=rand()?>" alt="">
                    </div>

                    <div>
                        <input type="text" name="title" />
                    </div>
                    
                    <div>
                        <textarea placeholder="text" name="text"></textarea>
                    </div>
                    <input type="file" name="file" id="file" /> 
                    <input type="submit" value="post">
                </form>
        </div>
    </div>
</div> 






<?
require "f.php";
mysql_close();
?>
