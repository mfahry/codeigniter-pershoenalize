<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Pershoenalize Member</title>
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
    <link href="<?php echo base_url("assets/css/style-login.css")?>" rel="stylesheet" />
    <link href="<?php echo base_url("assets/css/bootstrap.min.css")?>" rel="stylesheet">

	<script src="<?php echo base_url("assets/js/jquery.js")?>"></script> 
    <script src="<?php echo base_url("assets/js/bootstrap.min.js")?>"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>  
</head>
<body>
	<div id="top-bar">
		<div class="page-full-width">
			<a href="<?php echo base_url("welcome/index")?>" class="round button dark">Return to website</a>
		</div>
	</div>

	<div id="content" style="height:800px;">
		<center>
			<!--<img src="<?php // echo base_url("assets/img/logo.jpg"); ?>" width="500" height="100"/><br/><br/><br/>-->
			<h1 style="letter-spacing:3px;"><font size="20" face="Century Gothic"><b>Register Member</b></font></h1>
			<h2><a href="<?php echo base_url("welcome/index"); ?>" style="font-family:Century Gothic;color:#000000; letter-spacing:10px; font-size:25px;">pershoenalize</a></h2>
		</center>
		<br/>
		<div class="container">
		    <div class="row">
				<div class="col-md-6 col-md-offset-3">
				<form role="form" action="<?php echo base_url("user/add_process");?>" method="POST">
					Note : <font color="red">* required</font><br/><br/>
					<input type="hidden" name="shoe_id" value="<?php echo $this->input->get("shoe_id"); ?>"/>
					<div class="form-group">
					  <label for="exampleInputEmail1">Email address <sup><font color="red"> * </font></sup></label>
					  <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Enter email">
					</div>
					<div class="form-group">	
					  <label for="exampleFirstName">First Name <sup><font color="red"> * </font></sup></label>
					  <input class="form-control" type="text" name="first_name" id="exampleFirstName" placeholder="First Name">
					</div>
					<div class="form-group">	
					  <label for="exampleLastName">Last Name <sup><font color="red"> * </font></sup></label>
					  <input class="form-control" type="text" name="last_name" id="exampleLastName" placeholder="Last Name">
					</div>
					<div class="form-group">	
					  <label for="exampleAge">Age <sup><font color="red"> * </font></sup></label>
					  <select class="form-control" id="exampleAge" name="age">
						<option value="0">-- Select Age -- </option>
						<?php 
						$i=15;
						while($i<=120){
						?>
						<option value="<?php echo $i; ?>"><?php echo $i." Years Old"; ?></option>
						<?php
						  $i++;
						}
						?>
					  </select>
					</div>
					<div class="form-group">	
					  <label for="exampleAddress">Address<sup><font color="red"> * </font></sup></label>
					  <textarea class="form-control" id="exampleAddress" name="address"></textarea>
					</div>
					<div class="form-group">	
					  <label for="examplePhone">Phone Number<sup><font color="red"> * </font></sup></label>
					  <input class="form-control" type="text" id="examplePhone" name="phone" placeholder="Phone Number">
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
		        </form>
				</div>
			</div>
		</div>
		<center>
			<!--<img src="images/pertamina.jpg" width="120" height="60"/>-->
		</center>
	</div>
	<div id="footer">
		<p>Pershoenalize &copy; Copyright 2014. All rights reserved.</p>
	</div>
</body>
	<script src="<?php echo base_url("assets/js/jquery.min.js")?>"></script>
</html>