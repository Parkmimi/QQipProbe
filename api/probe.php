<?php
/*
名称:QQip探测
版本:1.0
最后更新时间:2017/12/22 20:48
作者:狂放
作者博客:https://www.iknet.top
作者地址:https://www.iknet.top/797.html
开源协议:GPL v3
GitHub项目地址:https://github.com/kfangf/QQipProbe
版权归作者所有，任何人不得未经授权修改版权，二次开发请遵守开源协议
版权所有，侵权必究
*/ 
// 设置头部信息
header('Content-type:image/jpeg');
header('X-Powered-By:KFang API (api.iknet.top)');
header('access-control-allow-origin:*');
include ("./functions.php");
$file = "../cache/ip.txt"; //保存的文件名及目录
$ip = GetIP() ;
// IP写入文件
$handle = fopen($file, 'a');
fwrite($handle, $ip);
fwrite($handle, "\n");
fclose($handle);
// 取QQ头像
if(isset($_GET["qq"])&&checkQQ($_GET["qq"])){
	 $file=curl_get("https://q2.qlogo.cn/headimg_dl?dst_uin=".$_GET['qq']."&spec=100");
	 echo $file;
	 }elseif(isset($_GET["img"])){
//如果	有URL参数显示参数图片
$file=curl_get($_GET["img"]);
	 echo $file;
}else{
	//我家面码 可以换成别的或者本地图片
	 $file=curl_get("https://ss2.bdstatic.com/70cFvnSh_Q1YnxGkpoWK1HF6hhy/it/u=1274481360,2105285774&fm=27&gp=0.jpg");
	 echo $file;
}
?>