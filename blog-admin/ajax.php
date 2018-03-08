<?
ob_start();
session_start();
include 'includes/config.inc.php';
include 'includes/functions.php';
include 'includes/model.php';
include 'includes/fixed_data.php';
include 'includes/input.php';

if($_GET['mod']=='pub')
	update('post',['publish'=>$_POST['val'],'k'],['id'=>$_POST['post']]);


if($_GET['mod']=='dis')
	update('comment',['display'=>$_POST['val'],'k'],['id'=>$_POST['comment']]);