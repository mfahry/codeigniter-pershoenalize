<script>
	function paging(startWith, limit, dataUrl){
		$("#shoes").hide();
		$("#shoes").load(dataUrl+"?start_with="+startWith+"&limit="+limit);
		$("#shoes").show(1000);
	}
	
	function modalFormOne(dataUrl){
		$("#modal-form-one .modal-content").load(dataUrl);
		$("#modal-form-one").modal();
	}
	
	function modalDeleteOne(dataUrl){
		$("#modal-form-one").modal("hide");
		$("#modal-form-delete-one").modal();
		$("#modal-form-delete-one #link-to-delete").attr("href",dataUrl);
	}
</script>
<div class="row bg-default" style="border-radius:10px; -webkit-border-radius:5px; -moz-border-radius:5px; border: 1px solid rgb(234, 234, 234); padding: 5px 25px;">
	<?php
	foreach($shoe->result() as $row){ ?>
		<div class="col-xs-6" style="margin:10px 0px;">
			<table>		
					<tr>
						<td rowspan="3" style="font-family:Candara; font-size:13px; padding:0px 5px;">
							<img src="<?php echo base_url("uploads/shoe/".$row->shoe_path);?>" class="img-thumbnail" style="width:220px; height:180px; margin-bottom:5px;"/> 
							<div class="text-center">
								<a class="btn btn-success" onclick="modalFormOne('<?php echo base_url("shoe/edit?shoe_id=".$row->shoe_id)?>')"><span class="glyphicon glyphicon-pencil"></span> Edit</a> 
								<a class="btn btn-danger" onclick="modalDeleteOne('<?php echo base_url("shoe/delete?shoe_id=".$row->shoe_id)?>')"><span class="glyphicon glyphicon-remove"></span> Delete</a>
							</div>
						</td>
						<td rowspan="3" style="font-family:Candara; font-size:13px; padding:0px 5px;" valign="top">
							<table>
								<tr>
									<td style="font-family:Candara; font-size:13px; padding:0px 5px; font-weight:bold;" valign="top">Name</td>
									<td style="font-family:Candara; font-size:13px; padding:0px 5px;" valign="top"> : </td>
									<td style="font-family:Candara; font-size:13px; padding:0px 5px;" valign="top"><?php echo $row->shoe_name; ?></td>
								</tr>
								<tr>
									<td style="font-family:Candara; font-size:13px; padding:0px 5px; font-weight:bold;" valign="top">Path</td>
									<td style="font-family:Candara; font-size:13px; padding:0px 5px;" valign="top"> : </td>
									<td style="font-family:Candara; font-size:13px; padding:0px 5px;" valign="top">uploads/shoe/<?php echo strtolower($row->shoe_path); ?></td>
								</tr>
								<tr>
									<td style="font-family:Candara; font-size:13px; padding:0px 5px; font-weight:bold;" valign="top">Group part</td>
									<td style="font-family:Candara; font-size:13px; padding:0px 5px;" valign="top"> : </td>
									<td style="font-family:Candara; font-size:13px; padding:0px 5px;" valign="top">
										<?php foreach($part_type->result() as $row_part){
											if($row->shoe_id == $row_part->shoe_id){?>
												<a style="margin: 1px;" onclick="modalFormOne('<?php echo base_url("part_type/edit?part_type_id=".$row_part->part_type_id)?>')" class="btn btn-xs btn-warning"><?php echo $row_part->part_type_group_name." | ".$row_part->part_type_name ?></a>
											<?php							
											}
										}?>

									</td>
								</tr>
							</table>
						</td>
					</tr>
			</table>
		</div>
	<?php
	} ?>
</div>
<ul class="pager">
	<?php
	if($count <= 10){}	
	else if($start_with > 0 && ($start_with+10) < $count){ ?>
		<li class="previous" style="cursor:pointer;"><a onclick="paging('<?php echo ($start_with-10); ?>','10','<?php echo base_url("shoe/view_limit")?>')">&larr; Older</a></li>
		<li class="next" style="cursor:pointer;"><a onclick="paging('<?php echo ($start_with+10); ?>','10', '<?php echo base_url("shoe/view_limit")?>')">Newer &rarr;</a></li>
	<?php
	}
	else if($start_with == 0){?>
		<li class="next" style="cursor:pointer;"><a onclick="paging('<?php echo ($start_with+10); ?>','10','<?php echo base_url("shoe/view_limit")?>')">Newer &rarr;</a></li>
	<?php
	} 
	else { ?>
		<li class="previous" style="cursor:pointer;"><a onclick="paging('<?php echo ($start_with-10); ?>','10','<?php echo base_url("shoe/view_limit")?>')">&larr; Older</a></li>
	<?php
	}?>
</ul>

<div class="modal fade bs-example-modal-lg" id="modal-form-one" tabindex="-1" role="dialog" aria-labelledby="modal-form-one-label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title" id="modal-form-one-label" style="color:rgba(30, 135, 75, 0.95); font-size:17px; font-family:'Broadway'" class="text-justify">Group part</h4>
		  </div>
		  <div class="modal-body">
			Hallo
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<button type="button" class="btn btn-primary">Save changes</button>
		  </div>
		</div>
	</div>
</div>	

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
