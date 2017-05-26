<script src="<?php echo base_url("assets/js/jquery.form.js")?>"></script> 
<script>  
	$(document).ready(function() { 
		//form-three submit with ajaxForm 
		var progressThree = $("#progess-bar-form-three");
		var progressThreeSpan = $("#progess-bar-form-three span");	
		var optionsThree = { 
			beforeSend: function() {
				$("#success-form-three").hide();
				$("#failed-form-three").hide();
				progressThree.width("0%");
				progressThreeSpan.html("0% Complete");
			},
			success: function() {
				progressThree.width("100%");
				progressThreeSpan.html("100% Complete");	
				$("#success-form-three").show();
				$("#form-three").clearForm();
				progressThree.width("0%");
				progressThreeSpan.html("0% Complete");	
			},
			error: function() {
				progressThree.width("0%");
				progressThreeSpan.html("0% Complete");
				$("#failed-form-three").show();
			}			
		}; 
		$('#form-three').ajaxForm(optionsThree);
	});

	function addInputPart(){
		$("#add-input-part").append("<input type='text' name='part_name[]' class='form-control' style='margin-top:5px; margin-bottom:5px;' />");
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
			<form action="<?php echo base_url("part/add_process")?>" method="post" enctype="multipart/form-data" role="form" id="form-three">
				<table style="width:100%; align:left;" id="table-form-part">
					<tr>
						<td style="font-family:Candara; font-size:13px; padding:5px; width:200px;" valign="top">Part name</td>
						<td style="font-family:Candara; font-size:13px; padding:5px;">
							<div id="add-input-part">
								<input type="text" class="form-control" name="part_name[]"/>
							</div>
							<a onclick="addInputPart();" class="btn btn-warning" style="margin-top: 5px;"><span class="glyphicon glyphicon-plus-sign"></span> input box</a>
						</td>
					</tr>
					<tr>
						<td style="font-family:Candara; font-size:13px; padding:5px; width:200px;">Category</td>
						<td style="font-family:Candara; font-size:13px; padding:5px;">
							<select name="part_group_id" class="form-control" id="part_group_id">
								<option value="-"> - </option>
								<?php 
								foreach($part_group->result() as $row){ ?>
									<option value="<?php echo $row->part_group_id; ?>"><?php echo $row->part_group_name;?></option>
								<?php
								} ?>
							</select>
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
								<div id="progess-bar-form-three" class="progress-bar"  role="progressbar" style="width:0%">
									<span class="sr-only">0% Complete</span>
								</div>
							</div>
						</td>
					</tr>
				</table>
			</form>
	</fieldset>
	<div id="success-form-three"class="alert alert-success text-center" style="font-family:'Bradley Hand ITC'; font-size:14px; display:none;"><b>Success !!!</b> Your group part are in products menu</div>
	<div id="failed-form-three" class="alert alert-danger text-center" style="font-family:'Bradley Hand ITC'; font-size:14px; display:none;"><b>Failed !!!</b> Please check your fill in</div>
</div>

