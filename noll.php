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

<script src="masonry.pkgd.min.js"></script>
<script src="imagesloaded.pkgd.min.js"></script>

<script>
document.getElementById("container").innerHTML = "Paragraph changed.";
var container = document.querySelector('#container');
var msnry = new Masonry(container, {
	columnWidth:150,
	itemSelector: '.item'
});
imagesLoaded( container, function() {
	document.getElementById("container").innerHTML = "Javascript function is doing stuff";
  	msnry.layout();
});
</script>

<?php
require "footer.php";
?>