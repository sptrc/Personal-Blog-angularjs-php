<?
ob_start();
session_start();
include 'blog-admin/includes/config.inc.php';
include 'blog-admin/includes/functions.php';
include 'blog-admin/includes/model.php';
header('Content-Type: application/json');
if (isset($_GET['id'])) {
	# code...
	$cat = findobj('category',['id'=>$_GET['id']]);
	echo json_encode($cat);
}
else{
	foreach(get_all('category') as $cat)
		$ct[]=$cat;
	echo json_encode($ct);
}