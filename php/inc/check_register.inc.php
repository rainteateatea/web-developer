<?php
	//用户名不得为空
	if(empty($_POST['name'])){
		skip('register.php','error','user name cannot be null');
	}
	//username <32
	if(mb_strlen($_POST['name'])>32){
		skip('register.php','error','user name cannot longer than 32 characters');
	}
	//password cannot be null
	if(mb_strlen($_POST['pw'])<6){
		skip('register.php','error','password cannot less than 6 characters');
	}
	if($_POST['pw']!=$_POST['confirm_pw']){
		skip('register.php','error','password and re-password input do not be same');
	}
	//验证验证码个数 不区分大小写
	if(strtolower($_POST['vcode']) != strtolower($_SESSION['vcode'])){
		skip('register.php','error','vcode input error');
	}
	//用户名不能重复
	$_POST= escape($link,$_POST);
	$query = "select * from sfk_member where name = '{$_POST['name']}'";
	$result = execute($link,$query);
	if(mysqli_num_rows($result)){
		skip("register.php","error","this username has been used, change your username");
	}
?>