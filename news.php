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
		
		<title>News</title>
		<link rel="icon" href="images/logo.png" />

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="css/style.css">
		<style>
			img{
				opacity: 0.9;}
			.photo-preview {
				position: relative;
				margin: auto;
				overflow: hidden;}
			.photo-preview img {
				max-width: 100%;
				transition: all 0.3s;
				display: block;
				width: 100%;
				height: auto;
				transform: scale(1);}
			.photo-preview:hover img {
				transform: scale(1.1);
				opacity: 0.5;}
		</style>
	</head>

	<body>		
		<?php
			$url = 'https://newsapi.org/v2/top-headlines?country=us&category=business&apiKey=14b088dca9274a3284fac56710418d6c';
			$response = file_get_contents($url);
			$NewsData = json_decode($response);
		?>
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
						<span>News</span>
					</div>
				</div>

				<div class="fullwidth-block">
					<div class="container">
						<h2 class="entry-title">Top business headlines in the US right now</h2>
						<div class="row">
							<div class="col-md-12">
								<div class="photo">
									<div class="photo-preview photo-detail">										
											<img src="images/news.jpg">
									</div>
									<div class="photo-details">
										<h2 class="photo-title"><a href="#"><strong>News</strong></a></h2>
										<h3><strong>Discover the articles and breaking news headlines in the US right now.<strong></h3>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<?php $i = 0;
								foreach($NewsData->articles as $News){
							?>						
								<div class="col-md-6" style="margin-top: 30px">
									<div class="photo">
										<div class="photo-preview photo-detail">										
											<a onclick="location.href='single.php?image=<?php echo($image=$News->urlToImage).
																							'&title='.($title=$News->title).
																							'&description='.($description=$News->description).
																							'&author='.($author=$News->author).
																							'&publishedAt='.($publishedAt=$News->publishedAt).
																							'&source='.($source=$News->source->name).
																							'&url='.($url=$News->url)?>'"style="cursor:pointer;">
												<img src="<?php echo $News->urlToImage; ?>" style="height: 100%; width: 100%">
											</a>
										</div>
										<div class="photo-details">
											<h2 class="photo-title" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
												<a>
													<strong> <?php echo $News->title;?> </strong>
												</a>
											</h2>
											<P class="photo-title" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
												<?php echo $News->description; ?>
											</P>
										</div>
									</div>
									<a onclick="location.href='single.php?image=<?php echo($image=$News->urlToImage).
																					  '&title='.($title=$News->title).
																					  '&description='.($description=$News->description).
																					  '&author='.($author=$News->author).
																					  '&publishedAt='.($publishedAt=$News->publishedAt).
																					  '&source='.($source=$News->source->name).
																					  '&url='.($url=$News->url)?>'"
										style="cursor:pointer;" class="button">Read more
									</a>
								</div>
							<?php
								if(++$i >= 12) break;}
							?>					
						</div>
					</div>
				</div>
			</main> 
			<!-- .main-content -->
			<?php include 'footer.php';
				Subscribing('/news.php');
			?>
			<!-- .site-footer -->
		</div>
		
		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
	</body>
</html>