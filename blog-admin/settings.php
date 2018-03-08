<?php include 'start.php';
alert(); ?>
<div class="row">
	<?php panel(6,'Change Password');
	if(isset($_POST['password'])){
		update('reg_admin',['password'=>base64_encode($_POST['password']),'d'=>'s'],$_SESSION['user']);
		header('location: '.$_SERVER['PHP_SELF'].'?type=success&msg='.base64_encode('Password Changed'));
	} ?>
	<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="" method="post">

		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">New Password
			</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<input type="password" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="password">
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
			</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<button class="btn btn-primary" name="changep">Change Password</button>
			</div>
		</div>
	</form>
	<?php panel_end(); ?>
	

</div>
<?php include 'end.php'; ?>

<script>
	function upd_fee(cat,typ,val){
		$.post('ajax.php?func=upd_fee', {cat:cat,typ:typ,val:val}, function(data, textStatus, xhr) {
			/*optional stuff to do after success */
			window.location.assign(data);
		});
	}
</script>