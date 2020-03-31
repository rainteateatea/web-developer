<!DOCTYPE html>
<html lang="EN">
<head>
<meta charset="utf-8" />
<title><?php echo $template['title']?></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
 <?php
	foreach ($template['css'] as $val){
		echo "<link rel = 'stylesheet' type = 'text/css' href = '{$val}' />";
	}
 ?>
</head>
<body>
	<div class="header_wrap">
		<div id="header" class="auto">
			<div class="logo">Coffee</div>
			<div class="nav">
				<a class="hover">firstpage</a>
			</div>
			<div class="serarch">
				<form>
					<input class="keyword" type="text" name="keyword" placeholder="search is really easy" />
					<input class="submit" type="submit" name="submit" value="" />
				</form>
			</div>
			<div class="login">
				<a>login</a>&nbsp;
				<a>sign</a>
			</div>
		</div>
	</div>
	<div style="margin-top:55px;"></div>
<?php 
?>