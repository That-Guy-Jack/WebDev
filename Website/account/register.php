<?php
ini_set('display_errors', 'On');
ini_set('html_errors', 0);
// Include config file
require_once "../config.php";

// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
$date = date("Y-m-d");

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, p_title, p_datetime, password) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_username, $param_date, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_date = $date;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: index.php");
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
<html lang="en">
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

	</head>
    <body>
	<div data-typesettings>	
    <?php require_once "../nav.php";?>
    <div class="content">
        <h1>Register</h1>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <input type="text" name="username" placeholder="Username" class="content-box-login" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" class="content-box-login" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="password" name="confirm_password" placeholder=" Confirm Password" class="content-box-login" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="content-button" value="Submit">
            </div>
            <p>Already have an account? <a href="login.php" class="content-button">Login here</a></p>
        </form>
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