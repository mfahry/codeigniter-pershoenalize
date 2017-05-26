<script>  
	$(document).ready(function() {	
		//tab menu
		$("#tab-add-products a").click(function(e){
			e.preventDefault();
			$(this).tab("show");
			var tabName = $(this).attr("href");
			var tabLink = $(this).attr("rel");
			if(tabName == "#shoes"){
				$("#shoes").load(tabLink);
				$("#group-parts").html("");
				$("#parts").html("");
				$("#sign").html("");
			}
			else if(tabName == "#group-parts"){
				$("#group-parts").load(tabLink);
				$("#shoes").html("");
				$("#parts").html("");
				$("#sign").html("");
			}
			else if(tabName == "#parts"){
				$("#parts").load(tabLink);
				$("#shoes").html("");
				$("#group-parts").html("");
				$("#sign").html("");
			}
			else if(tabName == "#sign"){
				$("#sign").load(tabLink);
				$("#shoes").html("");
				$("#group-parts").html("");
				$("#parts").html("");
			}
		});
		
		//default tab menu
		$("#shoes").load("<?php echo base_url("shoe/view_limit"); ?>");
	});
</script>

<ul id="tab-add-products" class="nav nav-tabs nav-justified">
	<li class="active"><a href="#shoes" rel="<?php echo base_url("shoe/view_limit"); ?>" style="font-family:'Bell Gothic Std Light'; font-size:25px; font-weight:bold;">Shoes</a></li>
	<li><a href="#group-parts" rel="<?php echo base_url("part_type/view_limit"); ?>" style="font-family:'Bell Gothic Std Light'; font-size:25px; font-weight:bold;">Group Parts</a></li>
	<li><a href="#parts" rel="<?php echo base_url("part/view_limit"); ?>" style="font-family:'Bell Gothic Std Light'; font-size:25px; font-weight:bold;">Parts</a></li>
	<li><a href="#sign" rel="<?php echo base_url("part_mapping/view_limit"); ?>" style="font-family:'Bell Gothic Std Light'; font-size:25px; font-weight:bold;">Signup Parts</a></li>
</ul>

<div id="tab-add-products-content" class="tab-content">
	<div id="shoes" class="tab-pane fade active in"> 
		
	</div>
	<div id="group-parts" class="tab-pane fade">
		
	</div>
	<div id="parts" class="tab-pane fade">
		
	</div>
	<div id="upload-parts" class="tab-pane fade">
	
	</div>
	<div id="sign" class="tab-pane fade">
	
	</div>
</div>



