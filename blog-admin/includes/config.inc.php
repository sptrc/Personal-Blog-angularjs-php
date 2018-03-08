<?
$connect_string = 'localhost';
$connect_username = 'root';
$connect_password = '';
$connect_db = 'personalBlog';
$company = 'Odeyssey';

define("COMPANY",$company);

$_con = mysqli_connect($connect_string,$connect_username,$connect_password,$connect_db);
if($_con)
	echo mysqli_error($_con);
date_default_timezone_set("Asia/Kolkata");
