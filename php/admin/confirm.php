<?php
include_once '../inc/config.inc.php';
//isset() 验证变量值是否存在
if(!isset($_GET['message']) || !isset($_GET['url']) || !isset($_GET['return_url'])){
	exit();
}
?>
<!DOCTYPE html>
<html lang = "EN">
<head>
<meta charset = "utf-8">
<title>determine interface</title>
<meta name="keywords" content="determine interface" />
<meta name = "description" content="determine interface" />
<link rel = "stylesheet" type="text/css" href="style/remind.css" />
</head>
<body>
<div class = "notice"><span class= "pic ask"></span> <?php echo $_GET['message']?><a style = "color:red;" href ="<?php echo $_GET['url']?>">yes</a>
 | <a style="color:green;" href="<?php echo $_GET['return_url']?>">cancel</a>
 </div>
</body>
</html>