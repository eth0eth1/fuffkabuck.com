<script src="masonry.pkgd.min.js"> //Masonry Initilisation. Waits for images to load before setting #Container as the msnry instance
	
var container = document.querySelector('container');
var msnry;
// initialize Masonry after all images have loaded
imagesLoaded( container, function() {
  msnry = new Masonry( container );
});
</script>

<?php
require "header.php";
?>

<article>

<div class="content">

<iframe width="600" height="600" src="https://sketchfab.com/models/adf631c73bdf4e4db53fe0cc9c20fbb1/embed" frameborder="0" allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" onmousewheel=""></iframe>
	<div id="container">

		<img class="item" src="img/NollPoseWork.jpg" alt="Image showing design work from Noll project">
		<img class="item" src="img/TreasureNoll.jpg" alt="Image showing design work from Noll project">
		<img class="item" src="img/DesignNoll.jpg" alt="Image showing design work from Noll project">
		<img class="item" src="img/TechnicalNoll.jpg" alt="Image showing design work from Noll project">

	</div>



</div>
</article>
<?php
require "footer.php";
?>