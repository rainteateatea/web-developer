<?php
/*
	数据库连接
	执行一条SQL 语句 返回结果对象或布尔值
	执行一条SQL语句 只返回布尔值
	一次性执行多条SQL语句
	获取记录数
	关闭与数据库的连接
	
*/
//database connection
function connect($host=DB_HOST,$user=DB_USER, $password=DB_PASSWORD,$database=DB_DATABASE,$port=DB_PORT){
	$link= @mysqli_connect($host,$user,$password,$database,$port);
	// @ 发生错误屏蔽掉
	//var_dump(mysqli_connect_errno());
	if(mysqli_connect_errno()){
		exit(mysqli_connect_error());
	}
	//设置默认的客户端字符集
	mysqli_set_charset($link,'utf-8');
	return $link;
}
//execute one SQL comment, return object or boolean
function execute($link,$query){
	$result=mysqli_query($link,$query);
	if(mysqli_errno($link)){
		exit(mysqli_error($link));
	}
	return $result;
	//var_dump(mysqli_errno($link));
	//var_dump(mysqli_error($link));
}
//execute SQL comment, return only boolean
function execute_bool($link,$squery){
	$bool=mysqli_real_query($link,$squery);
	if(mysqli_errno($link)){
		exit(mysqli_error($link));
	}
	return $bool;
}
//execute several SQL comments for one time
/*使用案例
$arr_sqls=array(
	'select * from sfk_father_module',
	'select * from sfk_father_module',
	'select * from sfk_father_module'
);
var_dump(execute_multi($link,$arr_sqls,$error));
*/
function execute_multi($link,$arr_sqls,&$error){
	$sqls=implode(';',$arr_sqls).';';
	if(mysqli_multi_query($link,$sqls)){
		$data=array();
		$i=0;
		do{
			if($result=mysqli_store_result($link)){
				$data[$i]=mysqli_fetch_all($result);
				mysqli_free_result($result);
			}else{
				$data[$i]=null;
			}
			$i++;
			if(!mysqli_more_results($link)) break;
		}while(mysqli_next_result($link));
		if($i==count($arr_sqls)){
			return $data;
		}else{
			$error="sql excute failed:<br />&nbsp;array{$i}:{$arr_sqls{$i}}has error<br />".mysqli_error($link);
			return false;
		}
		
	}
	else{
		$error="sql excute failed".mysqli_error($link);
		return false;
	}
}
//obtain the number of record
function num($link,$sql_count){
	
	$result=execute($link,$sql_count);
	$count=mysqli_fetch_row($result);
	return $count[0];
	
}

//reverse data, in correct type save in database
function escape($link,$data){
	if(is_string($data)){
		return mysqli_real_escape_string($link,$data);
	}
	if(is_array($data)){
		foreach($data as $key=>$val){
			$data[$key]=escape($link,$val);
		}
	}
	return $data;
	
}
//close database connection
function close($link){
	mysqli_close($link);
}
?>