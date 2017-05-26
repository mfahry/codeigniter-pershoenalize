 <script src="<?php echo base_url("assets/js/jquery.form.js")?>"></script> 
<script>  
	$(document).ready(function() { 
		//form-two submit with ajaxForm 
		var progressTwo = $("#progess-bar-form-two");
		var progressTwoSpan = $("#progess-bar-form-two span");	
		var optionsTwo = { 
			beforeSend: function() {
				$("#success-form-two").hide();
				$("#failed-form-two").hide();
				progressTwo.width("0%");
				progressTwoSpan.html("0% Complete");
			},
			uploadProgress: function(event, position, total, percentComplete) {
				var progressTwoValue = percentComplete + '%';
				progressTwo.width(progressTwoValue);
				progressTwoSpan.html(progressTwoValue+"% Complete");
			},
			success: function() {
				progressTwo.width("0%");
				progressTwoSpan.html("0% Complete");	
				$("#success-form-two").show();
				$("#form-two").clearForm();
				
				setInterval(function(){
					$("#modal-form-one").modal("hide");
					location.reload();
				}, 1000);
			},
			error: function() {
				progressTwo.width("0%");
				progressTwoSpan.html("0% Complete");
				$("#failed-form-two").show();
			}			
		}; 
		$('#form-two').ajaxForm(optionsTwo);
	}); 
	
	
</script>

 <form action="<?php echo base_url("part_type/edit_process") ?>" method="post" enctype="multipart/form-data" role="form" id="form-two">
	 <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title" id="modal-part-type-label" style="color:rgba(30, 135, 75, 0.95); font-size:17px; font-family:'Broadway'" class="text-justify">Group part</h4>
	</div>
	<div class="modal-body bg-warning">
		<input type="hidden" value="<?php echo $part_type->part_type_id; ?>" name="part_type_id" />
		<input type="hidden" value="<?php echo $part_type->part_type_path; ?>" name="part_type_path_old" />
		<table>
			<tr>
				<td style="font-family:Candara; font-size:13px; padding:5px;">
					<img src="<?php echo base_url("uploads/part_type/".$part_type->part_type_path)?>" style="width:220px; height:180px;" class="img-thumbnail"/>
				</td>
				<td style="font-family:Candara; font-size:13px; padding:5px;">	
					<table style="width:100%; align:left;">
						<tr>
							<td style="font-family:Candara; font-size:13px; padding:5px;">Shoe name</td>
							<td style="font-family:Candara; font-size:13px; padding:5px;">
								<select name="shoe_id" class="form-control">
								<?php 
								foreach ($shoe->result() as $row){ 
									if($part_type->shoe_id == $row->shoe_id){ ?>
										<option value="<?php echo $row->shoe_id; ?>" selected="selected"><?php echo $row->shoe_name; ?></option>
									<?php
									}
									else{
									?>
										<option value="<?php echo $row->shoe_id; ?>"><?php echo $row->shoe_name; ?></option>
									<?php 
									}
								} ?>
								</select>
							</td>
						</tr>
						<tr>
							<td style="font-family:Candara; font-size:13px; padding:5px;">What is it ?</td>
							<td style="font-family:Candara; font-size:13px; padding:5px;">
								<select name="part_type_group_id" class="form-control">
								<?php 
								foreach($part_type_group->result() as $row)
								{ 
									if($part_type->part_type_group_id == $row->part_type_group_id)
									{ ?>
										<option value="<?php echo $row->part_type_group_id; ?>" selected ="selected"><?php echo $row->part_type_group_name; ?></option>
									<?php
									}
									else
									{ ?>
										<option value="<?php echo $row->part_type_group_id; ?>"><?php echo $row->part_type_group_name; ?></option>
									<?php
									}
									?>
								<?php
								} ?>
								</select>
							</td>
						</tr>
						<tr>
							<td style="font-family:Candara; font-size:13px; padding:5px;">Group part name</td>
							<td style="font-family:Candara; font-size:13px; padding:5px;">
								<input type="text" name="part_type_name" maxLength="50" class="form-control" value="<?php echo $part_type->part_type_name; ?>" />
							</td>
						</tr>
						<tr>
							<td style="font-family:Candara; font-size:13px; padding:5px;">Sketch | Photo</td>
							<td style="font-family:Candara; font-size:13px; padding:5px;">
								<input type="file" name="part_type_path"/>
							</td>
						</tr>
						<tr>
							<td style="font-family:Candara; font-size:13px; padding:5px;">Update sketch | photo</td>
							<td>
								<input type="radio" name="status_update_image" value="1"/> Yes
								<input type="radio" name="status_update_image" value="0" selected="selected"/> No
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<div class="progress progress-striped active">
			<div id="progess-bar-form-two" class="progress-bar"  role="progressbar" style="width:0%">
				<span class="sr-only">0% Complete</span>
			</div>
		</div>
		<div id="success-form-two"class="alert alert-success text-center" style="font-family:'Bradley Hand ITC'; font-size:14px; display:none;"><b>Success !!!</b> Your group part are in products menu</div>
		<div id="failed-form-two" class="alert alert-danger text-center" style="font-family:'Bradley Hand ITC'; font-size:14px; display:none;"><b>Failed !!!</b> Please check your fill in</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-danger" onclick="modalDeleteOne('<?php echo base_url("part_type/delete?part_type_id=".$part_type->part_type_id)?>')">Delete</button>
		<input type="submit" class="btn btn-success" value="Save Changes"/>
	</div>
</form>