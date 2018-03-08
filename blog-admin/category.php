<? include 'start.php';
alert();
$nm 	= 'Category';
$table 	= 'category';
?>

<div class="row">
	<?panel(6,$nm);?>
	<table id="datatable" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th><?=$nm ?></th>
				<th>Banner</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?$i=0; foreach(get_all($table) as $com){ $i++;?>
			<tr>
				
				<td><?=$com['category'] ?></td>
				<td align="center"><img src="banner/<?=$com['banner']?>" alt="" width="80"></td>
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
		file_to_tab('banner','banner/',$table,last('category'));
		header('location: '.$_SERVER['PHP_SELF'].'?type=success&msg='.base64_encode($nm.' Added'));
	}

	if(isset($_POST['edit'])){
		update($table,$_POST,['id'=>$_GET['edit']]);
		file_to_tab('banner','banner/',$table,last('category'));
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
		text('category',$category);
		text('banner','','file'); 
		textarea('description',$description);
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