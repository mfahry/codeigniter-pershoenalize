<script src="<?php echo base_url("assets/js/jquery.form.js")?>"></script> 
<script>  
	$(document).ready(function() { 
		//form-four submit with ajaxForm 
		var progressFour = $("#progess-bar-form-four");
		var progressFourSpan = $("#progess-bar-form-four span");	
		var optionsFour = { 
			beforeSend: function() {
				$("#success-form-four").hide();
				$("#failed-form-four").hide();
				progressFour.width("0%");
				progressFourSpan.html("0% Complete");
			},
			uploadProgress: function(event, position, total, percentComplete) {
				var progressFourValue = percentComplete + '%';
				progressFour.width(progressFourValue);
				progressFourSpan.html(progressFourValue+"% Complete");
			},
			success: function(msg) {
				progressFour.width("100%");
				progressFourSpan.html("100% Complete");	
				$("#success-form-four").show();
				$("#form-four").clearForm();
				progressFour.width("0%");
				progressFourSpan.html("0% Complete");	
				
				$("#result-add").append(msg);
			},
			error: function() {
				progressFour.width("0%");
				progressFourSpan.html("0% Complete");
				$("#failed-form-four").show();
			}			
		}; 
		$('#form-four').ajaxForm(optionsFour);
	});

	function searchTypePart(dataUrl){
		var shoeId = $("#shoe_id").val();
		var partTypeGroupId = $("#part_type_group_id").val();
		$.ajax({
			url: dataUrl,
			type: "POST",
			cache: false,
			data: "shoe_id="+shoeId+"&part_type_group_id="+partTypeGroupId,
			beforeSend: function(){
				$("#table-form-upload-part-one").hide();
			},
			success: function(msg){
				$("#part_type_id").html(msg);
				$("#table-form-upload-part-one").show(1000);	
			},
			error: function(msg){
				$("#msg-error-search").html(msg);
			}
		})
	}

	function searchPart(partGroupId, dataUrl){
		$.ajax({
			url: dataUrl,
			type: "POST",
			cache: false,
			data: "part_group_id="+partGroupId,
			beforeSend: function(){
				$("#table-form-upload-part-two").hide();
			},
			success: function(msg){
				$("#part_id").html(msg);
				$("#table-form-upload-part-two").show(1000);	
			},
			error: function(msg){
				$("#msg-error-search").html(msg);
			}
		});
	}	
	
	function setMaterialColor(materialColorId, materialColorName){
		$("#material_color_id").val(materialColorId);
		$("#msg-material-color").html(materialColorName);
		$('#modal-choose-material-color').modal('hide');

	}
</script>

<div class="row bg-warning" style="border-radius:10px; -webkit-border-radius:5px; -moz-border-radius:5px; border: 1px solid rgb(234, 234, 234); padding: 5px 25px;">
	<p style="color:rgba(30, 135, 75, 0.95); font-size:17px; font-family:'Broadway'" class="text-justify"><b>How to Use this form product : </b></p>
	<ul>
		<li style="font-family:Candara; font-size:13px; " class="text-justify" >Silahkan masukkan nama shoes. Example: <em>Flate Shoes</em></li>
		<li style="font-family:Candara; font-size:13px; " class="text-justify">Silahkan upload contoh ataupun pattern sepatu.</li>
		<li style="font-family:Candara; font-size:13px; " class="text-justify">Klik Button <em>Process</em></li>
		<li style="font-family:Candara; font-size:13px; " class="text-justify">Silahkan masukkan info untuk part shoes yang dapat di customize.</li>
		<li style="font-family:Candara; font-size:13px; " class="text-justify">Silahkan masukkan info untuk color atau pattern dari part yang dapat di customize. Required: <em>Nama dan gambar dari color atau pattern customize</em></li>
	</ul>
	
	<fieldset>
		<legend style="color:rgba(30, 135, 75, 0.95); font-size:17px; font-family:'Broadway'">Form</legend>
			
	
			<table style="width:100%; align:left;" id="table-form-upload-part-one">
				<tr>
					<td style="font-family:Candara; font-size:13px; padding:5px; width:200px;">Category</td>
					<td style="font-family:Candara; font-size:13px; padding:5px;">
						<select name="part_type_id" class="form-control" id="part_type_id" onchange="searchPart(this.value, '<?php echo base_url("part/view_filter")?>')">
							<option value="-"> - </option>
							<?php 
							foreach($part_group->result() as $row){ ?>
								<option value="<?php echo $row->part_group_id; ?>"><?php echo $row->part_group_name;?></option>
							<?php
							} ?>
						</select>
					</td>
				</tr>
			</table>
			<hr/>
			<form action="<?php echo base_url("pattern_color/add_process")?>" method="post" enctype="multipart/form-data" role="form" id="form-four">
				<input type="hidden" name="material_color_id" value="" id="material_color_id"/>
				<table style="width:100%; align:left; display:none;" id="table-form-upload-part-two">
					<tr>
						<td style="font-family:Candara; font-size:13px; padding:5px; width:200px;">Part name</td>
						<td style="font-family:Candara; font-size:13px; padding:5px;">
							<select name="part_id" class="form-control" id="part_id">
								<option value="-">-</option>
							</select>
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
						<td style="font-family:Candara; font-size:13px; padding:5px; width:200px;">Price</td>
						<td style="font-family:Candara; font-size:13px; padding:5px;">
							<div class="input-group">
								<span class="input-group-addon">Rp.</span>
								<input type="text" name="pattern_color_price" maxLength="50" size="25" class="form-control"/>
							</div>
						</td>
					</tr>
					<tr>
						<td style="font-family:Candara; font-size:13px; padding:5px; width:200px;">Sketch | Photo</td>
						<td style="font-family:Candara; font-size:13px; padding:5px;">
							<input type="file" name="pattern_color_path" id="pattern_color_path"/>
						</td>
					</tr>
					<tr>
						<td></td>
						<td style="font-family:Candara; font-size:13px; padding:5px;">
							<input type="submit" class="btn btn-success" value="Process"/>
							<input type="reset" class="btn btn-danger" value="Reset"/>
						</td>
					</tr>
					<tr>
						<td colspan ="2" style="font-family:Candara; font-size:13px; padding:5px;">
							<div class="progress progress-striped active">
								<div id="progess-bar-form-four" class="progress-bar"  role="progressbar" style="width:0%">
									<span class="sr-only">0% Complete</span>
								</div>
							</div>
						</td>
					</tr>
				</table>
			</form>
	</fieldset>
	<div id="success-form-four"class="alert alert-success text-center" style="font-family:'Bradley Hand ITC'; font-size:14px; display:none;"><b>Success !!!</b> Your group part are in products menu</div>
	<div id="failed-form-four" class="alert alert-danger text-center" style="font-family:'Bradley Hand ITC'; font-size:14px; display:none;"><b>Failed !!!</b> Please check your fill in</div>
</div>


<div class="row bg-warning" style="border-radius:10px; -webkit-border-radius:5px; -moz-border-radius:5px; border: 1px solid rgb(234, 234, 234); padding: 5px 25px; margin-top:10px;">
	<h4 style="color:rgba(30, 135, 75, 0.95); font-size:17px; font-family:'Broadway'"  class="text-center">Uploaded Result</h4>	
	<hr/>
	<div id="result-add" class="row" style="padding:10px;"></div>
</div>

<div class="modal fade" id="modal-choose-material-color" tabindex="-1" role="dialog" aria-labelledby="modal-choose-material-color-label" aria-hidden="true">
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
