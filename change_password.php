<?php 

include("connect.php");
session_start();
if(isset($_POST['submit'])){
	
	
	$sql=mysql_query("SELECT * FROM users WHERE userID='".$_SESSION['user_id']."'") or die(mysql_error());
	$row=mysql_fetch_array($sql) or die(mysql_error());
	
	//password
		$password=$_POST['password'];
		$new_password=$_POST['newpassword'];
		$confirm_password=$_POST['cpassword'];
		
		if(!empty($password) && !empty($confirm_password) && !empty($new_password)){
			$password=md5($password);
			if($password!=$row['password']){
				$error="your current password is incorrect";
			}
		else{
			if($new_password==$confirm_password){
				$pass=md5($new_password);
				$s=mysql_query("UPDATE users SET password='".$pass."' WHERE userID='".$_SESSION['user_id']."'") or die(mysql_error());
				if($s){
					$suc="your password updated successfully";
				}
				else{
					$error2="error occured try afterwards";
				}
			}
			else{
				$error3='password doesn\'t match';
			}
		}
		}
	else{
		$error1="please fill all the fields";
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
    

        <title>Ripple-Change Password - </title>
    <link rel='stylesheet' type='text/css' href='videos/css/main.css' >
<link rel='stylesheet' type='text/css' href='videos/css/footer.css' >
<link rel='stylesheet' type='text/css' href='videos/css/jquery-ui/jquery-ui.css' >
<link rel='stylesheet' type='text/css' href='videos/css/account.css' >
<link rel='stylesheet' type='text/css' href='videos/css/info.css' >
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

                                               <a href="index.php" class="headerLogo" style="margin-left:165px;">RIP<span class="secondColor">PLE</span></a>
</header>
<br>
        <aside id="main_aside">

        <span class="titles">My Account</span>

        
        
        <h6>Settings</h6>

        <a href="/change_password.php" class="accountSubLinks">Change Password</a> <br/> <a href="/delete_account.php"
            class="accountSubLinks">Delete Account</a> <br/> <a href="/faq.php" class="accountSubLinks">FAQ's</a> <br/>
       
    </aside>
    <section id="right_side">
        <section id="right_side_padding" class="user-info-section">
            <h2 class="titles">Change Password</h2>
			
                        <form id="" method="post" class="user-info" action="change_password.php">
                <div class="row">
                    <label for="currentPassword">Current Password:</label> <span class="inputholder"><input
                            type="password" id="currentPassword" name="password" autocomplete="off" class="input"
                            value=""/></span>

                    <div class="clear"></div>
                </div>

                <div class="row">
                    <label for="newPassword">New Password:</label>
                        <span class="inputholder"><input type="password" id="newPassword" name="newpassword"
                                autocomplete="off" class="input"
                                value=""/>
                        <br/>
                        </span>

                    <div class="clear"></div>
                </div>

                <div class="row">
                    <label for="newPassword2">Confirm New Password:</label> <span class="inputholder"><input
                            type="password" id="newPassword2" name="cpassword" autocomplete="off" class="input"
                            value=""/></span>

                    <div class="clear"></div>
                </div>

                <!-- Submit Button -->
                    <span class="inputholder"><input type="submit" id="submit" name="submit" class="redButton"
                            value="Submit"/>

                   <br><br>
              <?php 
			  if(!empty($error)){
				  echo $error;
			  }
			    if(!empty($error1)){
				  echo $error1;
			  }
			    if(!empty($error2)){
				  echo $error2;
			  }
			  
			    if(!empty($error3)){
				  echo $error3;
			  }
			  
			    if(!empty($suc)){
				  echo $suc;
			  }
			  
			  ?>
            </form>

        </section>
    </section>
</section>
<script type="text/javascript">
    jQuery('#changepwdform').submit(function (){
        var form = $(this);
        var isValid = true;

        if(form.find('#currentPassword').val() == ''){
            form.find('#currentPassword').addClass('input-error');
            isValid = false;
        }
        if(form.find('#newPassword').val() == ''){
            form.find('#newPassword').addClass('input-error');
            isValid = false;
        }
        if(form.find('#newPassword2').val() == ''){
            form.find('#newPassword2').addClass('input-error');
            isValid = false;
        }

        if(!isValid){
            showMessage(form, 'Please complete the fields in red.', true);
        }

        if(isValid && form.find('#newPassword').val() != form.find('#newPassword2').val()){
            form.find('#newPassword').addClass('input-error');
            showMessage(form, 'New password doesn\'t match.', true);
            return false;
        }


        //Validate Password Strength
        if(!validatePasswordStrength(form.find('#newPassword').val())){
            showMessage(form, 'New password should be more than 8 characters and include at least 1 number.', true);
            form.find('#newPassword').addClass('input-error');
            return false;
        }

        return isValid;
    })
</script>
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
</body>
</html>