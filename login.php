<?php
include("connect.php");
session_start();
if(isset($_SESSION['signed_in'])){
	header('Location:index.php');
}

if(isset($_POST['submit']))
{
// 
	 //email check
    if(empty($_POST['email'])){
        $error = 'Please fill all the fields';
    }else if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST['email'])){
		$email = mysql_real_escape_string($_POST['email']);
    }else{
		$error1 = 'Your e-mail address is invalid. ';
    }

//password confirm
	if(empty($_POST['password'])){
		
		$error = "<p> please fill all the fields</p>";
	}else{
		$mypassword = mysql_real_escape_string($_POST['password']);
		$mypassword=md5($mypassword);
	}
	
	if(empty($error) && empty($error1)){
$sql="SELECT * FROM users WHERE email='$email' and password='$mypassword'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
// If result matches table row must be 1 row
if($count==1)
{
	$row=mysql_fetch_array($result);
		$_SESSION['signed_in']=true;
	$_SESSION['user_id']=$row['userID'];
$_SESSION['thumbnail']=$row['thumbnail'];
$_SESSION['points']=$row['points'];
header('Location:index.php');
}
else 
{
$r="Your username or Password is incorrect ";
}
	}


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

            <meta name="description"
            content=""
            content="">
    

        <title>Ripple-Login</title>
    <link rel='stylesheet' type='text/css' href='videos/css/main.css' >
<link rel='stylesheet' type='text/css' href='videos/css/footer.css' >
<link rel='stylesheet' type='text/css' href='videos/css/register.css' >
    <!--[if lt IE 9]>
    <script src="videos/js/html5shiv.js"></script><![endif]-->

    <script type='text/javascript' src='videos/js/jquery-1.9.0.js' ></script>
</head>
<body>


<!-- Preload Images -->
<div id="preload-wrapper">
    <img src="videos/images/loading.gif"/> <img src="videos/images/loading1.gif"/> <img src="videos/images/loading2.gif"/> <img
        src="videos/images/loading3.gif"/> <img src="images/loading16.gif"/>
</div>

<div id="wrapper">
        <header id="main_header">
                    <a href="index.php" class="headerLogo">RIPPLE</a>
            </header>
    <section id="main_section">
	<section id="wrapper">
				<div id="register-wrapper">
						<div id="new-account">
				<h2 class="titles"></h2>

				<div style="margin:5px 10px;font-size:14px;font-family:Lato-Lig;">
					<br/> &#x2713; &nbsp;Become part of the best community on the web!
					<br/> &#x2713; &nbsp;Only accepting new members for a limited time
				</div>
				<!-- Invite Code
				<div style="margin:10px 10px 0px;padding:5px;font-size:15px;font-family:Lato-Lig;">Due to an increasing amount of new users, thenewboston is now invitation only. Please contact any member for an Invite Code.</div>
				-->
			
			</div>
			<div id="login-wrap">
				<h2 class="titles">Login</h2>

				<form id="loginform" action=""
				      method="post" >
					<div class="row">
						<label for="email">Email :</label> <input type="text" class="input" maxlength="60" name="email"
						                                          id="email"/>
					</div>
					<div class="row">
						<label for="password">Password :</label> <input type="password" class="input" maxlength="20"
						                                               name="password" id="password"
						                                               autocomplete="off"/>
					</div>
					
					<div class="row">
						<label></label> <input type="submit" value="Log In" class="redButton" name="submit">
					</div>
									</form>
									
									
									<?php 
										if(!empty($r)){echo $r;}
						if(!empty($error)){echo $error;}
						if(!empty($error1)){echo $error1;}
									?>
			</div>
			<div class="clear"></div>
		</div>
	</section>
</section>               <div id="main_footer">    </div>
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
<script type='text/javascript' src='videos/js/register.js' ></script>
</body>
</html>