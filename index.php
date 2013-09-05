<!DOCTYPE html>
<html>
    <head>
	    <?php require_once("includes/html/head.htm"); ?>
    </head>
    <body>
        <div id="container">
            <?php require_once("posts.htm"); ?>
	    <?php require_once("includes/html/foot.htm"); ?>
        </div>
		
		<!-- This would be a good place to insert Google Analytics code -->
		
		<!-- Use high resolution images on Retina Displays-->
        <script>
            var images = document.getElementsByTagName("img");
            if (window.devicePixelRatio > 1.5) {
                for (var i=0; i<images.length; i++) {
                    images[i].src = images[i].id;
                }
            }
        </script>
    </body>
</html>
