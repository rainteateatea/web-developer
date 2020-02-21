<?php
function skip($url,$pic,$message){
$html=<<<A
<!DOCTYPE html>
<html lang = "EN">
<head>
<meta charset = "utf-8" />
<meta http-equiv ="refresh" content="3;URL={$url}" />
<title>skip interface</title>
<link rel = "stylesheet" type="text/css" href="style/remind.css" />
</head>
<body>
<div class = "notice"><span class= "pic {$pic}"></span> {$message} <a href="{$url}">3 second will skip!</a> </div>
</body>
</html>
A;
echo $html;
exit;
}
?>