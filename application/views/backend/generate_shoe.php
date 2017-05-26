<?php 
foreach($pattern_color->result() as $row){ ?>
	<img src="<?php echo base_url("uploads/pattern_color/".$row->pattern_color_path); ?>" style="position:absolute; left:100px; top:-40px;" />
<?php
} ?>