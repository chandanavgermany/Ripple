<?php
include("connect.php");
session_start();
if(isset($_SESSION['s'])){
	header('Location:donate.php');
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
$sql="SELECT * FROM donators WHERE email='$email' and password='$mypassword'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
// If result matches table row must be 1 row
if($count==1)
{
	$row=mysql_fetch_array($result);
		$_SESSION['s']=true;
	$_SESSION['user']=$row['id'];
$_SESSION['t']=$row['thumbnail'];
header('Location:donate.php');
}
else 
{
$r="Your username or Password is incorrect ";
}
	}


}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Ripple | Patron Login</title>
	<meta charset="utf-8" />
    <link href="patron_login.css" rel="stylesheet" />
    <script src="Scripts/jquery-2.1.4.min.js"></script>
    <script src="Scripts/bootstrap.min.js"></script>
    <link href="Content/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
        <div id="banner">
            <div class="jumbotron text-center">
                <h2><span class="glyphicon glyphicon-education"></span> Ripple | Patron Login</h2>
            </div>
        </div>
       <div id="form">
          <form method="post" action="">
              <div class="container">
                  <div class="row">
                      <div class="col-sm-6" style="margin:3em auto;">

                          <div class="form-group">
                              <label class="control-label" for="form-group-input">Email</label>
                              <input type="text" class="form-control" name="email" placeholder="email">
                          </div>
                          <div class="form-group">
                              <label class="control-label" for="form-group-input">Password</label>
                              <input type="password" class="form-control" placeholder="Password" name="password">
                          </div>
                          <button class="btn btn-primary btn-block" type="submit" name="submit">Log in</button>
								<?php 
								
								if(!empty($error1)){
									echo $error1;
								}
								if(!empty($error)){
									echo $error;
								}
								?>
                      </div>
                      <div class="col-sm-6">
                          <div id="my-carousel" class="carousel slide" data-ride="carousel">
                              <ol class="carousel-indicators">
                                  <li data-target="#my-carousel" data-slide-to="0" class="active"></li>
                                  <li data-target="#my-carousel" data-slide-to="1"></li>
                                  <li data-target="#my-carousel" data-slide-to="2"></li>
                              </ol>
                              <div class="carousel-inner">
                                  <div class="item active">
                                      <img alt="First slide" width="500" height="100" src="http://www.kyrene.org/cms/lib2/AZ01001083/Centricity/Domain/559/Tax-Credit-Donate.jpg">
                                      
                                  </div>
                                  <div class="item">
                                      <img alt="Second slide" width="500" height="200" src="http://www.indigothreads.org/user_images/School_Supply_Donation__1.jpg">
                                     
                                  </div>
                                  <div class="item">
                                      <img alt="Third slide"  width="500" height="200"src="http://onyxmagazine.com/wp-content/uploads/bigstock-Young-child-graduating-7436863.jpg">
                                      
                                  </div>
                              </div>
                              
                          </div>
                      </div>
                  </div>
              </div>
          </form>
       </div>
</body>
</html>
