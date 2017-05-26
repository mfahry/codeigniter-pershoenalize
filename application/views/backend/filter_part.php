<option value="-">-</option>
<?php 
foreach($part->result() as $row){ ?>
	<option value="<?php echo $row->part_id?>"><?php echo $row->part_name; ?></option>
<?php	
} ?>