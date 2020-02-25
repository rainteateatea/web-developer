<?php
	include_once '../inc/config.inc.php';
	include_once '../inc/mysql.inc.php';
	include_once '../inc/tool.inc.php';
	
	$template['title']='son module modify page';
	$template['keywords']='son module modify page';
	$template['css']=array('style/public.css');
	
	//connect
	$link=connect();
	if(!isset($_GET['id'])||!is_numeric($_GET['id'])){
		skip('son_module.php','error','id paramater error');
	}
	$query="select * from sfk_son_module where id={$_GET['id']}";
	$result = execute($link,$query);
	if(!mysqli_num_rows($result)){
		skip('son_module.php','error','this module does not exist');
	}
	$data = mysqli_fetch_assoc($result);
	if(isset($_POST['submit'])){
		//checkin
		$check_flag = 'update';
		include 'inc/check_son_module.inc.php';
		
		$query = "update sfk_son_module set 
		father_module_id={$_POST['father_module_id']},module_name='{$_POST['module_name']}',info='{$_POST['info']}',
		member_id={$_POST['member_id']},sort={$_POST['sort']}
		where id = {$_GET['id']}";
		execute($link,$query);
		if(mysqli_affected_rows($link)==1){
			skip('son_module.php','ok','update successful');
		}
		else{
			skip('son_module.php','error','update failed, please try again');
		}
	}
	
?>

<?php include 'inc/header.inc.php'?>
<div id="main">
	<div class="title" style="margin-bottom:20px;"> modify sub module - <?php echo $data['module_name']?></div>
	<form method="post">
		<table class="au">
			<tr>
				<td>father module name</td>
				<td>
					<select name="father_module_id">
						<option value="0">===Please choose a father module===</option>
						<?php 
							$query = "select * from sfk_father_module";
							$result_father = execute($link,$query);
							while($data_father = mysqli_fetch_assoc($result_father)){
								if($data_father['id']==$data['father_module_id']){
										echo "<option selected='selected' value='{$data_father['id']}'>{$data_father['module_name']}</option>";
								}else{
									echo "<option value='{$data_father['id']}'>{$data_father['module_name']}</option>";
								}
							}
						?>
					</select>
				</td>
				<td>
					you should choose one of father modules
				</td>
			</tr>
			<tr>
				<td>panel name</td>
				<td><input name = "module_name" value= "<?php echo $data['module_name']?>"type="text" /></td>
				<td>
					name cannot be null, maximum character is 6
				</td>
			</tr>
			<tr>
				<td>module description</td>
				<td>
					<textarea name="info"><?php echo $data['info']?></textarea>
				</td>
				<td>
					cannot more than 255 characters.
				</td>
			</tr>
			<tr>
				<td>owner</td>
				<td>
					<select name="member_id"><option value="0">===Please choose a membership as owner===</option></select>
				</td>
				<td>
					a digit number
				</td>
			</tr>
			<tr>
				<td>sort</td>
				<td><input name ="sort" value= "<?php echo $data['sort']?>" type="text" /></td>
				<td>
					a digit number
				</td>
			</tr>
		</table>
		<input style="margin-top:20px;cursor:pointer;" class="btn" type="submit" name="submit" value="update" />
	</form>
</div>

<?php include 'inc/footer.inc.php'?>