<?php

include("connect.php");
session_start();
ob_start();


function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}



if(isset($_POST['submit'])){
	        $name=$_FILES['file']['name'];

if(!empty($name)){

	        $tmp_name=$_FILES['file']['tmp_name'];
	        $location='donate/';
	         $target='donate/'.$name;
	
	       if(move_uploaded_file($tmp_name,$location.$name)){
		    
		    echo "file uploaded";
	      }
	     else{
		$error1 = '<p style="color:white;">Please fill all the fields</p>';
	        }
			
		}
		else{
					$error1 = '<p style="color:white;">Please fill all the fields</p>';

		}
	//name check
	if(empty($_POST['fname'])){                              
		$error1 = '<p style="color:white;">Please fill all the fields</p>';
	}else{
				$fname = test_input($_POST['fname']);

	}
	if(empty($_POST['lname'])){                              
		$error1 = '<p style="color:white;">Please fill all the fields</p>';
	}else{
				$lname = test_input($_POST['lname']);

	}
		
	//address check
	if(empty($_POST['address'])){                              
		$error1 = '<p style="color:white;">Please fill all the fields</p>';
	}else{
		$address=test_input($_POST['address']);
	}
	
	//organistion
	if(empty($_POST['organisation'])){                              
		$error1 = '<p style="color:white;">Please fill all the fields</p>';
	}else{
		$organisation=test_input($_POST['organisation']);
	}
	//gender check
	if(empty($_POST['gender'])){                              
		$error1 = '<p style="color:white;">Please fill all the fields</p>';
	}else{
		$gender=test_input($_POST['gender']);
	}
	
	//adhar no
	if(empty($_POST['ano'])){                              
		$error1 = '<p style="color:white;">Please fill all the fields</p>';
	}else {
		$ano = test_input($_POST['ano']);
	}
	
	//contact number
	
	if(empty($_POST['contact'])){
		$error1 = '<p style="color:white;">Please fill all the fields</p>';

	}else if(ctype_digit($_POST['contact']) && $_POST['contact']<919999999999 && (strlen($_POST['contact'])<12 && strlen($_POST['contact'])>9 ) ){
		$contact = $_POST['contact'];
		$contact = test_input($contact);
	}
	else{
		$error2 = "<p style='color:white;'>Enter valid contact number </p>";
	}
	
	 //email check
    if(empty($_POST['email'])){
        $error1 = 'Please fill all the fields';
    }else if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST['email'])){
		$email = mysql_real_escape_string($_POST['email']);
    }else{
		$error3 = 'Your e-mail address is invalid. ';
    }
	
	//password check
	if(empty($_POST['password'])){
		$error1 = '<p style="color:white;">Please fill all the fields</p>';
	}else{
		
		$password = md5(mysql_real_escape_string($_POST['password']));

	}
	

	
	
	if(empty($error1) && empty($error2) && empty($error3)){
		$result=mysql_query("SELECT * FROM donators WHERE email='$email'") OR die('error in registering');

		if(mysql_num_rows($result)==0){
			
			$result2=mysql_query("INSERT INTO donators(id,fname,lname,organisation,contact,email,password,thumbnail,gender,address,ano) 
			VALUES('','$fname','$lname','$organisation','$contact','$email','$password','$target','$gender','$address','$ano')") OR die(mysql_error());
			
		
			if(!$result2){
				die('Could not insert into database'.mysql_error());
				
			}
			
			else{
              $message="Thank you for registering !  you may <a href=\"login.php\">login now</a>";

				
			}
		}
		else{
		$error4=" email already exist try other";
		   }
		
		
	}
	else{
	}
	
	
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Ripple | Sign up</title>
	<meta charset="utf-8" />
    <script src="Scripts/jquery-2.1.4.min.js"></script>
    <script src="Scripts/bootstrap.min.js"></script>
    <link href="Content/bootstrap.min.css" rel="stylesheet" />
    <link href="css/signup.css" rel="stylesheet" />

    
</head>
<body>
    <div id="header">
        <div class="row">
            <div class="col-md-6">
                <div class="jumbotron text-left">
                    <h1><span class="glyphicon glyphicon-education"></span>&nbsp;Ripple</h1>
                    Ripple propagates infinitely... So does the knowledge..!!
                </div>
            </div>
          
        </div>
    </div>
    <form id="" method="post" action="" enctype="multipart/form-data">
        <div class="container text-center">
            <div class="jumbotron text-center">
                <h3>|| It's a good idea to join us ||</h3>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group text-center">
                        <input type="text" class="form-control" id="" placeholder="First Name" name="fname">
                    </div>
			     <div class="form-group text-center">
                        <input type="text" class="form-control" id="" placeholder="Last Name" name="lname">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Email Id" name="email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Organisation" name="organisation">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="" placeholder="Password" name="password">
                    </div>
					 <div class="form-group">
                        <input type="file" class="form-control" id="" placeholder="Profile pic" name="file">
                    </div>
                    <div class="form-group">
                        <input type="tel" class="form-control"  maxlength="12" placeholder="Contact number" name="contact">
                    </div>
                      <div class="form-group">
                        <input type="text" class="form-control" id="" maxlength="25" placeholder="Adhar number" name="ano">
                    </div>
                   
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <p style="color:white;font-family:'Century Gothic';" class="text-left">Choose your domain</p>
                    <div class="form-group text-left" style="color:white;">
                       
                            
<select name="gender"  style="color:black">
							

					<option value="male">male</option>
										<option value="female">female</option>

					</select> 
                    </div>

                    </div>
					

                        </div>
                    <div class="form-group">
                        <textarea  class="form-control" id="" rows="5" placeholder="Permanent Address" name="address"></textarea>
                    </div>
                    <button class="btn btn-info btn-block" type="submit" name="submit">Sign up</button>
					<br><br><br>
					<?php 
		if(!empty($error1)){echo $error1;}
						if(!empty($error2)){echo $error2;}
												if(!empty($error3)){echo $error3;}
												if(!empty($error4)){echo $error4;}
												if(!empty($message)){echo $message;}

						
						?>
                </div>

				
            </div>
        </div>
		
    </form>
	
</body>
</html>
