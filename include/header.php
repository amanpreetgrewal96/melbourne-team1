<?php ob_start();
session_start();

 ?>
<!DOCTYPE html>
<html>
<head>
<title>Result Management System</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Vide" />
<meta name="keywords" content="Smartechie" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="css/nav.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/iconeffects.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- js -->
   <script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<!-- dropdown -->
<script src="js/jquery.easydropdown.js"></script>
<!-- //dropdown -->
<!--webfont-->
<link href='//fonts.googleapis.com/css?family=Nunito:400,300,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<!-- accordian -->
<link rel="stylesheet" href="css/jquery-ui.css">
	<script src="js/jquery-ui.js"></script>
	  <script>
		  $(function() {
			$( "#accordion" ).accordion();
		  });
	  </script>
<!-- //accordian -->
<!-- tabs -->
<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$('#horizontalTab').easyResponsiveTabs({
			type: 'default', //Types: default, vertical, accordion           
			width: 'auto', //auto or any width like 600px
			fit: true   // 100% fit in a container
			});
		});				
	</script>
<!-- //tabs -->
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
       <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

<script defer src="js/jquery.flexslider.js"></script>

  <script type="text/javascript">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>

<!--//end-animate-->
 <style>
 ul.latest-news li span.date {
    margin: 0;
    padding: 0;
    float: left;
    width: 100%;
    text-decoration: none;
    font-size: 14px;
    color: #E21737;
}

ul.latest-news li {
    margin: 0;
    padding: 0;
    float: left;
    width: 100%;
    list-style: none;
    padding: 3px 0px;
    background: url(images/arrow3.png) left;
    background-repeat: no-repeat;
    background-position: 0 13px;
    padding-left: 20px;
    border-bottom: 1px dashed #E21737;
}
 </style>
</head>
<body>

<div data-vide-bg="video/training">
    <div class="center-container">
		<div class="ban-shade">
			<div class="header-nav">
				<div class="logo wow fadeInUp animated" data-wow-delay=".5s">
					<h1>
						<a class="link link--kumya" href="index.php"><i></i><span data-letters="RMS Student Portal">RMS Student Portal</span></a>
					</h1>
				</div>
				<div class="top-nav wow fadeInUp animated" data-wow-delay=".5s">										 
						<label class="mobile_menu" for="mobile_menu">
						<span>Menu</span>
						</label>
						<input id="mobile_menu" type="checkbox">
					   <ul class="nav">
                         
						 <li><a href="#" data-toggle="modal" data-target="#myModal">Student Login</a></li>
                        
					  </ul>
				 </div>
				<div class="clearfix"></div>
			</div>
            <marquee attribute_name="attribute_value">
           
</marquee>
