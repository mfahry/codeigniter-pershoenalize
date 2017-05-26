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
	
	function setMaterialColor(materialColorId, materialColorName){
		$("#material_color_id").val(materialColorId);
		$("#msg-material-color").html(materialColorName);
		$('#modal-choose-material-color').modal('hide');

	}
	
</script>

 <form action="<?php echo base_url("pattern_color/edit_process");?>" method="post" enctype="multipart/form-data" role="form" id="form-two">
	 <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title" id="modal-part-type-label" style="color:rgba(30, 135, 75, 0.95); font-size:17px; font-family:'Broadway'" class="text-justify">Upload Part</h4>
	</div>
	<div class="modal-body bg-warning">
		<input type="hidden" name="pattern_color_id" value="<?php echo $pattern_color->pattern_color_id; ?>" />
		<input type="hidden" name="pattern_color_path_old" value="<?php echo $pattern_color->pattern_color_path; ?>" />
		<input type="hidden" name="material_color_id" id="material_color_id" value="<?php echo $pattern_color->material_color_id; ?>" />
		<table>
			<tr>
				<td style="font-family:Candara; font-size:13px; padding:5px;">
					<img src="<?php echo base_url("uploads/pattern_color/".$pattern_color->pattern_color_path)?>" style="width:220px; height:180px;" class="img-thumbnail"/>
				</td>
				<td style="font-family:Candara; font-size:13px; padding:5px;">	
					<table style="width:100%; align:left;">
						<tr>
							<td style="font-family:Candara; font-size:13px; padding:5px;">Part</td>
							<td style="font-family:Candara; font-size:13px; padding:5px;">
								<select name = "part_id" class="form-control">
									<option value="-">-</option>
									<?php 
									foreach( $part->result() as $row)
									{
										if($row->part_id == $pattern_color->part_id)
										{ ?>
											<option value="<?php echo $row->part_id; ?>" selected="selected"><?php echo $row->part_name; ?></option>
										<?php
										} 
										else
										{?>
											<option value="<?php echo $row->part_id; ?>"><?php echo $row->part_name; ?></option>
										<?php	
										}
									} ?>
								</select>
							</td>
						</tr>
						<tr>
							<td style="font-family:Candara; font-size:13px; padding:5px; width:200px;">Price</td>
							<td style="font-family:Candara; font-size:13px; padding:5px;">
								<div class="input-group">
									<span class="input-group-addon">Rp.</span>
									<input type="text" name="pattern_color_price" maxLength="50" size="25" class="form-control" value="<?php echo $pattern_color->pattern_color_price; ?>"/>
								</div>
							</td>
						</tr>
						<tr>
							<td style="font-family:Candara; font-size:13px; padding:5px; width:200px;">Material | Color</td>
							<td style="font-family:Candara; font-size:13px; padding:5px;">
								<a class="btn btn-warning" data-toggle="modal" data-target="#modal-choose-material-color"><span class="glyphicon glyphicon-pushpin"></span> Choose</a>
								&nbsp;<label class="text-warning" id="msg-material-color" style="font-family:'Bradley Hand ITC'; font-size:14px;"></label>
							</td>
						</tr>
						<tr>
							<td style="font-family:Candara; font-size:13px; padding:5px;">Sketch | Photo</td>
							<td style="font-family:Candara; font-size:13px; padding:5px;">
								<input type="file" name="pattern_color_path"/>
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
		<button type="button" class="btn btn-danger" onclick="modalDeleteOne('<?php echo base_url("pattern_color/delete?pattern_color_id=".$pattern_color->pattern_color_id)?>')">Delete</button>
		<input type="submit" class="btn btn-success" value="Save Changes"/>
	</div>
</form>

<div style="margin-top:-30px;" class="modal fade" id="modal-choose-material-color" tabindex="-1" role="dialog" aria-labelledby="modal-choose-material-color-label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title" id="modal-choose-material-color-label" style="color:rgba(30, 135, 75, 0.95); font-size:17px; font-family:'Broadway'" class="text-justify">Material Color</h4>
		  </div>
		  <div class="modal-body">
			<?php
			foreach($material->result() as $row_material){ ?>
				<div style="font-family:'Candara'; font-size:13px; font-weight:bold; margin-bottom:5px; letter-spacing:3px;"><?php echo $row_material->material_name; ?></div>
				<div class="row">
					<?php 
					foreach ($material_color->result() as $row){ 
						if($row_material->material_id == $row->material_id) {
						?>
						<div class="col-xs-2" style="margin:10px auto;">
							<a onclick="setMaterialColor('<?php echo $row->material_color_id; ?>','<?php echo $row->material_name." ".$row->color_name; ?>');">	
								<img src="<?php echo base_url("uploads/material_color/".$row->material_color_path)?>" width="50" height="50" class="img-thumbnail" style="cursor:pointer;"/>
							</a> 
						</div>
					<?php
						}
					} ?>
				</div>
			<?php
			} ?>
		  </div>
		</div>
	</div>
</div>