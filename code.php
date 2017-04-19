<?
    session_start();
    //画布大小
    $image = imagecreate(100, 40);
    $color = imagecolorallocate($image, 255, 255, 255);
    // imagefill($image,0, 0, $color);
 
    //创建验证码
    $code = '';
    $arr=['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
    for($i=0;$i<4;$i++){
        $fontsize = 14;
        $fontcolor = imagecolorallocate($image, rand(0,120), rand(0,120), rand(0,120));
        $x = $i * 25 + 10;
        $y = rand(5,10);
        $num = (string)$arr[rand(0,25)];
        $code .= $num;
        imagestring($image, $fontsize, $x, $y, $num, $fontcolor);
    }
    //验证码记录到session
    $_SESSION['code'] = $code;
 
    //增加干扰元素点
    for ($i=0; $i <20 ; $i++) {
        $color = imagecolorallocate($image, rand(50,200), rand(50,200), rand(50,200));
        imagesetpixel($image, rand(0,100), rand(0,40), $color);
    }
 
    //增加干扰线
    for ($i=0; $i <10 ; $i++) {
        $color = imagecolorallocate($image, rand(50,200), rand(50,200), rand(50,200));
        imageline($image, rand(10,180), rand(10,180), rand(10,180), rand(10,180), $color);
    }
    //说明这个是一个图片
    header("content-type:image/png");
    //输出到浏览器
    imagepng($image);
    //关闭
    imagedestroy($image);
?>