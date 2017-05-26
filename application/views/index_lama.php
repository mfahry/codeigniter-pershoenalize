<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pershoenalize</title>
    <script src="<?php echo base_url("assets/js/jquery.min.js")?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/jssor.core.js")?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/js/jssor.utils.js")?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/js/jssor.slider.js")?>"></script>
    <script>
        jQuery(document).ready(function ($) {
            var options = {
                $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlaySteps: 4,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
                $AutoPlayInterval: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 1,                               //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, default value is 1

                $ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideDuration: 300,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
                $SlideWidth: 200,                                   //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 150,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 3, 					                //[Optional] Space between each slide in pixels, default value is 0
                $DisplayPieces: 4,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                $ParkingPosition: 0,                              //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, default value is 1
                $DragOrientation: 1,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

                $BulletNavigatorOptions: {                                //[Optional] Options to specify and enable navigator or not
                    $Class: $JssorBulletNavigator$,                       //[Required] Class to create navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 0,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
                    $Lanes: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
                    $SpacingX: 0,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
                    $SpacingY: 0,                                   //[Optional] Vertical space between each item in pixel, default value is 0
                    $Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
                },

                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 1,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 2,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 4                                       //[Optional] Steps to go for each navigation request, default value is 1
                }
            };

            var jssor_slider1 = new $JssorSlider$("slider1_container", options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {
                var bodyWidth = document.body.clientWidth;
                if (bodyWidth)
                    jssor_slider1.$SetScaleWidth(Math.min(bodyWidth, 809));
                else
                    window.setTimeout(ScaleSlider, 30);
            }

            ScaleSlider();

            if (!navigator.userAgent.match(/(iPhone|iPod|iPad|BlackBerry|IEMobile)/)) {
                $(window).bind('resize', ScaleSlider);
            }


            //if (navigator.userAgent.match(/(iPhone|iPod|iPad)/)) {
            //    $(window).bind("orientationchange", ScaleSlider);
            //}
            //responsive code end
        });
    </script>
    <!-- Bootstrap core CSS -->
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
	
    /* jssor slider bullet navigator skin 03 css */
    /*
    .jssorb03 div           (normal)
    .jssorb03 div:hover     (normal mouseover)
    .jssorb03 .av           (active)
    .jssorb03 .av:hover     (active mouseover)
    .jssorb03 .dn           (mousedown)
    */
    .jssorb03 div, .jssorb03 div:hover, .jssorb03 .av
    {
		background: url(../img/b03.png) no-repeat;
        overflow:hidden;
        cursor: pointer;
    }
    .jssorb03 div { background-position: -5px -4px; }
    .jssorb03 div:hover, .jssorb03 .av:hover { background-position: -35px -4px; }
    .jssorb03 .av { background-position: -65px -4px; }
    .jssorb03 .dn, .jssorb03 .dn:hover { background-position: -95px -4px; }
		
    /* jssor slider arrow navigator skin 03 css */
    /*
    .jssora03l              (normal)
    .jssora03r              (normal)
    .jssora03l:hover        (normal mouseover)
    .jssora03r:hover        (normal mouseover)
    .jssora03ldn            (mousedown)
    .jssora03rdn            (mousedown)
    */
    .jssora03l, .jssora03r, .jssora03ldn, .jssora03rdn
    {
		position: absolute;
		cursor: pointer;
		display: block;
		background: url(../img/a03.png) no-repeat;
        overflow:hidden;
    }
    .jssora03l { background-position: -3px -33px; }
    .jssora03r { background-position: -63px -33px; }
    .jssora03l:hover { background-position: -123px -33px; }
    .jssora03r:hover { background-position: -183px -33px; }
    .jssora03ldn { background-position: -243px -33px; }
    .jssora03rdn { background-position: -303px -33px; }
	</style>
  </head>
