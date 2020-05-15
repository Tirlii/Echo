<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Echo - Thibaut CHAYOT</title>
		<link rel="stylesheet" type="text/css" href="css/base.css" />
	    <script src="js/jquery-3.5.0.min.js"></script>
        <script src="js/galleria.js"></script>
	</head>
<body>
<div class="galleria">
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
                echo '<a href="http://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/Athabasca_Rail_at_Brule_Lake.jpg/800px-Athabasca_Rail_at_Brule_Lake.jpg">
                     <img 
                    src="' . $image . '" ,
                    data-big="' . $image . '"
                    data-title="'. $image_infos[0] .'"
                    data-description="a baillé le ' . $image_infos[1] . '/' . $image_infos[2] . '/' . $image_infos[3] . ' à ' . $image_infos[4] . ':' . $image_infos[5] . '"
                >
            </a>';
    }
				
				?>
    
    
	</div>
	<video id="video" width="720" height="560" mute autoplay></video>
		<canvas></canvas>	
		<form method="post" accept-charset="utf-8" name="form1">
			<input name="hidden_data" id='hidden_data' type="hidden"/>
			<input name="name" id='name' type="hidden"/>
		</form>
	
        <script>
        $(function() {
            // Load the Fullscreen theme
            Galleria.loadTheme('js/galleria.fullscreen.js');
            // Initialize Galleria
            Galleria.run('.galleria');
        });
        </script>
        <script src="js/face-api.min.js"></script>
		<script src="js/script.js"></script>
    </body>
</html>
