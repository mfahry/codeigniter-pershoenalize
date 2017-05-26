<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <!-- Change the description -->
        <meta name="description" content="Baze is a front-end starter template">
        <!-- Change the project name -->
        <meta name="copyright" content="2013 [project name]. All rights reserved.">
        <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">
        Enable this instead for responsive website --> <!--
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

        <script src="<?php echo base_url("assets/js/vendor/modernizr.js")?>"></script>
		
		<style>
			p{color: #585858;}
			
			.logo a{color:#000000;}
 
			.logo a:hover{color:#000000;text-decoration:none;}
		</style>
	</head>
	<body>
		<div class="container">
			<h2 align="center" style="font-family:Century Gothic;color:#000000; letter-spacing:10px;" class="logo"><a href="<?php echo base_url("welcome/index")?>">pershoenalize</a></h2>
			<!--<div align="center">
                <nav class="nav-main">
                    <ul style="font-family:AG_Futura;color:#000000;">
                        <li><a href="#">HOW IT WORKS</a></li>
                        <li><a href="#">START DESIGNING</a></li>
                        <li><a href="#">INSPIRE ME</a></li>
						<li>
							<div class="dropdown">
								<a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#">
								ARTICLES <span class="caret"></span>
								</a>

								<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
									<a href="#" class="article">WHO WE ARE</a>								  								  
								</ul>
							</div>
						</li>
                        <li><a href="#">PRESS</a></li>
                        <li><a href="#">CAMPAIGN</a></li>
					</ul>
                </nav>
            </div>-->
		</div>
		<br/>
		<div class="row" style="background-color:white; padding:5px; margin:-15px 0px 0px 0px; border-bottom: 1px solid #D9D9D9; box-shadow: 0 4px 4px -4px #AEAEAE;">
			<div class="col-xs-6 col-xs-offset-3">
				<div>
					<div class="row" style="padding:5px; 50px; display:none;" id="list-part-type">
					</div>
					<hr/>
					<div class="row">
						<div class="col-xs-8 col-xs-offset-2 text-center">
							<div id="list-part-type-group">
								<?php
								foreach($part_type_group->result() as $row){ ?>
									<a class="btn btn-danger" style="width: 100px; margin: 3px; font-family:'Book Antiqua'; font-size:11px; font-weight:bold;" onclick="changePartTypeGroup('<?php echo $shoe_id?>','<?php echo $row->part_type_group_id?>')">
										<?php echo strtoupper($row->part_type_group_name); ?>
									</a>
								<?php
								} ?>
							</div>
						</div>
					</div>
					<div class="row" style="padding:5px;">
						<div class="col-xs-6 col-xs-offset-3 text-center">
							<select name="part_id" class="form-control" id="list-part" onChange="changePart(this.value);" style="font-family:'Tekton Pro'; font-size:13px;">
								<option>- Choose Part -</option>
								<?php
								foreach($part as $key => $value){ ?>
									<?php if($value!= "None"){?>
									<option value="<?php echo $key?>"><?php echo $value?></option>
								<?php
								  }
								} ?>
							</select>
						</div>
					</div>
					<hr/>
					<div style="padding:5px; display:none;" id="list-pattern-color">
					</div>
					<div style="padding:1px; font-family:'Tekton Pro'; text-align:center;">
					Size : <select name="size-shoe" id="size-shoe">
								<?php 
									for($i=34; $i<=46;$i++){ ?>
										<option value="<?php echo $i;?>"><?php echo $i; ?></option>
									<?php
									}
								?>
							</select> &nbsp;
							<button class="btn btn-success" style="font-family:'Book Antiqua'; font-size:11px; font-weight:bold;" onclick="add_to_bag('<?php echo $shoe_id; ?>')">
							<span class="glyphicon glyphicon-lock"></span> &nbsp; ADD TO BAG
							</button>
					</div>
				</div>
			</div>
		</div>		
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-2" id="generate-result" style="height:350px;margin-top:-5px;">
					<?php 
					foreach($custom as $row1){
						foreach($row1 as $row2){
							foreach($row2 as $pattern_color){ 
								$temp = explode("|+|",$pattern_color); ?>
								<img src="<?php echo base_url("uploads/pattern_color/".$temp[2]); ?>" style="position:absolute; left:150px; top:0px;"/>
							<?php
							}
						}
					}
					?>
				</div>
			</div>
		</div>
		<br/><br/><br/><br/>
		<hr></hr>
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
			function changePartTypeGroup(shoeId, partTypeGroupId){
				$.ajax({
					url: "<?php echo base_url("custom/search_part_type")?>",
					type: "POST",
					cache: false,
					data: "shoe_id="+shoeId+"&part_type_group_id="+partTypeGroupId,
					beforeSend: function(){
						$("#list-pattern-color").hide(1000);
						$("#list-pattern-color").html("");
						$("#list-part-type").hide(1000);
					}, 
					success: function(msg){
						$("#list-part-type").show(1000);
						$("#list-part-type").html(msg);
						
					},
					error: function(){
						alert("Error");
					}
				});
			}
			
			function generateUsePartType(partTypeId, partTypeGroupId){
				$.ajax({
					url: "<?php echo base_url("custom/generate_session")?>",
					type: "POST",
					cache: false,
					data: "part_type_id="+partTypeId+"&part_type_group_id="+partTypeGroupId,
					beforeSend: function(){
						$("#generate-result").html('<img src="<?php echo base_url("assets/img/ajax-loader.gif")?>" />');
					},
					success: function(msg){
						$("#list-pattern-color").load('<?php echo base_url("custom/load_pattern_color")?>');
						$("#list-part").load('<?php echo base_url("custom/load_part")?>');
						$("#generate-result").load('<?php echo base_url("custom/load_generate_result")?>');
						$("#price-result").load('<?php echo base_url("custom/load_price_result")?>');
					},
					error: function(){
						alert("Error");
					}
				});	
			}
			
			function changePart(partId){
				$.ajax({
					url: "<?php echo base_url("custom/load_pattern_color_by_id")?>",
					type: "POST",
					cache: false,
					data: "part_id="+partId,
					beforeSend: function(){
						$("#list-pattern-color").hide(1000);
						$("#list-part-type").hide(1000);
						$("#list-part-type").html("");
					},
					success: function(msg){
						$("#list-pattern-color").show(1000);
						$("#list-pattern-color").html(msg);
					}
				});
			}
			
			function generate(patternColorId, partId){
				$.ajax({
					url: "<?php echo base_url("custom/generator")?>",
					type: "POST",
					cache: false,
					data: "part_id="+partId+"&pattern_color_id="+patternColorId,
					beforeSend: function(){
						$("#generate-result").html('<img src="<?php echo base_url("assets/img/ajax-loader.gif")?>" />');
					},
					success: function(){
						$("#generate-result").load('<?php echo base_url("custom/load_generate_result")?>');
						$("#price-result").load('<?php echo base_url("custom/load_price_result")?>');
					}
				});
			}
			
			function checkout(){
				var size = $("#size-shoe").val();
				$.ajax({
					url: "<?php echo base_url("custom/checkout")?>",
					type: "POST",
					data: "size="+size,
					cache : false,
					beforeSend: function(){
						$("#modal-checkout .modal-body").html('<center><img src="<?php echo base_url("assets/img/ajax-loader.gif")?>" /></center>');
						$("#modal-checkout").modal();
					},
					success: function(){
						$("#modal-checkout .modal-body").html('Terima Kasih telah melakukan pemesanan. Silahkan periksa E-mail Anda. @Pershoenalize');
						setInterval(function(){
							window.location = "<?php echo base_url("custom/clear_session")?>";
						}, 2200);
					}
				});
				
			}
			
			function add_to_bag(shoeId){
				var size = $("#size-shoe").val();
				$.ajax({
					url: "<?php echo base_url("custom/add_to_bag")?>",
					type: "POST",
					data: "size="+size+"&shoe="+shoeId,
					cache : false,
					success: function(){
						window.location = "<?php echo base_url("welcome/generator")?>";
					}
				});
			}
			
			function modal(){
			  //$('#myModal').modal('show');
			  $('#myModal').modal({
				backdrop: false,
				keyboard: false,
				show : true
				});
			}
		</script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo base_url("assets/js/vendor/jquery-1.10.2.min.js")?>"><\/script>')</script>
        <script src="<?php echo base_url("assets/js/vendor/fastclick.js")?>"></script>
        <script src="<?php echo base_url("assets/js/bootstrap.min.js")?>"></script>
        <script src="<?php echo base_url("assets/js/main.js")?>"></script>
	</body>
</html>