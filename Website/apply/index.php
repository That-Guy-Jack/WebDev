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
<meta name="viewport" content="width=device-width, initial-scale=1">
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
      <div class="header">
        <h1>Apply for a vacancy!</h1>
        <p>Take a look at our open job offers and if one suites you! or take a look at our recomended places to learn!</p>
      </div>
      <br>
      <hr>
        <h2>Apply to one of our vacancies!</h2>
        <form action="../mail.php" method="post">
            <div class="form-group">
                <input type="name" name="name"  placeholder="Enter Your Name Here" style="padding:15px 20px;font-size: 17px;margin:3px" class="content-box-login" class="form-control"></input>
                <input type="job" name="job"  placeholder="Enter Your Job Here" style="padding:15px 20px;font-size: 17px;margin:3px" class="content-box-login" class="form-control"></input>                
                <input type="experiance" name="experiance"  placeholder="Enter Your Experaince Here" style="padding:15px 20px;font-size: 17px;margin:3px" class="content-box-login" class="form-control"></input>                
                <input type="email" name="email"  placeholder="Enter Your Email Here" style="padding:15px 20px;font-size: 17px;margin:3px" class="content-box-login" class="form-control"></input>
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group">
                <input style="padding:15px 20px;font-size: 17px;margin:3px" class="content-button" type="submit" value="Submit" style="padding:15px 20px;font-size: 17px;margin:3px" class="content-button">
            </div>
        </form>
        <br>
				<hr>
				<article>
				  <section>
				    <h2>Places to learn!</h2>
            <ul>
            <li><a href="https://www.w3schools.com/">W3shcools</a></li>
            <li><a href="https://developer.mozilla.org/en-US/docs/Web/HTTP">Mozilla Docs</a></li>
            <li><a href="https://stackoverflow.com/">StackOverflow</a></li>
            <li><a href="https://github.com/">Github</a></li>
            </ul>

				  </section>
			  </article>
        <br>
				<hr>
				<article>
				  <section>
				    <h2>Principle Developer</h2>
				    <h1>Apply by 31st of July 2022</h1>
            <p>Requirements</p> 
            <ul>
            <li>You must be able to code well</li>
            <li>You must be able to work at like 2am super well and stuff</li>
            <li>Requires a Degree in Computer science or another computing based subject</li>
            </ul>
				  </section>
			  </article>
        <br>
				<hr>
				<article>
				  <section>
				    <h2>Principle Idiot</h2>
				    <h1>Apply by 69th of July 2022</h1>
            <p>Requirements</p> 
            <ul>
              <li>You must be able to make the worst cups of tea possible</li>
              <li>You must be able to turn up 30mins late when you live 5mins round the corner and blame it on the traffic</li>
              <li>You must be able to procrastonate all work but somehow get a raise</li>
              <li>Requires a Degree in Computer science or another computing based subject</il>
            </ul>
				  </section>
			  </article>
        <br>
        <hr>
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
