<!DOCTYPE html>
<html lang="en">
	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <!-- Change the description -->
        <meta name="description" content="Baze is a front-end starter template">
        <!-- Change the project name -->
        <meta name="copyright" content="2013 [project name]. All rights reserved.">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Enable this instead for responsive website --> <!--
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1"> -->
        

        <!-- Apple meta tag -->
        <!-- Enable these two meta tag if building web app --> <!--
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black"> -->
        <meta name="format-detection" content="telephone=no">
		
		<meta name="viewport" content="width=device-width, target-densitydpi=device-dpi, initial-scale=0, maximum-scale=1, user-scalable=yes" />
		
		<script type="text/javascript">
		$(function(){
		if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
		  var ww = ( $(window).width() < window.screen.width ) ? $(window).width() : window.screen.width; //get proper width
		  var mw = 480; // min width of site
		  var ratio =  ww / mw; //calculate ratio
		  if( ww < mw){ //smaller than minimum size
		   $('#Viewport').attr('content', 'initial-scale=' + ratio + ', maximum-scale=' + ratio + ', minimum-scale=' + ratio + ', user-scalable=yes, width=' + ww);
		  }else{ //regular size
		   $('#Viewport').attr('content', 'initial-scale=1.0, maximum-scale=2, minimum-scale=1.0, user-scalable=yes, width=' + ww);
		  }
		}
		});
		</script>

        <!-- Change the title -->
        <title>Pershoenalize</title>
        
        <link rel="stylesheet" href="<?php echo base_url("assets/css/normalize.css")?>">
        <link rel="stylesheet" href="<?php echo base_url("assets/css/main.css")?>">
		<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap-theme.min.css")?>">
        <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css")?>">
		
        <link rel="icon" type="image/png" href="<?php echo base_url("assets/img/favicon.png")?>">
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url("assets/img/apple-icon.png")?>" size="152x152">

		<script src="<?php echo base_url("assets/js/jquery.js")?>"></script> 
        <script src="<?php echo base_url("assets/js/vendor/modernizr.js")?>"></script>
		<script src="<?php echo base_url("assets/js/html2canvas.min.js")?>"></script>

		<style>
			p{color: #585858;}
			
			.logo a{color:#000000;}
 
			.logo a:hover{color:#000000;text-decoration:none;}
		</style>
	</head>
	<body>
		<div class="container">
			<h2 align="center" style="font-family:Century Gothic;color:#000000; letter-spacing:10px;" class="logo"><a href="<?php echo base_url("welcome/index")?>">pershoenalize</a></h2>
				<div align="center">
					<nav class="nav-main">
						<ul style="font-family:AG_Futura;color:#000000;">
							<li><a href="<?php echo base_url("welcome/howitworks")?>">HOW IT WORKS</a></li>
							<li><a href="<?php echo base_url("welcome/generator")?>">START DESIGNING</a></li>
							<li><a href="<?php echo base_url("welcome/inspireme")?>">INSPIRE ME</a></li>
							<li>
								<div class="dropdown">
									<a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#">
										ARTICLES <span class="caret"></span>
									</a>
									<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
										<a href="<?php echo base_url("welcome/whoweare")?>" class="article">WHO WE ARE</a>								  								  
									</ul>
								</div>
							</li>
							<li><a href="<?php echo base_url("welcome/press")?>">PRESS</a></li>
							<li><a href="<?php echo base_url("welcome/campaign")?>">CAMPAIGN</a></li>
                            <li><a href="<?php echo base_url("custom/confirmation")?>">PAYMENT VERIVICATION</a></li>
						</ul>
					</nav>
               </div>
		</div>
		<br/>
		<form action= "<?php echo base_url("custom/checkout")?>" method="post">
			<div class="row" style="padding:10px; background-color: #EAEAEA;width:960px;margin-left:195px;">
				<div class="col-xs-2 text-right">
					<a href="<?php echo base_url("welcome/generator")?>" class="btn btn-warning" style="font-family:'Cambria'; font-size:12px; font-weight:bold;">KEEP SHOPPING</a>
				</div>
			</div>
			<div class="row" >
				<div class="col-xs-6 col-xs-offset-3">
					<table class="table table-striped" align="center" >
						<thead>
							<tr>
								<th style="font-family:'Cambria'; font-size:12px; font-weight:bold; text-align:center;" >PRODUCT</th>
								<th style="font-family:'Cambria'; font-size:12px; font-weight:bold; text-align:center;">SIZE</th>
								<th style="font-family:'Cambria'; font-size:12px; font-weight:bold; text-align:center;">QTY</th>
								<th style="font-family:'Cambria'; font-size:12px; font-weight:bold; text-align:center;">TOTAL</th>
								<th style="font-family:'Cambria'; font-size:12px; font-weight:bold; text-align:center;"></th>
							</tr>
						</thead>
						<?php
						$total_price = 0;
						for($i =0; $i< count($cart); $i++){ ?>
								
										<tr>
											<td style="font-family:Cambria; font-size:12px; width:150px; height:150px;" >
												<div id="image-canvas-<?php echo $i;?>" >
													<img src="<?php echo base_url("assets/img/ajax-loader.gif");?>" style="width:100px; height:100px; vertical-align:middle; text-align:center; margin-bottom:5px;" />
												</div>
												<center><?php echo $shoe_name[$i]; ?></center>
											</td>
											<td style="font-family:Cambria; font-size:12px; text-align:center;" valign="top"><?php echo $size[$i]; ?></td>
											<td style="font-family:Cambria; font-size:12px; text-align:center;" valign="top">
												<select name="quantity[]" onChange="calculatePrice(this.value, '<?php echo $i; ?>')" >
												<?php 
													for($x=1; $x<=10;$x++){ ?>
														<option value="<?php echo $x;?>"><?php echo $x; ?></option>
													<?php
													}
												?>
												</select>
											</td>
											<td style="font-family:Cambria; font-size:12px; text-align:center;"  valign="top" id="price-view-<?php echo $i;?>">
													<?php 
													$summary_price = 0;	
													$custom = $cart[$i];		
													foreach($custom as $row1){
														foreach($row1 as $row2){
															foreach($row2 as $pattern_color){ 
																$temp = explode("|+|",$pattern_color); 
																$summary_price += $temp[1];
															}
														}
													}
													$total_price += $summary_price;
													echo "<b>Rp. ".$summary_price.",-</b>";
													?>
													
											</td>
											<td >
												<input type="hidden" name="price-<?php echo $i; ?>"  id="price-<?php echo $i; ?>"  value="<?php echo $summary_price?>" />
												<input type="hidden" name="price-multiple-<?php echo $i; ?>"  id="price-multiple-<?php echo $i; ?>"  value="<?php echo $summary_price?>" />
												<a class="btn btn-danger" href="<?php echo base_url("custom/drop_cart?item=".$i)?>"  style="font-family:'Cambria'; font-size:12px; font-weight:bold;"><span class="glyphicon glyphicon-trash"></span></a>
											</td>
										</tr>
						<?php
						} ?>	
						<tfoot>
							<tr class="bg-success">
								<td  style="font-family:Cambria; font-size:12px; font-weight:bold; text-align:right;" colspan="3"> TOTAL HARGA</td>
								<td style="font-family:Cambria; font-size:12px; font-weight:bold; text-align:center;" id="total-price"><?php echo "<b>Rp. ".$total_price.",-</b>"; ?></td>
								<td></td>
							</tr>
						</tfoot>
					</table>
					<div class="text-right"><a class="btn btn-success" style="font-family:'Cambria'; font-size:12px; font-weight:bold;" onclick="showShippingPayment('<?php echo $customer_id?>', 'shipping')">CONTINUE</a></div>
					<br/>
					<table class="table table-striped" align="center"  id="shipping" style="display:none;">
						<tr class="bg-success">
							<td style="font-family:Cambria; font-size:12px; font-weight:bold;"  colspan="2">SHIPPING ADDRESS</td>
						</tr>
						<tr>
							<td style="font-family:Cambria; font-size:12px;">Deliver Name</td>
							<td style="font-family:Cambria; font-size:12px;"><input type="text" class="form-control" name="deliver_name"/></td>
						</tr>
						<tr>
							<td style="font-family:Cambria; font-size:12px;">Address</td>
							<td style="font-family:Cambria; font-size:12px;">
								<textarea name="deliver_address" class="form-control"></textarea>
							</td>
						</tr>
						<tr>
							<td style="font-family:Cambria; font-size:12px;">Province</td>
							<td style="font-family:Cambria; font-size:12px;">
								<select name="province_id" class="form-control">
									<?php 
									foreach($province->result() as $row){ ?>
											<option value="<?php echo $row->province_id;?>"><?php echo $row->province_name;?></option>
									<?php
									}?>
								</select>
							</td>
						</tr>
						<tr>
							<td style="font-family:Cambria; font-size:12px;">City</td>
							<td style="font-family:Cambria; font-size:12px;"><input type="text" class="form-control" name="deliver_city"/></td>
						</tr>
						<tr>
							<td style="font-family:Cambria; font-size:12px;">Postal Code</td>
							<td style="font-family:Cambria; font-size:12px;"><input type="text" name="deliver_zipcode" size="10"/></td>
						</tr>
						<tr>
							<td style="font-family:Cambria; font-size:12px;">Telephone</td>
							<td style="font-family:Cambria; font-size:12px;"><input type="text" class="form-control" name="deliver_telephone"/></td>
						</tr>
					</table>
					<div class="text-right" id="btn-shipping" style="display:none;"><a class="btn btn-success" style="font-family:'Cambria'; font-size:12px; font-weight:bold;" onclick="showShippingPayment('<?php echo $customer_id?>', 'payment')">CONTINUE</a></div>
					<br/>
					<table class="table table-striped" align="center" id="payment" style="display:none;">
						<tr class="bg-success">
							<td style="font-family:Cambria; font-size:12px; font-weight:bold;">PAYMENT METHOD</td>
						</tr>
						<!--<tr>
							<td style="font-family:Cambria; font-size:12px; ">
								<input type="radio" name="bank_account" value="BNI"/>
								<img src="<?php echo base_url("assets/img/bni.png")?>" style="width:70px; height:25px;"/> Transfer BNI (Bank Negara Indonesia)
							</td>
						</tr>
						<tr>	
							<td style="font-family:Cambria; font-size:12px; ">
								<input type="radio" name="bank_account"  value="BCA"/>
								<img src="<?php echo base_url("assets/img/bca.png")?>" style="width:70px; height:25px;"/> Transfer BCA (Bank Central Asia)
							</td>
						</tr>
						<tr>		
							<td style="font-family:Cambria; font-size:12px; ">
								<input type="radio" name="bank_account" value="BRI"/>
								<img src="<?php echo base_url("assets/img/bri.jpg")?>" style="width:100px; height:25px;"/> Transfer BRI (Bank Rakyat Indonesia)
							</td>
						</tr>
						<tr>		
							<td style="font-family:Cambria; font-size:12px; ">
								<input type="radio" name="bank_account" value="DANAMON"/>
								<img src="<?php echo base_url("assets/img/danamon.gif")?>" style="width:70px; height:25px;"/> Transfer Bank Danamon
							</td>
						</tr> -->
						<tr>		
							<td style="font-family:Cambria; font-size:12px; ">
								<input type="radio" name="bank_account" value="MANDIRI"/>
								<img src="<?php echo base_url("assets/img/mandiri.png")?>" style="width:70px; height:25px;"/> Transfer Bank Mandiri
							</td>
						</tr>
						<tr>
							<td align="center">
								<input type="submit" class="btn btn-warning btn-lg" style="font-family:'Cambria'; font-size:12px; font-weight:bold;"  value="PROCESS CHECKOUT" />
							</td>
						</tr>
					</table>	
				</div>
			</div>
			<br/>		
			</form>	
			<div class="container">	
			<nav class="main">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="col-xs-2">
							<h4><b>QUESTIONS</b></h4>
							<a href="#" class="product-grid"><p>Pricing</p></a>
							<a href="#" class="product-grid"><p>Services</p></a>
							<a href="#" class="product-grid"><p>Returns</p></a>
							<a href="#" class="product-grid"><p>Shipping</p></a>
						</div>
						<div class="col-xs-2">
							<h4><b>GET STARTED</b></h4>
							<a href="#" class="product-grid"><p>Start Designing</p></a>
							<a href="#" class="product-grid"><p>Insipiring Collections</p></a>
							<a href="#" class="product-grid"><p>How It Works</p></a>
						</div>
						<div class="col-xs-2">
							<h4><b>ABOUT</b></h4>
							<a href="#" class="product-grid"><p>Who We Are</p></a>
							<a href="#" class="product-grid"><p>Team</p></a>
						</div>
						<div class="col-xs-2">
							<b><h4>ACCOUNT</b></h4>
							<a href="#" class="product-grid"><p>Login</p></a>
							<a href="#" class="product-grid"><p>Sign Up</p></a>
						</div>
						<div class="col-xs-4">
							<b><h4>SUBSCRIBE</b></h4>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="your@email.com">
								<span class="input-group-btn">
									<button class="btn btn-default" type="button">SUBSCRIPE</button>
								</span>
							</div>
						</div>
					</div>
				</div>
			</nav>
			<hr></hr>
		</div>
		<div class="footer">
			<p align="center">Copyright &copy; Pershoenalize 2014 Reserved</p>
		</div>	
		<script>
			var i ;
			$(document).ready(function(){
				for(i = 0; i < <?php echo count($cart);?>; i++){
					$("#image-canvas-"+i).load('<?php echo base_url("custom/image_canvas")?>?item='+i);	
				}
			});
			
			function calculatePrice(qty, index){
				var price = $("#price-"+index).val();
				var result = parseInt(qty) * parseInt(price);
				$("#price-multiple-"+index).val(result);
				$("#price-view-"+index).html("<b>Rp. "+ result + "</b>");
				
				var totalPrice = 0;
				for(var y = 0;  y< <?php echo count($cart)?>; y++){
					var temp = $("#price-multiple-"+y).val();
					totalPrice = parseInt(totalPrice) + parseInt(temp);
				}
				$("#total-price").html("<b>Rp. "+ totalPrice + "</b>");
			}
			
			function showShippingPayment(customerId, typeForm){
				if(customerId == ""){
					window.location = "<?php echo base_url("user/login_member")?>";
				}
				else{
					if(typeForm == "shipping"){
						$("#"+typeForm).show();
						$("#btn-"+typeForm).show();
					}
					else if(typeForm == "payment"){
						$("#"+typeForm).show();
						$("#process-checkout").show();
					}
					
				}
			}
		</script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo base_url("assets/js/vendor/jquery-1.10.2.min.js")?>"><\/script>')</script>
        <script src="<?php echo base_url("assets/js/vendor/fastclick.js")?>"></script>
        <script src="<?php echo base_url("assets/js/bootstrap.min.js")?>"></script>
        <script src="<?php echo base_url("assets/js/main.js")?>"></script>
  </body>
</html>

