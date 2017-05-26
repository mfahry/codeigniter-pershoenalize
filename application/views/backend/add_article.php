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
<script src="<?php echo base_url("assets/js/tinymce.dev.js")?>"></script>
<script src="<?php echo base_url("assets/js/table/plugin.dev.js")?>"></script>
<script src="<?php echo base_url("assets/js/paste/plugin.dev.js")?>"></script>
<script src="<?php echo base_url("assets/js/spellchecker/plugin.dev.js")?>"></script>
<script>
	tinymce.init({
		selector: "textarea#elm1",
		setup: function (editor) {
			editor.on('change', function () {
				tinymce.triggerSave();
			});
		},
		theme: "modern",
		plugins: [
			"advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
			"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
			"save table contextmenu directionality emoticons template textcolor paste textcolor colorpicker"
		],
		external_plugins: {
			//"moxiemanager": "/moxiemanager-php/plugin.js"
		},
		content_css: "css/development.css",
		add_unload_trigger: true,
		autosave_ask_before_unload: false,

		toolbar1: "newdocument | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
		toolbar2: "cut copy paste pastetext | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media help code | insertdatetime preview | forecolor backcolor",
		toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft | insertfile insertimage",
		menubar: false,
		toolbar_items_size: 'small',

		style_formats: [
			{title: 'Bold text', inline: 'b'},
			{title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
			{title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
			{title: 'Example 1', inline: 'span', classes: 'example1'},
			{title: 'Example 2', inline: 'span', classes: 'example2'},
			{title: 'Table styles'},
			{title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
		],

		templates: [
			{title: 'My template 1', description: 'Some fancy template 1', content: 'My html'},
			{title: 'My template 2', description: 'Some fancy template 2', url: 'development.html'}
		]
	});
</script>
<style>
*:focus {
	outline: 1px solid red !important;
}
</style>
<div class="row bg-warning" style="border-radius:10px; -webkit-border-radius:5px; -moz-border-radius:5px; border: 1px solid rgb(234, 234, 234); padding: 5px 25px;">
	<p style="color:rgba(30, 135, 75, 0.95); font-size:17px; font-family:'Broadway'" class="text-justify"><b>How to Use this form article : </b></p>
	<ul>
		<li style="font-family:Candara; font-size:13px; " class="text-justify" >Silahkan masukkan Article Title. Example: <em>Shoes Is Everything</em></li>
		<li style="font-family:Candara; font-size:13px; " class="text-justify">Silahkan pilih For Page (Publish Dalam Page) dan For Article (Related Dalam Article).</li>
		<li style="font-family:Candara; font-size:13px; " class="text-justify">Jika tidak ada Related Dalam Article maka pilih "- Select Related Article -".</li>
		<li style="font-family:Candara; font-size:13px; " class="text-justify">Silahkan isi overview dan content dari article.</li>
		<li style="font-family:Candara; font-size:13px; " class="text-justify">Silahkan upload thumbnail dari article.</li>
		<li style="font-family:Candara; font-size:13px; " class="text-justify">Klik Button <em>Submit</em></li>
	</ul>
	
	<fieldset>
		<legend style="color:rgba(30, 135, 75, 0.95); font-size:17px; font-family:'Broadway'">Form</legend>
		<form action="<?php echo base_url("article/add_process")?>" method="post" enctype="multipart/form-data" role="form" id="form-one">
			<table style="width:100%; align:left;">
				<tr>
					<td style="font-family:Candara; font-size:13px; padding:5px;">Article Title</td>
					<td style="font-family:Candara; font-size:13px; padding:5px;">
						<input type="text" name="article_title" maxLength="50" class="form-control"/>
					</td>
				</tr>
				<tr>
					<td style="font-family:Candara; font-size:13px; padding:5px;">For Page</td>
					<td style="font-family:Candara; font-size:13px; padding:5px;">
						<select name="for_page" maxLength="50" class="form-control">
							<option value="who_we_are">Who We Are</option>
							<option value="press">Press</option>
							<option value="campaign">Campaign</option>
						</select>
					</td>
				</tr>
				<tr>
					<td style="font-family:Candara; font-size:13px; padding:5px;">For Related Article</td>
					<td style="font-family:Candara; font-size:13px; padding:5px;">
						<select name="for_related" maxLength="50" class="form-control">
							<option value="0">- Select Related Article -</option>
							<?php 
								$sql=mysql_query("SELECT article_id,article_title FROM article ORDER BY article_id");
								while($data=mysql_fetch_array($sql)){
							?>
							<option value="<?php echo $data['article_id']; ?>"><?php echo $data['article_title']; ?></option>
							<?php
								}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td style="font-family:Candara; font-size:13px; padding:5px;">Overview</td>
					<td style="font-family:Candara; font-size:13px; padding:5px;">
						<textarea name="pendahuluan" maxLength="50" class="form-control"></textarea>
					</td>
				</tr>
				<tr>
					<td style="font-family:Candara; font-size:13px; padding:5px;">Content</td>
					<td style="font-family:Candara; font-size:13px; padding:5px;">
						<textarea id="elm1" name="content" maxLength="50" class="form-control" style="height:300px;"></textarea>
					</td>
				</tr>
				<tr>
					<td style="font-family:Candara; font-size:13px; padding:5px;">Thumbnail Article</td>
					<td style="font-family:Candara; font-size:13px; padding:5px;">
						<input type="file" name="thumbnail_path"/>
					</td>
				</tr>
				<tr>
					<td></td>
					<td style="font-family:Candara; font-size:13px; padding:5px;">
						<input type="submit" class="btn btn-success" value="Submit"/>
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
	<div id="success-form-one"class="alert alert-danger text-center" style="font-family:'Bradley Hand ITC'; font-size:14px; display:none;"><b>Failed !!!</b> Please Check Article Form And Type Thumbnail Photo</div>
	<div id="failed-form-one" class="alert alert-success text-center" style="font-family:'Bradley Hand ITC'; font-size:14px; display:none;"><b>Success !!!</b> Your Article Was Published !</div>
</div>