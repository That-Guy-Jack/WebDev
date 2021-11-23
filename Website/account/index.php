<?php
// Initialize the session
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

session_start();
require_once "../config.php";
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
$sesuser = $_SESSION["username"];
//echo "session user =  $sesuser  <br>";

$asql = "SELECT p_title, p_content, p_datetime FROM users WHERE username = '$sesuser'";
$result = $link->query($asql);
?>

<!DOCTYPE html>
<html>
	<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://hotbeans.net/css/login-style.css"/>
		<link rel="stylesheet" media="screen and (max-width: 900px)" href="https://hotbeans.net/css/login-800style.css" />
		<title>HotBeans Development</title>
		<link rel="icon" href="https://hotbeans.net/img/logo.png"></link>
		<meta name="description" content="HotBeans Development">
		<meta name="icon" content="https://hotbeans.net/img/logo.png"> 
		<meta property="og:title" content="HotBeans Development">
		<meta property="og:description" content="HotBeans Development">
		<meta property="og:image" content="https://hotbeans.net/img/logo.png">
		<meta name="keywords" content="HotBeans Development">
		<link type="text/plain" rel="author" href="https://thatguyjack.co.uk/humans.txt" /> 
		<script type="text/javascript" src="https://hotbeans.net/js/tsparticles.min.js"></script>
		<style>
        .content-button{
            padding:15px 20px;
            border: 4px solid #685B60;
            background-color: transparent;
            color: black;
            font-size: 17px;
            margin:3px;
            opacity: 0;
            animation: fadeInAnimation 2s ease 1s;
            animation-iteration-count: 1;
            animation-fill-mode: forwards;
            cursor: pointer;
            transition-duration: 0.2s;
            outline:none;
        }
        </style>
        <script type="text/javascript" src="https://hotbeans.net/js/tsparticles.min.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-KWVBJ3WXF1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-KWVBJ3WXF1');
</script>
	</head>
    <body>
	<div data-typesettings>	
		<?php require_once "../nav.php";?>
		<div class="content">
			<?php
					if($result->num_rows > 0){
						while($row = $result->fetch_assoc()){
							echo '<form action="update-port.php" method="post">';
							echo '<div id="div_login" class="header-footer">';
							echo '<h1 class="main-header">Portfolio:</h1>';
							echo '<br>';
							echo "</div>";
							echo '<input value=" '. $row["p_title"] .' " type="text" placeholder="Title" name="title" style="padding:15px 20px;font-size: 17px;margin:3px" class="content-box-login">';
							echo '<br>';
							echo '<label data-children-count="1">';
							echo '<textarea name="body" rows="7" placeholder="Enter the post" style="padding:15px 20px;font-size: 17px;margin:3px" class="content-box" >'. $row["p_content"] .'</textarea>';
							echo '</label>';
							echo '<br>';
							echo '<input style="padding:15px 20px;font-size: 17px;margin:3px " type="submit" value="Save" class="content-button">';
							echo '</form>';
						}
					}elseif ($result->num_rows < 0){
						
					}
			?>
				<br>
				<a href="logout.php" style="padding:15px 20px;font-size: 17px;margin:3px" class="content-button">Logout</a>

</div>
		</div>
		<div id="background"></div>
  <script src="https://hotbeans.net/js/app.js"></script> 
  <script>
            tsParticles.loadJSON("background", "https://hotbeans.net/assets/particles.json").then(function (container) {
                container.start;
            });
        </script> 
        <div class="white-content">
        </div>
	<script src="https://xm87n2fnxq21.statuspage.io/embed/script.js"></script>
</body>
</html>