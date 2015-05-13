<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Sign Up</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/global.css">
		<link rel="stylesheet" type="text/css" href="css/form.css">
		<link rel="stylesheet" href="css/register.css" />
		<link href='http://fonts.googleapis.com/css?family=Raleway:200,400,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Arvo:200,400,600' rel='stylesheet' type='text/css'>
	</head>
	<body id="body" class="body-menu-push">
		<div class="container">

		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#theNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse" id="theNavbar">
					<ul class="nav navbar-nav">
						<li><a href="<?php echo URL ?>" class="headline">Logo Here</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#" class="headline">Learn More</a></li>
						<li><a href="<?php echo URL ?>login" class="headline">Dashboard</a></li>
						<li class="active"><a href="" class="headline"><?php echo $user['user_name'] ?></a></li>
						<li style="margin-left: 10px;">
              <span class="right">
    		        <a id="nav-toggle" class=" headline top-nav-icon nav-right nav-right-menu" href="#">
    		            <span></span>
    		        </a>
						  </span>
            </li>
					</ul>
				</div>
			</div>
		</nav>