<!-- NAVBAR
================================================== -->
  <body>
    <div class="navbar-wrapper">
      <div class="container">
        <div class="nav navbar-wrapper" role="navigation" style="background-color: #FFFFFF; border:1px solid black;">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div class="navbar-collapse collapse">
			  <a class="navbar-brand" href="#" style="color:#000000; font-family:'Nueva Std'; font-size:40px;">Pershoenalize</a>
              <ul class="nav navbar-nav" style="font-family:'Book Antiqua'; font-size:11px; font-weight:bold;">
                <li class="active"><a href="#" style="color:#000000;">HOME</a></li>
                <li><a href="#about" style="color:#000000;">ABOUT</a></li>
                <li><a href="#contact" style="color:#000000;">CONTACT</a></li>
                <li class="dropdown" style="color:#000000;">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#000000;">COLLECTION <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-header">Nav header</li>
                    <li><a href="#">Separated link</a></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li>
              </ul>  
			  <form class="navbar-form navbar-right" role="search">
			    <div class="form-group">
			      <input type="email" class="form-control" placeholder="Email">
			      <input type="password" class="form-control" placeholder="Password">
			    </div>
                <button type="submit" class="btn btn-success">Login</button>
				<button type="button" class="btn btn-default">
			      <span class="glyphicon glyphicon-shopping-cart">(0)</span>
			    </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="item active">
          <img src="<?php echo base_url("assets/img/image5.jpg")?>" alt="First slide"/>
          <div class="container">
            <div class="carousel-caption">
              <h1 style="font-family:Nueva Std;font-size:90px;"><b>Are You Ready ?</b></h1>
			  <h2 style="font-family:Nueva Std;font-size:60px;">To Create <b style="color:#ED9C28;">YOUR</b> Dream <b style="color:#ED9C28;">SHOE.</b></h2><br/>
			  <p><a class="btn btn-lg btn-warning" href="#" role="button">START DESIGNING</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="<?php echo base_url("assets/img/image4.jpg")?>" alt="Second slide" />
          <div class="container">
            <div class="carousel-caption">
              <h1 style="font-family:Nueva Std;font-size:90px;"><b>Are You Ready ?</b></h1>
			  <h2 style="font-family:Nueva Std;font-size:60px;">To Create <b style="color:#ED9C28;">YOUR</b> Dream <b style="color:#ED9C28;">SHOE.</b></h2><br/>
			  <p><a class="btn btn-lg btn-warning" href="#" role="button">START DESIGNING</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="<?php echo base_url("assets/img/image3.jpg")?>" alt="Third slide" />
          <div class="container">
            <div class="carousel-caption">
              <h1 style="font-family:Nueva Std;font-size:90px;"><b>Are You Ready ?</b></h1>
			  <h2 style="font-family:Nueva Std;font-size:60px;">To Create <b style="color:#ED9C28;">YOUR</b> Dream <b style="color:#ED9C28;">SHOE.</b></h2><br/>
			  <p><a class="btn btn-lg btn-warning" href="#" role="button">START DESIGNING</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div><!-- /.carousel -->



    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing" style="font-family:Candara;">
      <!-- Three columns of text below the carousel -->
      <div class="row" style="background-color:#D5D1D0">
        <div class="col-lg-4">
		  <h2 style="font-family:Tekton Pro;">365 Remake</h2>
          <img src="<?php echo base_url("assets/img/365 Remake.jpg"); ?>" class="img-thumbnail" alt="Generic placeholder image" style="width:450px; height:400px;"/><br/>
          <br/><p>Gratis pembuatan sepatu ulang  jika terjadi kesalahan ukuran dengan syarat sepatu belum pernah dipakai, berlaku selama 365 hari.</p>
          <br/><p><a class="btn btn-success" href="#" role="button">View details &raquo;</a></p>
		</div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
		  <h2 style="font-family:Tekton Pro;">Free Shipping</h2>
          <img src="<?php echo base_url("assets/img/Free Shipping.jpg"); ?>" class="img-thumbnail" data-src="holder.js/140x140" alt="Generic placeholder image" style="width:450px; height:400px;"><br/>
		  <br/><p>Bebas biaya kirim ke seluruh Indonesia.</p><br/><br/><br/>
          <p><a class="btn btn-warning" href="#" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
		  <h2 style="font-family:Tekton Pro;">5 Days Shoe Production</h2>
          <img src="<?php echo base_url("assets/img/Production.jpg"); ?>" class="img-thumbnail" data-src="holder.js/140x140" alt="Generic placeholder image" style="width:450px; height:400px;"><br/>
          <br/><p>Pembuatan sepatu custom tercepat, produksi hanya membutuhkan 10hari kerja.</p><br/></br>
          <p><a class="btn btn-danger" href="#" role="button">View details &raquo;</a></p>
		</div><!-- /.col-lg-4 -->
      </div><!-- /.row -->


      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">"THE BEST CUSTOM SHOES ONLINE IN INDONESIA". <span class="text-muted">It'll blow your mind.</span></h2>
          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
        <div class="col-md-5">
          <img src="<?php echo base_url("assets/img/1.png");?>" class="featurette-image img-responsive" data-src="holder.js/500x500/auto" alt="Generic placeholder image" width="300" height="300">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class=".col-xs-6 .col-xs-offset-3">
			 <div id="slider1_container" style="position: relative; top: 0px; right: -180px; width: 809px; height: 150px; overflow: hidden;">

        <!-- Loading Screen -->
        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                background-color: #000; top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
            <div style="position: absolute; display: block; background: url(../img/loading.gif) no-repeat center center;
                top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
        </div>

        <!-- Slides Container -->
        <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 809px; height: 150px; overflow: hidden;">
            <div><img u="image" src="../img/ancient-lady/005.jpg" /></div>
            <div><img u="image" src="../img/ancient-lady/006.jpg" /></div>
            <div><img u="image" src="../img/ancient-lady/011.jpg" /></div>
            <div><img u="image" src="../img/ancient-lady/013.jpg" /></div>
            <div><img u="image" src="../img/ancient-lady/014.jpg" /></div>
            <div><img u="image" src="../img/ancient-lady/019.jpg" /></div>
            <div><img u="image" src="../img/ancient-lady/020.jpg" /></div>
            <div><img u="image" src="../img/ancient-lady/021.jpg" /></div>
            <div><img u="image" src="../img/ancient-lady/022.jpg" /></div>
            <div><img u="image" src="../img/ancient-lady/024.jpg" /></div>
            <div><img u="image" src="../img/ancient-lady/025.jpg" /></div>
            <div><img u="image" src="../img/ancient-lady/027.jpg" /></div>
            <div><img u="image" src="../img/ancient-lady/029.jpg" /></div>
            <div><img u="image" src="../img/ancient-lady/030.jpg" /></div>
            <div><img u="image" src="../img/ancient-lady/031.jpg" /></div>
            <div><img u="image" src="../img/ancient-lady/032.jpg" /></div>
            <div><img u="image" src="../img/ancient-lady/034.jpg" /></div>
            <div><img u="image" src="../img/ancient-lady/038.jpg" /></div>
            <div><img u="image" src="../img/ancient-lady/039.jpg" /></div>
            <div><img u="image" src="../img/ancient-lady/043.jpg" /></div>
            <div><img u="image" src="../img/ancient-lady/044.jpg" /></div>
            <div><img u="image" src="../img/ancient-lady/047.jpg" /></div>
            <div><img u="image" src="../img/ancient-lady/050.jpg" /></div>
        </div>
        
        <!-- Bullet Navigator Skin Begin -->
        <style>
            /* jssor slider bullet navigator skin 03 css */
            /*
            .jssorb03 div           (normal)
            .jssorb03 div:hover     (normal mouseover)
            .jssorb03 .av           (active)
            .jssorb03 .av:hover     (active mouseover)
            .jssorb03 .dn           (mousedown)
            */
            .jssorb03 div, .jssorb03 div:hover, .jssorb03 .av
            {
                background: url(../img/b03.png) no-repeat;
                overflow:hidden;
                cursor: pointer;
            }
            .jssorb03 div { background-position: -5px -4px; }
            .jssorb03 div:hover, .jssorb03 .av:hover { background-position: -35px -4px; }
            .jssorb03 .av { background-position: -65px -4px; }
            .jssorb03 .dn, .jssorb03 .dn:hover { background-position: -95px -4px; }
        </style>
        <!-- bullet navigator container -->
        <div u="navigator" class="jssorb03" style="position: absolute; bottom: 4px; right: 6px;">
            <!-- bullet navigator item prototype -->
            <div u="prototype" style="position: absolute; width: 21px; height: 21px; text-align:center; line-height:21px; color:white; font-size:12px;"><NumberTemplate></NumberTemplate></div>
        </div>
        <!-- Bullet Navigator Skin End -->
        
        <!-- Arrow Navigator Skin Begin -->
        <style>
            /* jssor slider arrow navigator skin 03 css */
            /*
            .jssora03l              (normal)
            .jssora03r              (normal)
            .jssora03l:hover        (normal mouseover)
            .jssora03r:hover        (normal mouseover)
            .jssora03ldn            (mousedown)
            .jssora03rdn            (mousedown)
            */
            .jssora03l, .jssora03r, .jssora03ldn, .jssora03rdn
            {
            	position: absolute;
            	cursor: pointer;
            	display: block;
                background: url(../img/a03.png) no-repeat;
                overflow:hidden;
            }
            .jssora03l { background-position: -3px -33px; }
            .jssora03r { background-position: -63px -33px; }
            .jssora03l:hover { background-position: -123px -33px; }
            .jssora03r:hover { background-position: -183px -33px; }
            .jssora03ldn { background-position: -243px -33px; }
            .jssora03rdn { background-position: -303px -33px; }
        </style>
        <!-- Arrow Left -->
        <span u="arrowleft" class="jssora03l" style="width: 55px; height: 55px; top: 123px; left: 8px;">
        </span>
        <!-- Arrow Right -->
        <span u="arrowright" class="jssora03r" style="width: 55px; height: 55px; top: 123px; right: 8px">
        </span>
        <!-- Arrow Navigator Skin End -->
        <a style="display: none" href="http://www.jssor.com">html slider</a>
    </div>
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-lg-4">
		  <h3>TESTIMONIALS</h3><hr/>
          <br/><p>"pershoenalize adalah perusahan custom sepatu online yang menjadi jawaban bagi konsumen yang menyukai desain maupun yang memiliki kebutuhan khusus akan sepatu"</p>
		  <br/><br/><br/> <b>~Editor Femina Indonesia</b>
		</div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
		  <h3>OUR CONTACT</h3><hr/>
          <br/><p align="justify">Jl. Terusan Sariasih no 52, sarijadi, Bandung, Jawa Barat, Indonesia.<br/><br/><br/><b>Customer Service : 081217536001</b></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
		  <h3>SITEMAP</h3><hr/>
		  <div class="col-xs-6">
          <br/><p align="justify"><a href="#">Lorem Ipsum Dolor</a><br/><a href="#">Lorem Ipsum Dolor</a><br/><a href="#">Lorem Ipsum Dolor</a><br/><a href="#">Lorem Ipsum Dolor</a></p>
		  </div>
		  <div class="col-xs-6">
          <br/><p align="justify"><a href="#">Lorem Ipsum Dolor</a><br/><a href="#">Lorem Ipsum Dolor</a><br/><a href="#">Lorem Ipsum Dolor</a><br/><a href="#">Lorem Ipsum Dolor</a></p>
		  </div>
		</div><!-- /.col-lg-4 -->
      </div>

      <hr/>

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
        <p class="pull-right" style="position:absolute;margin-top:-100px;margin-left:1065px;"><a href="#"><img src="<?php echo base_url("assets/img/arrow.png");?>" width="70px" height="70"/></a><br/><br/><b style="margin-right:5px">Back To Top</b></p>
        <p style="font-size:16px;">&copy; 2014 Pershoenalize, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url("assets/js/bootstrap.min.js")?>"></script>
    <script src="../../assets/js/docs.min.js"></script>
  </body>
</html>
