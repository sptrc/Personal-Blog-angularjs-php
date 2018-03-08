<?
ob_start();
session_start();
include 'blog-admin/includes/config.inc.php';
include 'blog-admin/includes/functions.php';
include 'blog-admin/includes/model.php';

	# code...
foreach(get_all('social') as $cat)
	$ct[]=$cat;
echo json_encode($ct);