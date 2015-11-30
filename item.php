<?php

include("connect.php");
session_start();
ob_start();


															$item=mysql_real_escape_string($_GET['id']);

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

if(isset($_POST['submit'])){


}

?>
<!DOCTYPE HTML>
<html>
<head>
<title>RIPPLE | DESC</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="cool/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="cool/css/form.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<link href='https://fonts.googleapis.com/css?family=Anton' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Candal' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="cool/js/jquery.min.js"></script>
<script type="text/javascript">
        $(document).ready(function() {
            $(".dropdown img.flag").addClass("flagvisibility");

            $(".dropdown dt a").click(function() {
                $(".dropdown dd ul").toggle();
            });
                        
            $(".dropdown dd ul li a").click(function() {
                var text = $(this).html();
                $(".dropdown dt a span").html(text);
                $(".dropdown dd ul").hide();
                $("#result").html("Selected value is: " + getSelectedValue("sample"));
            });
                        
            function getSelectedValue(id) {
                return $("#" + id).find("dt a span.value").html();
            }

            $(document).bind('click', function(e) {
                var $clicked = $(e.target);
                if (! $clicked.parents().hasClass("dropdown"))
                    $(".dropdown dd ul").hide();
            });


            $("#flagSwitcher").click(function() {
                $(".dropdown img.flag").toggleClass("flagvisibility");
            });
        });
     </script>
<!-- start menu -->     
<link href="cool/css/megamenu.css" rel="stylesheet" type="text/css" media="all" />


<script type="text/javascript" src="cool/js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<!-- end menu -->
<script type="text/javascript" src="cool/js/jquery.jscrollpane.min.js"></script>
		<script type="text/javascript" id="sourcecode">
			$(function()
			{
				$('.scroll-pane').jScrollPane();
			});
		</script>
<!----details-product-slider--->
				<!-- Include the Etalage files -->
					<link rel="stylesheet" href="cool/css/etalage.css">
					<script src="cool/js/jquery.etalage.min.js"></script>
				<!-- Include the Etalage files -->
				<script>
						jQuery(document).ready(function($){
			
							$('#etalage').etalage({
								thumb_image_width: 300,
								thumb_image_height: 400,
								
								show_hint: true,
								click_callback: function(image_anchor, instance_id){
									alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
								}
							});
							// This is for the dropdown list example:
							$('.dropdownlist').change(function(){
								etalage_show( $(this).find('option:selected').attr('class') );
							});

					});
				</script>
				<!----//details-product-slider--->	
<!-- top scrolling -->
<script type="text/javascript" src="cool/js/move-top.js"></script>
<script type="text/javascript" src="cool/js/easing.js"></script>
   <script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
			});
		});
	</script>					
</head>
<body>
  <div class="header-top">
	 <div class="wrap"> 
		<div class="logo">
			<h1><i class="fa fa-group" style="font-size:36px"></i>
<a href="index.php" style="font-size:30px;font-family: 'Anton', sans-serif;">RIPPLE</a></h1>
	    </div>
	    <div class="cssmenu">
		   <ul>
		     <?php 
		   if($_SESSION['signed_in']){
			 echo '
			 <li><a href="signout.php" style="font-family: \'Nunito\', sans-serif;">Log Out</a></li> 
			 ';
		   }
		   else{
			   			 echo '<li><a href="signup.php"style="font-family: \'Nunito\', sans-serif;">Sign up </a></li> 
						<li><a href="login.php" style="font-family: \'Nunito\', sans-serif;">Log In </a></li> ';
		   }
			 ?>
		   </ul>
		</div>
		<ul class="icon2 sub-icon2 profile_img">
			<li><a class="active-icon c2" href="#"> </a>
				<ul class="sub-icon2 list">
						
				<li><p>Contact:mrchandanav@gmail.com <br> 8867310695</p></li>

				</ul>
			</li>
		</ul>
		<div class="clear"></div>
 	</div>
   </div>
   <div class="header-bottom">
   	<div class="wrap">
   		<!-- start header menu -->
			<ul class="megamenu skyblue">
		    <li><a class="color1" href="index.php" style="font-family: 'Passion One', cursive;">Home</a></li>
			
			
		   </ul>
		   <div class="clear"></div>
     	</div>
       </div>
       <div class="single">
         <div class="wrap">
     	 <div class="rsidebar span_1_of_left">
				   <section  class="sky-form">
                   	  <h4>Mathematics</h4>
						<div class="row row1 scroll-pane">
							
							<div class="col col-4">
							<ul>
	<label class="" ><li style="margin-bottom:4px;"><a href="#" style="color:#000000;">Arithmetic</a></li></label>
						<label class="" ><li style="margin-bottom:4px;"><a href="#" style="color:#000000;">Algebra</a></li></label>

									<label class="" ><li style="margin-bottom:4px;"><a href="#" style="color:#000000;">Geometry</a></li></label>


							
													

						    </ul>
							</div>
						 </div>
                   	  <h4>Science</h4>
						<div class="row row1 scroll-pane">
							
							<div class="col col-4">
																					
	<ul>
		<label class="" ><li style="margin-bottom:4px;"><a href="#" style="color:#000000;">Physics</a></li></label>
						<label class="" ><li style="margin-bottom:4px;"><a href="#" style="color:#000000;">Chemistry</a></li></label>

									<label class="" ><li style="margin-bottom:4px;"><a href="#" style="color:#000000;">Biology</a></li></label>
										

						    </ul>
						    </div>
						</div>
					 <h4>Socail science</h4>
						<div class="row row1 scroll-pane">
							
							<div class="col col-4">
								<ul>
	
