
<?php 

include("connect.php");
session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

            <meta name="description"
            content=""
            content="">
    

        <title>Ripple-Posts </title>
    <link rel='stylesheet' type='text/css' href='videos/css/main.css' >
<link rel='stylesheet' type='text/css' href='videos/css/footer.css' >
<link rel='stylesheet' type='text/css' href='videos/css/jquery-ui/jquery-ui.css' >
<link rel='stylesheet' type='text/css' href='videos/css/index.css' >
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
            <section id="main_section">
    <section id="main_content" class="tops_content">
                <!-- Top Images -->
        <h2 class="titles">
            Popular
            Posts        </h2>


                    <div class="top-posts">
					

					<?php 
					
					$sql=mysql_query("SELECT * FROM pop_posts ORDER BY id DESC") or die(mysql_error());
                       					$i=1;
										
										while($row=mysql_fetch_array($sql)){
											
											$s="SELECT * FROM users where userID='".$row['p_by']."'"; 
$result=mysql_query($s);
$m=mysql_fetch_array($result);

echo '					   <div class="index_singleListing" style="border-bottom:1px solid #ebebeb; margin-top:8px; padding-bottom:8px;">

            <div class="postRank">
                '.$i.'            </div>
				

                    <a href="user.php?user='.$row['p_by'].'"><img class="index_PostIcons"
                src="'.$m['thumbnail'].'"></a>
                <div class="index_singleListingContent">
                <a href="#"
                    class="index_singleListingTitles">'.$row['p_content'].'</a>
                <br/> <span class="index_timeOfPost">'.$row['p_date'].'</span>
				by 
                                <a  href="user.php?user='.$row['p_by'].'"
                    class="smallBlue">'.$m['firstName'].' '.$m['lastName'].'</a> <br/> <a
                    href="#"
                    class="index_LikesAndComments">3 Likes</a> &middot;
                <a href="#"
                    class="index_LikesAndComments">0 Comment</a>
            </div>
										</div>';
										$i=$i+1;} 
										?>
   
                <div class="clear"></div>
                    <div class="paginate">

                <div class="clear"></div>
            </div>
            </section>
</section>        <div id="main_footer">    </div>
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
<script type='text/javascript' src='videos/js/jquery-ui.min.js' ></script>
<script type='text/javascript' src='videos/js/jquery.contextMenu.js' ></script>
<script type='text/javascript' src='videos/js/private_messenger.js' ></script>
</body>
</html>