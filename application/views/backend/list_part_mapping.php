<script>
	function paging(startWith, limit, dataUrl){
		$("#sign").hide();
		$("#sign").load(dataUrl+"?start_with="+startWith+"&limit="+limit);
		$("#sign").show(1000);
	}
	
	function modalDeleteOne(dataUrl){
		$("#modal-form-one").modal("hide");
		$("#modal-form-delete-one").modal();
		$("#modal-form-delete-one #link-to-delete").attr("href",dataUrl);
	}
</script>
<div class="row bg-default" style="border-radius:10px; -webkit-border-radius:5px; -moz-border-radius:5px; border: 1px solid rgb(234, 234, 234); padding: 5px 25px;">
	<table width="90%" align="center">
	<?php
	$i = 1; 
	foreach($part_type->result() as $row){ ?>
			<?php 
			if($i%2==1) { echo "<tr>";} ?>
				<td width="50%" style="padding:5px;" valign="top">
					<table width="90%" align="center" class="table table-hover table-bordered">		
							<tr>
								<td colspan="2" style="font-family:Candara; font-size:16px; padding:10px 10px; font-weight:bold; text-align:center;"> <?php echo $row->part_type_name; ?></td>
							</tr>
							<tr>
								<td style="font-family:Candara; font-size:13px; padding:5px 5px; font-weight:bold; text-align:center;">Part</td>
								<td style="font-family:Candara; font-size:13px; padding:5px 5px; font-weight:bold; text-align:center;">Action</td>
							</tr>
							<?php
							foreach ($part_mapping->result() as $row_part_mapping){ 
								if($row->part_type_id == $row_part_mapping->part_type_id){ ?>
									<tr>
										<td style="font-family:Candara; font-size:13px; padding:5px 5px;"><?php echo $row_part_mapping->part_name;?></td>
										<td style="font-family:Candara; font-size:13px; padding:5px 5px; text-align:center;">
											<a onclick="modalDeleteOne('<?php echo base_url("part_mapping/delete?part_type_id=".$row_part_mapping->part_type_id."&part_id=".$row_part_mapping->part_id)?>')" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span> delete</a>
										</td>
									</tr>
								<?php
								}
							} ?>
					</table>
				</td>	
			<?php 
			if($i%2==0) { echo "</tr>"; } 
			$i++; ?>	
	<?php
	} ?>
	</table>
</div>

<ul class="pager">
	<?php
	if($count <= 10){}
	else if($start_with > 0 && ($start_with+10) < $count){ ?>
		<li class="previous" style="cursor:pointer;"><a onclick="paging('<?php echo ($start_with-10); ?>','10','<?php echo base_url("part_mapping/view_limit")?>')">&larr; Older</a></li>
		<li class="next" style="cursor:pointer;"><a onclick="paging('<?php echo ($start_with+10); ?>','10', '<?php echo base_url("part_mapping/view_limit")?>')">Newer &rarr;</a></li>
	<?php
	}
	else if($start_with == 0 && $count > 10){?>
		<li class="next" style="cursor:pointer;"><a onclick="paging('<?php echo ($start_with+10); ?>','10','<?php echo base_url("part_mapping/view_limit")?>')">Newer &rarr;</a></li>
	<?php
	} 
	else { ?>
		<li class="previous" style="cursor:pointer;"><a onclick="paging('<?php echo ($start_with-10); ?>','10','<?php echo base_url("part_mapping/view_limit")?>')">&larr; Older</a></li>
	<?php
	}?>
</ul>

<div class="modal fade bs-example-modal-lg" id="modal-form-delete-one" tabindex="-1" role="dialog" aria-labelledby="modal-form-delete-one-label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title" id="modal-form-delete-one-label" style="color:rgba(30, 135, 75, 0.95); font-size:17px; font-family:'Broadway'" class="text-justify">Confirmation</h4>
		  </div>
		  <div class="modal-body">
				<p style="font-family:Candara; font-size:13px;">Are you sure for delete this item ?</p>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<a class="btn btn-danger" href="" id="link-to-delete">Delete</a>
		  </div>
		</div>
	</div>
</div>