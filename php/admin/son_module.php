<?php
//connect
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';
$link=connect();
if(isset($_POST['submit'])){
	foreach($_POST['sort'] as $key=>$val){
		if(!is_numeric($val)||!is_numeric($key)){
			skip("son_module.php","error","input format is only digit number");
		}
		$query[] = "update sfk_son_module set sort={$val} where id = {$key}";
	}
	if(execute_multi($link,$query,$error)){
		skip("son_module.php","ok","sort modify successful");
	}else{
		skip("son_module.php","error",$error);
	}
}
$query = "select ssm.id,ssm.sort,ssm.module_name ,sfm.module_name father_module_name,ssm.member_id 
		from sfk_son_module ssm,sfk_father_module sfm where ssm.father_module_id =sfm.id 
		order by sfm.id";
$result =execute($link,$query);

$template['title']='son module list page';
$template['css']=array('style/public.css');
?>
<?php include 'inc/header.inc.php'?>
<div id = "main">
	<div class="title"> sub module list</div>
	<form method="post">
	<table class="list">
		<tr>
			<th>sort</th>
			<th>name</th>
			<th>father module</th>
			<th>Moderator</th>
			<th>operation</th>
		</tr>
		<?php
			while($data=mysqli_fetch_assoc($result)){
				$url=urlencode("son_module_delete.php?id={$data['id']}");
				$return_url=urlencode($_SERVER['REQUEST_URI']);
				$message="You want to delete sub module {$data['module_name']}?";
				$delete_url="confirm.php?url={$url}&return_url={$return_url}&message={$message}";
				
$html = <<<A
<tr>
			<td><input class ="sort" type="text" name="sort[{$data['id']}]" value ="{$data['sort']}" /></td>
			<td>{$data['module_name']}[id:{$data['id']}]</td>
			<td>{$data['father_module_name']}</td>
			<td>{$data['member_id']}</td>
			
			<td><a href="#">[access]</a>&nbsp;&nbsp;<a href="son_module_update.php?id={$data['id']}">[edit]</a>&nbsp;&nbsp;<a href="$delete_url">[delete]</a></td>
		</tr>
A;
	echo $html;
			}
		?>
		
	
	</table>
	<input style="margin-top:20px;cursor:pointer;" class="btn" type="submit" name="submit" value="sort" />
	</form>
</div>
<?php include 'inc/footer.inc.php'?>
	

