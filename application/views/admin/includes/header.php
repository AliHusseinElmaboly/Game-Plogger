<?php echo doctype("html5"); ?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Admin Page</title>
		<meta http-equiv="X-UA-Compatible" content="IE-edge">
		<meta name="viewport" content="width=device-width", initial-scale=1">
		<title>Welcome to BLog</title>
		<!-- Bootstrap core css -->
		<link href="<?php echo base_URL(); ?>css/bootstrap.css rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="<?php echo base_URL(); ?>css/blog.css" rel="stylesheet">

	</head>

	<body>
		<div class="blog-masthead">
			<div class="container">
				<nav class="blog-nav">
					<a class="blog-nav-item" href="<?php echo base_URL(); ?>blog/admin">Dashboard</a>
					<a class="blog-nav-item" href="<?php echo base_URL(); ?>blog/add_game">Add Game</a>
					<a class="blog-nav-item" href="<?php echo base_URL(); ?>blog/add_category">Add Category</a>
					<a class="blog-nav-item pull-right" href="<?php echo base_URL(); ?>">Visit Blog<a>
				</nav>
			</div>
		</div>

		<div class="container">
			<div class="blog-header">
				<h2>Admin Area</h2>
			</div>
			<div class="row">
				<div class="col-sm-12 blog-main">