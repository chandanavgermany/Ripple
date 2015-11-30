
<?php  
include("connect.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

           
        <title>Ripple-people</title>
    <link rel='stylesheet' type='text/css' href='videos/css/main.css' >
<link rel='stylesheet' type='text/css' href='videos/css/footer.css' >
<link rel='stylesheet' type='text/css' href='videos/css/jquery-ui/jquery-ui.css' >
<link rel='stylesheet' type='text/css' href='videos/css/search.css' >


    <script type='text/javascript' src='videos/js/jquery-1.9.0.js' ></script>
</head>
<body>


<div id="wrapper">
                <header id="main_header">
                <a href="index.php" class="headerLogo">RIP<span class="secondColor">PLE</span></a>


            </header>
            
<script type="text/javascript">

</script>

<section id="main_section">




    <section id="main_content" class="search-result-panel">

        
        <div class="search-result-list">
		
		<?php $sql=mysql_query("SELECT * FROM donators ORDER BY id") or die(mysql_error());
			$i=1;
			
		while($row=mysql_fetch_array($sql)){
                    echo '                <div class="node">

                                                            <div class="ranking">
                                    '.$i.'.                                </div>
                            
                            <div class="img-cont">        <a href="user.php?user='.$row['id'].'"><img class="thumbIcon"
                src="'.$row['thumbnail'].'"></a>
    </div>
                            <div class="desc">
							<br>
                                <a href="user.php?user='.$row['id'].'"
                                    class="desc-title">'.$row['fname'].' '.$row['lname'].'</a>
                               
                                                                                                                 </div>
                            <div class="profile-page-stats">
                                <span class="stat-title"></span><br/> <span
                                    class="stat-details">Organisation:'.$row['organisation'].'</span><br/>
                                <span
                                    class="stat-details"></span><br/>
                                <span
                                    class="stat-details"></span>
                            </div>
                            
                            <div class="reputation">
                               Contact: <span
                                    style="color:#16A085;">'.$row['email'].'</span><br/>

                                <!-- Top 3 Trophies -->
                                
                                                                        
                                    
                                    
                                                                <!-- End top 3 Trophies -->

                                                                  
                                
                            </div>

                            <div class="action">
                                    <span class="friend-actions">
                                                                                
                                                                            </span> <a href="#">Send Message</a> <br/>
                            </div>

                            <div class="clear"></div>
                        </div>';
						$i=$i+1;
		}
                                      
?>
									
                                            

                                                           
                                   
                            </div>

                    
        
    </section>
</section>
       <div id="main_footer">    </div>
    <div id="fixed_footer">
	 <ul>
      <div class="centered-navigation">
	 
                <li class="home_button" style="border-left:1px solid rgba(0,0,0,0.4); height:auto;"><a href="index.php"></a>
                </li>
                <!-- This Item is an Image Home-->
			<?php if($_SESSION['s'])
			{
				               echo ' <li><a href="acc.php" class="p_menu">My Account</a></li>';

			}
			else{
								               echo ' <li><a href="don_signup.php" class="p_menu">Sign Up</a></li>';
				               echo ' <li><a href="don_login.php" class="p_menu">Login</a></li>';

			}?>
                   
                
  
				<li><a href="people.php">Students' Panel</a></li>
                    <li><a href="don_people.php">Patrons' Panel</a></li>

            </div>
<?php if($_SESSION['s'])
			{
echo '<li class="right">
                <a href="don_signout.php" class="p_menu">Log Out</a>
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
<script type='text/javascript' src='videos/js/search.js' ></script>
</body>
</html>