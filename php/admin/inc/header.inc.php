<!DOCTYPE html>
<html lang="en">
<head>
<meta charset = "utf-8" />
<title> <?php echo $template['title']?></title>
<meta name = "keywords" content = "back-end interface" />
 <meta name = "description" content = "back-end interface" />
 <link rel = "stylesheet" type = "text/css" href = "style/public.css" />
 <?php
	foreach ($template['css'] as $val){
		echo "<link rel = 'stylesheet' type = 'text/css' href = '{$val}' />";
	}
 ?>
</head>
<body>

<div id = "top">
	<div class = "logo">
	control center
	</div>
	<ul class = "nav">
		<li><a href = "https://www.starbucks.ca/" target="_blank">startbucks</a></li>
		<li><a href = "https://www.starbucks.ca/" target="_blank">startbucks</a></li>			
	</ul>
	<div class = "login_info">
		<a href = "#" style = "color:#fff;"> website first page</a>&nbsp;|&nbsp;
		administrator: admin<a href = "#"> [log out]</a>
	</div>
</div>

<div id = "sidebar">
	<ul>
		<li>
			<div class="small_title"> system</div>
			<ul class = "child">
				<li><a href ="#">system information</a></li>
				<li><a href = "#">administrator</a></li>
				<li><a href = "#"> add admin</a></li>
				<li><a href = "#"> store set up</a></li>
			</ul>
		</li>
		<li><!--  class="current" -->
			<div class="small_title"> content management</div>
			<ul class = "child">
				<li><a <?php if(basename($_SERVER['SCRIPT_NAME'])=='father_module.php'){echo 'class="current"';}?> href ="father_module.php">father padding list</a></li>
				<li><a <?php if(basename($_SERVER['SCRIPT_NAME'])=='father_module_add.php'){echo 'class="current"';}?>href = "father_module_add.php">add father padding</a></li>
				<li><a href = "#"> subpadding list</a></li>
				<li><a href = "#"> add subpadding</a></li>
				<li><a href = "#"> comment management</a></li>
			</ul>
		</li>
		<li>
			<div class="small_title"> user management</div>
			<ul class = "child">
				<li><a href = "#">user list</a></li>
			</ul>
		</li>
	</ul>
</div>