<?php
	
	function vcode($width=120,$height=40,$fontSize=14,$countElement=5,$countPixel=100,$countLine=3){
		header('Content-type:image/jpeg');
		//$width=120;
		//$height=40;
		$element=array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
		$string = '';
		for($i=0;$i<$countElement;$i++){
		$string.= $element[rand(0,count($element)-1)];//每次把前面赋给后面 并且连接
		}
		$img = imagecreatetruecolor($width,$height);
		$colorBg = imagecolorallocate($img, rand(200,255),rand(200,255),rand(200,255));
		$colorBorder = imagecolorallocate($img,rand(200,255),rand(200,255),rand(200,255));
		$colorString = imagecolorallocate($img,rand(10,100),rand(10,100),rand(10,100));
		imagefill($img,0,0,$colorBg);
		 imagerectangle($img,0,0,$width-1,$height-1,$colorBorder);
		for($i=0;$i<$countPixel;$i++){
		imagesetpixel($img,rand(0,$width-1),rand(0,$height-1),imagecolorallocate($img,rand(100,200),rand(100,200),rand(100,200)));
		}
		for($i=0;$i<$countLine;$i++){
		imageline($img,rand(0,$width/2),rand(0,$height),rand($width/2,$width-1),rand(0,$height),imagecolorallocate($img,rand(100,200),rand(100,200),rand(100,200)));
		}
		//imagestring($img,5,0,0,'abcd',$colorString);
		imagettftext($img,$fontSize,rand(-5,5),rand(5,15),rand(30,35),$colorString,'inc/font/SketchyComic.ttf', $string);
		imagejpeg($img);
		imagedestroy($img);//释放内存
		return $string;
	}
	//vcode();
?>
