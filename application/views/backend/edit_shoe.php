 <script src="<?php echo base_url("assets/js/jquery.form.js")?>"></script> 
<script>  
	$(document).ready(function() { 
		//form-one submit with ajaxForm 
		var progressOne = $("#progess-bar-form-one");
		var progressOneSpan = $("#progess-bar-form-one span");	
		var optionsOne = { 
			beforeSend: function() {
				$("#success-form-one").hide();
				$("#failed-form-one").hide();
				progressOne.width("0%");
				progressOneSpan.html("0% Complete");
			},
			uploadProgress: function(event, position, total, percentComplete) {
				var progressOneValue = percentComplete + '%';
				progressOne.width(progressOneValue);
				progressOneSpan.html(progressOneValue+"% Complete");
			},
			success: function() {
				progressOne.width("0%");
				progressOneSpan.html("0% Complete");	
				$("#success-form-one").show();
				$("#form-one").clearForm();
				
				setInterval(function(){
					$("#modal-form-one").modal("hide");
					location.reload();
				}, 1000);
			},
			error: function() {
				progressOne.width("0%");
				progressOneSpan.html("0% Complete");
				$("#failed-form-one").show();
			}			
		}; 
		$('#form-one').ajaxForm(optionsOne);
	}); 
	
	
</script>

 <form action="<?php echo base_url("shoe/edit_process");?>" method="post" enctype="multipart/form-data" role="form" id="form-one">
	 <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title" id="modal-part-type-label" style="color:rgba(30, 135, 75, 0.95); font-size:17px; font-family:'Broadway'" class="text-justify">Shoe</h4>
	</div>
	<div class="modal-body bg-warning">
		<input type="hidden" name="shoe_id" value="<?php echo $shoe->shoe_id; ?>" />
		<input type="hidden" name="shoe_path_old" value="<?php echo $shoe->shoe_path; ?>" />
		<table>
			<tr>
				<td style="font-family:Candara; font-size:13px; padding:5px;">
					<img src="<?php echo base_url("uploads/shoe/".$shoe->shoe_path)?>" style="width:220px; height:180px;" class="img-thumbnail"/>
				</td>
				<td style="font-family:Candara; font-size:13px; padding:5px;">	
					<table style="width:100%; align:left;">
						<tr>
							<td style="font-family:Candara; font-size:13px; padding:5px;">Shoe name</td>
							<td style="font-family:Candara; font-size:13px; padding:5px;">
								<input type="text" name="shoe_name" maxLength="50" size="25" value="<?php echo $shoe->shoe_name; ?>" class="form-control" />
							</td>
						</tr>
						<tr>
							<td style="font-family:Candara; font-size:13px; padding:5px;">Sketch | Photo</td>
							<td style="font-family:Candara; font-size:13px; padding:5px;">
								<input type="file" name="shoe_path"/>
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
			<div id="progess-bar-form-one" class="progress-bar"  role="progressbar" style="width:0%">
				<span class="sr-only">0% Complete</span>
			</div>
		</div>
		<div id="success-form-one"class="alert alert-success text-center" style="font-family:'Bradley Hand ITC'; font-size:14px; display:none;"><b>Success !!!</b> Your group part are in products menu</div>
		<div id="failed-form-one" class="alert alert-danger text-center" style="font-family:'Bradley Hand ITC'; font-size:14px; display:none;"><b>Failed !!!</b> Please check your fill in</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-danger" onclick="modalDeleteOne('<?php echo base_url("shoe/delete?shoe_id=".$shoe->shoe_id)?>')")>Delete</button>
		<input type="submit" class="btn btn-success" value="Save Changes"/>
	</div>
</form>