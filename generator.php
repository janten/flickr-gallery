<?php
ob_start();
header("Content-Type: text/plain");
$imageList = file_get_contents("images.txt");
$images = explode("\n", $imageList);
$output = "";
$flickr_api_key = "5737c7c9f5f8369815d59b6c1caffb65";

$handle = fopen("posts.htm", "w");
if ($handle === false) {
	echo "Could not open posts.htm for writing. Please check the rights on this file.";
	exit;
}
fclose($handle);

foreach ($images as $id) {
	$url = "http://api.flickr.com/services/rest/?method=flickr.photos.getInfo&api_key=$flickr_api_key&photo_id=$id";
	$xml = simplexml_load_file($url);
	$date = $xml->photo->dates->attributes()->taken;
	$dateString = substr($date, 8, 2).'.'.substr($date, 5, 2).'.'.substr($date, 0, 4);

	$url = "http://api.flickr.com/services/rest/?method=flickr.photos.getSizes&api_key=$flickr_api_key&photo_id=$id";
	$sxml = simplexml_load_file($url);
	$location = $altLocation = "";
	$theSize = 0;
	foreach ($sxml->sizes->size as $size) {
		$src = $size->attributes()->source;
		$identifier = substr($src, -5);
		if ($identifier == "h.jpg") {
			$altLocation = $src;
		}
		if ($identifier == "c.jpg") {
			$location = $src;
			$theSize = $size;
		}
	}

	// Normalize Unicode characters, otherwise there may be problems with the Arvo font
	$title = Normalizer::normalize($xml->photo->title);
	$output .= "<header>$dateString</header>\n<a name=\"$id\"><h1>$title</h1></a>\n<a href=\"{$xml->photo->urls->url}\"><img src=\"$location\" id=\"$altLocation\" width=\"{$theSize->attributes()->width}\" height=\"{$theSize->attributes()->height}\"></a>\n\n";
	echo "Handled photo $id ({$xml->photo->title})\n";
	ob_flush();
	flush();
}

// Write the generated HTML code to posts.html
$ret = file_put_contents("posts.htm", $output);
echo "$ret bytes written\n";
?>
