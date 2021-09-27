<?php 
    //require 'assets/get_user_city.php';
    //echo 'Current city user: '.$city;
    $city = 'Casablanca';
    $region = 'Casablanca-Settat';
    $country = 'Maroc';

	if(isset($_POST['submit'])){
			$city = $_POST['find'];
			$region = '';
			$country = '';
	}
		$url = "https://api.openweathermap.org/data/2.5/weather?q=".$city."&lang=eng&units=metric&appid=9e53240f0289c88e5c682041f5a8b4e1";
		
		// On get les resultat
		$raw = file_get_contents($url);
		if($raw){
			// Décode la chaine JSON
			$json = json_decode($raw);
			// Nom de la ville
			$name = $json->name;
			// Météo
			$weather = $json->weather[0]->main;
			$desc = $json->weather[0]->description;
			// Températures
			$temp = $json->main->temp;
			$feel_like = $json->main->feels_like;
			$humidity = $json->main->humidity;
			// Vent
			$speed = $json->wind->speed;
			$deg = $json->wind->deg;
		}else{
			echo '<script>if(confirm("This location does not exists !"))
						  {
					   		window.location.href = "http://localhost/weather/index.php"
				  		  }else{
							window.location.href = "http://localhost/weather/index.php"
						  }
				  </script>';	
		}
		/* Subscribe form */
		require 'assets/subscribing.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		<title><?php echo $city.' ,'.$country; ?></title>

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
		
		<!-- Ajax CDN -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

		<!-- Loading main css file -->
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/style_2.css">

		<link rel="icon" href="images/logo.png" />
		<style>
			img{
				opacity: 0.9;}
			.live-camera-cover {
				position: relative;
				margin: auto;
				overflow: hidden;}
			.live-camera-cover img {
				max-width: 100%;
				transition: all 0.3s;
				display: block;
				width: 100%;
				height: auto;
				transform: scale(1);}
			.live-camera-cover:hover img {
				transform: scale(1.1);
				opacity: 0.5;}

			.photo-grid :hover img {
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
							<li class="menu-item current-menu-item"><a href="index.php">Home</a></li>
							<li class="menu-item"><a href="news.php">news</a></li>
							<li class="menu-item"><a href="#fullwidth-block">Features</a></li>
							<li class="menu-item"><a href="#site-footer">Contact</a></li>
						</ul> <!-- .menu -->
					</div> <!-- .main-navigation -->

					<div class="mobile-navigation"></div>

				</div>
			</div> <!-- .site-header -->

			<div class="hero" data-bg-image="images/sanfran.jpg">
				<div class="container">
					<form method="POST" class="find-location">
						<input type="text" name="find" placeholder="Find your city...">
						<input type="submit" name="submit" value="Find">
					</form>

				</div>
			</div>
			<div class="forecast-table">
				<div class="container">
					<div class="forecast-container">
						<div class="today forecast">
							<div class="forecast-header">
								<div class="day"><?php echo date('l'); ?></div>
								<div class="date"><?php echo date("d");?> <?php echo ' '.date('M'); ?></div>
							</div> <!-- .forecast-header -->
							<div class="forecast-content">
							<div class="location" style="font-size: 16px;"><?php echo $city . $region .$country; ?></div>
								<p style="color: white;">
									<strong><?php echo $desc; ?></strong>
								</p>
								<div class="degree" style="margin-top: -5px">
									<div class="num" style="font-size: 65px;"><?php echo (int)$temp; ?><sup>o</sup>C</div>
									<div class="forecast-icon">
									<?php 
										switch($weather)
										{
											case "Clear":
												?>
												<div class="icon sunny">
														<div class="sun">
															<div class="rays"></div>
														</div>
													</div>           
												<?php
											break;
					
											case 'Drizzle':
												?>
												<div class="icon sun-shower">
													<div class="cloud"></div>
														<div class="sun">
															<div class="rays"></div>
													</div>
														<div class="rain"></div>
												</div>
												<?php 
											break;
					
											case 'Rain':
												?>
												<div class="icon rainy">
													<div class="cloud"></div>
													<div class="rain"></div>
												</div>
												<?php 
											break;
					
											case 'Clouds':
												?>
												<div class="icon cloudy">
													<div class="cloud"></div>
													<div class="cloud"></div>
												</div>
												<?php 
											break;
					
											case 'Thunderstorm':
												?>
												<div class="icon thunder-storm">
													<div class="cloud"></div>
														<div class="lightning">
															<div class="bolt"></div>
															<div class="bolt"></div>
													</div>
												</div>
												<?php 
											break;
					
											case 'Snow':
												?>
												<div class="icon flurries">
													<div class="cloud"></div>
														<div class="snow">
															<div class="flake"></div>
															<div class="flake"></div>
													</div>
												</div>
												<?php 
											break;
										}
                    					?>
									</div>
								</div>
								<span><img src="images/icon-wind.png" alt=""><?php echo number_format((float)$speed*(3.6), 2, '.', ''); ?> Km/h</span>
								<span><img src="images/icons8-point-de-rosée-50.png" alt="" style="width: 25px"><?php echo $humidity; ?>%</span>
							</div>
						</div>
						
						<div class="today forecast">
							<div class="forecast-header">
								<div class="day">Weather in the world</div>
							</div> <!-- .forecast-header -->
							<div class="forecast-content" style="padding: 0; height: 100%;">
								<iframe width="100%" height="230px" src="https://embed.windy.com/embed2.html?lat=33.592&lon=-7.618&detailLat=33.592&detailLon=-7.618&width=650&height=450&zoom=5&level=surface&overlay=wind&product=ecmwf&menu=&message=&marker=&calendar=now&pressure=&type=map&location=coordinates&detail=&metricWind=default&metricTemp=default&radarRange=-1" frameborder="0"></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
			<main class="main-content">
				<div class="fullwidth-block" style="background-color: #262936 !important">
					<div class="container">
						<h2 class="section-title">News</h2>
						<div class="row">
							<?php $i = 0;
								foreach($NewsData->articles as $News){
							?>
								<div class="col-md-3 col-sm-6">
									<div class="live-camera">
										<figure class="live-camera-cover" style="height: 170px; width: 100%">
											<a onclick="location.href='single.php?image=<?php echo($image=$News->urlToImage).
																								'&title='.($title=$News->title).
																								'&description='.($description=$News->description).
																								'&author='.($author=$News->author).
																								'&publishedAt='.($publishedAt=$News->publishedAt).
																								'&source='.($source=$News->source->name).
																								'&url='.($url=$News->url)?>'"style="cursor:pointer;">
												<img src="<?php echo $image=$News->urlToImage; ?>" alt="image">
											</a>
										</figure>
										<h3 class="location" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
											<?php echo $title=$News->title; ?>
										</h3>
										<small class="date">
											<span style="color: #fff">Source : </span>
											<?php echo $News->source->name ?>
										</small></br>
										<small class="date">
											<span style="color: #009ad8">Published at : </span>
											<?php echo date('Y-m-d', strtotime($News->publishedAt)) ?>
										</small>
									</div>
								</div>
							<?php
								if(++$i >= 4) break;}
							?>
						</div>
						<a onclick="location.href='news.php'" style="cursor:pointer; padding: 15px 60px 15px 60px !important; font-size: 15px; float: right" class="button"> 
							<strong> For More </strong>
							<i class="fa fa-arrow-right" style="padding-left: 5px"></i>
						</a>
					</div>
				</div>

				<div class="fullwidth-block" id="fullwidth-block">
					<div class="container">
						<div class="row">
							<div class="col-md-4">
								<h2 class="section-title">Application features</h2>
								<ul class="arrow-feature">
									<li>
										<h3>Weather of your current position</h3>
										<p>By default, you get the weather situation in your current location.</p>
									</li>
									<li>
										<h3>Search section at the top</h3>
										<p>You have a search section at the top to search for any city in the world you want.</p>
									</li>
									<li>
										<h3>Weather in the world</h3>
										<p>Weather in the world section, provide the weather map to know more information.</p>
									</li>
								</ul>
							</div>
							<div class="col-md-4">
								<h2 class="section-title" style="opacity: 0.0;">......</h2>
								<ul class="arrow-feature">
									<li>
										<h3>News Section</h3>
										<p>We provide to you, top business headlines in the US right now.</p>
									</li>
									<li>
										<h3>Subscribing section</h3>
										<p>Subscribe section, to keep updated with the latest weather news.</p>
									</li>
									<li>
										<h3>Responsive website</h3>
										<p>Compatible with all devices (pc, phone, ipad).</p>
									</li>
								</ul>
							</div>
							<div class="col-md-4">
								<h2 class="section-title">Awesome Photos</h2>
								<div class="photo-grid">
									<a><img src="images/1.jpg"></a>
									<a><img src="images/2.jpg"></a>
									<a><img src="images/3.jpg"></a>
									<a><img src="images/4.jpg"></a>
									<a><img src="images/5.jpg"></a>
									<a><img src="images/6.jpg"></a>
									<a><img src="images/7.jpg"></a>
									<a><img src="images/8.jpg"></a>
									<a><img src="images/9.jpg"></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</main> 
			<!-- .main-content -->
			<?php include 'footer.php';
				Subscribing('/index.php');
			?>
			<!-- .site-footer -->
		</div>

		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
	</body>
</html>