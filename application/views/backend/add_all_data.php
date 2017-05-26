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
				$("#upload-parts").html("");
				$("#signs").html("");
			}
			else if(tabName == "#group-parts"){
				$("#group-parts").load(tabLink);
				$("#shoes").html("");
				$("#parts").html("");
				$("#upload-parts").html("");
				$("#signs").html("");
			}
			else if(tabName == "#parts"){
				$("#parts").load(tabLink);
				$("#group-parts").html("");
				$("#shoes").html("");
				$("#upload-parts").html("");
				$("#signs").html("");
			}
			else if(tabName == "#upload-parts"){
				$("#upload-parts").load(tabLink);
				$("#group-parts").html("");
				$("#parts").html("");
				$("#shoes").html("");
				$("#signs").html("");
			}
			else if(tabName == "#signs"){
				$("#signs").load(tabLink);
				$("#group-parts").html("");
				$("#parts").html("");
				$("#shoes").html("");
				$("#upload-parts").html("");
			}
		});
		
		//default tab menu
		$("#shoes").load("<?php echo base_url("shoe/add"); ?>");
	});
</script>

<ul id="tab-add-products" class="nav nav-tabs nav-justified">
	<li class="active"><a href="#shoes" rel="<?php echo base_url("shoe/add"); ?>" style="font-family:'Bell Gothic Std Light'; font-size:25px; font-weight:bold;">Shoes</a></li>
	<li><a href="#group-parts" rel="<?php echo base_url("part_type/add"); ?>" style="font-family:'Bell Gothic Std Light'; font-size:25px; font-weight:bold;">Group Parts</a></li>
	<li><a href="#parts" rel="<?php echo base_url("part/add"); ?>" style="font-family:'Bell Gothic Std Light'; font-size:25px; font-weight:bold;">Parts</a></li>
	<li><a href="#upload-parts" rel="<?php echo base_url("pattern_color/add"); ?>" style="font-family:'Bell Gothic Std Light'; font-size:25px; font-weight:bold;">Upload Parts</a></li>
	<li><a href="#signs" rel="<?php echo base_url("part_mapping/add"); ?>" style="font-family:'Bell Gothic Std Light'; font-size:25px; font-weight:bold;">Signup Parts</a></li>
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
	<div id="signs" class="tab-pane fade">
	
	</div>
</div>



