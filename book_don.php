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
	        $location='book/';
	         $target='book/'.$name;
	
	       if(move_uploaded_file($tmp_name,$location.$name)){
		    
	      }
	     else{
		$error1 = '<p style="color:red;">Please fill all the fields</p>';
	        }
			
		}
		else{
					$error1 = '<p style="color:red;">Please fill all the fields</p>';

		}
	//name check
	if(empty($_POST['bname'])){                              
		$error1 = '<p style="color:red;">Please fill all the fields</p>';
	}else{
				$bname = test_input($_POST['bname']);

	}
	if(empty($_POST['author'])){                              
		$error1 = '<p style="color:red;">Please fill all the fields</p>';
	}else{
				$author = test_input($_POST['author']);

	}
		
	//address check
	if(empty($_POST['desc'])){                              
		$error1 = '<p style="color:red;">Please fill all the fields</p>';
	}else{
		$desc=test_input($_POST['desc']);
	}

	
	

	
	
	if(empty($error1)){

		
			
			$result2=mysql_query("INSERT INTO books(id,book_name,book_author,book_img,book_desc,book_dby) 
			VALUES('','$bname','$author','$target','$desc','".$_SESSION['user']."')") OR die(mysql_error());
			
		
			if(!$result2){
				die('Could not insert into database'.mysql_error());
				
			}
			
			else{
              $message="<h2 style='color:green;margin-left:120px;'>Ripple extends its gratitude";

				
			}
		}
		
		
	}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ripple | Patron Submission Form</title>
    <link href="form_donators.css" rel="stylesheet" />
    <script src="Scripts/jquery-2.1.4.min.js"></script>
    <script src="Scripts/bootstrap.min.js"></script>
    <link href="Content/bootstrap.min.css" rel="stylesheet" />
	<meta charset="utf-8" />
</head>
<body>
    <div id="banner">
        <div class="jumbotron text-center">
            <h2><span class="glyphicon glyphicon-education"></span> Ripple | Patron Donation Details</h2>
        </div>
    </div>
	<?php if($_SESSION['s']){?>
<form method="post" action="" enctype="multipart/form-data">
    <div id="form" style="margin-bottom:5px;">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
              
                    <div class="form-group">
                        <label class="control-label" for="form-group-input">Book name</label>
                        <input type="text" class="form-control" name="bname" placeholder="Enter the title of book">
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="form-group-input">Author</label>
                        <input type="text" class="form-control" name="author" placeholder="Enter the Author of book">
                    </div>
                      <div class="form-group">
                        <label class="control-label" for="form-group-input">Add cover image</label>
                        <input type="file" class="form-control" name="file" placeholder="">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="form-group-input">Description</label>
                        <textarea rows="8" cols="10" class="form-control" name="desc" placeholder="Brief description about the book"></textarea>
                    </div>

                    <center><button class="btn btn-primary btn-block" type="submit" name="submit" >Submit</button></center>
                </div>

                <div class="col-sm-6" id="book-image">
                    <div class="container">
                        <img src="http://craigmod.com/images/journal/coccyx/aba-04.png" alt="book-cover-image"class="img-responsive img-thumbnail"/>
                    </div>
                </div>

            </div>
        </div>
		<?php 
	
	if(!empty($error1)){
		echo $error1;
	}
	if(!empty($message)){
		echo $message;
	}
	
	?>
    </div>
	
	</form>
	<?php }
	else{
		echo '<h2>you have to <a href="don_login.php">login</a> to donate</h2>';
	}
	?>
	
	<br>
	<br>
</body>
</html>
