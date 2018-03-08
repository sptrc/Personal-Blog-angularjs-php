<?
ob_start();
session_start();
include 'blog-admin/includes/config.inc.php';
include 'blog-admin/includes/functions.php';
include 'blog-admin/includes/model.php';

// $data = json_decode(file_get_contents("php://input"));
// $name = $data->name;
// $email = $data->email;
// $website = $data->website;
// $comment = $data->comment;
// $post = $data->post;
extract($_POST);

$sql = "INSERT into comment set post='$post',pic='$pic',name='".addslashes($name)."',email='$email',website='$website',comment='".addslashes($comment)."',`date`='".date('Y-m-d')."'";

mysqli_query($_con,$sql) or die(mysqli_error($_con));

foreach(get_all('comment',"where post='$post' and display=1") as $cat)
	$ct[]=$cat;
echo json_encode($ct);