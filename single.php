<?php 
	/* Subscribe form */
	require 'assets/subscribing.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>News details</title>
		<link rel="icon" href="images/logo.png" />

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="css/style.css">
		<style>
			img{
				opacity: 0.9;}
			.featured-image {
				position: relative;
				margin: auto;
				overflow: hidden;}
			.featured-image img {
				max-width: 100%;
				transition: all 0.3s;
				display: block;
				width: 100%;
				height: auto;
				transform: scale(1);}
			.featured-image:hover img {
				transform: scale(1.1);
				opacity: 0.7}
		</style>
	</head>

	<body>
		<div class="site-content">
			<div class="site-header">
				<div class="container">
					<a href="index.php" class="branding">
						<img src="images/logo.png" alt="" class="logo">
						<div class="logo-type">
							<h1 class="site-title">Weather foru</h1>
							<small class="site-description">Your City Weather</small>
						</div>
					</a>

					<!-- Default snippet for navigation -->
					<div class="main-navigation">
						<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item"><a href="index.php">Home</a></li>
							<li class="menu-item current-menu-item"><a href="news.php">news</a></li>
							<li class="menu-item"><a href="index.php#fullwidth-block">Features</a></li>
							<li class="menu-item"><a href="#site-footer">Contact</a></li>
						</ul> <!-- .menu -->
					</div> <!-- .main-navigation -->

					<div class="mobile-navigation"></div>

				</div>
			</div> <!-- .site-header -->

			<main class="main-content">
				<div class="container">
					<div class="breadcrumb">
						<a href="index.php">Home</a>
						<a href="news.php">News</a>
						<span>News details</span>
					</div>
				</div>

				<div class="fullwidth-block">
					<div class="container">
						<div class="row">
							<div class="content col-md-8">
								<div class="post single">
									<h2 class="entry-title">
										<strong>
											<?php echo $_GET["title"]; ?>
										</strong>
									</h2>
									<div class="featured-image">
										<img src="<?php echo $_GET["image"]; ?>" alt="image" style="height: 50%">
									</div>

									<div class="entry-content">
										<p><?php echo $_GET["description"]; ?></p>
									</div>

									<div class="entry-content">
										<a href="<?php echo $_GET["url"] ?>" target="_blank"><?php echo '<strong>Source :</strong> ' .$_GET["source"];?></a>
										<p><?php echo '<strong>Author :</strong> ' .$_GET["author"].'</br> <strong>Published At :</strong> '.date('Y-m-d', strtotime($_GET["publishedAt"])).' / '.date("h:i:s A", strtotime($_GET["publishedAt"])) ?></p>
									</div>
								</div>
							</div>
							<div class="sidebar col-md-3 col-md-offset-1">
								<div class="widget">
									<h3 class="widget-title">Hot News</h3>
									<ul class="arrow-list">
										<li><a >Accusamus dignissimos</a></li>
										<li><a >Ducimus praesentium</a></li>
										<li><a >Voluptatum deleniti corrupti</a></li>
									</ul>
								</div>

								<div class="widget">
									<h3 class="widget-title">Categories</h3>
									<ul class="arrow-list">
										<li><a >Nemo enim ipsam</a></li>
										<li><a >Voluptatem voluptas</a></li>
										<li><a >Aspernatur aut odit</a></li>
										<li><a >Consequuntur magni</a></li>
										<li><a >Dolores ratione</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</main> 
			<!-- .main-content -->
			<?php 
				include 'footer.php';
				Subscribing(str_replace("weather/", "",$_SERVER['REQUEST_URI']));
			?>
			<!-- .site-footer -->
		</div>
		
		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
	</body>
</html>