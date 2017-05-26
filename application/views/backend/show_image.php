<div class="col-xs-6" style="margin-bottom:20px;">
	<table>
		<?php 
		foreach($pattern_color->result() as $row){ ?>
			<tr>
				<td rowspan="5" style="font-family:Candara; font-size:13px; padding:0px 5px;">
					<img src="<?php echo base_url("uploads/pattern_color/".$row->pattern_color_path);?>" width="200" height="200" class="img-thumbnail"/> 
				</td>
				<td style="font-family:Candara; font-size:13px; padding:0px 5px;">Part</td>
				<td style="font-family:Candara; font-size:13px; padding:0px 5px;"> : </td>
				<td style="font-family:Candara; font-size:13px; padding:0px 5px;"><?php echo $row->part_name; ?></td>
			</tr>
			<tr>
				<td style="font-family:Candara; font-size:13px; padding:0px 5px;">Material</td>
				<td style="font-family:Candara; font-size:13px; padding:0px 5px;"> : </td>
				<td style="font-family:Candara; font-size:13px; padding:0px 5px;"><?php echo $row->material_name; ?></td>
			</tr>
			<tr>
				<td style="font-family:Candara; font-size:13px; padding:0px 5px;">Color</td>
				<td style="font-family:Candara; font-size:13px; padding:0px 5px;"> : </td>
				<td style="font-family:Candara; font-size:13px; padding:0px 5px;"><?php echo $row->color_name; ?></td>
			</tr>
			<tr>
				<td style="font-family:Candara; font-size:13px; padding:0px 5px;">Price</td>
				<td style="font-family:Candara; font-size:13px; padding:0px 5px;"> : </td>
				<td style="font-family:Candara; font-size:13px; padding:0px 5px;"><?php echo $row->pattern_color_price; ?></td>
			</tr>
			<tr>
				<td style="font-family:Candara; font-size:13px; padding:0px 5px;">Path</td>
				<td style="font-family:Candara; font-size:13px; padding:0px 5px;"> : </td>
				<td style="font-family:Candara; font-size:13px; padding:0px 5px;">uploads/pattern_color/<?php echo strtolower($row->pattern_color_path); ?></td>
			</tr>
		<?php
		} ?>
	</table>
</div>
