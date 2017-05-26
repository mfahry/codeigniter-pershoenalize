<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Pershoenalize Administrator</title>
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
    <link href="<?php echo base_url("assets/css/style-login.css")?>" rel="stylesheet" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>  
</head>
<body>
	<div id="top-bar">
		<div class="page-full-width">
			<a href="<?php echo base_url("welcome/index")?>" class="round button dark">Return to website</a>
		</div>
	</div>

	<div id="content" style="height:450px;"><br/><br/><br/><br/>
		<center>
			<!--<img src="<?php // echo base_url("assets/img/logo.jpg"); ?>" width="500" height="100"/><br/><br/><br/>-->
			<h1 style="letter-spacing:3px;"><font size="20" face="Century Gothic"><b>Administrator</b></font></h1><br/>
			 <a class="navbar-brand" href="<?php echo base_url();?>" style="font-family:Century Gothic;color:#000000; letter-spacing:10px; font-size:25px;">pershoenalize</a>
		</center>
		<br/><br/>
		<form action="<?php echo base_url("user/login_process");?>" method="POST" id="login-form">
			<fieldset>
				<p>
					<input name="username" type="text" id="login-username" class="round full-width-input" placeholder="Username"/>
				</p>
				<p>
					<input name="password" type="password" id="login-password" class="round full-width-input" placeholder="Password" />
				</p>
				<p>I've <a href="#">forgotten my password</a>.</p>
				<input type="submit" class="button round blue" value="LOG IN"/>
			</fieldset>
		</form>
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