<label class="" ><li style="margin-bottom:4px;"><a href="#" style="color:#000000;">History</a></li></label>
						<label class="" ><li style="margin-bottom:4px;"><a href="#" style="color:#000000;">Geography</a></li></label>

									<label class="" ><li style="margin-bottom:4px;"><a href="#" style="color:#000000;">civics</a></li></label>
							<label class="" ><li style="margin-bottom:4px;"><a href="#" style="color:#000000;">Economics</a></li></label>

		
													

						    </ul>
						    </div>
						</div>
				</section>
		   
		    

		</div>
		<div class="cont span_2_of_3">
			  <div class="labout span_1_of_a1">
				<!-- start product_slider -->
				     <ul id="etalage">
					<?php 
					

					
					$ss=mysql_query("SELECT * FROM books WHERE id='".$item."' LIMIT 1") or die(mysql_error());
					$ir=mysql_fetch_array($ss);
					  
					   
					  
							echo '<li>
								<img class="etalage_source_image" src="'.$ir['book_img'].'" />
							</li>
							
						</ul>
					
					
			<!-- end product_slider -->
			</div>
			<div class="cont1 span_2_of_a1">
				<h3 class="m_3" style="font-family: \'Nunito\', sans-serif;">'.$ir['book_name'].'<br>author-'.$ir['book_author'].'</h3>
				
				<div class="price_single">
							  <span class="reducedfrom" style="font-family: \'Shadows Into Light\', cursive;">100 points</span>
							  <span class="actual" style="font-family: \'Shadows Into Light\', cursive;">50 points</span><a href="#"></a>
							</div>
				
				<div class="btn_form">
<form method="post" action="test.php?id='.$ir['id'].'">';
				   
				  
				  
				echo '
					 <input type="submit" name="submit" value="Redeem now" title="">
				  </form>';
				  ?>
				  
				</div>
				<ul class="add-to-links">
    			</ul>
    			<p class="m_desc">/* Product info Product info Product info Product info Product info Product info*/</p>
    			
                <div class="social_single">	

			    </div>
			</div>
			<div class="clear"></div>
     
    
		 
	    <script type="text/javascript">
		 $(window).load(function() {
			$("#flexiselDemo1").flexisel();
			$("#flexiselDemo2").flexisel({
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
		
			$("#flexiselDemo3").flexisel({
				visibleItems: 5,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
		    
		});
	</script>
	<script type="text/javascript" src="cool/js/jquery.flexisel.js"></script>
	 <div class="toogle">
     	<h3 class="m_3">Product Details</h3>
     	<p class="m_text">/*  Product Details Product Details Product Details Product Details  * /</p>
     </div>					
	 <div class="toogle">
     	<h3 class="m_3">Product Reviews</h3>
     	<p class="m_text">/*Product Reviews Product Reviews Product Reviews Product Reviews */</p>
     </div>
     </div>
     <div class="clear"></div>
	 </div>
     </div>
	  <div class="footer">
       	 <div class="footer-top">
       		<div class="wrap">
       			   <div class="col_1_of_footer-top span_1_of_footer-top">
				  	 <ul class="f_list">
				  	 </ul>
				   </div>
				   <div class="col_1_of_footer-top span_1_of_footer-top">
				  	<ul class="f_list">
				  	 	<li><img src="" alt=""/><span class="delivery">Customer Service :<span class="orange"> 8867310695 </span></span></li>
				  	 </ul>
				   </div>
				   <div class="col_1_of_footer-top span_1_of_footer-top">
				  	<ul class="f_list">
				  	 </ul>
				   </div>
				  <div class="clear"></div>
			 </div>
       	    </div>
       	    
       <div class="copy">
       	   <div class="wrap">
       	   </div>
       	 </div>
       </div>
       <script type="text/javascript">
			$(document).ready(function() {
			
				var defaults = {
		  			containerID: 'toTop', // fading element id
					containerHoverID: 'toTopHover', // fading element hover id
					scrollSpeed: 1200,
					easingType: 'linear' 
		 		};
				
				
				$().UItoTop({ easingType: 'easeOutQuart' });
				
			});
		</script>
        <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
</body>
</html>