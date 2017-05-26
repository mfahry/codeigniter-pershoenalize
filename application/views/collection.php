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
	
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url("assets/css/bootstrap.min.css")?>" rel="stylesheet" />
	
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
<!-- NAVBAR
================================================== -->
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
				<button type="button" class="btn btn-default" style="font-family:'Tekton Pro';">
			      (<?php echo $sum_cart; ?>)
				  SHOPPING BAG
				  <span class="glyphicon glyphicon-shopping-cart">
					
				  </span>
			    </button>
              </form>
            </div>
          </div>
    </div>
	<hr/>

    
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
    <div class="container marketing" style="font-family:Candara;">
      <!-- Three columns of text below the carousel -->
      <div class="row" style="padding:10px 20px; ">
		<?php 
		foreach($collection->result() as $row){ ?>
			<div class="col-xs-3 text-center">
				<a href="<?php echo base_url("custom/index?shoe_id=".$row->shoe_id."&collection_id=".$row->collection_id); ?>" style="color:#000;">
				<img src="<?php echo base_url("uploads/collection/".$row->collection_path); ?>"  style="max-width:100%;" class="img-thumbnail"/>
				</a>
			</div>
		<?php
		} ?>
      </div><!-- /.row -->


      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">

      <div class="row featurette" style="color: #5A5A5A;">
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
