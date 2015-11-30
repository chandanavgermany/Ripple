<?php
include("connect.php");
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Ripple | Being Patron</title>
	<meta charset="utf-8" />
    <link rel="shortcut icon" href="images/favicon.ico" />
    <link href="patron_homepage.css" rel="stylesheet" />
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
                <a class="navbar-brand" href="index.php" style="font-family:'Century Gothic';font-weight:bold;letter-spacing:2px;"><span class="glyphicon glyphicon-education"></span> Ripple</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav text-center" style="font-family:'Century Gothic';font-weight:bold;letter-spacing:1px;">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="people.php">Students' Panel</a></li>
                    <li><a href="don_people.php">Patrons' Panel</a></li>
					 <li><a href="paypal.php">Donate money</a></li>
					 <li><a href="acknowledgement.php">Acknowledgement</a></li>
					 <li><a href="book_don.php">Donate Book</a></li>

					<?php  
					
					if($_SESSION['s']){
						echo '                    <li><a href="don_signout.php">Logout</a></li>
';
					}
					else{
						echo '                    <li><a href="don_login.php">Login</a></li>
						                    <li><a href="don_signup.php">Sign up</a></li>

';
					}
					
					?>
					

                </ul>


            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <div id="banner">
        <div class="jumbotron text-center" id="header">
            <h1><span class="glyphicon glyphicon-education"></span> The Patrons</h1>
            <h3>"We can't help everyone..!! But everyone can help someone..!!"</h3>
        </div>
    </div>

    <div id="about">
        <div class="container text-center">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1" id="content">
                    <h1>Being Patron @ <span style="color:red">RIP</span><span style="color:blue;">PLE</span></h1>
                    <p>
                        When we focus our energy towards constructing a passionate meaningful life we are
                        tossing a pebble into the world, creating a beautiful RIPPLE effect of inspiration. When 
                        one person follows a dream, tries something new or takes a daring leap, evryone nearby
                        feels that energy and before too long they are making their own daring leaps and inspiring
                        yet another circle.
                        "<em><b>Achievement is individual's hard work but development is always a result of team work...!</b></em> "
                    </p>
                    <div class="panel-group" id="collapse">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#collapse" href="#collapse-one">
                                        Who is a patron ?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse-one" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    Ripple is a platform that connects those who need help with those who want to help.
                                    The one who is extending support for the cause of improving the rural eduction quality
                                    and provide incentives for the needy aspirant of education and knowledge is referred to
                                    as a patron by Ripple. They motivate the students, they encourage the students, they are the 
                                    ones who provide the scholarships.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#collapse" href="#collapse-two">
                                        How can you donate and What can you donate?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse-two" class="panel-collapse collapse">
                                <div class="panel-body">
                                    Whatever donation you do, you do it via the platform of Ripple. The students can check 
                                    out the available facilities or textbooks which you wish to donate and whose information 
                                    is uploaded. You can donate anything you want. It may be a material or a currency.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#collapse" href="#collapse-three">
                                        How that is used ?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse-three" class="panel-collapse collapse">
                                <div class="panel-body">
                                    The students give the quizes which will fetch them knowledge as well as the bit-coins or the 
                                    digital money which they can redeem. The money which they get is from the bulk collection
                                    of donation at ripple whose part is yours. You'll be notified with everything like who got 
                                    your money and what happened with it. So the ethics are always maintained in the ripple. And as far
                                    as transparency is concerned. Better take no worries.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="separator">

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
