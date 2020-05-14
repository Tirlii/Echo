<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Crossroads Slideshow | Codrops</title>
		<meta name="description" content="An experimental slideshow with an inclined look with three slide previews and a content view on click." />
		<meta name="keywords" content="slideshow, javascript, tweenmax, rotation, animation, css" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/base.css" />
		<script>document.documentElement.className="js";var supportsCssVars=function(){var e,t=document.createElement("style");return t.innerHTML="root: { --tmp-var: bold; }",document.head.appendChild(t),e=!!(window.CSS&&window.CSS.supports&&window.CSS.supports("font-weight","var(--tmp-var)")),t.parentNode.removeChild(t),e};supportsCssVars()||alert("Please view this demo in a modern browser that supports CSS Variables.");</script>
		<script src="js/jquery-3.5.0.min.js"></script>
	</head>
	<body class="loading">
		<main>
			<div class="content">
				<article class="content__item">
					<div class="img-wrap img-wrap--content">
						<div class="img img--content" style="background-image: url(img/1.jpg);"></div>
					</div>
					<header class="content__item-header">
						<span class="content__item-header-meta">New York City, March 24</span>
						<h2 class="content__item-header-title">Kanzu</h2>
					</header>
					<div class="content__item-copy">
						<p class="content__item-copy-text">
						In the gloomy domed livingroom of the tower Buck Mulligan’s gowned form
						moved briskly to and fro about the hearth, hiding and revealing its
						yellow glow. Two shafts of soft daylight fell across the flagged floor
						from the high barbacans: and at the meeting of their rays a cloud of
						coalsmoke and fumes of fried grease floated, turning.
						</p>
						<a href="#" class="content__item-copy-more">more +</a>
					</div>
				</article>
				<article class="content__item">
					<div class="img-wrap img-wrap--content">
						<div class="img img--content" style="background-image: url(img/2.jpg);"></div>
					</div>
					<header class="content__item-header">
						<span class="content__item-header-meta">Acapulco, March 25</span>
						<h2 class="content__item-header-title">Juked</h2>
					</header>
					<div class="content__item-copy">
						<p class="content__item-copy-text">
						The key scraped round harshly twice and, when the heavy door had been
						set ajar, welcome light and bright air entered. Haines stood at the
						doorway, looking out. Stephen haled his upended valise to the table and
						sat down to wait. Buck Mulligan tossed the fry on to the dish beside
						him. Then he carried the dish and a large teapot over to the table, set
						them down heavily and sighed with relief.
						</p>
						<a href="#" class="content__item-copy-more">more +</a>
					</div>
				</article>
				<article class="content__item">
					<div class="img-wrap img-wrap--content">
						<div class="img img--content" style="background-image: url(img/3.jpg);"></div>
					</div>
					<header class="content__item-header">
						<span class="content__item-header-meta">Brisbane, March 26</span>
						<h2 class="content__item-header-title">Colza</h2>
					</header>
					<div class="content__item-copy">
						<p class="content__item-copy-text">
						Stephen listened in scornful silence. She bows her old head to a voice
						that speaks to her loudly, her bonesetter, her medicineman: me she
						slights. To the voice that will shrive and oil for the grave all there
						is of her but her woman’s unclean loins, of man’s flesh made not in
						God’s likeness, the serpent’s prey.
						</p>
						<a href="#" class="content__item-copy-more">more +</a>
					</div>
				</article>
				<article class="content__item">
					<div class="img-wrap img-wrap--content">
						<div class="img img--content" style="background-image: url(img/4.jpg);"></div>
					</div>
					<header class="content__item-header">
						<span class="content__item-header-meta">Berlin, March 27</span>
						<h2 class="content__item-header-title">Voxey</h2>
					</header>
					<div class="content__item-copy">
						<p class="content__item-copy-text">
						And putting on his stiff collar and rebellious tie he spoke to them,
						chiding them, and to his dangling watchchain. His hands plunged and
						rummaged in his trunk while he called for a clean handkerchief. God,
						we’ll simply have to dress the character. I want puce gloves and green
						boots. Contradiction.
						</p>
						<a href="#" class="content__item-copy-more">more +</a>
					</div>
				</article>
			</div>
			<div class="revealer">
				<div class="revealer__inner"></div>
			</div>
			<div class="grid grid--slideshow">
				<?php
				$directory = "upload";
				$images = glob($directory . "/*.png");
				$counter = 0; 
				
				foreach($images as $image)
				{
					$counter++;
					$nom_image = explode(".", $image);
					$contenu_image = explode("/", $nom_image[0]);
					$image_infos= explode("_", $contenu_image[1]);
					//var_dump($nom_image);
				  echo '<figure class="grid__item grid__item--slide">
							<span class="number">' . sprintf("%02d", $counter
							) . '</span>
							<div class="img-wrap">
								<div class="img" style="background-image: url(' . $image . ');"></div>
							</div>
							<figcaption class="caption">par ' . $image_infos[0] . ' le ' . $image_infos[1] . '/' . $image_infos[2] . '/' . $image_infos[3] . ' à ' . $image_infos[4] . ':' . $image_infos[5] . '</figcaption>
						</figure>';
				}
				
				?>
				<!--<figure class="grid__item grid__item--slide">
					<span class="number">01</span>
					<div class="img-wrap">
						<div class="img" style="background-image: url(img/1.jpg);"></div>
					</div>
					<figcaption class="caption">New York City, March 24</figcaption>
				</figure>
				<figure class="grid__item grid__item--slide">
					<span class="number">02</span>
					<div class="img-wrap">
						<div class="img" style="background-image: url(img/2.jpg);"></div>
					</div>
					<figcaption class="caption">Acapulco, March 25</figcaption>
				</figure>
				<figure class="grid__item grid__item--slide">
					<span class="number">03</span>
					<div class="img-wrap">
						<div class="img" style="background-image: url(img/3.jpg);"></div>
					</div>
					<figcaption class="caption">Brisbane, March 26</figcaption>
				</figure>
				<figure class="grid__item grid__item--slide">
					<span class="number">04</span>
					<div class="img-wrap">
						<div class="img" style="background-image: url(img/4.jpg);"></div>
					</div>
					<figcaption class="caption">Berlin, March 27</figcaption>
				</figure>-->
				<div class="titles-wrap">
					<div class="grid grid--titles">
						<?php
						foreach($images as $image)
							{
							echo '<h3 class="grid__item grid__item--title"></h3>';
							}
						?>
						<!--<h3 class="grid__item grid__item--title"></h3>
						<h3 class="grid__item grid__item--title"></h3>
						<h3 class="grid__item grid__item--title"></h3>
						<h3 class="grid__item grid__item--title"></h3>-->
					</div>
				</div>
				<div class="grid grid--interaction">
					<div class="grid__item grid__item--cursor grid__item--left"></div>
					<div class="grid__item grid__item--cursor grid__item--center"></div>
					<div class="grid__item grid__item--cursor grid__item--right"></div>
				</div>
			</div>
			<!--<div class="frame">
				<div class="frame__title-wrap">
					<h1 class="frame__title">Crossroads Slideshow</h1>
					<div class="frame__links">
						<a href="https://tympanus.net/Development/ExplodingObjects/">Previous Demo</a>
						<a href="https://tympanus.net/codrops/?p=39863">Article</a>
						<a href="https://github.com/codrops/CrossroadsSlideshow/">GitHub</a>
					</div>
					<div class="frame__mode" role="radiogroup">
						<div class="frame__mode-item frame__mode-item--dark">
							<input id="mode-1" type="radio" name="mode" class="frame__mode-input"></input>
							<label class="frame__mode-label" for="mode-1">Dark mode</label>
						</div>
						<div class="frame__mode-item">
							<input id="mode-2" type="radio" name="mode" class="frame__mode-input" checked></input>
							<label class="frame__mode-label frame__mode-label--light" for="mode-2">Light mode</label>
						</div>
					</div>
				</div>
			</div><!-- /frame -->
		</main>
		<video id="video" width="720" height="560" mute autoplay></video>
		<canvas></canvas>	
		<form method="post" accept-charset="utf-8" name="form1">
			<input name="hidden_data" id='hidden_data' type="hidden"/>
			<input name="name" id='name' type="hidden"/>
		</form>
		<script src="js/face-api.min.js"></script>
		<script src="js/script.js"></script>
		<script>

		/*	var i = 1;                  //  set your counter to 1

			function defiler() {         //  create a loop function
			setTimeout(function() {   //  call a 3s setTimeout when the loop is called
				//console.log('ok numero' + i) //  your code here
				i++;         
				$('.grid__item--right').click();           //  increment the counter
				if (i < 1000) {           //  if the counter < 10, call the loop function
				defiler();             //  ..  again which will trigger another 
				}                       //  ..  setTimeout()
			}, 2000)
			}

			defiler();  */
			
			
			document.onkeydown = checkKey;

			function checkKey(e) {

				e = e || window.event;

				if (e.keyCode == '38') {
					// up arrow
				}
				else if (e.keyCode == '40') {
					// down arrow
				}
				else if (e.keyCode == '37') {
				$('.grid__item--left').click();  
				}
				else if (e.keyCode == '39') {
				$('.grid__item--right').click();  
				}

			}
		</script>

		<script src="js/imagesloaded.pkgd.min.js"></script>
		<script src="js/charming.min.js"></script>
		<script src="js/TweenMax.min.js"></script>
		<script src="js/demo.js"></script>
	</body>
</html>
