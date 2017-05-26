<!-- search part type id available -->
<?php
foreach($part_type->result() as $row){ ?>
	<div class="col-xs-3 text-center" style="margin-bottom:5px;">	
		<a style="color:#000000;" onclick="generateUsePartType('<?php echo $row->part_type_id;?>','<?php echo $row->part_type_group_id;?>')">
			<img class="img img-thumbnail" src="<?php echo base_url("uploads/part_type/".$row->part_type_path)?>" title="<?php echo $row->part_type_name; ?>" style="width:80px; height:80px; "/>
		</a>
	</div>
<?php
} ?>