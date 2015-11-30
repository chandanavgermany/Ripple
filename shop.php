<?php

include("connect.php");
session_start();
ob_start();


?>
<!DOCTYPE HTML>
<html>
<head>
<title>Ripple | Shop </title>
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
<script src="cool/js/jquery.easydropdown.js"></script>
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
<a href="index.php" style="font-size:30px;font-family: 'Anton', sans-serif;">Ripple</a></h1>

	    </div>
	    <div class="cssmenu">
		   <ul>
		   <?php 
		   if($_SESSION['signed_in']){
			 echo '
			 <li><a href="signout.php">Log Out</a></li> 
			 ';
		   }
		   else{
			   			 echo '<li><a href="signup.php">Sign up </a></li> 
						<li><a href="login.php">Log In </a></li> ';
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
			
                
                <!-- This Item is an Image Home-->
			<?php if($_SESSION['signed_in'])
			{
				               echo ' <li><a href="account.php" class="p_menu">My Account</a></li>';

			}
			else{
								               echo ' <li><a href="signup.php" class="p_menu">Sign Up</a></li>';
				               echo ' <li><a href="login.php" class="p_menu">Login</a></li>';

			}?>
                   
                
<li>
                    <a href="forum.php" class="p_menu">Forum</a>
                </li>    
				<li>
                    <a href="pop_posts.php" class="p_menu">posts</a>
                </li>                <li>
                    <a href="createtopic.php" class="p_menu">create topic</a>
                </li>

            </div>

            
		   </ul>
		   <div class="clear"></div>
     	</div>
       </div>
       <div class="login">
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
					 <h4>Social science</h4>
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
		
     	    <div class="clear"></div>
	       
			    <div class="box1">
				<?php 		$i=55;		$s=mysql_query("SELECT * FROM books LIMIT 3 ") or die(mysql_error());
				while($r=mysql_fetch_array($s)){
					 
				echo   '<div class="col_1_of_single1 span_1_of_single1"><a href="item.php?id='.$r['id'].'">
				     <div class="view1 view-fifth1">
				  	  <div class="top_box">
					  	<h3 class="m_1" style="font-family: \'Candal\', sans-serif;">'.$r['book_name'].'<br> Author- ' .$r['book_author'].'</h3>
					  	<p class="m_2"></p>
				         <div class="grid_img">
						   <div class="css3"><img src="'.$r['book_img'].'" height="180" alt=""/></div>
					          <div class="mask1">
	                       		<div class="info">Quick View</div>
			                  </div>
	                    </div>
                       <div class="price" style="font-family: \'Shadows Into Light\', cursive;">'.$i.' points</div>
					   </div>
					    </div>
					   <span class="rating1">
				        <input type="radio" class="rating-input" id="rating-input-1-5" name="rating-input-1">
				        <label for="rating-input-1-5" class="rating-star1"></label>
				        <input type="radio" class="rating-input" id="rating-input-1-4" name="rating-input-1">
				        <label for="rating-input-1-4" class="rating-star1"></label>
				        <input type="radio" class="rating-input" id="rating-input-1-3" name="rating-input-1">
				        <label for="rating-input-1-3" class="rating-star1"></label>
				        <input type="radio" class="rating-input" id="rating-input-1-2" name="rating-input-1">
				        <label for="rating-input-1-2" class="rating-star"></label>
				        <input type="radio" class="rating-input" id="rating-input-1-1" name="rating-input-1">
				        <label for="rating-input-1-1" class="rating-star"></label>&nbsp;
		        	  
		    	      </span>
						 <ul class="list2">
						  <li>
						  	<img src="cool/images/plus.png" alt=""/>
						  	<ul class="icon1 sub-icon1 profile_img">
							  <li><a class="active-icon c1" href="#">buy  </a>
								<ul class="sub-icon1 list">
									<li><h3>'.$r['book_name'].'</h3><a href=""></a></li>
									<li><p></p></li>
								</ul>
							  </li>
							 </ul>
						   </li>
					     </ul>
			    	    <div class="clear"></div>
			    	</a></div>';
					$i=$i+50;
				}
					?>
				
			
				  <div class="clear"></div>
			  </div>
			  <div class="box1">
<?php $i=100	;
$sp=mysql_query("SELECT * FROM books LIMIT 3,6 ") or die(mysql_error());

	while($r=mysql_fetch_array($sp)){
					 
				echo   '<div class="col_1_of_single1 span_1_of_single1"><a href="item.php?id='.$r['id'].'">
				     <div class="view1 view-fifth1">
				  	  <div class="top_box">
					  	<h3 class="m_1" style="font-family: \'Candal\', sans-serif;">'.$r['book_name'].' ' .$r['book_author'].'</h3>
					  	<p class="m_2"></p>
				         <div class="grid_img">
						   <div class="css3"><img src="'.$r['book_img'].'" height="180" alt=""/></div>
					          <div class="mask1">
	                       		<div class="info">Quick View</div>
			                  </div>
	                    </div>
                       <div class="price" style="font-family: \'Shadows Into Light\', cursive;">'.$i.' points</div>
					   </div>
					    </div>
					   <span class="rating1">
				        <input type="radio" class="rating-input" id="rating-input-1-5" name="rating-input-1">
				        <label for="rating-input-1-5" class="rating-star1"></label>
				        <input type="radio" class="rating-input" id="rating-input-1-4" name="rating-input-1">
				        <label for="rating-input-1-4" class="rating-star1"></label>
				        <input type="radio" class="rating-input" id="rating-input-1-3" name="rating-input-1">
				        <label for="rating-input-1-3" class="rating-star1"></label>
				        <input type="radio" class="rating-input" id="rating-input-1-2" name="rating-input-1">
				        <label for="rating-input-1-2" class="rating-star"></label>
				        <input type="radio" class="rating-input" id="rating-input-1-1" name="rating-input-1">
				        <label for="rating-input-1-1" class="rating-star"></label>&nbsp;
		        	  
		    	      </span>
						 <ul class="list2">
						  <li>
						  	<img src="cool/images/plus.png" alt=""/>
						  	<ul class="icon1 sub-icon1 profile_img">
							  <li><a class="active-icon c1" href="#">buy  </a>
								<ul class="sub-icon1 list">
									<li><h3>'.$r['book_name'].'</h3><a href=""></a></li>
									<li><p></p></li>
								</ul>
							  </li>
							 </ul>
						   </li>
					     </ul>
			    	    <div class="clear"></div>
			    	</a></div>';
					$i=$i+120;
				}				
				?>
				  <div class="clear"></div>
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
				  	 	<li><img src="" alt=""/><span class="delivery"></span></li>
				  	 </ul>
				   </div>
				   <div class="col_1_of_footer-top span_1_of_footer-top">
				  	<ul class="f_list">
				  	 	<li><img src="" alt=""/><span class="delivery">Customer Service :<span class="orange"> 8867310695</span></span></li>
				  	 </ul>
				   </div>
				   <div class="col_1_of_footer-top span_1_of_footer-top">
				  	<ul class="f_list">
				  	 	<li><img src="" alt=""/><span class="delivery"></span></li>
				  	 </ul>
				   </div>
				  <div class="clear"></div>
			 </div>
       	    </div>
       	    <div class="footer-middle">
       	 	  <div class="wrap">
       	 		<div class="section group">
				<div class="col_1_of_middle span_1_of_middle">
					
				</div>
				<div class="clear"></div>
			   </div>
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