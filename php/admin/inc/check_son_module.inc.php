<?php 
	//验证所属父板块不能为空
	if(!is_numeric($_POST['father_module_id'])){
		skip('son_module_add.php','error','father module cannot be null');
	}
	$query = "select * from sfk_father_module where id = {$_POST['father_module_id']}";
	$result = execute($link,$query);
	//防止手动改html 代码
	if(mysqli_num_rows($result)==0){
		skip('son_module_add.php','error','father module does not exist!');
	}
	//不得多于66个字符
	if(empty($_POST['module_name'])){
			skip('son_module_add.php','error','sub module name cannot be null');
		}
	if(mb_strlen($_POST['module_name'])>66){
		skip('son_module_add.php','error','name length cannot more than 66 characters');
	}
	//转义
	$_POST = escape($link,$_POST);
	switch($check_flag){
		case'add':
			$query = "select * from sfk_son_module where module_name= '{$_POST['module_name']}'";
			break;
		case'update':
			$query = "select * from sfk_son_module where module_name= '{$_POST['module_name']}' and
			id!='{$_GET['id']}'";
			break;
		default:
			skip('son_module_add.php','error','$check_flag parameter error');
	}
	$result = execute($link,$query);
	if(mysqli_num_rows($result)){
		skip('son_module_add.php','error','this son module has exited!');
	}
	//信息不得超过255个字
	if(mb_strlen($_POST['info'])>255){
		skip('son_module_add.php','error','sub module description length cannot more than 255 characters');
	}
	if(!is_numeric($_POST['sort'])){
		skip('son_module_add.php','error','please input digit number');
	}
?>