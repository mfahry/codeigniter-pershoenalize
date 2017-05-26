<?php	
$summary_price = 0;		
foreach($custom as $row1){
	foreach($row1 as $row2){
		foreach($row2 as $pattern_color){ 
			$temp = explode("|+|",$pattern_color); 
			$summary_price += $temp[1];
		}
	}
}
echo "Rp. ".$summary_price.",-";
?>