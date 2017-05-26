<script>
	function paging(startWith, limit, dataUrl){
		$("#transaction").hide();
		$("#transaction").load(dataUrl+"?start_with="+startWith+"&limit="+limit);
		$("#transaction").show(1000);
	}
	
	function modalFormOne(dataUrl){
		$("#modal-form-one .modal-content").load(dataUrl);
		$("#modal-form-one").modal();
	}
	
	function modalShowOne(dataUrl){
		$("#modal-form-one").modal("hide");
		$("#modal-show-one").modal();
		$("#modal-show-one img").attr("src",dataUrl);
	}
	
	function search(dataUrl){
		var orderNumber = $("#order_number").val();
		//alert(dataUrl+"/"+orderNumber);
		$("#transaction").hide();
		$("#transaction").load(dataUrl+"/"+orderNumber);
		$("#transaction").show(1000); 
	}
</script>
<div style="padding: 5px;">
	<table align="center">
		<tr>
			<td style="font-family:'Cambria'; font-size:12px; padding: 0 5px;">Search by Order Number</td>
			<td style="padding: 0 5px;">
				<input type="text"  name="order_number" class="form-control" style="font-family:'Cambria'; font-size:12px;" id="order_number" placeholder="without #"/>
			</td>
			<td style="font-family:'Cambria'; font-size:12px; padding:0 5px;">
				<button class="btn btn-success" onClick="search('<?php echo base_url("transaction/search_by_order_number")?>')">Search</button>
			</td>
		</tr>
	</table>
	</br>
	<table width="90%" align="center">
	<?php
	$i = 1; 
	foreach($transaction->result() as $row){ 
			$summary_price = 0; ?>
			<?php 
			if($i%2==1) { echo "<tr>";} ?>
				<td width="50%" style="padding:5px;" valign="top">
					<table width="90%" align="center" class="table table-hover table-bordered">		
							<tr>
								<td colspan="4" style="font-family:Candara; font-size:16px; padding:10px 10px; font-weight:bold; text-align:center;"> 
									<?php echo $row->customer_first_name." ".$row->customer_last_name; ?><br/>
									<b><?php echo $row->order_number; ?></b>
								</td>
							</tr>
							<tr>
								<td style="font-family:Candara; font-size:13px; padding:5px 5px; font-weight:bold; text-align:center;">Part</td>
								<td style="font-family:Candara; font-size:13px; padding:5px 5px; font-weight:bold; text-align:center;">Material</td>
								<td style="font-family:Candara; font-size:13px; padding:5px 5px; font-weight:bold; text-align:center;">Color</td>
								<td style="font-family:Candara; font-size:13px; padding:5px 5px; font-weight:bold; text-align:center;">Action</td>
							</tr>
							<?php
							foreach ($transaction_detail->result() as $row_transaction_detail){ 
								if($row->transaction_id == $row_transaction_detail->transaction_id){ ?>
									<tr>
										<td style="font-family:Candara; font-size:13px; padding:5px 5px;"><?php echo $row_transaction_detail->part_name;?></td>
										<td style="font-family:Candara; font-size:13px; padding:5px 5px;"><?php echo $row_transaction_detail->material_name;?></td>								
										<td style="font-family:Candara; font-size:13px; padding:5px 5px;"><?php echo $row_transaction_detail->color_name;?></td>
										<td style="font-family:Candara; font-size:13px; padding:5px 5px; text-align:center;">
											<a onclick="modalShowOne('<?php echo base_url("uploads/pattern_color/".$row_transaction_detail->pattern_color_path)?>')" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-zoom-in"></span> show</a>
										</td>
									</tr>
								<?php
									$summary_price += $row_transaction_detail->pattern_color_price;
								}
							} ?>
							<tr>
								<td colspan="2" align="right" style="padding:5px 5px; font-family:Candara; font-size:13px; font-weight:bold;">
									Price
								</td>
								<td colspan="2" align="left" style="padding:5px 5px; font-family:Candara; font-size:13px;">
									:  Rp. <?php echo ($summary_price * $row->quantity); ?>
								</td>
							</tr>
							<tr>
								<td colspan="2" align="right" style="padding:5px 5px; font-family:Candara; font-size:13px; font-weight:bold;">
									Size
								</td>
								<td colspan="2" align="left" style="padding:5px 5px; font-family:Candara; font-size:13px;">
									: <?php echo $row->size; ?>
								</td>
							</tr>
							<tr>
								<td colspan="2" align="right" style="padding:5px 5px; font-family:Candara; font-size:13px; font-weight:bold;">
									Qunatity
								</td>
								<td colspan="2" align="left" style="padding:5px 5px; font-family:Candara; font-size:13px;">
									: <?php echo $row->quantity; ?>
								</td>
							</tr>
							<tr>
								<td colspan="2" align="right" style="padding:5px 5px; font-family:Candara; font-size:13px; font-weight:bold;">
									Transaction Date
								</td>
								<td colspan="2" align="left" style="padding:5px 5px; font-family:Candara; font-size:13px;">
									: <?php echo $row->transaction_date; ?>
								</td>
							</tr>
							<tr>
								<td colspan="2" align="right" style="padding:5px 5px; font-family:Candara; font-size:13px; font-weight:bold;">
									Status Payment
								</td>
								<td colspan="2" align="left" style="padding:5px 5px; font-family:Candara; font-size:13px;">
									: <?php echo $row->payment_status; ?>
								</td>
							</tr>
							<tr>
								<td colspan="2" align="right" style="padding:5px 5px; font-family:Candara; font-size:13px; font-weight:bold;">
									Status Delivery
								</td>
								<td colspan="2" align="left" style="padding:5px 5px; font-family:Candara; font-size:13px;">
									: <?php echo $row->delivery_status; ?>
								</td>
							</tr>
							<tr>
								<td colspan="4" align="center" style="padding:5px 5px;">
									<a class="btn btn-success" onclick="modalFormOne('<?php echo base_url("transaction/edit/".$row->transaction_id)?>')"><span class="glyphicon glyphicon-pencil"></span> Edit</a> 
									<a class="btn btn-default" target="_blank" href="<?php echo base_url("transaction/generate_shoe?transaction_id=".$row->transaction_id) ?>"><span class="glyphicon glyphicon-search"></span> Shoe</a> 
								</td>
							</tr>
					</table>
				</td>	
			<?php 
			if($i%2==0) { echo "</tr>"; } 
			$i++; ?>	
	<?php
	} ?>
	</table>
