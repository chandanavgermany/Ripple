
<?php 

include("connect.php");
session_start();
if(isset($_POST['submit'])){
if(!empty($_POST['topic_cat']) && !empty($_POST['content']) && !empty($_POST['sub'])){	
	
	$sql = mysql_query("INSERT INTO 
                        topics(topic_subject,
                               topic_date,
                               topic_cat,
                               topic_by)
                   VALUES('" .$_POST['sub']. "',
                              NOW(),
                               '" . mysql_real_escape_string($_POST['topic_cat']) . "',
                               '" . mysql_real_escape_string($_SESSION['user_id']) . "'
                               )") or die(mysql_error());
							   				$topicid = mysql_insert_id();

		$s = mysql_query("INSERT INTO
							posts(post_content,
								  post_date,
								  post_topic,
								  post_by)
						 VALUES('" .$_POST['content']. "',
								  NOW(),
								  '" . $topicid . "',
								  '" . $_SESSION['user_id'] . "')") or die(mysql_error())	;

		if($s){
			$r="successfully posted";
		}						  
}
else{
	$error="All fields are required";
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

            <meta name="description"
            content=""
            content="">
    

        <title>Ripple-Start a New Topic</title>
    <link rel='stylesheet' type='text/css' href='videos/css/main.css' >
<link rel='stylesheet' type='text/css' href='videos/css/jquery-ui/jquery-ui.css' >
<link rel='stylesheet' type='text/css' href='videos/css/sceditor/themes/default.css' >
<link rel='stylesheet' type='text/css' href='videos/css/forum.css' >
<link rel='stylesheet' type='text/css' href='videos/css/uploadify.css' >
<link rel='stylesheet' type='text/css' href='videos/css/footer.css' >

    <!--[if lt IE 9]>
    <script src="videos/js/html5shiv.js"></script><![endif]-->

    <script type='text/javascript' src='videos/js/jquery-1.9.0.js' ></script>
</head>
<body>



<div id="wrapper">
                <header id="main_header">
                <a href="index.php" class="headerLogo">RIP<span class="secondColor">PLE</span></a>
            </header>
                <section id="main_section" class="forum-main-section">
  

   <aside id="forum-left-bar"style="background:black;">
   <?php 
   if($_SESSION['signed_in']){
	$sql=mysql_query("SELECT * FROM users WHERE userID='".$_SESSION['user_id']."'") or die(mysql_error());
	$row=mysql_fetch_array($sql) or die(mysql_error());
        echo '     <h2 class="titles" style="margin-left:20px;">'  .$row['firstName'].' '.$row['lastName'].'</h2>
        <div class="user-thumbnail">
            <a href="user.php?user='.$row['userID'].'">
                                    <img src="'.$row['thumbnail'].'"/>
                            </a>
        </div>';
   }
  ?>  
    
    <dl   style="margin-top:10px;"  >
        <dt>My Feeds</dt>

                    
               
    </dl>

    
                    <dl>
               <?php 
			  
$sql = "SELECT
			categories.cat_id,
			categories.cat_name,
			categories.cat_description,
			categories.faicon,
			COUNT(topics.topic_id) AS topics
		FROM
			categories
		LEFT JOIN
			topics
		ON
			topics.topic_id = categories.cat_id
		GROUP BY
			categories.cat_name, categories.cat_description, categories.cat_id ORDER BY categories.cat_id ASC ";        


$result = mysql_query($sql);

if(!$result)
{
	echo 'The categories could not be displayed, please try again later.';
}
else
{
	if(mysql_num_rows($result) == 0)
	{
		echo 'No categories defined yet.';
	}
	else
	{
		  
		  while($row = mysql_fetch_array($result))
		
		{			$id=$row['cat_id'];
				
			
		               echo "     <dd>
                    <a href='category.php?id=$row[cat_id]'>". $row['cat_name'] ." </a>

                                <div class=\"menu-item-divider\"></div>
            </dd>";
					
			
		}	
		  
		
	}
}
?>	
                    
                             
    </dl>
        
    </dl>

</aside>
    <section id="forum-content-wrapper">
        <section id="main_content">
            <div class="breadcrumb"></div>
                        <h2 class="titles">Create a New Topic</h2>
						<?php $sql = "SELECT
					cat_id,
					cat_name,
					cat_description
				FROM
					categories";
					$result=mysql_query($sql);

            echo '<form name="newtopicform" id="" action="" method="post"
                style="margin-top:10px;">
         
                
                <table cellpadding="0" cellspacing="0" class="forumentry">
				<tr>
					
                        <td class="label">Choose category:</td>
						
                        <td>
						<select name="topic_cat" >';
					while($row = mysql_fetch_array($result))
					{
						echo "<option value=\"" . $row['cat_id'] . "\">" . $row['cat_name'] . "</option>";
					}
				echo '</select> 
                        </td>

                    </tr>
                    <tr>
					
                        <td class="label">Title:</td>
                        <td><input type="text" id="title" name="sub" maxlength="500" value=""  class="input"
                                placeholder="Title of topic should be clear and descriptive..."/>
                        </td>

                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <textarea cols="20" id="" name="content" rows="12"
                                class="textarea"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <input type="submit" name="submit" value="Submit" class="forum-action-button"
                                style="margin-left:1px;margin-top:2px;"/>
                        </td>
                    </tr>
                </table>
            </form>';
			if(!empty($r)){echo $r;}
						if(!empty($error)){echo $error;}

			?>
        </section>
        <!-- Forum Right Panel -->
        <section id="forum-right-bar">
            <div class="forum-info">
    <h2 class="titles left">
            </h2>

    <a href="#"><img
            src="a.png" style="margin-top:80px;"alt="" class="forum-logo"/></a>


                                
                                      
                        
    <!-- Search Forum -->
   
</div>        </section>
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
<script type='text/javascript' src='videos/js/sceditor/jquery.sceditor.bbcode.js' ></script>
<script type='text/javascript' src='videos/js/uploadify/jquery.uploadify.js' ></script>
</body>
</html>