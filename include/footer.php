<?php ob_start();

?>
<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->
<!-- for bootstrap working -->
		<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<style>
#accordion h4 {
    display: block;
    cursor: pointer;
    position: relative;
    margin: 2px 0 0 0;
    padding: .9em .9em;
    min-height: 0;
    font-size: 1.1em;
    outline: none;
    background: #666;
    color: #fff;
    text-transform: capitalize;
}</style>
 <script src="js/jquery.ticker.js" type="text/javascript"></script>
 <script type="text/javascript">
$(document).ready(function(){

$('ul.newsticker').newsTicker({
    row_height: 150,
    max_rows: 2,
    speed: 400,
    direction: 'up',
    duration: 2500,
    autostart: 1,
    pauseOnHover: 1
});
});
 </script>
</body>
</html>
<?php ob_flush(); ?>