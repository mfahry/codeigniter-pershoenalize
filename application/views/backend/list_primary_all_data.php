<script>  
	$(document).ready(function() {	
		//tab menu
		$("#tab-add-products a").click(function(e){
			e.preventDefault();
			$(this).tab("show");
			var tabName = $(this).attr("href");
			var tabLink = $(this).attr("rel");
			if(tabName == "#materials"){
				$("#materials").load(tabLink);
				$("#colors").html("");
				$("#fusion").html("");
			}
			else if(tabName == "#colors"){
				$("#colors").load(tabLink);
				$("#materials").html("");
				$("#fusion").html("");
			}
			else if(tabName == "#fusion"){
				$("#fusion").load(tabLink);
				$("#colors").html("");
				$("#materials").html("");
			}
		});
		
		//default tab menu
		$("#materials").load("<?php echo base_url("material/view"); ?>");
	});
</script>

<ul id="tab-add-products" class="nav nav-tabs nav-justified">
	<li class="active"><a href="#materials" rel="<?php echo base_url("material/view"); ?>" style="font-family:'Bell Gothic Std Light'; font-size:25px; font-weight:bold;">Materials</a></li>
	<li><a href="#colors" rel="<?php echo base_url("color/view"); ?>" style="font-family:'Bell Gothic Std Light'; font-size:25px; font-weight:bold;">Colors</a></li>
	<li><a href="#fusion" rel="<?php echo base_url("material_color/view"); ?>" style="font-family:'Bell Gothic Std Light'; font-size:25px; font-weight:bold;">Fusion</a></li>
</ul>

<div id="tab-add-products-content" class="tab-content">
	<div id="materials" class="tab-pane fade active in">
		
	</div>
	<div id="colors" class="tab-pane fade">
		
	</div>
	<div id="fusion" class="tab-pane fade">
	</div>
</div>



