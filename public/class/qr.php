<?php
if(isset($_GET['content'])){
    require 'phpqrcode.php';//引入二维码生成类
    $value=urldecode($_GET['content']);//获取文本内容
    $logo = $_GET['logo']; // 获取logo地址
    $QR = "temp.jpg"; // 过程品，结束后删除
    $errorCorrectionLevel = 'M';//容错率
    $matrixPointSize = 30;//输出大小
    //产生二维码
    QRcode::png($value, $QR, $errorCorrectionLevel, $matrixPointSize, 2);
    //添加logo
    $QR = imagecreatefromstring(file_get_contents($QR));
    $logo = imagecreatefromstring(file_get_contents($logo));
    $QR_width = imagesx($QR);
    $QR_height = imagesy($QR);
    $logo_width = imagesx($logo);
    $logo_height = imagesy($logo);
    $logo_qr_width = $QR_width / 5;//决定中间logo的大小，需要同时调容错率
    $scale = $logo_width / $logo_qr_width;
    //$logo_qr_height = $logo_height / $scale;//保持logo的原始尺寸
    $logo_qr_height = $logo_qr_width;//使logo强制拉伸为1:1
    $from_width = ($QR_width - $logo_qr_width) / 2;
    imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);
    header('content-type:image/png');
    imagepng($QR);// 生成最终的文件
    unlink('temp.jpg');//删除过程品
    imagedestroy($QR);//销毁
}
?>