<ul id="tab-transaction" class="nav nav-tabs nav-justified">
	<li class="active"><a href="#transaction" rel="<?php echo base_url("transaction/view_limit"); ?>" style="font-family:'Bell Gothic Std Light'; font-size:25px; font-weight:bold;">Transaction</a></li>
</ul>

<div id="tab-add-products-content" class="tab-content">
	<div id="transaction" class="tab-pane fade active in"></div>
</div>

<script>  
	$(document).ready(function() {	
		$("#transaction").load("<?php echo base_url("transaction/view_limit"); ?>");
	});
</script>



