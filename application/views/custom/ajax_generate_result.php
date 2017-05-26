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