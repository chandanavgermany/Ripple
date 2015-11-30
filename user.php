<?php
include("connect.php");
session_start();
$user=mysql_real_escape_string($_GET['user']);
if($user==$_SESSION['user_id']){
	header('Location:account.php');
}
$sql=mysql_query("SELECT * FROM users WHERE userID='".$user."'") or die(mysql_error());
$row=mysql_fetch_array($sql);


if($_SESSION['signed_in']){
	
	if(isset($_POST['submit'])){

     $content=mysql_real_escape_string($_POST['content']);
     
	       
				
		$name=$row['firstName'].' '.$row['lastName'];	
			
     //checking if message is empty
    if(!empty($content)){
		$sql="INSERT INTO messages(m_from,m_to,m_content,m_sender,m_date) VALUES(".mysql_real_escape_string($_SESSION['user_id']).",".$user.",'".$content."','".$name."',NOW())";
		$result=mysql_query($sql) or die(mysql_error());
		
		if(!$result){$error2='error with database please try again later';}
		else{ 
	$suc="<p>Your message has been sent</p>";
	}
		
	}	 
	
	else{
		$error1="<p>write something</p>";
	}
	}
	 	
	}

else{
	echo 'must sign in';
	
}


?>
<!DOCTYPE html>
<html lang="en">
<head>

    

        <title>Ripple-profile</title>
    <link rel='stylesheet' type='text/css' href='videos/css/main.css' >
<link rel='stylesheet' type='text/css' href='videos/css/footer.css' >
<link rel='stylesheet' type='text/css' href='videos/css/account.css' >
<link rel='stylesheet' type='text/css' href='videos/css/profile.css' >
<link rel='stylesheet' type='text/css' href='videos/css/posting.css' >
<link rel='stylesheet' type='text/css' href='videos/css/uploadify.css' >
    <!--[if lt IE 9]>
    <script src="videos/js/html5shiv.js"></script><![endif]-->

    <script type='text/javascript' src='videos/js/jquery-1.9.0.js' ></script>
</head>
<body>

</script>



<div id="wrapper">

                <header id="main_header">
                <a href="index.php" class="headerLogo">RIP<span class="secondColor">PLE</span></a>

            </header>
            <section id="main_section" class="tinted">

    <!-- Left Side -->
	<?php 
	echo '
    <aside id="main_aside" style="overflow:visible;"> <!-- 241px -->
    <span class="titles">'.$row['firstName'].' '.$row['lastName'].'</span> <br/>
            <a href="user.php?user='.$row['userID'].'"><img class="mainProfilePic"
                src="'.$row['thumbnail'].'"></a>
        <br/> 
    <br/>

   
        


    <!-- About Section -->
            <h4>About  </h4>
        <div id="infoDisplay">
            <table>
                <tr>
                    <td class="left">Points:</td>
                    <td><span style="color:#16A085;">5,543</span></td>
                </tr>
                                    <tr>
                        <td class="left">Gender:</td>
                        <td>'.$row['gender'].'</td>
                    </tr>
                                                    <tr>
                        <td class="left">Birthday:</td>
                        <td>'.$row['birthdate'].' /'.$row['birthmo'].'/ '.$row['birthyr'].'</td>
                    </tr>
                                                                                    <tr>
                        <td class="left">Education:</td>
                        <td>'.$row['education'].'</td>
                    </tr>
                                                                    <tr>
                        <td class="left">Address:</td>
                        <td>'.$row['address'].'</td>
                    </tr>                                    <tr>
                        <td class="left">Religion:</td>
                        <td>'.$row['religion'].'</td>
                    </tr>     <tr>
                        <td class="left">Adhar No:</td>
                        <td>'.$row['ano'].'</td>
                    </tr>    
					 <tr>
                        <td class="left">Field of interest:</td>';
						
						if($row['opt']==2){
							$q="Commerce";
						}
						else if($row['opt']==1){
							$q="Literature";
						}
						else{
						$q="Science and technology";
						}
                        echo '<td>'.$q.'</td>
                    </tr>    
                            </table>
        </div>



    

    <div id="user-contact-box" class="info-box">
        <h4>Contact  </h4>
                    <p><label>E-mail:  </label>'.$row['email'].'</p><br>
                                  <p><label>phone-no:  </label>'.$row['contact'].'</p>

            </div>

    <br/>

</aside>';
?>
    <!-- 752px -->
    <section id="right_side" class="profile-contr">
                <div class="info-box" id="friends-box">
           

		   
                    <div class="info-box">
					
                <h3>
                                          Send a message to <?php echo $row['firstName'];echo ' '.$row['lastName'];?>
                    
                

                <div class="new-post-row">
				<?php if($_SESSION['signed_in']){
                   echo ' <form method="post" id="" action="">
                        <div id="new-post-nav">
                            <a href="#" class="post-text selected">Text</a> 
                        </div>
                        <textarea name="content" class="newPost" placeholder="write something.."></textarea>

                  
<div class="row">
						<label></label> <input type="submit" value="Submit" class="redButton" name="submit">
					</div>
                        
                                                                           
                    </form>';
					
				if(!empty($error1)){
					echo $error1;
				}
				if(!empty($error2)){
					echo $error2;
				}
					if(!empty($suc)){
					echo $suc;
				}
				}
				else{
					echo '<h3>You need to be signed in to send a message';
				}
				?>
                </div>
                <div class="clear"></div>
            </div>
            <br/>
        
        

    </section>
</section>       
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
<script type='text/javascript' src='videos/js/jquery-ui.min.js' ></script>
<script type='text/javascript' src='videos/js/jquery.contextMenu.js' ></script>
<script type='text/javascript' src='videos/js/private_messenger.js' ></script>
<script type='text/javascript' src='videos/js/uploadify/jquery.uploadify.js' ></script>
<script type='text/javascript' src='videos/js/jquery.Jcrop.js' ></script>
<script type='text/javascript' src='videos/js/jquery.color.js' ></script>
<script type='text/javascript' src='videos/js/posts.js' ></script>
<script type='text/javascript' src='videos/js/add_post.js' ></script>
<script type='text/javascript' src='videos/js/account.js' ></script>
</body>
</html>