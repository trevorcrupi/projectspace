<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URL?>css/nav.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#theNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" rel="home" href="<?php echo URL ?>" title="Communicode">
						<img id="logo" src="<?php echo URL ?>images/C-32-white.svg">
					</a>
				</div>
				<div class="collapse navbar-collapse" id="theNavbar">
					<ul class="nav navbar-nav">
						<li class="active"><a href="<?php echo URL ?>" class="headline">Home</a></li>
						<li><a href="#" class="headline">About</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#" class="headline">Contact</a></li>
						<li><a href="#" class="headline">Join/Login</a></li>
					</ul>
				</div>
			</div>
		</nav>
