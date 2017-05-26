<?php 
if($optional_css == "yes"){?>
	<style type="text/css">
	.item{
		padding: 0px 10px;
	}
	</style>
<?php 
} 
else{ ?>
	<style type="text/css">
	.item{
		padding: 0px 100px;
	}
	</style>
<?php 
} ?>
<div id="slider-pattern-color" class="carousel slide" data-ride="carousel" data-interval="false">
	<div class="carousel-inner">
	<?php
	$slide = 1;	
	foreach($material->result() as $row_material){
	?>
		<?php 
		if($slide==1){ ?>
			<div class="item active"> 
		<?php
		}
		else { ?>
			<div class="item"> 
		<?php
		} ?>
				<div style="font-family:'Candara'; font-size:13px; font-weight:bold; margin-bottom:5px; letter-spacing:3px;"><?php echo $row_material->material_name; ?></div>
				<div class="row">	
					<?php
					foreach($pattern_color->result() as $row){ 
						if($row_material->material_id == $row->material_id) {?>
							<div class="col-xs-2 text-center" style="margin-bottom:5px;">
								<a style="color:#000000;" onclick="generate('<?php echo $row->pattern_color_id?>', '<?php echo $row->part_id; ?>')">
									<img class="img img-thumbnail" src="<?php echo base_url("uploads/material_color/".$row->material_color_path)?>" style="width:40px; height:40px; data-toggle="tooltip" data-placement="bottom" title="<?php echo $row->material_name." - ".$row->color_name; ?>"/>
								</a>
							</div>
					<?php
						}
					} ?>
				</div>	
		</div>
	<?php
		$slide++;
	} ?>
	</div>
	<?php 
	if($slide > 2){
	?>
		<a class="carousel-control left" href="#slider-pattern-color" data-slide="prev" style="background-image:none;">
			<span class="glyphicon glyphicon-chevron-left"></span>
		</a>
		<a class="carousel-control right" href="#slider-pattern-color" data-slide="next" style="background-image:none;">
			<span class="glyphicon glyphicon-chevron-right"></span>
		</a>
	<?php 
	}
	?>
</div>

