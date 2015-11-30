
<?php
include("connect.php");
session_start();


?>


<!DOCTYPE html>
<html>
<head>
    <title>Ripple | Quiz-answers</title>
    <link rel="shortcut icon" href="images/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="quiz/css/quiz.css" />
    <link rel="stylesheet" type="text/css" href="Content/bootstrap.min.css" />
    <script src="Scripts/jquery-2.1.4.min.js"></script>
    <script src="Scripts/bootstrap.min.js"></script>
	<meta charset="utf-8" />
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
                <a class="navbar-brand" href="#" style="font-family:'Century Gothic'"><span class="glyphicon glyphicon-education"></span>&nbsp;Ripple</a>
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
                </li>                <li>
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


	<div id="header">
        <div class="jumbotron text-center">
            <h1><span class="glyphicon glyphicon-education"></span> Ripple-Quiz Answers</h1>
        </div>
    </div>

    <div id="quiz-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="panel-group" id="collapse">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="background-color:black;">
                                <h4 class="panel-title">
                                    <a style="color:white;" data-toggle="collapse" data-parent="#collapse" href="#collapse-one">
                                        Computer Science
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse-one" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li><a href="quiz.php?id=1">C/C++</a></li>
                                        <li><a href="quiz.php?id=2">Web Technology</a></li>
                                        <li><a href="quiz.php?id=3">Java</a></li>
                                        <li><a href="quiz.php?id=4">Python</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" style="background-color:black;">
                                <h4 class="panel-title">
                                    <a  style="color:white;" data-toggle="collapse" data-parent="#collapse" href="#collapse-two">
                                       Mathematics
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse-two" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li><a href="quiz.php?id=5">Fourier Transforms</a></li>
                                        <li><a href="quiz.php?id=6">Laplace Transforms</a></li>
                                        <li><a href="quiz.php?id=7">Linear Algebra</a></li>
                                        <li><a href="quiz.php?id=8">Complex Analysis</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" style="background-color:black;">
                                <h4 class="panel-title">
                                    <a style="color:white;" data-toggle="collapse" data-parent="#collapse" href="#collapse-three">
                                        Data Structures
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse-three" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li><a href="quiz.php?id=10">Linked Lists</a></li>
                                        <li><a href="quiz.php?id=11">Stacks</a></li>
                                        <li><a href="quiz.php?id=12">Queues</a></li>
                                        <li><a href="quiz.php?id=13">Trees</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-8" id="quiz-questions">
				<?php $sql=mysql_query("SELECT * FROM quiz WHERE cat=3") or die(mysql_error());
				$i=1;
				echo '';
				while($row=mysql_fetch_array($sql)){
					
                  echo   '<div class="row" id="question">
                        <div class="col-sm-8 col-sm-offset-2">
                            <h4>Q.'.$i.' '.$row['question'].'</h4>
                            <div class="row" style="margin-bottom:2em;">
                                <div class="col-sm-12">

										 <label class="radio-inline" style="color:green;font-size:18px;">'.$row['cans'].'</label>

                                    
                                </div>

                            </div>
                        </div>
                    </div>';
					$i=$i+1;
				}
				
					
					?>

                    

                   
				   
				   
	
                </div>


            </div>
        </div>
    </div>
</body>
</html>
