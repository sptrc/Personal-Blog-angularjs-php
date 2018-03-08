<? include 'start.php';
alert();
$nm 	= 'Comment';
$table 	= 'comment';
?>

<div class="row">
	<?panel(12,$nm);?>
	<table id="datatable" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Post</th>
				<th>Name</th>
				<th>Email</th>
				<th>Website</th>
				<th>Comment</th>
				<th>Display</th>
			</tr>
		</thead>
		<tbody>
			<?$i=0; foreach(get_all($table) as $com){ $i++;?>
			<tr>
				<td><?=find('post',$com['post'],'title') ?></td>
				<td><?=$com['name'] ?></td>
				<td><?=$com['email'] ?></td>
				<td><?=$com['website'] ?></td>
				<td><?=$com['comment'] ?></td>
				<td align="center">
					<input type="checkbox" onchange="
					var id=0;
					if($(this).is(':checked'))
						id=1;
					if(!$(this).is(':checked'))
						id=0;
					$.post('ajax.php?mod=dis',{comment:<?=$com['id']?>,val:id,function(data){}});
					" <?=($com['display']==1)?'checked':'' ?>>
				</td>
			</tr>
			<?}?>
		</tbody>
	</table>

</div>


<?include 'end.php'?>