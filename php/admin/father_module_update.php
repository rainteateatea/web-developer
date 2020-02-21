<?php
	include_once '../inc/config.inc.php';
	include_once '../inc/mysql.inc.php';
	include_once '../inc/tool.inc.php';
	$template['title']='father module update page';
	$template['keywords']='back end update page';
	$template['css']=array('style/public.css');
	$link=connect();
	if(!isset($_GET['id'])||!is_numeric($_GET['id'])){
		skip('father_module.php','error','id paramater error');
	}
	$query="select * from sfk_father_module where id={$_GET['id']}";
	$result = execute($link,$query);
	if(!mysqli_num_rows($result)){
		skip('father_module.php','error','this module does not exist');
	}
	
	if(isset($_POST['submit'])){
		//验证信息
		$check_flag='update';
		include 'inc/check_father_module.inc.php';
		
		$query = "update sfk_father_module set module_name='{$_POST['module_name']}' , sort={$_POST['sort']} 
		where id = {$_GET['id']}";
		execute($link,$query);
		if(mysqli_affected_rows($link)==1){
			skip('father_module.php','ok','update successful');
		}
		else{
			skip('father_module.php','error','update failed, please try again');
		}
	}
	$data = mysqli_fetch_assoc($result);
?>
<?php include 'inc/header.inc.php'?>
	<div id="main">
		<div class="title" style="margin-bottom:20px;"> update father module -- <?php echo $data['module_name'];?></div>
		<form method="post">
			<table class="au">
				<tr>
					<td>panel name</td>
					<td><input name = "module_name" value = "<?php echo $data['module_name'];?>"type="text" /></td>
					<td>
						name cannot be null, maximum character is 6
					</td>
				</tr>
				<tr>
					<td>sort</td>
					<td><input name ="sort" value="<?php echo $data['sort'];?>" "type="text" /></td>
					<td>
						a digit number
					</td>
				</tr>
			</table>
			<input style="margin-top:20px;cursor:pointer;" class="btn" type="submit" name="submit" value="update" />
		</form>
	</div>
<?php include 'inc/footer.inc.php'?>