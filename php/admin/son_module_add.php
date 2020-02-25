<?php
	include_once '../inc/config.inc.php';
	include_once '../inc/mysql.inc.php';
	include_once '../inc/tool.inc.php';
	
	$template['title']='son module add page';
	$template['keywords']='son module add page';
	$template['css']=array('style/public.css');
	
	//connect
	$link=connect();
	if(isset($_POST['submit']))
	{
		$check_flag = 'add';
		include 'inc/check_son_module.inc.php';
		
		$query = "insert into sfk_son_module(father_module_id,module_name,info,member_id,sort)
		values ({$_POST['father_module_id']},'{$_POST['module_name']}','{$_POST['info']}',
		{$_POST['member_id']},{$_POST['sort']})";
		execute($link,$query);
		if(mysqli_affected_rows($link)==1){
			skip('son_module.php','ok','add successful');
		}
		else{
			skip('son_module_add.php','error','add failed, please try again');
		}
		
	}
	
?>

<?php include 'inc/header.inc.php'?>
<div id="main">
	<div class="title" style="margin-bottom:20px;"> add sub module</div>
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
								echo "<option value='{$data_father['id']}'>{$data_father['module_name']}</option>";
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
				<td><input name = "module_name" type="text" /></td>
				<td>
					name cannot be null, maximum character is 6
				</td>
			</tr>
			<tr>
				<td>module description</td>
				<td><textarea name="info"></textarea></td>
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