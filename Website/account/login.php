<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../account");
    exit;
}
 
// Include config file
require_once "../config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE active = '1' AND username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            // Redirect user to welcome page
                            header("location: ../account");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username  doesn't exist or account is not active, display a generic error message
                    $login_err = "Inactive account, Incorrect username/password see contact us page for help";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>

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
			<div id="div_login" class="header-footer">
			<h1 class="main-header">Login</h1>
			<br>
        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <input type="text" name="username" placeholder="Username" style="padding:15px 20px;font-size: 17px;margin:3px" class="content-box-login" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <input type="password" name="password"  placeholder="Password" style="padding:15px 20px;font-size: 17px;margin:3px" class="content-box-login" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" value="Login" style="padding:15px 20px;font-size: 17px;margin:3px" class="content-button">
            </div>
        </form>
        <br>
        <p>Don't Have an Account? <a href="./register.php" class="content-button">Register Here</a></p>
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