</div>	
<ul class="pager">
	<?php
	if($count <= 10){}
	else if($start_with > 0 && ($start_with+10) < $count){ ?>
		<li class="previous" style="cursor:pointer;"><a onclick="paging('<?php echo ($start_with-10); ?>','10','<?php echo base_url("transaction/view_limit")?>')">&larr; Older</a></li>
		<li class="next" style="cursor:pointer;"><a onclick="paging('<?php echo ($start_with+10); ?>','10', '<?php echo base_url("transaction/view_limit")?>')">Newer &rarr;</a></li>
	<?php
	}
	else if($start_with == 0 && $count > 10){?>
		<li class="next" style="cursor:pointer;"><a onclick="paging('<?php echo ($start_with+10); ?>','10','<?php echo base_url("transaction/view_limit")?>')">Newer &rarr;</a></li>
	<?php
	} 
	else { ?>
		<li class="previous" style="cursor:pointer;"><a onclick="paging('<?php echo ($start_with-10); ?>','10','<?php echo base_url("transaction/view_limit")?>')">&larr; Older</a></li>
	<?php
	}?>
</ul>

<div class="modal fade bs-example-modal-lg" id="modal-form-one" tabindex="-1" role="dialog" aria-labelledby="modal-form-one-label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title" id="modal-form-one-label" style="color:rgba(30, 135, 75, 0.95); font-size:17px; font-family:'Broadway'" class="text-justify">Group part</h4>
		  </div>
		  <div class="modal-body">
			Hallo
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<button type="button" class="btn btn-primary">Save changes</button>
		  </div>
		</div>
	</div>
</div>	

<div class="modal fade bs-example-modal-lg" id="modal-show-one" tabindex="-1" role="dialog" aria-labelledby="modal-form-one-label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title" id="modal-show-one-label" style="color:rgba(30, 135, 75, 0.95); font-size:17px; font-family:'Broadway'" class="text-center">Part</h4>
		  </div>
		  <div class="modal-body">
			<img />
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  </div>
		</div>
	</div>
</div>	