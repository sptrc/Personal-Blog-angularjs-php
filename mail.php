<?php  

if (isset($_POST['send'])) {
	# code...
	extract($_POST);
	$to = "mail@mail.com";
	$subject = $subject;
	$txt = $name." asked ".$message;
	$headers = "From: ".$email;

	mail($to,$subject,$txt,$headers);
	echo '<script>window.location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
}