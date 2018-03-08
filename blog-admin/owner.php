<? include 'start.php';
alert();
$nm 	= 'Owner';
$table 	= 'owner';
?>

<div class="row">
	<?panel(12,$nm);?>
	<table id="datatable" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Image</th>
				<th>Logo</th>
				<th>Banner</th>
				<th>Name</th>
				<th>Location</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?$i=0; foreach(get_all($table) as $com){ $i++;?>
			<tr>
				<td align="center"><img src="image/<?=$com['image']?>" alt="" width="80"></td>
				<td align="center"><img src="image/<?=$com['logo']?>" alt="" width="80"></td>
				<td align="center"><img src="image/<?=$com['banner']?>" alt="" width="80"></td>
				<td><?=$com['name'] ?></td>
				<td><?=$com['location'] ?></td>
				<td align="center">
					<div class="btn-group  btn-group-sm">
						<a class="btn btn-default btn-primary btn-sm" href="<?=$_SERVER['PHP_SELF']?>?edit=<?=$com['id']?>">Edit</a>
						<a class="btn btn-default btn-danger btn-sm" href="<?=$_SERVER['PHP_SELF']?>?del=<?=$com['id']?>" onclick="return propmt('Are you sure?')">Delete</a>
					</div>
				</td>
			</tr>
			<?}?>
		</tbody>
	</table>
	<?panel_end();?>


	<?panel(12,'Manage '.$nm);

	if(isset($_POST['add'])){
		insert($table,$_POST);
		file_to_tab('image','image/',$table,last($table));
		file_to_tab('logo','image/',$table,last($table));
		file_to_tab('banner','image/',$table,last($table));
		header('location: '.$_SERVER['PHP_SELF'].'?type=success&msg='.base64_encode($nm.' Added'));
	}

	if(isset($_POST['edit'])){
		update($table,$_POST,['id'=>$_GET['edit']]);
		file_to_tab('image','image/',$table,last($table));
		file_to_tab('logo','image/',$table,last($table));
		file_to_tab('banner','image/',$table,last($table));
		header('location: '.$_SERVER['PHP_SELF'].'?type=info&msg='.base64_encode($nm.' Edited'));
	}

	if(isset($_GET['edit'])){
		foreach(get_all($table,"where id=".$_GET['edit']) as $comt)
			extract($comt);
	}

	if(isset($_GET['del'])){
		delete($table,$_GET['del']);
		header('location: '.$_SERVER['PHP_SELF'].'?type=danger&msg='.base64_encode($nm.' Deleted'));
	}
	?>
	<form class="form-horizontal form-label-left" method="post" action="" enctype="multipart/form-data">

		<?php 
		text('name',$name);
		text('location',$location);
		text('image','','file');
		text('logo','','file');
		text('banner','','file');
		textarea('intro',$intro);
		textarea('detail',$detail);
		?>



		<div class="ln_solid"></div>
		<div class="form-group">
			<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
				<button type="reset" class="btn btn-primary">Reset</button>
				<button type="submit" class="btn btn-success" name="<?=(isset($_GET['edit']))?'edit':'add'?>">Submit</button>
			</div>
		</div>

	</form>
	<?panel_end();?>


</div>


<?include 'end.php'?>