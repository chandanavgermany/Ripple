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
	if(isset($_POST['submit']))	
	{
	
	
		$f_name='';
		$l_name='';
		$pass='';
		$ed='';
		$s='';
		$emp='';
        $name=$_FILES['file']['name'];
		$first_name=$_POST['firstname'];
		$last_name=$_POST['lastname'];
		$religion = $_POST['religion'];
		$status = $_POST['status'];
		$bd=$_POST['bd'];
		$bo=$_POST['bo'];
		$byr=$_POST['byr'];
		
		//first name 
		if(!empty($first_name)){
		
			   $f_name=xss($first_name);
			
		}
		else{
			$sql="SELECT * FROM users WHERE userID='".$_SESSION['user_id']."'";
			$result=mysql_query($sql);
			if(!$result){echo 'edit profile error';}
			else{
				while($row=mysql_fetch_array($result)){
						
	            $f_name=mysql_real_escape_string($row['firstName']);
			   			
				
				}
			}
			
		}
		
		//last name
		 
		 if(!empty($last_name)){
			
			   $l_name=xss($last_name);
		
		}
		else{
			$sql="SELECT * FROM users WHERE userID='".$_SESSION['user_id']."'";
			$result=mysql_query($sql);
			if(!$result){echo 'edit profile error';}
			else{
				while($row=mysql_fetch_array($result)){
					
					$l_name=$row['lastName'];
					  
				}
			}
			
		}

		//current city
		 if(!empty($_POST['current_city'])){
			
			   $city=xss($_POST['current_city']);
		
		}
		else{
			$sql="SELECT * FROM users WHERE userID='".$_SESSION['user_id']."'";
			$result=mysql_query($sql);
			if(!$result){echo 'edit profile error';}
			else{
				while($row=mysql_fetch_array($result)){
					
					$city=$row['address'];
					  
				}
			}
			
		}
		
		
		
	
		//religion
		if(!empty($religion)){
			  
			   $emp=xss($religion);
		}
		else{
			$sql="SELECT * FROM users WHERE userID='".$_SESSION['user_id']."'";
			$result=mysql_query($sql);
			if(!$result){echo 'edit profile error';}
			else{
				while($row=mysql_fetch_array($result)){
					$emp=$row['religion'];

				}
			}
			
		}
		
		//birthplace
		
		if(!empty($status)){
			
			   $s=xss($status);
			
		}
		else{
			$sql="SELECT * FROM users WHERE userID='".$_SESSION['user_id']."'";
			$result=mysql_query($sql);
			if(!$result){echo 'edit profile error';}
			else{
				while($row=mysql_fetch_array($result)){
					$s=$row['birthplace'];
		
				}
			}
			
		}
				//birthdate
		
		if(!empty($bd) && $bd < '31' && $bo >'0'){
			
			   $bd=xss($bd);
			
		}
		else{
			$sql="SELECT * FROM users WHERE userID='".$_SESSION['user_id']."'";
			$result=mysql_query($sql);
			if(!$result){echo 'edit profile error';}
			else{
				while($row=mysql_fetch_array($result)){
					$bd=$row['birthdate'];
		
				}
			}
			
		}
				//birthmonth
		
		if(!empty($bo) && $bo < '13' && $bo >'0'){
			
			   $bo=xss($bo);
			   
			
		}
		else{
			$sql="SELECT * FROM users WHERE userID='".$_SESSION['user_id']."'";
			$result=mysql_query($sql);
			if(!$result){echo 'edit profile error';}
			else{
				while($row=mysql_fetch_array($result)){
					$bo=$row['birthmo'];
		
				}
			}
			
		}
				//birthyear
		
		if(!empty($byr) && $byr > '1960' && $byr <'2010'){
			
			   $byr=xss($byr);
			
		}
		else{
			$sql="SELECT * FROM users WHERE userID='".$_SESSION['user_id']."'";
			$result=mysql_query($sql);
			if(!$result){echo 'edit profile error';}
			else{
				while($row=mysql_fetch_array($result)){
					$byr=$row['birthyr'];
		
				}
			}
			
		}
		//profile photo 
		if(!empty($name)){

	        $tmp_name=$_FILES['file']['tmp_name'];
	        $location='profilephoto/';
	         $target='profilephoto/'.$name;
	
	       if(move_uploaded_file($tmp_name,$location.$name)){
		    
		     $query=mysql_query("UPDATE users SET thumbnail='".$target."' WHERE userID='".$_SESSION['user_id']."'");
		    echo "file uploaded";
	      }
	     else{
	   	     echo "file not uploaded";
	        }
			
		}
	
		$sql="UPDATE users SET firstName='".$f_name."',lastName='".$l_name."',birthplace='".$s."',religion='".$emp."',birthdate='".$bd."',birthmo='".$bo."',birthyr='".$byr."',address='".$city."' where userID='".$_SESSION['user_id']."'";
        $result=mysql_query($sql) or die(mysql_error());
         
        if(!$result){
			$er='error occured while inserting data';
		}		
		else{
			 $success='your profile information has been saved successfully!';
		}
		
		
	}
}

 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

           

        <title>Ripple-Edit profile</title>
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
                <a href="index.php" class="headerLogo">RIP<span class="secondColor">PLE</span></a>

               
            </header>
            <section id="main_section">
        <aside id="main_aside">
        <span class="titles">My Account</span>


        
        <h6>Settings</h6>
				<a href="edit.php" class="accountSubLinks">Edit profile</a>
