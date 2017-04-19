<?
require "conn.php";
require "ip.php";
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>关于煮豆</title>
    <link rel="stylesheet" href="css/style.css?v=<?=$css_version?>">

    <body>


      <?
require "n.php";
?>

        <div class="box">
            <div class="tags-name">
              关于煮豆
            </div>
          </div>

          <div class="box">
            <div class="stream-items">
              <div class="new-status status-wrapper">
                <div class="status-item">
                  <div class="mod">
                    <div class="hd">
                        煮豆是一个健康设备的评论列表
                      <div class="text">
                      <p></p>
                        <p>我们希望用户能做公正、客观、真实的评价。</p>
                        <p>不论多硬的豆，我们都要煮的稀巴烂！</p>
                        <p></p>
                        <p>微信群：</p>
                        <p><img src="images/qun.jpg" alt="煮豆群" width="400"></p>
                      </div>
                    </div>
                    <div class="actions">
                      <span class="cp">
</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>



          <?
require "f.php";
mysql_close();
?>