<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
  // Check if username is empty
  if(empty(trim($_POST["email"]))){
      $email_err = "Please enter Email.";
  } else{
      $email = trim($_POST["email"]);
      $file = './emails.txt';
      $current = file_get_contents($file);
      $current .= "$email\n";
      file_put_contents($file, $current);
      //$email_err = "Email Sent!";
  }
}
?>

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
      </div>
      <div class="from">
        <form method="post">
        <div class="form-group">
                <input type="email" name="email"  placeholder="Email" style="padding:15px 20px;font-size: 17px;margin:3px" class="content-box-login" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit"value="email" style="padding:15px 20px;font-size: 17px;margin:3px" class="content-button">
            </div>
        </form>
      </div>
  </div>
</body>
</html>
