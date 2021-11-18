<!DOCTYPE html>
<html>
<head>
  <title>HotBeans Development</title>
  <link rel="icon" href="https://hotbeans.net/img/logo.png"></link>
<meta name="description" content="HotBeans Development">
<meta name="icon" content="https://hotbeans.net/img/logo.png"> 
<meta property="og:title" content="HotBeans Development">
<meta property="og:description" content="HotBeans Development">
<meta property="og:image" content="https://hotbeans.net/img/logo.png">
<meta name="keywords" content="HotBeans Development">
<link type="text/plain" rel="author" href="https://thatguyjack.co.uk/humans.txt" /> 
<link rel="stylesheet" href="https://hotbeans.net/css/login-style.css"/>
<link rel="stylesheet" media="screen and (max-width: 900px)" href="https://hotbeans.net/css/login-800style.css" />
<script type="text/javascript" src="https://hotbeans.net/js/tsparticles.min.js"></script>
<script>
    function redirect(page){
      if(page == "mailing"){
       	window.open('./mailing/');
      }
      if(page == "home"){
       	window.open('/');
      }
    }
</script>
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
</head>
<body>
<div data-typesettings>
		<?php require_once "../nav.php";?>
  <div class="content">
      <div class="header">
        <h1> Welcome to the Mailing List!</h1>

        <p>Place your email below to get up to date infomation about our developers!  </p>
      </div>
        <form action="../mail.php" method="post">
            <div class="form-group">
                <input type="email" name="email"  placeholder="Enter Your Email Here" style="padding:15px 20px;font-size: 17px;margin:3px" class="content-box-login" class="form-control"></input>
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group">
                <input style="padding:15px 20px;font-size: 17px;margin:3px" class="content-button" type="submit" value="Submit" style="padding:15px 20px;font-size: 17px;margin:3px" class="content-button">
            </div>
        </form>
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
