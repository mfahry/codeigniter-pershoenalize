<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Pershoenalize.Com</title>

    <link href="<?php echo base_url("assets/css/bootstrap.min.css")?>" rel="stylesheet" />
	<link href="<?php echo base_url("assets/css/carousel.css")?>" rel="stylesheet" />
	
	<style>
	 .ftr{
       margin: 0;
       padding: 0;
	 }

	 .ftr ul{
		text-align: center;
		margin: 0;
		padding: 0;
	 }

	.ftr li{
	  display: inline-block;
	  list-style-type: 0;
	  margin: 10px;
	  text-align: center;
	  position: relative;
	}

	.ftr li a{
		color: white;
		text-decoration: none;
	}

	.ftr li a:hover{
		color: #DC3A62;
		text-decoration: none;
	}


	.ftr li:before{
	  content: '\00b7';
	  position: absolute;
	  left: -13px;
	  font-size: 10px;
	}
	</style>
  </head>
  
  <body>
    <div class="navbar-wrapper" role="navigation" style="background-color: #FFFFFF; margin-top:-5px; border-left:none; border-right:none;">
      <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="<?php echo base_url();?>" style="font-family:Century Gothic;color:#000000; letter-spacing:10px;">pershoenalize</a>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo base_url("welcome/howitwork");?>" style="color:#000000; font-family: 'MS Serif'; word-spacing: 6px;"><u>HOW IT WORKS</u></a></li>
                <li><a href="<?php echo base_url("welcome/generator");?>" style="color:#000000; font-family: 'MS Serif'; word-spacing: 6px;">START DESIGNING</a></li>
                <li><a href="#inspire" style="color:#000000; font-family: 'MS Serif'; word-spacing: 6px;">INSPIRE ME</a></li>
                <li><a href="#artisan" style="color:#000000; font-family: 'MS Serif'; word-spacing: 6px;">OUR ARTISAN</a></li>
                <li><a href="#contact" style="color:#000000; font-family: 'MS Serif'; word-spacing: 6px;">CONTACT</a></li>
              </ul>
			  <form class="navbar-form navbar-right" role="search">
				<button type="button" class="btn btn-default">
			      <span class="glyphicon glyphicon-shopping-cart">(0)</span>
			    </button>
              </form>
            </div>
          </div>
    </div>

    <div id="myCarousel" class="carousel slide" data-ride="carousel" style="position:absolute;left:121px;top:70px;width:1110px;height:425px;">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      </ol>
      <div class="carousel-inner" style="height:425px;">
        <div class="item active">
          <img src="<?php echo base_url("assets/img/waal.png");?>" alt="First slide" style="width:100%; height:425px;">
          <div class="container">
            <div class="carousel-caption" style="bottom:100px;right:150px;color:#000000;">
              <h3 align="right" style="font-size:30;font-family:Century Gothic;">ARE YOU READY</h3>
              <h2 align="right" style="font-size:35;font-family:Century Gothic;">TO CREATE</h2>
              <h1 align="right" style="font-size:40;font-family:Century Gothic;">YOUR DREAM SHOE ?</h1>
              <p align="right"><a class="btn btn-lg btn-success" href="<?php echo base_url("welcome/generator");?>" role="button"><b>START DESIGNING</b></a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
	<hr/>
	<div class="container" style="position:absolute;top:495px;left:104px;width:1143px;">
		<!-- Three columns of text below the carousel -->
		<div class="row">
			<div class="col-lg-4">
				<h2 style="font-family:Century Gothic;" align="center">365 Days Remake</h2>
				<img src="<?php echo base_url("assets/img/Remake.jpg");?>" class="img-thumbnail" alt="Generic placeholder image" style="width:450px; height:260px;"/><br/>
			</div><!-- /.col-lg-4 -->
			<div class="col-lg-4">
				<h2 style="font-family:Century Gothic;" align="center">10 Days Production</h2>
				<img src="<?php echo base_url("assets/img/Production.png");?>" class="img-thumbnail" data-src="holder.js/140x140" alt="Generic placeholder image" style="width:450px; height:260px;"><br/>
			</div><!-- /.col-lg-4 -->
			<div class="col-lg-4">
				<h2 style="font-family:Century Gothic;" align="center">Free Shipping</h2>
				<img src="<?php echo base_url("assets/img/freeShipping.jpg");?>" class="img-thumbnail" data-src="holder.js/140x140" alt="Generic placeholder image" style="width:450px; height:260px;"><br/>
			</div><!-- /.col-lg-4 -->
		</div><!-- /.row -->
	</div>
	
	<div class="container" style="position:absolute;top:835px;left:78px;left:104px;width:1143px;height:450px;">
		<!-- Three columns of text below the carousel -->
		<div class="row">
			<div class="col-lg-8">
				<img src="<?php echo base_url("assets/img/fotoTeam.jpg");?>" class="img-thumbnail" alt="Generic placeholder image" style="width:820px; height:370px;"/><br/>
			</div><!-- /.col-lg-4 -->
			<div class="col-lg-4">
				<p align="right" style="font-family:Century Gothic;font-size:18px;">
					Halo,<br/>
					Selamat Datang di pershoenalize.<br/>
					Jangan ragu untuk menghubungi saya jika <br/>
					Anda memiliki pertanyaan. </br>
					<br/><br/><br/>
					<img src="<?php echo base_url("assets/img/ttd.jpg");?>" class="img-thumbnail" alt="Generic placeholder image" style="width:150px; height:70px;"/><br/>
					Widi <br/>
					<b>Chief Marketing Officer</b>
				</p>
			</div><!-- /.col-lg-4 -->
		</div><!-- /.row -->
	</div>
      <hr class="featurette-divider">

	  <div class="row featurette" style="color: #5A5A5A;position:absolute;top:1200px;left:115px;right:100px;">
        <div class="col-lg-6 text-center">
		  <h3>TESTIMONIALS</h3><hr/>
		</div><!-- /.col-lg-4 -->
        <div class="col-lg-6">
		  <h3 class="text-center">CONTACT US</h3><hr/>
          <br/>
		  <p align="justify">081217536001<br/><br/>
		    <b>admin@pershoenalize.com</b>
		  </p>
        </div><!-- /.col-lg-4 -->
      </div>

      <hr class="featurette-divider">
	  
	 <div class="row featurette" style="color: #5A5A5A;position:absolute;top:1550px;left:78px;left:104px;">
		  <!-- /END THE FEATURETTES -->
		  <ul class="ftr">
			<li><a href="#"><img src="<?php echo base_url("assets/img/Facebook-icon.png");?>" width="45" height="45"/></a></li>
			<li><a href="#"><img src="<?php echo base_url("assets/img/GooglePlus-icon.png");?>" width="45" height="45"/></a></li>
			<li><a href="#"><img src="<?php echo base_url("assets/img/Twitter-icon.png");?>" width="45" height="45"/></a></li>
			<li><a href="#"><img src="<?php echo base_url("assets/img/Instagram-icon.png");?>" width="45" height="45"/></a></li>
			<li><a href="#"><img src="<?php echo base_url("assets/img/Pinterest-icon.png");?>" width="45" height="45"/></a></li>
		  </ul>
		  <br/><br/>
		  <!-- FOOTER -->
		  <footer>
			<p class="pull-right" style="position:absolute;margin-top:-100px;margin-left:1035px;"><a href="#"><img src="<?php echo base_url("assets/img/arrow.png");?>" width="70px" height="70"/></a><br/><br/><b style="margin-right:58px">Back To Top</b></p>
			<p style="font-size:16px;">&copy; 2014 Pershoenalize, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
		  </footer>
	  
      </div><!-- /.container -->
	<script src="<?php echo base_url("assets/js/jquery.min.js")?>"></script>
    <script src="<?php echo base_url("assets/js/bootstrap.min.js")?>"></script>
  </body>
</html>
