<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pershoenalize Administrator</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url("assets/css/bootstrap.min.css")?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url("assets/css/dashboard.css")?>" rel="stylesheet">
	
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url("assets/js/jquery.js")?>"></script> 
    <script src="<?php echo base_url("assets/js/bootstrap.min.js")?>"></script>
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#" style="font-family:'Broadway'; font-size:25px;">Pershoenalize</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
            <li><a href="<?php echo base_url("user/logout_admin"); ?>">Logout</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
		    <li <?php if($active=="article") echo "class='active'"; ?>><a href="<?php echo base_url("article/view_article")?>" style="font-family:'Bradley Hand ITC'; font-size:15px; font-weight:bold;">Articles</a></li>
		    <li <?php if($active=="post_article") echo "class='active'"; ?>><a href="<?php echo base_url("article/add_article")?>" style="font-family:'Bradley Hand ITC'; font-size:15px; font-weight:bold;">Add Articles</a></li>
            <li <?php if($active=="customer") echo "class='active'"; ?>><a href="<?php echo base_url("user/view_customer")?>" style="font-family:'Bradley Hand ITC'; font-size:15px; font-weight:bold;">Customer</a></li>
			<li <?php if($active=="country") echo "class='active'"; ?>><a href="#" style="font-family:'Bradley Hand ITC'; font-size:15px; font-weight:bold;">Country</a></li>
			<li <?php if($active=="province") echo "class='active'"; ?>><a href="#" style="font-family:'Bradley Hand ITC'; font-size:15px; font-weight:bold;">Province</a></li>
            <li <?php if($active=="state") echo "class='active'"; ?>><a href="#" style="font-family:'Bradley Hand ITC'; font-size:15px; font-weight:bold;">State</a></li>            
          </ul>
          <ul class="nav nav-sidebar">
			<li <?php if($active=="utilities") echo "class='active'"; ?>><a href="<?php echo base_url("shoe/view_primary_all_data")?>" style="font-family:'Bradley Hand ITC'; font-size:15px; font-weight:bold;">Utility</a></li>
            <li <?php if($active=="product") echo "class='active'"; ?>><a href="<?php echo base_url("shoe/view_all_data")?>" style="font-family:'Bradley Hand ITC'; font-size:15px; font-weight:bold;">Product</a></li>
            <li <?php if($active=="add product") echo "class='active'"; ?>><a href="<?php echo base_url("shoe/add_all_data")?>" style="font-family:'Bradley Hand ITC'; font-size:15px; font-weight:bold;">Add Product</a></li>
            <li <?php if($active=="shopping cart") echo "class='active'"; ?>><a href="<?php echo base_url("shoe/view_transaction_all_data")?>" style="font-family:'Bradley Hand ITC'; font-size:15px; font-weight:bold;">Shopping Cart</a></li>
            <li <?php if($active=="payment confirmation") echo "class='active'"; ?>><a href="<?php echo base_url("user/view_payment_confirmation")?>" style="font-family:'Bradley Hand ITC'; font-size:15px; font-weight:bold;">Payment Confirmation</a></li>
			<li <?php if($active=="design") echo "class='active'"; ?>><a href="<?php echo base_url("custom/design_admin")?>" style="font-family:'Bradley Hand ITC'; font-size:15px; font-weight:bold;">Design</a></li>
            <li <?php if($active=="report") echo "class='active'"; ?>><a href="" style="font-family:'Bradley Hand ITC'; font-size:15px; font-weight:bold;">Report</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li <?php if($active=="feedback") echo "class='active'"; ?>><a href="" style="font-family:'Bradley Hand ITC'; font-size:15px; font-weight:bold;">Feedback</a></li>
			<li <?php if($active=="user profile") echo "class='active'"; ?>><a href=""style="font-family:'Bradley Hand ITC'; font-size:15px; font-weight:bold;">User Profile</a></li>
            <li <?php if($active=="account") echo "class='active'"; ?>><a href="" style="font-family:'Bradley Hand ITC'; font-size:15px; font-weight:bold;">Account</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <?php 
		  if(isset($page)){ echo $page; } 
		  else 
		  { ?>
			<h1 class="page-header">Dashboard</h1>
		  <?php 
		  } ?>
        </div>
      </div>
    </div>
  </body>
</html>
