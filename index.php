
<?php  
include("connect.php");
session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Home</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.6.js"></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script> 
<script type="text/javascript" src="js/Vegur_700.font.js"></script>
<script type="text/javascript" src="js/Vegur_400.font.js"></script>
<script type="text/javascript" src="js/Vegur_300.font.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/tms-0.3.js"></script>
<script type="text/javascript" src="js/tms_presets.js"></script>
<script type="text/javascript" src="js/backgroundPosition.js"></script>
<script type="text/javascript" src="js/atooltip.jquery.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<!--[if lt IE 9]>
	<script type="text/javascript" src="js/html5.js"></script>
	<style type="text/css">
		.box1 figure {behavior:url(js/PIE.htc)}
	</style>
<![endif]-->
<!--[if lt IE 7]>
		<div style='clear:both;text-align:center;position:relative'>
			<a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/images/upgrade.jpg" border="0" alt="" /></a>
		</div>
<![endif]-->
</head>
<body id="page1">
<div class="body1">
	<div class="main">
<!-- header -->
		<header>
			<div class="wrapper"><h1 style="width:143px"><a href="index.php" id="logo">Hope Center</a>
				<a href="index.php"><section ><h2 class="color3"><strong>RI</strong><strong>PP</strong><strong>LE</strong></h2>
							</section></a></h1>
				<nav>
					<ul id="top_nav">
						<li><a href="index.php"><img src="images/top_icon1.gif" alt=""></a></li>
						<li><a href="#"><img src="images/top_icon2.gif" alt=""></a></li>
						<li class="end"><a href="Contact.html"><img src="images/top_icon3.gif" alt=""></a></li>
					</ul>
				</nav>
				<nav>
					<ul id="menu">
						<li id="menu_active"><a href="index.php">Home</a></li>
						<li><a href="student.php">Student</a></li>
														<li><a href="donate.php">Patron</a></li>	
						<?php if($_SESSION['signed_in']){
							echo '						
							<li><a href="account.php">myaccount</a></li>
';
						}
						else{

						}?>
						<li><a href="Help.html">How to Help</a></li>
						<li><a href="Contact.html">Contact</a></li>
					</ul>
				</nav>
			</div>
			<div class="slider">
				<ul class="items">
					<li>
					
						<img src="http://www.empiricalzeal.com/wp-content/uploads/2012/01/village-classroom.jpg" alt="">
						<div class="banner">
							<div class="wrapper"><span>“Our<em>Mission</em>is to<em>Help</em></span></div>
							<div class="wrapper"><strong>Those Who<em>Need</em>It”</strong></div>
						</div>
					</li>
					<li>
						<img src="http://cdni.wired.co.uk/620x413/g_j/India_2.jpg" alt="">
						<div class="banner">
							<div class="wrapper"><span>“MAKE all the CHILDREN</span></div>
							<div class="wrapper"><strong>of the World HAPPY”</strong></div>
						</div>
					</li>
					<li>
						<img src="http://cache1.asset-cache.net/xd/157296226.jpg?v=1&c=IWSAsset&k=2&d=F2468F1845D6F4E83CA5EC334B05B4C32B6A5D266AEA58DB2DAF77D17EBF99F3E2B23248ED9D974B" alt="">
						<div class="banner">
							<div class="wrapper"><span>“TOGETHER we can CHANGE</span></div>
							<div class="wrapper"><strong>Many Young LIVES”</strong></div>
						</div>
					</li>
				</ul>
				<ul class="pagination">
					<li id="banner1"><a href="donate.php">Make<span>Donations</span></a></li>
					<li id="banner2"><a href="moderator.php">join<span>volunteer</span></a></li>
					<li id="banner3"><a href="#">Help<span>children</span></a></li>
				</ul>
			</div>
		</header>
