<?php 
	include_once '../inc/config.inc.php';
	include_once '../inc/mysql.inc.php';
	include_once '../inc/tool.inc.php';
	if(isset($_POST['submit'])){
		$link=connect();
		//验证用户填写信息
		$check_flag='add';
		include 'inc/check_father_module.inc.php';
		
		$query = "insert into sfk_father_module(module_name,sort) values('{$_POST['module_name']}','{$_POST['sort']}')";
		execute($link,$query);
		if(mysqli_affected_rows($link)==1){
			//添加成功
			skip('father_module.php','ok','add successful');
		}
		else{
			skip('father_module_add.php','error','sorry,add failed,try again');
		}
	}
	
	$template['title']='father module add page';
	$template['keywords']='back end add page';
	$template['css']=array('style/public.css');
?>
<?php include 'inc/header.inc.php'?>
<div id="main">
	<div class="title" style="margin-bottom:20px;"> add father module</div>
	<form method="post">
		<table class="au">
			<tr>
				<td>panel name</td>
				<td><input name = "module_name" type="text" /></td>
				<td>
					name cannot be null, maximum character is 6
				</td>
			</tr>
			<tr>
				<td>sort</td>
				<td><input name ="sort" value ="0" type="text" /></td>
				<td>
					a digit number
				</td>
			</tr>
		</table>
		<input style="margin-top:20px;cursor:pointer;" class="btn" type="submit" name="submit" value="add" />
	</form>
</div>
<?php include 'inc/footer.inc.php'?>
