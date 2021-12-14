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
<link rel="stylesheet" href="https://hotbeans.net/css/style.css"/>
<link rel="stylesheet" media="screen and (max-width: 900px)" href="https://hotbeans.net/css/800style.css" />
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
      <div class="header">
      <?php
          $status = $_SERVER['REDIRECT_STATUS'];
          $codes = array(
              403 => array('403 Forbidden', 'The server has refused to fulfill your request.'),
              404 => array('404 Not Found', 'The document/file requested was not found on this server.'),
              405 => array('405 Method Not Allowed', 'The method specified in the Request-Line is not allowed for the specified resource.'),
              408 => array('408 Request Timeout', 'Your browser failed to send a request in the time allowed by the server.'),
              500 => array('500 Internal Server Error', 'The request was unsuccessful due to an unexpected condition encountered by the server.'),
              502 => array('502 Bad Gateway', 'The server received an invalid response from the upstream server while trying to fulfill the request.'),
              504 => array('504 Gateway Timeout', 'The upstream server failed to send a request in the time allowed by the server.'),
          );
          $title = $codes[$status][0];
          $message = $codes[$status][1];
          if ($title == false || strlen($status) != 3) {
            $message = 'Please supply a valid status code.';
          }
          // Insert headers here
          echo '<h1>Oops There was a error! '.$title.'</h1>
          <p>'.$message.'</p>';
          // Insert footer here
        ?>
      </div>
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
