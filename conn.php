<?
$mysql_server_name='localhost'; //改成自己的mysql数据库服务器
$mysql_username='miyapubroot'; //改成自己的mysql数据库用户名
$mysql_password='00990000'; //改成自己的mysql数据库密码
$mysql_database='miyapubprojects'; //改成自己的mysql数据库名

$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting") ; //连接数据库
mysql_query("set names 'utf8'"); //数据库输出编码 应该与你的数据库编码保持一致.南昌网站建设公司百恒网络PHP工程师建议用UTF-8 国际标准编码.
mysql_select_db($mysql_database); //打开数据库


function get(){

}
function post(){

}
function put(){

}
function del(){
    //mysql_query($sql);
    //mysql_close(); //关闭MySQL连接
}
?>