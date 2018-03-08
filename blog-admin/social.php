<? include 'start.php';
alert();
$nm 	= 'Social Link';
$table 	= 'social';
?>

<div class="row">
	<?panel(6,$nm);?>
	<table id="datatable" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Logo</th>
				<th>Name</th>
				<th>Link</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?$i=0; foreach(get_all($table) as $com){ $i++;?>
			<tr>
				<td align="center"><i class="fa fa-<?=$com['logo'] ?> fa-2x" aria-hidden="true"></i></td>
				<td><?=$com['name'] ?></td>
				<td><?=$com['link'] ?></td>
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


	<?panel(6,'Manage '.$nm);

	if(isset($_POST['add'])){
		insert($table,$_POST);
		header('location: '.$_SERVER['PHP_SELF'].'?type=success&msg='.base64_encode($nm.' Added'));
	}

	if(isset($_POST['edit'])){
		update($table,$_POST,['id'=>$_GET['edit']]);
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
	<form class="form-horizontal form-label-left" method="post" action="">

		<?php 
		text('logo',$logo);
		text('name',$name);
		text('link',$link);
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