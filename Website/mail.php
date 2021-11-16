<?php
ini_set('display_errors', 'On');
ini_set('html_errors', 0);

// Include config file
require_once "./config.php";
print_r($_POST);
// Define variables and initialize with empty values
$email = $_POST["email"];
$email_err = "";
print("<p>start email: </P>");
print($email);
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    print("<p>if 1 email: </p>");
    print($email);
    // Validate username
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter a Email.";
        header("location: contact-us");
    } else{
        // Prepare a select statement
        $sql = "SELECT user_id FROM contact WHERE user_email = ?";
        print("<p>else email: </p>");
        echo("$sql <br>");
        print($email);
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            // Set parameters
            $param_email = $_POST["email"];
            print("<p>in else email: </p>");
            print($email);
            echo("<br>parama $param_email");
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This Email is already taken.";
                    echo("<p>email Taken</p>");
                    $sql = "UPDATE contact SET `send_email` = '1' WHERE (`user_email` =  ?)";
                    echo("<br> aaaa $sql");
                    if($stmt = mysqli_prepare($link, $sql)){
                        echo("<p>SQL</p>");
                        echo($sql);
                        mysqli_stmt_bind_param($stmt, "s", $param_email);
                        $param_email = $email;
                        echo("<br> aaaa $sql");
                            if(mysqli_stmt_execute($stmt)){
                                mysqli_stmt_store_result($stmt);
                                header("location: thanks");
                            } else{
                                echo("beeg error");
                            }
                    }
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Check input errors before inserting in database
    if(empty($email_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (user_email, send_email) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            $param_email = $email;
            $param_semail = "1";
            print("<p>param email: </p>");
            print($param_email);

            mysqli_stmt_bind_param($stmt, "ss", $param_email, $param_semail);
            // Set parameters

            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                print("<p>finished</p>");
                print("email: </p>");
                print($email);
                print("<p>param_email:  </p>");
                print($param_email);
                print("<p>param_semail: </p>");
                print($param_semail);
                header("location: thanks");
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