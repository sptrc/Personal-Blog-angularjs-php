<?php 
/*
Function Made by Saptasrhee Das
*/
include 'config.inc.php';

function insert($table,$data){
	$_con = $GLOBALS['_con'];
	array_pop($data);
	foreach($data as $k=>$v){
		if(!is_array($v)){
			$key[]="`".$k."`";
			$values[]="'".addslashes($v)."'";
		}
	}
	$sql = "INSERT into ".$table." (".implode(",", $key).") VALUES (".implode(",",$values).")";
	mysqli_query($_con,$sql) or die(mysqli_error($_con));
}

function update($table,$data,$arg){
	$_con = $GLOBALS['_con'];
	array_pop($data);
	foreach($data as $k=>$v){
		if(!is_array($v)){
			$entity[]="`".$k."` = '".addslashes($v)."'"	;
		}
	}

	foreach($arg as $k=>$v)
		$aux[]="`".$k."` = '".addslashes($v)."'";	
	$sql = "UPDATE ".$table." SET ".implode(",",$entity)." WHERE ".implode(" and ",$aux);
	mysqli_query($_con,$sql) or die(mysqli_error($_con));
	// echo $sql;
}

function delete($table,$res,$attr='id'){
	$_con = $GLOBALS['_con'];
	mysqli_query($_con,"DELETE from $table where $attr='$res'") or die(mysql_error($_con));
}

function get_all($table,$phase=NULL,$msg=NULL){
	$_con = $GLOBALS['_con'];
	if(counter($table,$phase)>0){
		$sql = mysqli_query($_con,"select * from $table ".$phase);
		while($row = mysqli_fetch_assoc($sql))
			$cx[]=$row;
		foreach ($row as $key => $val)
			$cx[][$key]= $val;
		return $cx;
	}
	else
		echo $msg;
}

function findobj($table,$arg){
	$_con = $GLOBALS['_con'];
	foreach($arg as $k=>$v)
		$aux[]="`".$k."` = '".addslashes($v)."'";
	$sql = "SELECT * from $table where ".implode(' and ',$aux);
	$data = mysqli_fetch_assoc(mysqli_query($_con,$sql));
	return (object) $data;
}

function find($table,$id,$param,$col='id',$separator=','){
	$_con = $GLOBALS['_con'];
	$sql = mysqli_fetch_assoc(mysqli_query($_con,"select * from $table where $col ='$id'"));
	if(is_array($param)){
		foreach($param as $p)
			$store[] = $sql[$p];
		return implode($separator,$store);
	}
	else{
		if(empty($sql[$param]))
			return 'N/A';
		else
			return $sql[$param];
	}
}

function counter($table,$phase=NULL){
	$_con = $GLOBALS['_con'];
	$sql = mysqli_query($_con,"select * from $table ".$phase);
	return mysqli_num_rows($sql); 
}

function last($table,$col='id'){
	$_con = $GLOBALS['_con'];
	$id = mysqli_fetch_assoc(mysqli_query($_con,"select * from $table order by $col desc"));
	return $id[$col];
}


function file_upload($file,$location){
	$_con = $GLOBALS['_con'];
	$_img='';
	if($_FILES[$file]["size"]>0){
		$target_dir = $location;
		$_img = basename($_FILES[$file]["name"]);
		$target_file = $target_dir.$_img ;
		move_uploaded_file($_FILES[$file]["tmp_name"], $target_file);
	}

	return $_img;
}

function file_to_tab($file,$location,$table,$res='',$attr='id'){
	$_con = $GLOBALS['_con'];
	$filex = file_upload($file,$location);
	if(empty($res))
		$res = last($table,$attr);
	if(!empty($filex))
		mysqli_query($_con,"UPDATE $table set $file='".$filex."' where $attr=$res") or die(mysqli_error($_con));
}
