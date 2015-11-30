<?php  
include("connect.php");
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ripple | Being Student</title>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="images/favicon.ico" />
    <link href="student_homepage.css" rel="stylesheet" />
    <script src="Scripts/jquery-2.1.4.min.js"></script>
    <script src="Scripts/bootstrap.min.js"></script>
    <link href="Content/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php" style="font-family:'Century Gothic'"><span class="glyphicon glyphicon-education"></span>&nbsp;Ripple</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav text-center" style="font-family:'Century Gothic'">
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
                    <a href="shop.php" class="p_menu">Store</a>
                </li>   
				<li>
                    <a href="createtopic.php" class="p_menu">create topic</a>
                </li>
                    <li class="dropdown">
                        <a href="videos.php" class="dropdown-toggle" data-toggle="dropdown">Videos & Tutorials <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                         <li>   <a
                            href="video_business.php">Business</a></li>
						<li>	<a href="videos.php">Computer Science</a></li>
                    <li>  <a href="video_humanities.php">Humanities</a> </li>
					<li><a
                            href="video_math.php">Math</a></li>
<li>							<a href="video_science.php">Science</a></li> 
                        </ul>
                    </li>
                </ul>
                
                <ul class="nav navbar-nav navbar-right text-center">
                    <?php if($_SESSION['signed_in'])
			{
echo '<li>
                <a href="signout.php" class="p_menu">Log Out</a>
            </li>';
			}
			?>
                   
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav> 
    <div id="banner">
        <h1 class="text-center">
            The Students
        </h1>
        <h3>"Education and Culture are the positive and the negative wires to get the light of divity..!"</h3>
    </div>

    <div id="about">
        <div class="container">
            <div class="jumbotron text-center">
                <h1>Being Student @ <span style="color:red">RIP</span><span style="color:blue;">PLE</span></h1>

            </div>
            <div class="row" id="photos">
                <div class="col-sm-4 text-left">
                    <h1>Learn</h1>
                    <a href="videos.php" target="_blank"><img src="images/sh-1.jpg" class="img-responsive" /></a>

                </div>
                <div class="col-sm-4 text-left">
                    <h1>Understand</h1>
                    <a href="quiz.php"><img src="images/sh-2.jpg" class="img-responsive" /></a>
                </div>
                <div class="col-sm-4 text-left">
                    <h1>Reflect</h1>
                    <a href="pop_posts.php"><img src="images/sh-3.jpg" class="img-responsive" /></a>
                </div>
            </div>
            <div class="row" id="details">
                <div class="col-sm-12">
                    <h1>
                        Features of Ripple :

                    </h1>
                    <h3>Being a student you'll enjoy : </h3>
                    <ul>
                        <li>The video tutorials and simulations of many stuffs.</li>
                        <li>
                            You can publish aticles and blogs on whatever you have studied and get them
                            corrected and modified by the patrons.
                        </li>
                        <li>
                            These above are based of the Confucius philosophy of education. "I hear, I forget. I
                            see, I believe. I do and I understand." which is absolutely true.
                        </li>
                        <li>
                            You guys can take up quizes and these performance will fetch you bit-coins or the digital money.
                            You can redeem the digital money and get the incentives from the store.
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>


    <div id="footer">
        <div class="container text-left">
            <div class="row">
                <div class="col-sm-4">
                    <h3>Developed by-</h3>
                    <p>Chandan A V</p>
                </div>
                <div class="col-sm-4">
                    <h3>Contact Us</h3>
                    <p>Ph : 8867310695</p>
                    <p>Email : <a href="mailto:mrchandanav@gmail.com" style="color:red">Ripple I/O center</a></p>

                </div>

                <div class="col-sm-4">
                    <h3>Our Motive</h3>
                    <p style="font-size:1.2em;font-family:Papyrus">"Ripple propagates infinitely..!! So does the knowledge..! We are here with the medium for propagation."</p>
                </div>

            </div>
        </div>


    </div>

    <div style="width:100%;">
        <iframe width="100%" height="250" frameborder="0" scrolling="no" marginheight="0"
                marginwidth="0"
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15592.149587984257!2d76.6135393!3d12.3132685!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1ad797cbfc78d07a!2sSri+Jayachamarajendra+College+of+Engineering!5e0!3m2!1sen!2sin!4v1439146969877"></iframe>

    </div>

</body>
</html>
