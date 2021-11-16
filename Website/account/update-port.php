<?php
// Initialize the session
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

session_start();
require_once "../config.php";
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$sesuser = $_SESSION["username"];
echo "session user =  $sesuser  <br>";
$id = $_SESSION["id"];
$title = "";
$body = "";
$date = date("Y-m-d");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_SESSION["id"];
    echo "title = " . $_POST["title"] . "<br>";
    echo "body ="  . $_POST["body"] . "<br>";
    echo "date =  $date  <br>";
    $sql = "UPDATE users SET `p_title` = '"  . $_POST["title"] . "', `p_content` = '" . $_POST["body"] . "', `p_datetime` = '$date' WHERE id = ' $id';";
    echo "$sql <br>";
    if ($link->query($sql) === TRUE){
      	echo "New post created successfully!";
        header("location: ../account");
    } else {
        echo "Error: " . $sql . "<br>" . $link->error;
        }
    $link->close();
}

/* if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $uid = $row["p_id"];
            print("<p>if 1 title:" . $_POST["title"] . " </p>");
            print("<p>if 1 body:" . $_POST["body"] . "</p>");
            print("<p>if 1 date: $date</p>");
            print("<p>if 1 uid: $uid</p>");
            print("<p>if 1 user: $sesuser</p>");
            // Prepare a select statement
            $sql = "UPDATE portfolios SET `p_title` = '?', `p_content` = '?', `p_datetime` = '?' WHERE p_id = '?' ;";
                if($stmt = mysqli_prepare($link, $sql)){
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "ssss", $title, $body, $date, $uid);
                    // Set parameters
                    $title = $_POST["title"];
                    $body = $_POST["body"];
                    $uid = $row["p_id"];
                    $date = $date("Y-m-d");
                    // Attempt to execute the prepared statement
                    if(mysqli_stmt_execute($stmt)){
                        mysqli_stmt_store_result($stmt);
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }

                    // Close statement
                    mysqli_stmt_close($stmt);
                }    
                // Close connection
                mysqli_close($link);
            }
    }
} */


?>