

<script>
	$(document).ready(function(){
		$(".everything-link").click(function(){
			$("#myModal .modal-title").html($(this).attr("title"));
			$("#myModal img").attr("src",$(this).attr("rel"));
		});
	});
</script>
<ul class="nav nav-tabs">
      <li class="active"><a href="<?php echo base_url("shoe/view")?>" style="padding-left:20px; padding-right:20px;">Shoes</a></li>
      <li class=""><a href="<?php echo base_url("part_type/view")?>" style="padding-left:20px; padding-right:20px;">Part Type</a></li>
	  <li class=""><a href="<?php echo base_url("part/view")?>" style="padding-left:20px; padding-right:20px;">Parts</a></li>
      <li class=""><a href="<?php echo base_url("material/view")?>" style="padding-left:20px; padding-right:20px;">Material Color</a></li>
	  <li class=""><a href="<?php echo base_url("color/view")?>" style="padding-left:20px; padding-right:20px;">Color</a></li>
	  <li class=""><a href="<?php echo base_url("material_color/view")?>" style="padding-left:20px; padding-right:20px;">Material Color</a></li>
	  <li class="active"><a href="<?php echo base_url("pattern_color/view")?>" style="padding-left:20px; padding-right:20px;">Pattern and Color</a></li>
</ul>
<div class="table-responsive">
	<table class="table table-hover table-bordered" width="100%">
		<thead>
			<tr class="bg-info">
				<th style="font-family:Britannic Bold;"><center>NO</center></th>
				<th style="font-family:Britannic Bold;"><center>PATTERN/COLOR NAME</center></th>
				<th style="font-family:Britannic Bold;"><center>PATTERN NAME</center></th>
				<th style="font-family:Britannic Bold;"><center>MATERIAL COLOR</center></th>
				<th style="font-family:Britannic Bold;"><center>PRICE</center></th>
				<th style="font-family:Britannic Bold;"><center>EXAMPLE</center></th>
				<th style="font-family:Britannic Bold;"><center>DEFAULT</center></th>	
				<th style="font-family:Britannic Bold;" colspan="2"><center>ACTION</center></th>
			</tr>
		</thead>
		<tbody>
			<?php
			if($pattern_color->num_rows() > 0)
			{
				$no = 1;
				foreach($pattern_color->result() as $row)
				{ ?>
					<tr class="<?php if($no%2 == 0) echo "success";?>" style="font-family:Candara;">
						<td align="center"><?php echo $no++; ?></td>
						<td><?php echo $row->pattern_color_name; ?></td>
						<td><?php echo $row->part_name; ?></td>
						<td align="center"><a href="#myModal" class="btn btn-info glyphicon glyphicon-search everything-link" data-toggle="modal" rel="<?php echo base_url("uploads/material_color/".$row->material_color_path); ?>" title="<?php echo $row->material_color_path; ?>"></a></td>
						<td><?php echo $row->pattern_color_price; ?></td>
						<td align="center"><a href="#myModal" class="btn btn-info glyphicon glyphicon-search everything-link" data-toggle="modal" rel="<?php echo base_url("uploads/pattern_color/".$row->pattern_color_path); ?>" title="<?php echo $row->pattern_color_name; ?>"></a></td>
						<td align="center">
							<?php 
							if($row->is_default == "1")
							{ ?>
								<a href="#"  class="btn btn-info glyphicon glyphicon-ok"></a>
							<?php
							} 
							else
							{ ?>
								<a href="#"  class="btn btn-info glyphicon glyphicon-minus"></a>
							<?php
							} ?>
						</td>
						<td align="center"><a href="<?php echo base_url("pattern_color/edit?pattern_color_id=".$row->pattern_color_id); ?>"  class="btn btn-info glyphicon glyphicon-pencil"></a></td>
						<td align="center"><a href="<?php echo base_url("pattern_color/delete?pattern_color_id=".$row->pattern_color_id); ?>" class="btn btn-info glyphicon glyphicon-remove"></a></td>
					</tr>	
				<?php
				}
			}	
			else
			{ ?>
				<tr>
					<td colspan="5" align="center"><i>empty data. please create new data </i></td>
				</tr>
			<?php
			} ?>
		</tbody>
	</table>
</div>

<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Image</h4>
      </div>
      <div class="modal-body">
        <img src="#" width="300" height="300" style="display:block; margin-left:auto; margin-right:auto; "/>
      </div>
      <div class="modal-footer">
        &copy; Pershoenalize.com
      </div>
    </div>
  </div>
</div>

