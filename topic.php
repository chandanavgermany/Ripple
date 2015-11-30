<?php 

include("connect.php");
session_start();

function xss($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
if(isset($_POST['submit'])){
  
$content=($_POST['content']);
         if(!empty($content)){
	
   
		//a real user posted a real reply
		$sql = "INSERT INTO 
					posts(post_content,
						  post_date,
						  post_topic,
						  post_by) 
				VALUES ('" . $content. "',
						 NOW(),
						'" . mysql_real_escape_string($_GET['id']) . "',
						
						'" . $_SESSION['user_id'] ."')";
						
		$result = mysql_query($sql);
						
		if(!$result)
		{
			 $error1='Your reply has not been saved, please try again later.';
		}
	
	
	
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
    

        <title>Ripple-topics</title>
		
		  	 <link type="text/css" rel="stylesheet" href="videos/css/style.css">

  	 <link type="text/css" rel="stylesheet" href="videos/css/style.css">
 
		  		

    <link rel='stylesheet' type='text/css' href='videos/css/main.css' >
<link rel='stylesheet' type='text/css' href='videos/css/jquery-ui/jquery-ui.css' >
<link rel='stylesheet' type='text/css' href='videos/css/sceditor/themes/default.css' >
<link rel='stylesheet' type='text/css' href='videos/css/forum.css' >
<link rel='stylesheet' type='text/css' href='videos/css/footer.css' >


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
                <a href="index.php" class="headerLogo">RIP<span class="secondColor">PLE</span>
                     </a>
            </header>
   

<section id="main_section" class="forum-main-section">
    

    <aside id="forum-left-bar" style="background:black;">
 <?php 
   if($_SESSION['signed_in']){
	$sql=mysql_query("SELECT * FROM users WHERE userID='".$_SESSION['user_id']."'") or die(mysql_error());
	$row=mysql_fetch_array($sql) or die(mysql_error());
        echo '     <h2 class="titles" style="margin-left:20px;">'  .$row['firstName'].' '.$row['lastName'].'</h2>
        <div class="user-thumbnail">
            <a href="#">
                                    <img src="'.$row['thumbnail'].'"/>
                            </a>
        </div>';
   }
  ?>  
    
    <dl   style="margin-top:10px;"  >
        <dt>My Feeds</dt>

                    <dd>


                <div class="menu-item-divider"></div>
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


</aside>
    <!-- style="height:initial;" -->
    <section id="forum-content-wrapper">

        <div id="bread-crumbs">
            <a href="forum.php">Home</a> &gt; 
			
			
<?php

$sql = "SELECT
			*
		FROM
			topics
		WHERE
			topics.topic_id = '" . mysql_real_escape_string($_GET['id']) ."'";
			
$result = mysql_query($sql);

if(!$result)
{
	echo 'The topic could not be displayed, please try again later.';
}
else
{
	if(mysql_num_rows($result) == 0)
	{
		echo 'This topic doesn\'t exist.';
	}
	else
	{
		while($row = mysql_fetch_assoc($result))
		{	$topic=$row['topic_id'];
			//display post data
			$cat=mysql_query("SELECT * FROM categories WHERE cat_id='".$row['topic_cat']."'");
			$cat_d=mysql_fetch_array($cat) ;
		echo '				
			<a href="category.php?id=10"
                class="bread-crumbs">'.$cat_d['cat_name'].'</a> &gt;
              </div>
			    <section id="main_content">
            
            <!-- Top Header -->
                            <h2 class="titles" style="float:left;">' . $row['topic_subject'] . '</h2>
                <div class="addthis_sharing_toolbox"></div>
                <br/>      <table cellpadding="0" cellspacing="0" class="postentry forumlist"  >
                <tbody>

';
		
			
			
			$posts_sql = mysql_query("SELECT
						posts.post_id,
						posts.post_topic,
						posts.post_content,
						posts.post_date,
						posts.post_by,
						users.userID,
						users.firstName,
						users.lastName,
						users.thumbnail
					
					FROM
						posts
					LEFT JOIN
						users
					ON
						posts.post_by = users.userID
					WHERE
						posts.post_topic = '" . mysql_real_escape_string($_GET['id']) . "' ORDER BY posts.post_id ASC") or die(mysql_error());
						
						$i=1;
				while($posts_row = mysql_fetch_assoc($posts_sql))
				{ 
				
						echo '               <tr>
                        <td class="post-votes "                             style="width:75px; background: #fff;">
                            <a href="#" class="thumb-up" style="margin-left:10px; margin-top:5px;">
                                         '.$i.'                </a>
                        </td>
                        <td class="icon-column" ><img src="'.$posts_row['thumbnail'].'" />
                        
                        </td>
                        <td class="post-content" style="width:100%;background:#fff;">
                            <a style="font-weight:bold;"
                                href=\'user.php?user='.$posts_row['userID'].'\'>'.$posts_row['firstName'].' ' .$posts_row['lastName'].'</a>
                            &middot;
                            <span class="post-date">'.$posts_row['post_date'].'</span>

                            <div class="clear"></div>
                            <div class="post-content" style="padding-top:5px;">
                                   '.$posts_row['post_content'].'                         </div>
                       
                        </td>
                                                     

                     
                        </tr>';
						$i=$i+1;
				}
				
				
		}
		
	}
}	
						?>
						
						
						
						
						
						
						
						
		<?php if($_SESSION['signed_in']){?>
      
          
                     
                                    
                <!-- Reply form at bottom -->
                <tr class="post-reply-btm">
                    <td colspan="3" class="replies-header" style="background:#fff;">
                                                    <h2 class="titles left" style="margin-top:6px;">Reply</h2>
                          
                            </td>
                </tr>
                                    <tr>
                        <td style="background:#fff;">&nbsp;</td>
                        <td class="icon-column" style="background:#fff;">
                            <a href='user.php?user=<?php echo $_SESSION['user_id']?>'> <img
                                    class="profileIcon topic-icon"
                                    src="<?php echo $_SESSION['thumbnail']?>"
                                    class="poster-icon"/> </a>
                        </td>
                        <td class="" style="width:100%;background:#fff">
                            <form  class="cool"
                                action="" method="post">
                                <textarea cols="20"
                                    id="compose-textarea" name="content" rows="12" class="textarea"></textarea> <br/>
                                <input type="submit" value="Submit" class="forum-action-button" name="submit"
                                    style="margin-left:1px;margin-top:2px;"/>
                            </form>
                        </td>
                    </tr>
					
		<?php }?>
                                </tbody>
            </table>
        </section>
       
    </section>
    <div class="afs_ads">&nbsp;</div>
    

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
<script type='text/javascript' src='videos/js/sceditor/jquery.sceditor.bbcode.js' ></script>
<script type='text/javascript' src='videos/js/uploadify/jquery.uploadify.js' ></script>
<script type='text/javascript' src='videos/js/highlight.pack.js' ></script>
<script type='text/javascript' src='videos/js/forum.js' ></script>
</body>
</html>