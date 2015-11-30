<?php 

include("connect.php");
session_start();
$c=$_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

            <meta name="description"
            content="">
        <meta name="keywords"
            content="">
    

        <title>Ripple-My Forum Feed </title>
    <link rel='stylesheet' type='text/css' href='videos/css/main.css' >
<link rel='stylesheet' type='text/css' href='videos/css/jquery-ui/jquery-ui.css' >
<link rel='stylesheet' type='text/css' href='videos/css/forum.css' >
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


             
    </dl>

    
         
    
    <dl>


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
    <section id="forum-content-wrapper">
        <section id="main_content">
                        <h2 class="titles">My Forum Feed
                                                           </h2>
            <table cellpadding="0" cellspacing="0" class="forumlist">
                                    <tfoot>
                    <tr>
                        <td colspan="3">           
        </td>
                    </tr>
                    </tfoot>
                    <tbody >
	<?php 
						
			$topicsql = "SELECT
									topic_id,
									topic_subject,
									topic_date,
									topic_cat,
									topic_by
									
								FROM
									topics WHERE topic_cat='".$c."'
								
								ORDER BY
									topic_id
								DESC
								
						";
								
					$topicsresult = mysql_query($topicsql) or die(mysql_error());
				
					if(!$topicsresult)
					{
						echo 'Last topic could not be displayed.';
					}
					else
					{
						$i=1;
							
						while($topicrow=mysql_fetch_array($topicsresult)){
								$cat_img="SELECT * FROM categories Where cat_id='".$topicrow['topic_cat']."'";
								$c_img=mysql_query($cat_img)or die(mysql_error());
								$im=mysql_fetch_array($c_img);
								$user="SELECT * FROM users WHERE userID='".$topicrow['topic_by']."'";
					$user_res=mysql_query($user) or die(mysql_error());
					$user_result=mysql_fetch_array($user_res);
						echo '
                       
					   <tr> <td class="post-votes " >
                            <a href="#" class="thumb-up" 
                              >
                                '.$i.'             </a>
                        </td>
                        <td class="icon-column" >
                            <a href="category.php?id='.$im['cat_id'].'">
                                                                <img src="'.$im['cat_img'].'" height="60" width="60" 
                                    class="poster-icon"/> </a>
                        </td>
					
                        <td style="width:100%;" class="post-content">
                            <a href="topic.php?id='.$topicrow['topic_id'].'"
                                class="post-title">'.$topicrow['topic_subject'].'</a><br/> <a
                                href="user.php?user='.$topicrow['topic_by'].'"
                                class="poster-name">'.$user_result['firstName'].' '.$user_result['lastName'].' </a> &gt;&gt; <a
                                href="category.php?id='.$im['cat_id'].'"
                                class="category-name">'.$im['cat_name'].'</a> <br/>

                            <a href="topic.php?id='.$topicrow['topic_id'].'"
                                class="postdate">'.$topicrow['topic_date'].'</a>
                            &middot;
                          

                        </td></tr>
                       ';	$i=$i+1;
						}
						
					}
							?>
					
                                            </tbody>
                            </table>
        </section>
        <!-- Right ADs Side -->
        <section id="forum-right-bar">
            <div class="forum-ads">
	<div class="ad-item">
		<!-- 160 x 600px ad -->
	</div>
	<div class="ad-item">
		<!-- 160 x 600px ad -->
	</div>
</div>        </section>
    </section>
    <div class="clear"></div>
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
<script type='text/javascript' src='videos/js/jquery-migrate-1.2.0.js' ></script>
</body>
</html>