<a href="inbox.php" class="accountSubLinks">Inbox</a>
				<a href="sent.php" class="accountSubLinks">Sent messages</a>
        <a href="change_password.php" class="accountSubLinks">Change Password</a> <br/> 

    </aside>
    <section id="right_side">
        <section id="right_side_padding" class="user-info-section">
            <h2 class="titles">EDIT PROFILE</h2>
<?php 
if($_SESSION['signed_in']){
	
	$user=mysql_query("SELECT * FROM users WHERE userID='".$_SESSION['user_id']."' LIMIT 1")or die(mysql_error());
	$row=mysql_fetch_array($user);
		$_SESSION['thumbnail']=$row['thumbnail'];

       echo     ' <form id="" method="post"  class="user-info" action=""  enctype="multipart/form-data">
                <!-- First Name -->
                <div class="row">
				
                    <label for="firstName">First Name:</label> <span class="inputholder"><input type="text"
                            id="firstName" name="firstname" class="input"
                            value="'.$row['firstName'].'"/></span>

                    <div class="clear"></div>
                </div>

                <!-- Last Name -->
                <div class="row">
                    <label for="lastName">Last Name:</label> <span class="inputholder"><input type="text" id="lastName"
                            name="lastname" class="input" value="'.$row['lastName'].'"/></span>

                    <div class="clear"></div>
                </div>

                <!-- Last Name -->
                <div class="row">
                    <label for="lastName">Profile pic:</label> <span class="inputholder"><input type="file" id="lastName"
                            name="file" class="input" /></span>

                    <div class="clear"></div>
                </div>
              

                <!-- Birthday -->
             <div class="row">
                    <label for="lastName">birthday(D/M/Y):</label> 
					<input type="text" id="lastName"
                            name="bd" class="" value="'.$row['birthdate'].'" maxlength="20"/>
							<input type="text" id="lastName"
                            name="bo" class="" value="'.$row['birthmo'].'" width="20"/>
							<input type="text" id="lastName"
                            name="byr" class="" value="'.$row['birthyr'].'" width="20"/>

                    <div class="clear"></div>
                </div>
			
    
	
	
                  


                <!-- Religion -->
                <div class="row">
                    <label for="religion">Religion:</label> <span class="inputholder"><input type="text" id="religion"
                            name="religion" class="input" value="'.$row['religion'].'"/></span>

                    <div class="clear"></div>
                </div>

              

                <!-- Birthplace -->
                <div class="row">
                    <label for="birthplace">Birthplace:</label> <span class="inputholder"><input type="text"
                            id="birthplace" name="status" class="input"
                            value="'.$row['birthplace'].'"/></span>
                        
                    <div class="clear"></div>
                </div>

                <!-- Current City -->
                <div class="row">
                    <label for="current_city">Current&nbsp;City:</label> <span class="inputholder"><input type="text"
                            id="current_city" name="current_city" class="input"
                            value="'.$row['address'].'"/></span>

                    <div class="clear"></div>
                </div>

               

            <input type="submit" id="submit" name="submit" class="redButton"
                            value="Submit"/>

             </div>
</form>';}
?>
        </section>
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
<script type='text/javascript' src='videos/js/info.js' ></script>
</body>
</html>