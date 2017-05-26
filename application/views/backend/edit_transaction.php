 <script src="<?php echo base_url("assets/js/jquery.form.js")?>"></script> 
<script>  
	$(document).ready(function() { 
		//form-one submit with ajaxForm 
		var progressOne = $("#progess-bar-form-one");
		var progressOneSpan = $("#progess-bar-form-one span");	
		var optionsOne = { 
			beforeSend: function() {
				$("#success-form-one").hide();
				$("#failed-form-one").hide();
				progressOne.width("0%");
				progressOneSpan.html("0% Complete");
			},
			uploadProgress: function(event, position, total, percentComplete) {
				var progressOneValue = percentComplete + '%';
				progressOne.width(progressOneValue);
				progressOneSpan.html(progressOneValue+"% Complete");
			},
			success: function() {
				progressOne.width("0%");
				progressOneSpan.html("0% Complete");	
				$("#success-form-one").show();
				$("#form-one").clearForm();
				
				setInterval(function(){
					$("#modal-form-one").modal("hide");
					location.reload();
				}, 1000);
			},
			error: function() {
				progressOne.width("0%");
				progressOneSpan.html("0% Complete");
				$("#failed-form-one").show();
			}			
		}; 
		$('#form-one').ajaxForm(optionsOne);
	}); 
	
	
</script>

 <form action="<?php echo base_url("transaction/edit_process");?>" method="post" enctype="multipart/form-data" role="form" id="form-one">
	 <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title" id="modal-part-type-label" style="color:rgba(30, 135, 75, 0.95); font-size:17px; font-family:'Broadway'" class="text-justify">Shoe</h4>
	</div>
	<div class="modal-body bg-warning">
		<input type="hidden" name="transaction_id" value="<?php echo $transaction->transaction_id; ?>" />
		<input type="hidden" name="payment_status_old" value="<?php echo $transaction->payment_status; ?>" />
		<input type="hidden" name="delivery_status_old" value="<?php echo $transaction->delivery_status; ?>" />
		<input type="hidden" name="customer_email" value="<?php echo $transaction->customer_email; ?>" />
		<input type="hidden" name="order_number" value="<?php echo $transaction->order_number; ?>" />
		<table align="center">
			<tr>
				<td style="font-family:Cambria; font-size:12px; padding:5px;">Payment Status</td>
				<td style="font-family:Cambria; font-size:12px; padding:5px;"> : </td>
				<td style="padding:5px;">
					<select name="payment_status"  style="font-family:Cambria; font-size:12px;" class="form-control">
						<option value="NOT PAID">NOT PAID</option>
						<option value="PROCESS">PROCESS</option>
						<option value="PAID">PAID</option>
					</select>
				</td>
			</tr>
			<tr>
				<td style="font-family:Cambria; font-size:12px; padding:5px;">Delivery Status</td>
				<td style="font-family:Cambria; font-size:12px; padding:5px;"> : </td>
				<td style="padding:5px;">
					<select name="delivery_status"  style="font-family:Cambria; font-size:12px;"class="form-control">
						<option value="NOT SENT">NOT SENT</option>
						<option value="PROCESS">PROCESS</option>
						<option value="SENT"> SENT</option>
					</select>
				</td>
			</tr>	
		</table>
		<div class="progress progress-striped active">
			<div id="progess-bar-form-one" class="progress-bar"  role="progressbar" style="width:0%">
				<span class="sr-only">0% Complete</span>
			</div>
		</div>
		<div id="success-form-one"class="alert alert-success text-center" style="font-family:'Bradley Hand ITC'; font-size:14px; display:none;"><b>Success !!!</b> Your group part are in products menu</div>
		<div id="failed-form-one" class="alert alert-danger text-center" style="font-family:'Bradley Hand ITC'; font-size:14px; display:none;"><b>Failed !!!</b> Please check your fill in</div>
	</div>
	<div class="modal-footer">
		<input type="submit" class="btn btn-success" value="Save Changes"/>
	</div>
</form>