<script src="<?php echo base_url("assets/js/jquery.form.js")?>"></script>
<script src="<?php echo base_url("assets/js/html2canvas.min.js")?>"></script>
<div class="row" style="padding:5px;">
	<div class="col-xs-8 col-xs-offset-2">
		<div>
			<div class="row" style="padding:5px 50px; display:none;" id="list-part-type">
			</div>
			<hr/>
			<div class="row">
				<div class="col-xs-8 col-xs-offset-2 text-center">
					<div id="list-part-type-group">
						<?php
						foreach($part_type_group->result() as $row){ ?>
							<a class="btn btn-danger" style="width: 100px; margin: 3px; font-family:'Book Antiqua'; font-size:11px; font-weight:bold;" onclick="changePartTypeGroup('<?php echo $shoe_id?>','<?php echo $row->part_type_group_id?>')">
								<?php echo strtoupper($row->part_type_group_name); ?>
							</a>
						<?php
						} ?>
					</div>
				</div>
			</div>
			<div class="row" style="padding:5px;">
				<div class="col-xs-6 col-xs-offset-3 text-center">
					<select name="part_id" class="form-control" id="list-part" onChange="changePart(this.value);" style="font-family:'Tekton Pro'; font-size:13px;">
						<option>- Choose Part -</option>
						<?php
						foreach($part as $key => $value){ ?>
							<?php if($value!= "None"){?>
							<option value="<?php echo $key?>"><?php echo $value?></option>
						<?php
						  }
						} ?>
					</select>
				</div>
			</div>
			<hr/>
			<div style="padding:5px; display:none;" id="list-pattern-color">
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-8 col-xs-offset-2 text-center" >
		<button style="font-size:12px; font-family:'Cambria';"  class="btn btn-default" onclick="capture()">Save Design</button>
		<div id="success-form-one"class="alert alert-success text-center" style="display:none;"><b>Success !!!</b> Your shoes are in products menu</div>
		<div id="failed-form-one" class="alert alert-danger text-center" style="display:none;"><b>Failed !!!</b> Please check shoes name and type photo</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-8 col-xs-offset-2 text-center" id="generate-result" style="height:450px; width:700px;">
		<?php 
		foreach($custom as $row1){
			foreach($row1 as $row2){
				foreach($row2 as $pattern_color){ 
					$temp = explode("|+|",$pattern_color); ?>
					<img src="<?php echo base_url("uploads/pattern_color/".$temp[2]); ?>" style="position:absolute; left:100px; top:0px;"/>
				<?php
				}
			}
		}
		?>
	</div>		
</div>


<div class="modal fade bs-example-modal-lg" id="modal-form-one" tabindex="-1" role="dialog" aria-labelledby="modal-form-one-label" aria-hidden="true">
	<div class="modal-dialog">
		<form action="<?php echo base_url("custom/save_design")?>" method="post" enctype="multipart/form-data">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="modal-form-one-label" style="color:rgba(30, 135, 75, 0.95); font-size:17px; font-family:'Broadway'" class="text-justify">Group part</h4>
			  </div>
			  <div class="modal-body">
				<table align="center">
					<tr>
						<td style="font-size:12px; font-family:'Cambria';  padding:5px;">Collection Name</td>
					</tr>
					<tr>
						<td style="padding:5px; ">
							<input type="hidden" name="shoe_id" value="<?php echo $shoe_id?>" />
							<input type="hidden" name="image_result" id="image_result" />
							<input type="text" name="collection_name" class="form-control" style="font-size:12px; font-family:'Cambria'; "/>
						</td>
					</tr>
					<tr>
						<td style="font-size:12px; font-family:'Cambria';  padding:5px;">Collection Description</td>
					</tr>
					<tr>
						<td  style="padding:5px; ">
							<textarea class="form-control" name="collection_description" style="font-size:12px; font-family:'Cambria';" cols="40" rows="7"></textarea>
						</td>
					</tr>
				</table>	
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<input type="submit" class="btn btn-success" value="Save changes"></button>
			  </div>
			</div>
		</form>	
	</div>
</div>

<script>
	function capture(){
		html2canvas($("#generate-result"), {
		onrendered: function(canvas) {
			$("#image_result").val(canvas.toDataURL("image/png"));
			$("#modal-form-one").modal();
		}
		});
	}
	
	function changePartTypeGroup(shoeId, partTypeGroupId){
		$.ajax({
			url: "<?php echo base_url("custom/search_part_type")?>",
			type: "POST",
			cache: false,
			data: "shoe_id="+shoeId+"&part_type_group_id="+partTypeGroupId,
			beforeSend: function(){
				$("#list-pattern-color").hide(1000);
				$("#list-pattern-color").html("");
				$("#list-part-type").hide(1000);
			}, 
			success: function(msg){
				$("#list-part-type").show(1000);
				$("#list-part-type").html(msg);
				
			},
			error: function(){
				alert("Error");
			}
		});
	}
	
	function generateUsePartType(partTypeId, partTypeGroupId){
		$.ajax({
			url: "<?php echo base_url("custom/generate_session_admin")?>",
			type: "POST",
			cache: false,
			data: "part_type_id="+partTypeId+"&part_type_group_id="+partTypeGroupId,
			beforeSend: function(){
				$("#generate-result").html('<img src="<?php echo base_url("assets/img/ajax-loader.gif")?>" />');
			},
			success: function(msg){
				$("#list-pattern-color").load('<?php echo base_url("custom/load_pattern_color_admin")?>');
				$("#list-part").load('<?php echo base_url("custom/load_part_admin")?>');
				$("#generate-result").load('<?php echo base_url("custom/load_generate_result_admin")?>');
				$("#price-result").load('<?php echo base_url("custom/load_price_result_admin")?>');
			},
			error: function(){
				alert("Error");
			}
		});	
	}
	
	function changePart(partId){
		$.ajax({
			url: "<?php echo base_url("custom/load_pattern_color_by_id")?>",
			type: "POST",
			cache: false,
			data: "part_id="+partId+"&optional_css=yes",
			beforeSend: function(){
				$("#list-pattern-color").hide(1000);
				$("#list-part-type").hide(1000);
				$("#list-part-type").html("");
			},
			success: function(msg){
				$("#list-pattern-color").show(1000);
				$("#list-pattern-color").html(msg);
			}
		});
	}
	
	function generate(patternColorId, partId){
		$.ajax({
			url: "<?php echo base_url("custom/generator_admin")?>",
			type: "POST",
			cache: false,
			data: "part_id="+partId+"&pattern_color_id="+patternColorId,
			beforeSend: function(){
				$("#generate-result").html('<img src="<?php echo base_url("assets/img/ajax-loader.gif")?>" />');
			},
			success: function(){
				$("#generate-result").load('<?php echo base_url("custom/load_generate_result_admin")?>');
				$("#price-result").load('<?php echo base_url("custom/load_price_result_admin")?>');
			}
		});
	}
</script>
