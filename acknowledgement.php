<?php  
include("connect.php");
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ripple </title>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="images/favicon.ico" />
    <link href="student_book_list.css" rel="stylesheet" />
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
        <div class="jumbotron text-center">
            <h2>Donator's panel</h2>
        </div>
    </div>

   <div id="content">
       <div class="container text-center" style="background-color:#f7f7f7;">
           <div class="row" id="head">
               <div class="col-sm-4"><h3>Name of Student</h3></div>
               <div class="col-sm-4"><h3>Title of Book</h3></div>
               <div class="col-sm-4"><h3>Address</h3></div>
           </div>

          
<?php 
            $s=mysql_query("SELECT * FROM bbb");
while($row=mysql_fetch_array($s)){
	$p=mysql_fetch_array(mysql_query("SELECT * FROM users WHERE userID='".$row['student']."'"));
		$o=mysql_fetch_array(mysql_query("SELECT * FROM books WHERE id='".$row['book_id']."'"));

          echo ' <div class="row">
               <div class="col-sm-4"><h3>'.$p['firstName'].' '.$p['lastName'].'</h3></div>
               <div class="col-sm-4"><h3>'.$o['book_name'].'</h3></div>
               <div class="col-sm-4"><h3>'.$p['address'].'</h3></div>
           </div>';
}
?>
       </div>
   </div>
</body>
</html>
