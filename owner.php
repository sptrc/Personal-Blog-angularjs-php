<?
ob_start();
session_start();
include 'blog-admin/includes/config.inc.php';
include 'blog-admin/includes/functions.php';
include 'blog-admin/includes/model.php';

	# code...
$cat = findobj('owner',['id'=>'1']);
echo json_encode($cat);