<!-- / header -->
<!-- content -->
		<article id="content">
			<div class="wrapper">
				<div class="box1">
					<div class="line1"><div class="line2 wrapper">
						<section class="col1">
							<h2><strong>T</strong>rue<span>Story 1</span></h2>
							<div class="pad_bot1"><figure><img src="images/page1_img1.jpg" alt=""></figure></div>
							Little Boy’s Meeting with God.........<a href="http://www.moralstories.org/little-boys-meeting-with-god/" target="_blank"></a> There once was a little boy who wanted to meet God.
							<a href="http://www.moralstories.org/little-boys-meeting-with-god/" class="button1">Read More</a>
						</section>
						<section class="col1 pad_left1">
							<h2 class="color2"><strong>T</strong>rue<span>Story 2</span></h2>
							<div class="pad_bot1"><figure><img src="images/page1_img2.jpg" alt=""></figure></div>
							 <a class="color0" href="http://www.moralstories.org/learn-appreciate/" target="_blank" rel="nofollow">Learn to Appreciate.........</a> Once upon a time, there was a man who was very helpful, kindhearted, and generous<a href="http://www.moralstories.org/learn-appreciate/" class="button1 color2">Read More</a>
						</section>
						<section class="col1 pad_left1">
							<h2 class="color3"><strong>T</strong>rue<span>Story 3</span></h2>
							<div class="pad_bot1"><figure><img src="images/page1_img3.jpg" alt=""></figure></div>
							Keep your dream............<a href="http://www.moralstories.org/keep-your-dream/" class="link1">I have a friend named Monty Roberts who owns a horse ranch in San Isidro.</a>
							<a href="http://www.moralstories.org/keep-your-dream/" class="button1 color2">Read More</a>
						</section>
					</div></div>
				</div>	
			</div>
			<div class="wrapper">
				<h3>Our Mission</h3>
				<p class="quot">
					To promote the importance of education in the rural sector and provide them the facilities needed to cope up with their studies in a better manner.<img src="images/quot2.png" alt="">
				</p>
			</div>
			</div>
		</article>
<!-- / content -->
<!-- footer -->
		<footer>
			<div class="wrapper">
				<a href="index.html"><section class="col1 pad_left1">
							<h2 class="color3"><strong>R</strong>IPPLE<span></span></h2>
							</section>
				<ul id="icons">
					<li><a href="#" class="normaltip" title="Facebook"><img src="images/icon1.gif" alt=""></a></li>
					<li><a href="#" class="normaltip" title="Twitter"><img src="images/icon2.gif" alt=""></a></li>
					<li><a href="#" class="normaltip" title="Linkedin"><img src="images/icon3.gif" alt=""></a></li>
				</ul>
			</div>	
			<div class="wrapper">
				<nav>
					<ul id="footer_menu">
						<li class="active"><a href="index.html">Home</a></li>
						<li><a href="Mission.html">Our Mission</a></li>
						<li><a href="Help.html">How to Help</a></li>
						<li><a href="login.php">Student Login</a></li>
						<li class="end"><a href="Contact.html">Contact</a></li>
					</ul>
				</nav>
				<div class="tel"><span>+91</span>8867310695</div>
			</div>
		</footer>
<!-- / footer -->
	</div>
</div>
<script type="text/javascript">Cufon.now();</script>
<script>
$(window).load(function(){
	$('.slider')._TMS({
		preset:'zabor',
		easing:'easeOutQuad',
		duration:800,
		pagination:true,
		banners:true,
		waitBannerAnimation:false,
		slideshow:6000,
		bannerShow:function(banner){
			banner
				.css({right:'-700px'})
				.stop()
				.animate({right:'0'},600, 'easeOutExpo')
		},
		bannerHide:function(banner){
			banner
				.stop()
				.animate({right:'-700'},600,'easeOutExpo')
		}
	})
	$('.pagination li').hover(function(){
		if (!$(this).hasClass('current')) {
			$(this).find('a').stop().animate({backgroundPosition:'0 0'},600,'easeOutExpo', function(){$(this).parent().css({backgroundPosition:'-20px 0'})});
		}
	},function(){
		if (!$(this).hasClass('current')) {
			$(this).css({backgroundPosition:'0 0'}).find('a').stop().animate({backgroundPosition:'-250px 0'},600,'easeOutExpo');
		}
	})
})
</script>
</body>
</html>