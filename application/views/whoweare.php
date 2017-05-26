<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
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
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
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
			<br/>
			<h1 align="center" style="font-family:AG_Futura;color:#585858;">WHO WE ARE</h1>
			<br/>
			<p align="center" style="font-family:Leelawadee;font-size:16px;"><a href="<?php echo base_url("welcome/meetpeople");?>" style="color:#585858;"><b><u>Meet the people</u></b></a> who are responsible in creating and delivering your perfect shoes</p>
			<br/>
			<div align="center">
				<img src="<?php echo base_url("assets/img/Tulips.jpg")?>" alt="" width="860px" height="500px">
			</div>
		</div>
		<br/>
		<h1 align="center" style="font-family:AG_Futura;color:#585858;">FEATURE ARTICLES</h1>
		<div class="container">	
			<nav class="main">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="col-xs-6 col-sm-4">
							<a href="#" class="product-grid">    
								<img src="<?php echo base_url("assets/img/Tulips.jpg")?>" alt="">
								<h4 align="center" style="font-family:AG_Futura;color:#585858;">HOW TO</h4>
							</a>
						</div>
						<div class="col-xs-6 col-sm-4">
							<a href="#" class="product-grid">    
								<img src="<?php echo base_url("assets/img/Tulips.jpg")?>" alt="">
								<h4 align="center" style="font-family:AG_Futura;color:#585858;">MUST HAVE</h4>
							</a>	
						</div>
						<div class="col-xs-6 col-sm-4">
							<a href="#" class="product-grid">    
								<img src="<?php echo base_url("assets/img/Tulips.jpg")?>" alt="">
								<h4 align="center" style="font-family:AG_Futura;color:#585858;">DESIGN ADVICE</h4>
							</a>
						</div>
						<div class="col-xs-6 col-sm-4">
							<a href="#" class="product-grid">    
								<img src="<?php echo base_url("assets/img/Tulips.jpg")?>" alt="">
								<h4 align="center" style="font-family:AG_Futura;color:#585858;">MATERIALS GUIDE</h4>
							</a>
						</div>
						<div class="col-xs-6 col-sm-4">
							<a href="#" class="product-grid">    
								<img src="<?php echo base_url("assets/img/Tulips.jpg")?>" alt="">
								<h4 align="center" style="font-family:AG_Futura;color:#585858;">WHAT TO WEAR</h4>
							</a>	
						</div>
						<div class="col-xs-6 col-sm-4">
							<a href="#" class="product-grid">    
								<img src="<?php echo base_url("assets/img/Tulips.jpg")?>" alt="">
								<h4 align="center" style="font-family:AG_Futura;color:#585858;">FAQ</h4>
							</a>
						</div>
					</div>
				</div>
			</nav>
			<hr></hr>
		</div>
		<br/>
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
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo base_url("assets/js/vendor/jquery-1.10.2.min.js")?>"><\/script>')</script>
        <script src="<?php echo base_url("assets/js/vendor/fastclick.js")?>"></script>
        <script src="<?php echo base_url("assets/js/bootstrap.min.js")?>"></script>
        <script src="<?php echo base_url("assets/js/main.js")?>"></script>
    </body>
</html>