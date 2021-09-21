<!DOCTYPE html>
<html>
<head>
  <title>ThatGuyJack - WebDev</title>
  <link rel="icon" href="https://thatguyjack.co.uk/img/icon.png"></link>
<meta name="description" content="ThatGuyJack - Webdev">
<meta name="icon" content="https://thatguyjack.co.uk/img/icon.png"> 
<meta property="og:title" content="ThatGuyJack">
<meta property="og:description" content="ThatGuyJack - Webdev">
<meta property="og:image" content="https://thatguyjack.co.uk/img/icon.png">
<meta name="keywords" content="ThatGuyJack">
<link type="text/plain" rel="author" href="https://thatguyjack.co.uk/humans.txt" /> 
<link rel="stylesheet" href="./css/style.css"/>

</head>
<body>
  <div class="content">
      <div class="header">
        <h1> Welcome to WebDev!</h1>
        <p> Submit your email to revice a free meme!</p>
        <p>Please note this is still under developement!</p>
      </div>
        <form action="./mail.php" method="post">
            <div class="form-group">
                <input type="email" name="email"  placeholder="Email" style="padding:15px 20px;font-size: 17px;margin:3px" class="content-box-login" class="form-control"></input>
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" value="Submit" style="padding:15px 20px;font-size: 17px;margin:3px" class="content-button">
            </div>
        </form>
  </div>
</body>
</html>
