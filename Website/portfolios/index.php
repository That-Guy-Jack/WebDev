<?php
//$postsFile = fread("blog-posts.txt","r") or die("Unable to read file");

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

$servername = "192.168.5.16";
$username = "webdev";
$password = "webdev32145";
$dbname = "webdev_db";

//Create Connection
$conn = new mysqli($servername,$username,$password,$dbname);
//Check connection
if ($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}

// Get the posts and post information
$sql = "SELECT p_title, username, p_content, p_datetime, id FROM users ORDER BY id DESC";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="/css/login-style.css"/>
		<link rel="stylesheet" media="screen and (max-width: 900px)" href="/css/login-800style.css" />
		<title>HotBeans Development</title>
		<link rel="icon" href="https://hotbeans.net/img/logo.png"></link>
		<meta name="description" content="HotBeans Development">
		<meta name="icon" content="https://hotbeans.net/img/logo.png"> 
		<meta property="og:title" content="HotBeans Development">
		<meta property="og:description" content="HotBeans Development">
		<meta property="og:image" content="https://hotbeans.net/img/logo.png">
		<meta name="keywords" content="HotBeans Development">
		<link type="text/plain" rel="author" href="https://thatguyjack.co.uk/humans.txt" /> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
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
			<div class="content-header">
                	<h1 class="main-header">Meet the HotBeans Developers!</h1>
            	    <p class="header-footer">Take a look at what our developers are like!</p>
        	</div>
		<?php
		// This is the important bit, it displays the posts
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				echo "<br>";
				echo "<hr>";
				echo "<article>";
				echo "<section>";
				echo "<h2>". $row["p_title"] . " by " . $row["username"] . "</h2>";
				echo "<h1>". $row["p_datetime"] . "</h1>";
				echo $row["p_content"];	
				echo "</section>";
				echo "</article>";
		
			}
		}
	?>
</div>
</div>
<div id="background"></div>
<script src="https://hotbeans.net/js/app.js"></script> 
<script>
    tsParticles.loadJSON("background", "https://hotbeans.net/assets/particles.json").then(function (container) {
        container.start;
    });
</script> 
<div class="white-content"></div>
<script src="https://xm87n2fnxq21.statuspage.io/embed/script.js"></script>
</body>
</html>
