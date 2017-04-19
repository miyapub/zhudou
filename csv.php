<?
function make($name,$len){
    $pass='PassWordNot123456!';
    $str = "邮箱帐号(必填), 邮箱密码(必填)\n";
    $str=iconv('utf-8','gb2312',$str); //中文转码
    for ($x=0; $x<=$len; $x++) {
        $s=$name."_".$x."@jikedaka.com,".$pass."\n";
        $str .= $s;
    }
    return $str;
}
function export_csv($filename,$data){
    header("Content-type:text/csv");
    header("Content-Disposition:attachment;filename=".$filename.".csv");
    header('Cache-Control:must-revalidate,post-check=0,pre-check=0');
    header('Expires:0');
    header('Pragma:public');
    echo $data;
}

$method = $_SERVER['REQUEST_METHOD'];
if($method==='POST'){
    $name=$_POST['name'];
    $len=$_POST['len'];
    $len=(int)$len;
    $data=make($name,$len);
    export_csv($name,$data);
}else{
    ?>
  <form action="" method="post">
    <input type="text" name="name">
    <input type="text" name="len">
    <input type="submit">
  </form>
  <?
}
?>