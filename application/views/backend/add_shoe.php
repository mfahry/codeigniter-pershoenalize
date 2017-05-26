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
		<form action="<?php echo base_url("shoe/add_process")?>" method="post" enctype="multipart/form-data" role="form" id="form-one">
			<table style="width:100%; align:left;">
				<tr>
					<td style="font-family:Candara; font-size:13px; padding:5px;">Shoe name</td>
					<td style="font-family:Candara; font-size:13px; padding:5px;">
						<input type="text" name="shoe_name" maxLength="50" class="form-control"/>
					</td>
				</tr>
				<tr>
					<td style="font-family:Candara; font-size:13px; padding:5px;">Sketch | Photo</td>
					<td style="font-family:Candara; font-size:13px; padding:5px;">
						<input type="file" name="shoe_path"/>
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
							<div id="progess-bar-form-one" class="progress-bar"  role="progressbar" style="width:0%">
								<span class="sr-only">0% Complete</span>
							</div>
						</div>
					</td>
				</tr>
			</table>
		</form>
	</fieldset>
	<div id="success-form-one"class="alert alert-success text-center" style="font-family:'Bradley Hand ITC'; font-size:14px; display:none;"><b>Success !!!</b> Your shoes are in products menu</div>
	<div id="failed-form-one" class="alert alert-danger text-center" style="font-family:'Bradley Hand ITC'; font-size:14px; display:none;"><b>Failed !!!</b> Please check shoes name and type photo</div>
</div>