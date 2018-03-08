<?
ob_start();
session_start();
include 'blog-admin/includes/config.inc.php';
include 'blog-admin/includes/functions.php';
include 'blog-admin/includes/model.php';

if (isset($_GET['id'])) {
	# code...
	$cat = findobj('post',['id'=>$_GET['id'],'publish'=>'1']);
	$cat->cmnt=(string)counter('comment','where display=1 and post='.$_GET['id']);
	echo json_encode($cat);
}
else if(isset( $_GET['cat'])){
	foreach(get_all('post','where publish=1 and category='.$_GET['cat']) as $cat){
		$comment['cmnt'] = (string)counter('comment','where display=1 and post='.$cat['id']);
		$ct[]=array_merge($cat,$comment);
	}
	echo json_encode($ct);
}
else{
	$sql = mysqli_query($_con,"SELECT *,c.id as c_id,p.id as id from post p left join category c on p.category=c.id where p.publish=1");
	while($cat = mysqli_fetch_assoc($sql)){
		$comment['cmnt'] = (string)counter('comment','where display=1 and post='.$cat['id']);
		$ct[]=array_merge($cat,$comment);
	}
	echo json_encode($ct,JSON_PRETTY_PRINT);
}