<?php  
include("connect.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">


    

        <title>Ripple </title>
    <link rel='stylesheet' type='text/css' href='videos/css/main.css' >
<link rel='stylesheet' type='text/css' href='videos/css/footer.css' >
<link rel='stylesheet' type='text/css' href='videos/css/index.css' >
<link rel='stylesheet' type='text/css' href='videos/css/sceditor/themes/default.css' >
<link rel='stylesheet' type='text/css' href='videos/css/postlist.css' >
<link rel='stylesheet' type='text/css' href='videos/css/videos.css' >

<link rel='stylesheet' type='text/css' href='videos/css/posting.css' >
<link rel='stylesheet' type='text/css' href='videos/css/uploadify.css' >
    <!--[if lt IE 9]>
    <script src="videos/js/html5shiv.js"></script><![endif]-->

    <script type='text/javascript' src='videos/js/jquery-1.9.0.js' ></script>
</head>
<body>


<!-- Preload Images -->
<div id="preload-wrapper">
    <img src="videos/images/loading.gif"/> <img src="videos/images/loading1.gif"/> <img src="videos/images/loading2.gif"/> <img
        src="videos/images/loading3.gif"/> <img src="videos/images/loading16.gif"/>
</div>

<div id="wrapper">
        <header id="main_header">
                    <a href="index.php" class="headerLogo">RIP<span class="secondColor">PLE</span></a>
            </header>
    
<section id="main_section" class="videos-wrapper">

            <aside id="main_aside">
            <div class="category-section-title" style="margin-bottom:15px;">
                                    Science Videos & Tutorials
                            </div>
                            <dl>
                    <dt>
                    <h4 style="background-color:
                    #2c3e50                        ">Biology</h4>                    </dt>
                                           					<?php $sql=mysql_query("SELECT * FROM video_categories WHERE parentID=148 LIMIT 5") or die();
					    
			               while($row=mysql_fetch_array($sql)){
                           echo '                 <dd>
                            <a href="videos_s_cat.php?cat='.$row['categoryID'].'"
                                class="category-name">            '.$row['categoryName'].'                 <span
                                    style="font-size:11px; display:none;"> (96 videos)</span></a>
                      </dd>';
					  
					  
						   }
					  ?>
                                    </dl>
                            <dl>
                    <dt>
                    <h4 style="background-color:
                    #c0392b                        ">Chemistry</h4>                    </dt>
                                        					<?php $sql=mysql_query("SELECT * FROM video_categories WHERE parentID=149 LIMIT 5") or die();
					    
			               while($row=mysql_fetch_array($sql)){
                           echo '                 <dd>
                            <a href="videos_s_cat.php?cat='.$row['categoryID'].'"
                                class="category-name">            '.$row['categoryName'].'                 <span
                                    style="font-size:11px; display:none;"> (96 videos)</span></a>
                      </dd>';
					  
					  
						   }
					  ?>
                                    </dl>
                            
                            <dl>
                    <dt>
                    <h4 style="background-color:
                    #8e44ad                        ">Physics</h4>                    </dt>
                                        					<?php $sql=mysql_query("SELECT * FROM video_categories WHERE parentID=150 LIMIT 5") or die();
					    
			               while($row=mysql_fetch_array($sql)){
                           echo '                 <dd>
                            <a href="videos_s_cat.php?cat='.$row['categoryID'].'"
                                class="category-name">            '.$row['categoryName'].'                 <span
                                    style="font-size:11px; display:none;"> (96 videos)</span></a>
                      </dd>';
					  
					  
						   }
					  ?>
                                    </dl>
                    </aside>
        <section id="right_side">

                            <span class="video-section-title">Tutorials for Free!</span>
             <br>

                            <span
                    class="video-section-title">Most Popular Video - What is Chemistry?</span>
                <div id="featured_video">
                    <iframe width="640" height="360"
                        src="//www.youtube.com/embed/4SbyQ9eVP7Q" frameborder="0"
                        allowfullscreen></iframe>
                </div>
                <!-- Share Code -->
                <div class="addthis_sharing_toolbox" style="margin:5px; margin-left:-2px;"></div>
                <div class="video-description">Learn the basics of Chemistry in this course.</div>
                <div id="featured_playlists">
                             
                                    
                                        <div class="clear"></div>
                </div>
                        <br/>
						<div class="new-post-row">
                    
					<form method="post" id="newpostform" action="">
					<h2>Contact a Lecture</h2>
                        <div id="new-post-nav">
                            <a href="#" class="post-text selected">Text</a> 
                        </div>
                        <textarea name="content" class="newPost" placeholder="Create a new post..."></textarea>

                                    <br><br>

                    

                            <input type="submit" id="" name="submit" class="redButton" value="Post"/>

            <br><br>
                    </form>
                </div>
        </section>
    
</section>

<!-- Go to www.addthis.com/dashboard to customize your tools 
<script type="text/javascript" src="//s7.addthis.comvideos/js/300/addthis_widget.js#pubid=ra-53b910e169f3bbcf"></script>
-->
        <div id="main_footer">   </div>
    <div id="fixed_footer">
 <ul>
      <div class="centered-navigation">
	 
                <li class="home_button" style="border-left:1px solid rgba(0,0,0,0.4); height:auto;"><a href="index.php"></a>
                </li>
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
								<li>
                    <a href="quiz.php" class="p_menu">Take test</a>
                </li>
				    <li class="has-submenu" id="lft-last-li"><a href="videos_cat.php" class="p_menu">Videos & Tutorials</a>

                    <div class="submenu">
                        <a
                            href="video_business.php">Business</a> <a href="videos.php">Computer Science</a>
                      <a href="video_humanities.php">Humanities</a> <a
                            href="video_math.php">Math</a> <a href="video_science.php">Science</a> 
                    </div>
                </li>

            </div>
<?php if($_SESSION['signed_in'])
			{
echo '<li class="right">
                <a href="signout.php" class="p_menu">Log Out</a>
            </li>';
			}
			?>
            

           
            </ul>   
    </div>

</div>

<script type='text/javascript' src='videos/js/site.js' ></script>
<script type='text/javascript' src='videos/js/sceditor/jquery.sceditor.bbcode.js' ></script>
<script type='text/javascript' src='videos/js/videos.js' ></script>
</body>
</html>