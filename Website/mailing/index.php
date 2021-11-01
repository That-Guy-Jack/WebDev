<!DOCTYPE html>
<html>
<head>
  <title>ThatGuyJack - WebDev - Mailing</title>
  <link rel="icon" href="https://thatguyjack.co.uk/webdev/img/logo.png"></link>
<meta name="description" content="ThatGuyJack - Webdev">
<meta name="icon" content="https://thatguyjack.co.uk/webdev/img/logo.png"> 
<meta property="og:title" content="ThatGuyJack">
<meta property="og:description" content="ThatGuyJack - Webdev">
<meta property="og:image" content="https://thatguyjack.co.uk/webdev/img/logo.png">
<meta name="keywords" content="ThatGuyJack">
<link type="text/plain" rel="author" href="https://thatguyjack.co.uk/humans.txt" /> 
<link rel="stylesheet" href="../css/style.css"/>
<script type="text/javascript" src="https://thatguyjack.co.uk/js/tsparticles.min.js"></script>

<script>
    function redirect(page){
      if(page == "mailing"){
       	window.open('./webdev/mailing/');
      }
      if(page == "home"){
       	window.open('/webdev/');
      }
    }
</script>

</head>
<body>
<div class="nav">
    <img class="nav-logo" src="https://thatguyjack.co.uk/webdev/img/logo.svg"></img>
    <a href="../">Home</a>
    <a href="../mailing">Mailing</a>
    <a class="nav-login" href="../login">Login/Register</a>
  </div>
  <div class="content">
      <div class="header">
        <h1> Welcome to the Mailing List!</h1>

        <p>Please note this is still under developement!</p>
      </div>
        <form action="../mail.php" method="post">
            <div class="form-group">
                <input type="email" name="email"  placeholder="Email" style="padding:15px 20px;font-size: 17px;margin:3px" class="content-box-login" class="form-control"></input>
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group">
                <input style="padding:15px 20px;font-size: 17px;margin:3px" class="content-button" type="submit" value="Submit" style="padding:15px 20px;font-size: 17px;margin:3px" class="content-button">
            </div>
        </form>
  </div>
  <div id="background"></div>
  <script src="https://thatguyjack.co.uk/js/app.js"></script> 
  <script>
            tsParticles.loadJSON("background", "https://thatguyjack.co.uk/webdev/assets/particles.json").then(function (container) {
                container.start;
            });
        </script> 
        <div class="white-content">
        </div>
	<script src="https://xm87n2fnxq21.statuspage.io/embed/script.js"></script>
</body>
</html>
