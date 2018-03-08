<?php  

function text($name,$value,$type,$class){
	echo '<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">'.ucwords($name).' :</label>
	<div class="col-md-9 col-sm-9 col-xs-12">
	<input type="'.$type.'" class="form-control '.$class.'" name="'.$name.'" value="'.$value.'" >
	</div>
	</div>';
}

function textarea($name,$value,$class){
	echo '<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">'.ucwords($name).' :</label>
	<div class="col-md-9 col-sm-9 col-xs-12">
	<textarea class="form-control '.$class.'" name="'.$name.'">'.$value.'</textarea>
	</div>
	</div>';
}

function radio($name,$arg,$value){
	echo '<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">'.ucwords($name).' :</label>
	<div class="col-md-9 col-sm-9 col-xs-12" style="padding:7px;">';
	foreach($arg as $k=>$v){
		$s = ($v==$value)?"checked":"";
		echo '<input type="radio" name="'.$name.'" value="'.$v.'" '.$s.'>&nbsp'.$k.'&nbsp&nbsp&nbsp';
	}
	echo '</div>
	</div>';
}

function select($name,$arg,$value,$id,$opt){
	echo '<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">'.ucwords($name).' :</label>
	<div class="col-md-9 col-sm-9 col-xs-12" style="padding:7px;">
	<select name="'.$name.'" id="'.$id.'" class="form-control" '.$opt.'>';
	foreach($arg as $k=>$v){
		$s = ($v==$value)?"selected":"";
		echo '<option value="'.$v.'" '.$s.'>'.$k.'</option>';
	}
	echo '</select>
	</div>
	</div>';
}