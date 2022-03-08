<?php
if(isset($_FILES["file"])){
	//存在要上传的文件
	header("Content-Type: text/html;charset=utf-8");
	date_default_timezone_set("Asia/Shanghai");//设置时区
	$filestype=substr(strrchr($_FILES["file"]["name"], '.'), 0);//获取文件拓展名
	$filesname=date("YmdHis").rand(1000,9999).$filestype;//给图片文件命名
	$move = move_uploaded_file($_FILES["file"]["tmp_name"], "../images/".$filesname);//移动图片到服务器目录
	$savepath="/qrcode/images/".$filesname;//返回图片的路径
	if($move){
        echo($savepath);
    }else{
        echo('false');
    }
}else{
	echo('：）');
}
?>