
<?php 

include("connect.php");
session_start();
function xss($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
 if($_SESSION['signed_in']){
		
$sql="SELECT * FROM users where userID='".$_SESSION['user_id']."'"; 
$result=mysql_query($sql);
if(!$result){
	echo 'sorry error occured try sometime later';
	
 }
 
else {
	if(isset($_POST['submit']))		{

	if(!empty($_POST['content'])){
		$content=xss($_POST['content']);
	}
	else{
		$error1="please fill all the fields";
	}
	
	
	
	
	
	if(empty($error1)){
	     
		$query=mysql_query("INSERT INTO `hackathon`.`pop_posts` (`id`, `p_content`, `p_img`, `p_url`, `p_by`, `p_date`) VALUES('','".$content."','','','".$_SESSION['user_id']."',NOW())")
		or die(mysql_error());
	
	if($query){
		$con="Successfully posted";
		
	}
	else{
		$error="error occurred try afterwards";
	}
	
	}
}
 }
	
 }	
		
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

            <meta name="description"
            content="">
        <meta name="keywords"
            content="">
    

        <title>Ripple-myaccount</title>
	<link rel='stylesheet' type='text/css' href='videos/css/main.css' >
<link rel='stylesheet' type='text/css' href='videos/css/footer.css' >
<link rel='stylesheet' type='text/css' href='videos/css/jquery-ui/jquery-ui.css' >
<link rel='stylesheet' type='text/css' href='videos/css/account.css' >
<link rel='stylesheet' type='text/css' href='videos/css/profile.css' >
<link rel='stylesheet' type='text/css' href='videos/css/posting.css' >
<link rel='stylesheet' type='text/css' href='videos/css/uploadify.css' >

    <!--[if lt IE 9]>
    <script src="videos/js/html5shiv.js"></script><![endif]-->

    <script type='text/javascript' src='videos/js/jquery-1.9.0.js' ></script>
</head>
<body >



<div id="wrapper">
                <header id="main_header">
                <a href="index.php" class="headerLogo">RIP<span class="secondColor">PLE</span></a>


            </header>
            <section id="main_section">
			<?php 

$sql=mysql_query("SELECT * FROM users WHERE userID='".$_SESSION['user_id']."'") or die(mysql_error());
$row=mysql_fetch_array($sql);
	echo 
	'
    <aside id="main_aside" style="overflow:visible;"> <!-- 241px -->
    <span class="titles">'.$row['firstName'].' '.$row['lastName'].'</span> <br/>
            <a href="user.php?user='.$row['userID'].'"><img class="mainProfilePic"
                src="'.$row['thumbnail'].'"></a>
        <br/> 
    <br/>

   
         <h6>Settings</h6>
        <!-- <a href="/wallet.php" class="accountSubLinks">Bitcoin</a> <br/> -->        <!-- <a href="/credits.php" class="accountSubLinks">Credits</a> <br/> -->
		<a href="edit.php" class="accountSubLinks">Edit profile</a>
			<a href="inbox.php" class="accountSubLinks">Inbox</a>
				<a href="sent.php" class="accountSubLinks">Sent messages</a>
        <a href="change_password.php" class="accountSubLinks">Change Password</a> <br/>		


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
       

  
    <section id="right_side" class="">

        <section id="stream">
            <span class="titles"></span><br/>
                        <div style="border-bottom:1px solid #cccccc; margin-top:5px; margin-bottom:10px; float:left;">
                <a href="#">
				
				<img
                        src="<?php echo $_SESSION['thumbnail'] ;?>" class="postIcons"/></a>

                <div class="new-post-row">
                    
					<form method="post" id="newpostform" action="">
                        <div id="new-post-nav">
                            <a href="#" class="post-text selected">Text</a> 
                        </div>
                        <textarea name="content" class="newPost" placeholder="Create a new post..."></textarea>

                                    <br><br>

                    

                            <input type="submit" id="" name="submit" class="redButton" value="Post"/>

            <br><br>
			<?php if(!empty($con)){echo $con;}?>
                    </form>
                </div>
            </div>


                                                                

                                                                

                <!-- View More Stream -->
           
</section>
      

    </section>
	<section id="right_side" class="" style="margin-top:-1050px;">
<h1 style="font-family:tahoma;font-size:20px;">My Notifications</h1>
      

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
                </li>              
				<li>
                    <a href="createtopic.php" class="p_menu">create topic</a>
                </li>
				<li>
                    <a href="quiz.php" class="p_menu">Take test</a>
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
<script type='text/javascript' src='videos/js/posts.js' ></script>
<script type='text/javascript' src='videos/js/add_post.js' ></script>
<script type='text/javascript' src='videos/js/account.js' ></script>
</body>
</html>