<?
ob_start();
session_start();
include 'blog-admin/includes/config.inc.php';
include 'blog-admin/includes/functions.php';
include 'blog-admin/includes/model.php';

if (isset($_GET['post'])) {
	# code...
	foreach(get_all('comment','where post='.$_GET['post'].' and display=1') as $cat)
		$ct[]=$cat;
	echo json_encode($ct);
}