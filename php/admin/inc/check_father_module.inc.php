<?php
if(empty($_POST['module_name'])){
			skip('father_module_add.php','error','module name cannot be null');
		}
		if(mb_strlen($_POST['module_name'])>66){
			skip('father_module_add.php','error','cannot more than 66 characters');
		}
		if(!is_numeric($_POST['sort'])){
			skip('father_module_add.php','error','please input digit number');
		}
		
		$_POST=escape($link,$_POST);
		switch($check_flag){
			case'add':
				$query = "select * from sfk_father_module where module_name= '{$_POST['module_name']}'";
				break;
			case'update':
				$query = "select * from sfk_father_module where module_name= '{$_POST['module_name']}' and
				id!='{$_GET['id']}'";
				break;
			default:
				skip('father_module_add.php','error','$check_flag parameter error');
		}
	
		$result = execute($link,$query);
		if(mysqli_num_rows($result)){
			skip('father_module_add.php','error','this module has exited!');
		}
?>