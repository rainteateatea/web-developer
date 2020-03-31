<?php
//用户名不能为空
if(empty($_POST['name'])){
	skip('login.php','error','Username cannot be null');
}
//用户名长度不能大于32位
if(mb_strlen($_POST['name'])>32){
	skip('login.php','error','Username cannot be 32 character');
}
//密码不能为空
if(empty($_POST['pw'])){
	skip('login.php','error','Password cannot be null');
}

//验证验证码个数 不区分大小写
if(strtolower($_POST['vcode']) != strtolower($_SESSION['vcode'])){
	skip('register.php','error','vcode input error');
}
//验证登录时长是否正确
if(empty($_POST['time']) || is_numeric($_POST['time']) || $_POST['time'] >2592000){
	$_POST['time']  = 2592000;
}
?>