<?php include 'start.php';

$nm = 'Unit';
$tbl = 'unit';

if (isset($_POST['insert'])) {
	# code...
	insert($tbl,$_POST);
	header('location: '.$_SERVER['PHP_SELF'].'?type=success&msg='.base64_encode($nm.' Inserted'));
}

if (isset($_POST['update'])) {
	# code...
	update($tbl,$_POST,base64_decode($_GET['ed'])d);
	header('location: '.$_SERVER['PHP_SELF'].'?type=info&msg='.base64_encode($nm.' Updated'));
}

if (isset($_GET['ed'])) {
	# code...
	$tbl = get_all($tbl,'where id='.base64_decode($_GET['ed']));
	extract($tbl[0]);
}

if (isset($_GET['del'])) {
	# code...
	delete($tbl,base64_decode($_GET['del']));
	header('location: '.$_SERVER['PHP_SELF'].'?type=danger&msg='.base64_encode($nm.' Deleted'));
}
alert();
panel(6,$nm);?>
<table class="table table-bordered" id="datatable">
	<thead>
		<tr>
			<th>$nm</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<? foreach(get_all($tbl) as $data){ ?>
		<tr>
			<td>
				<details>
					<summary><?=$data['name']?></summary>
					<ul>
						<li>Address - <?=$data['address']?></li>
						<li>Phone - <?=$data['mobile']?></li>
						<li>Email - <?=$data['email']?></li>
						<li>Website - <?=$data['website']?></li>
						<li>GST IN - <?=$data['gstin']?></li>
					</ul>
				</details>
			</td>
			<td align="center">
				<a href="<?=$_SERVER['PHP_SELF'].'?ed='.base64_encode($data['id'])?>" class="btn btn-info btn-xs">Edit</a>
				<a href="<?=$_SERVER['PHP_SELF'].'?del='.base64_encode($data['id'])?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')">Delete</a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<?
panel_end();
panel(6,'Manage '.$nm); ?>
<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="">

	<div class="form-group">
		<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Company Name
		</label>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="name" value="<?=$name ?>">
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Address
		</label>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<textarea name="address" id="" cols="30" rows="2" class="form-control col-md-7 col-xs-12"><?=$address ?></textarea>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mobile
		</label>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="mobile" value="<?=$mobile ?>">
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email
		</label>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<input type="email" class="form-control col-md-7 col-xs-12" name="email" value="<?=$email ?>">
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Website
		</label>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<input type="url" class="form-control col-md-7 col-xs-12" name="website" value="<?=$website ?>">
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">GST No
		</label>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<input type="text" class="form-control col-md-7 col-xs-12" name="gstin" value="<?=$gstin ?>">
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-6 col-md-offset-3">
			<input type="hidden" name="user" value="<?=$_SESSION['user']?>">
			<button class="btn btn-primary" name="<?=(isset($_GET['ed']))?'update':'insert'?>">Submit</button>
		</div>
	</div>

</form>
<?php
panel_end();
include 'end.php'; ?>