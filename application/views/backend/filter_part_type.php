<option value="-">-</option>
<?php 
foreach($part_type->result() as $row){ ?>
	<option value="<?php echo $row->part_type_id?>"><?php echo $row->part_type_name; ?></option>
<?php	
} ?>