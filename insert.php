<?php
    if (isset($_POST['submit'])) {
        if (isset($_POST['email'])) {
            
            $email= $_POST['email'];
        
            $host = "localhost";
            $dbUsername = "root";
            $dbPassword = "";
            $dbName = "user";
            $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
            if ($conn->connect_error) {
                die('Could not connect to the database.');
            }

            // $result = mysqli_query($conn, $select);
            $sql="insert into user(email) values('$email')";

            if(mysqli_query($conn, $sql)){
                echo "<p class='mycss'>New record Inserted</p>";
            }
            else {
                echo "Error";
            }
        }
        else {
            echo "All field are required.";
            die();
        }
    }
    else {
        echo "Submit button is not set";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
	body{
    margin: 0;
    padding: 0;
    background-color:skyblue;
    background-position: center;
    font-family: sans-serif;
}
.mycss{
	color: white;
    border:1px solid #000;
    background: black;
    padding: 10px;
}
.loginbtn {
  background-color:green;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  font-size: 2em;
  width: 5%;
  opacity: 0.9;
}

</style>
</head>
<body>
<div class="loginbtn">
    <a href="index.php">Go Back To Login Page! </a>
</div>
</body>
</html>