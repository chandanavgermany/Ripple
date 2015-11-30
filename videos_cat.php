
<?php  
include("connect.php");
session_start();
$cat=mysql_real_escape_string($_GET['cat']);
$id=mysql_real_escape_string($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
 
    

        <title>Ripple</title>
    <link rel='stylesheet' type='text/css' href='videos/css/main.css' >
<link rel='stylesheet' type='text/css' href='videos/css/footer.css' >
<link rel='stylesheet' type='text/css' href='videos/css/index.css' >
<link rel='stylesheet' type='text/css' href='videos/css/sceditor/themes/default.css' >
<link rel='stylesheet' type='text/css' href='videos/css/postlist.css' >
<link rel='stylesheet' type='text/css' href='videos/css/videos.css' >
    <!--[if lt IE 9]>
    <script src="/videos/js/html5shiv.js"></script><![endif]-->

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

            <aside id="playlist">
            <div>

                                    <a href="videos.php" class="back">&lt; All Computer Science Tutorials</a>
                            </div>
            <br/>
			
			
			<?php 
			$c=0;
						$sql_v=mysql_query("SELECT * FROM video_categories WHERE categoryID='".$cat."'") or die(mysql_error());
						$r_cat=mysql_fetch_array($sql_v);
			$sql=mysql_query("SELECT * FROM videos WHERE categoryID='".$cat."' ORDER BY videoID LIMIT 5") or die(mysql_error());
			
									

            echo '<dl>
                <dt>
                <h4>'.$r_cat['categoryName'].'</h4>                </dt>';
				
				while($row=mysql_fetch_array($sql)){
					$c++;
                                    echo '<dd>
                        <a href="videos_cat.php?cat='.$cat.'&id='.$row['videoID'].'"
                            class="category-name">'.$c.'-'.$row['title'].' </a>
                    </dd>';
				}
					
                    echo '<div class="menu-item-divider"></div>
                                                   
                                                </dl>
												
												
      </aside>
        <section id="right_side">';
		
	
		
		
	

           
			
			if(empty($id)){
	$s_video=mysql_query("SELECT * FROM videos WHERE categoryID='".$cat."' ORDER BY videoID LIMIT 1") or die(mysql_error());
$video_l=mysql_fetch_array($s_video);

$o=$video_l['videoID']+1;
 echo '<span class="titles"> '.$video_l['title'].' </span>

            <div id="youtube_video">
               <iframe width="640" height="360" src="//www.youtube.com/embed/'.$video_l['code'].'"
                    frameborder="0" allowfullscreen></iframe>';
					        echo '    <div class="progress_container">
                    <div class="progress_container_bg">
                        <div class="progress_bar"
                            style="width: 2.5641025641026%;"></div>
                    </div>
                </div>
                <div class="clear"></div>

                <div class="clear"></div>
            </div>';
			}
			else{
					$s=mysql_query("SELECT * FROM videos WHERE videoID='".$id."'") or die(mysql_error());
		$video=mysql_fetch_array($s);
		$p=$video['videoID']+1;
		               echo ' <span class="titles"> '.$video['title'].' </span>

            <div id="youtube_video">
					   <iframe width="640" height="360" src="//www.youtube.com/embed/'.$video['code'].'"
                    frameborder="0" allowfullscreen></iframe>';
					        echo '    <div class="progress_container">
                  
                </div>
                <div class="clear"></div>

               
                <div class="clear"></div>
            </div>';
			}
    
?>
            <!-- Create Topic Directly -->
            
                    </section>
    
</section>

<!-- Go to www.addthis.com/dashboard to customize your tools 
<script type="text/javascript" src="//s7.addthis.comvideos/js/300/addthis_widget.js#pubid=ra-53b910e169f3bbcf"></script>
-->
        <div id="main_footer">    </div>
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
				    <li class="has-submenu" id="lft-last-li"><a href="videos.php" class="p_menu">Videos & Tutorials</a>

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

</div>

<script type='text/javascript' src='videos/js/site.js' ></script>
<script type='text/javascript' src='videos/js/sceditor/jquery.sceditor.bbcode.js' ></script>
<script type='text/javascript' src='videos/js/videos.js' ></script>
</body>
</html>