<?php 
include 'start.php';
if (isset($_GET['info'])) {
	# code...
	$us = get_all('reg_admin','where id='.$_SESSION['user']);
	extract($us[0]);
}
if (isset($_POST['insert'])) {
	# code...
	insert('reg_admin',$_POST);
	file_to_tab('img','image/','reg_admin',last('reg_admin'));
	header('location: profile.php?type=info&msg='.base64_encode('Profile Inserted. By Default password is set 0000'));
}

if (isset($_POST['upload'])) {
	# code...
	update('reg_admin',$_POST,['id'=>$_SESSION['user']]);
	file_to_tab('img','image/','reg_admin',$_SESSION['user']);
	header('location: profile.php?info=me&type=info&msg='.base64_encode('Profile Updated'));
}
alert();
panel(12,'Profile');
?>
<div class="row">
	<form action="" method="post" enctype="multipart/form-data">
		<div class="col-md-4 col-md-offset-4 text-center well" style="padding: 50px;">
			<input type="file" id="icon" style="display: none;" name="img">
			<label for="icon" title="Change Profile Picture">
				<img src="<?=(!empty($img))?'image/'.$img:'https://t6.rbxcdn.com/bb78bd51769a768855c9cf5bf47d1224'?>" class="img-circle" alt="" width="150" id="demo">
			</label>
			<hr>
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Name" name="name" value="<?=$name ?>">
			</div>
			<div class="form-group">
				<input type="email" class="form-control" placeholder="Email" name="email" value="<?=$email ?>">
			</div>
			<div class="form-group">
				<input type="number" class="form-control" placeholder="Phone" name="phone" value="<?=$phone ?>">
			</div>
			<div class="form-group">
				<input class="form-control" placeholder="Username" name="username" value="<?=$username ?>">
			</div>
			<div class="text-center">
				<button class="btn btn-primary" name="<?=(isset($_GET['info']))?'upload':'insert'?>">Submit</button> <br>
				<a href="settings.php">Change Password</a> • <a href="profile.php">Add New User</a>
			</div>

		</div>
	</form>
</div>
<?
panel_end();
include 'end.php';
?>
<script>
	function readURL(input) {

		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				$('#demo').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#icon").change(function() {
		readURL(this);
	});
</script>