<?php
require "header.php";
?>

<article>

<div class="content">

	
	<div id="container"
  		<div class="item"><iframe class="item" width="600" height="600" src="https://sketchfab.com/models/adf631c73bdf4e4db53fe0cc9c20fbb1/embed" frameborder="0" allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" onmousewheel=""></iframe></div>
		<div class="item"><img src="img/NollPoseWork.jpg" alt="Image showing design work from Noll project"></div>
		<div class="item"><img src="img/TreasureNoll.jpg" alt="Image showing design work from Noll project"></div>
		<div class="item"><img src="img/DesignNoll.jpg" alt="Image showing design work from Noll project"></div>
		<div class="item"><img src="img/TechnicalNoll.jpg" alt="Image showing design work from Noll project"></div>

	</div>

</div>
</article>

<script src="masonry.pkgd.min.js">
var container = document.quertSelector('#container');
var msnry = new Masonry(container, {
	columnWidth:150,
	itemSelector: '.item'
});
imagesLoaded( container, function() {
	console.error(This function is doing something)
  	msnry.layout();
});
</script>

<?php
require "footer.php";
?>