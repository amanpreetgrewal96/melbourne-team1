<?php ob_start();
session_start(); ?>

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
 <script>
 $(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide"
  });
});</script>
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
ul.nav li ul
{
    width:190px !important;
}
.abt-icon{width:25%;}
 </style>
</head>
<body>
<!-- page-head -->
    <div class="page-head">
			<div class="header-nav " style="background: linear-gradient(to right, #4c120d, #03a9f3) !important">
				<div class="logo wow fadeInUp animated" data-wow-delay=".5s">
					<h1>
						<a class="link link--kumya" href="student-panel.php"><i></i><span data-letters="Student Panel">Student Panel</span></a>
					</h1>
				</div>
				<div class="top-nav wow fadeInUp animated" data-wow-delay=".5s">										 
						<label class="mobile_menu" for="mobile_menu">
						<span>Menu</span>
						</label>
						<input id="mobile_menu" type="checkbox">
					   <ul class="nav">
                        
                           <li><a href="note.php">Notifications</a></li>
                           <li><a href="result.php">Results</a></li>
						     <li class="sub-menu"><a href="#">Query</a>
                           <ul>
                            <li><a href="askquery.php">Ask Query</a></li>
							 <li><a href="rquery.php">Query Response</a></li>
							 </ul>
                            </li>
                           <li><a href="profile.php">Setting</a></li>
                           <li><a href="index.php">Logout</a></li>
                      <!--    <li class="sub-menu"><a href="#">Welcome </a>
                          <span style="color: white;">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                           
                           
                           
                           </li>
                       -->
					  </ul>
				 </div>
				<div class="clearfix"></div>
			</div>
    </div><marquee attribute_name="attribute_value" style="font-size:16px;color:red;font-weight:bold;">
         
</marquee>
<div class="flexslider">
<ul class="slides">


</ul>
</div>
<div class="about">
	<div class="col-md-12 wow fadeInLeft animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInLeft;">
		<div class="hi-icon-wrap hi-icon-effect-4 hi-icon-effect-4b">
			<div class="abt-icon">
				<a href="result.php" class="hi-icon icon3"></a>
				<h4>Result</h4>
			</div>
            	<div class="abt-icon">
				<a href="note.php" class="hi-icon icon3"></a>
				<h4>Notifications</h4>
			</div>
			
			<div class="abt-icon">
				<a href="rquery.php" class="hi-icon icon2"></a>
				<h4>Queries</h4>
			</div>
			<div class="abt-icon">
				<a href="index.php" class="hi-icon icon2"></a>
				<h4>Logout</h4>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>