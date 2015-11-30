

<?php 

include("connect.php");
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

         

        <title>Ripple-Inbox</title>
    <link rel='stylesheet' type='text/css' href='videos/css/main.css' >
<link rel='stylesheet' type='text/css' href='videos/css/footer.css' >
<link rel='stylesheet' type='text/css' href='videos/css/jquery-ui/jquery-ui.css' >
<link rel='stylesheet' type='text/css' href='videos/css/account.css' >
<link rel='stylesheet' type='text/css' href='videos/css/info.css' >
<link rel='stylesheet' type='text/css' href='videos/css/messages.css' >
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
      
 <aside id="main_aside">
        <span class="titles">My Account</span>


        

        <!-- Control Panel-->
        
        
        <h6>Settings</h6>
        <!-- <a href="/wallet.php" class="accountSubLinks">Bitcoin</a> <br/> -->        <!-- <a href="/credits.php" class="accountSubLinks">Credits</a> <br/> -->
		<a href="edit.php" class="accountSubLinks">Edit profile</a>
			<a href="inbox.php" class="accountSubLinks">Inbox</a>
				<a href="sent.php" class="accountSubLinks">Sent messages</a>
        <a href="change_password.php" class="accountSubLinks">Change Password</a> <br/>
			
        <!-- <a href="/shipping_info.php" class="accountSubLinks">Shipping Information</a> <br/> -->

    </aside>

  

    <section id="right_side">
        <section id="right_side_padding" class="user-info-section">
            <h2 class="titles">Inbox</h2>

                                                    <div class="table" style="margin-bottom:5px;">
                        <div class="thead">
                            <div class="td td-from">From</div>
                            <div class="td td-subject">message</div>
                            <div class="td td-date">Date</div>
                            <div class="clear"></div>
                        </div>
						<?php 
						$sql="SELECT messages.m_from,messages.m_to,messages.m_content,messages.m_sender,messages.m_date,users.userID,users.firstName,users.lastName FROM messages
         LEFT JOIN users ON messages.m_to=users.userID WHERE users.userID='".mysql_real_escape_string($_SESSION['user_id'])."' ORDER BY m_id DESC";
	
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)){
                              echo  ' <div class="tr  ">
                                
                                <div class="td td-from">
                                    <a href="user.php?user='.$row['m_from'].'">'.$row['m_sender'].'</a>
                                </div>
                                <div class="td td-subject">
                                    '.$row['m_content'].'
                                </div>
                                <div
                                    class="td td-date">'.$row['m_date'].'</div>
                                <div class="clear"></div>
                            </div>';
							
							
}                                  ?>  
                            </div>
                                            </div>

                            
        </section>
    </section>
</section>         <div id="main_footer">    </div>
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
                </li>              
				<li>
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
<script type='text/javascript' src='videos/js/messages.js' ></script>
</body>
</html>