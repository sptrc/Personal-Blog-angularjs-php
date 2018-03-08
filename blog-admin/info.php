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
				<th>#</th>
				<th>Image</th>
				<th>Student</th>
				<th>Year</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?$i=0; foreach(get_all($table) as $com){ $i++;?>
			<tr>
				<td><?=$i++?></td>
				<td align="center"><img src="../files/images/<?=find('enrollment',$com['student'],'img')?>" alt="" width="80"></td>
				<td><a href="view.php?id=<?=$com['student'] ?>" target="_blank"><?=find('enrollment',$com['student'],'student_id') ?></a></td>
				<td><?=$com['year'] ?></td>
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
		text('name','Alex'); 
		textarea('address','2B Strret');
		radio('gender',['Male'=>'M','Female'=>'F'],'M');
		select('qualification',['B.Tech','B.com','B.sc']);
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