<?php
//connect
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
$link=connect();
$query = "select * from sfk_father_module";
$result =execute($link,$query);

$template['title']='father module list page';
$template['css']=array('style/public.css');
?>
<?php include 'inc/header.inc.php'?>
<div id = "main">
	<div class="title"> father module list</div>
	<table class="list">
		<tr>
			<th>sort</th>
			<th>name</th>
			
			<th>operation</th>
		</tr>
		<?php
			while($data=mysqli_fetch_assoc($result)){
				$url=urlencode("father_module_delete.php?id={$data['id']}");
				$return_url=urlencode($_SERVER['REQUEST_URI']);
				$message="You want to delete father module {$data['module_name']}?";
				$delete_url="confirm.php?url={$url}&return_url={$return_url}&message={$message}";
				
$html = <<<A
<tr>
			<td><input class ="sort" type="text" name="sort" /></td>
			<td>{$data['module_name']}[id:{$data['id']}]</td>
			
			<td><a href="#">[access]</a>&nbsp;&nbsp;<a href="father_module_update.php?id={$data['id']}">[edit]</a>&nbsp;&nbsp;<a href="$delete_url">[delete]</a></td>
		</tr>
A;
	echo $html;
			}
		?>
		
	
	</table>
	
</div>
<?php include 'inc/footer.inc.php'?>
	

