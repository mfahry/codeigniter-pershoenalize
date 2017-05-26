<div id="generate-result-<?php echo $item; ?>" style="height:550px; width:550px; ">
<?php
foreach($custom as $row1){
	foreach($row1 as $row2){
		foreach($row2 as $pattern_color){ 
			$temp = explode("|+|",$pattern_color); ?>
			<img src="<?php echo base_url("uploads/pattern_color/".$temp[2]); ?>" style="position:absolute;"/>
		<?php
		}
	}
}
?>
</div>
<div  id="image-resize-<?php echo $item; ?>"  style="width:150px; height:150px;">
		<img src="" style="width:150px; height:150px;" class="img-thumbnail"/>
</div>
<script type="text/javascript">
	html2canvas($("#generate-result-<?php echo $item; ?>"), {
		onrendered: function(canvas) {
			$("#generate-result-<?php echo $item; ?>").remove();
			$("#image-resize-<?php echo $item; ?> img").attr("src",canvas.toDataURL("image/png"));
		}
	});
</script>	
	