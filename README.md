flickr-gallery
==============

A simple way to create an elegant gallery of your best photos hosted on Flickr.

Prerequisites
-------------
- A webserver that is capable of executing PHP scripts
- A Flickr account

Installation
------------
Copy all of this repositories files to your server.

Setup
-----
1. Open `includes/html/head.htm` and enter a sensible title for your new website and put it in the ´<title>´ tag.
2. Open `includes/html/foot.htm` with your favorite text editor and replace my details and profile links with yours. Delete everything you may not want to publish.
3. Open `images.txt`, enter the IDs of the photos you want to publish, each in a separate line.
4. Launch your favorite web browser and navigate to `http://yourserver.com/flickr-gallery/generator.php`. This will parse your `images.txt` and build your website.
5. Done! You should be able to see your site at `http://yourserver.com/flickr-gallery`

Repeat steps 3. and 4. whenever you add or remove any images to your `images.txt`.

Demo
----
I am using a slightly modified version of this gallery on my own website at http://jan-gerd.com.

Credits
-------
This project uses the [socialico font](http://fontfabric.com/social-media-icons-pack/) by Fontfabric and (Arvo)[http://files.korkork.com/index.php?/fonts/arvo/] by Anton Koovit.