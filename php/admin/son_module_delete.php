<?php
//connect
include_once '../inc/tool.inc.php';
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
	skip('son_module.php','error','sorry, id has error');
}
$link=connect();
$query = "delete from sfk_son_module where id={$_GET['id']}";
execute($link,$query);
if(mysqli_affected_rows($link)==1){
	skip('son_module.php','ok','delete successful');
}
else{
	skip('son_module.php','error','sorry, delete failed');
}
?>