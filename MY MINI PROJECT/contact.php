<?php
require_once "config(1).php";

$Name = $Email = $Message = "";
$Name_err = $Email_err = $Message_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if Name is empty
    if(empty(trim($_POST['Name']))){
        $Name_err = "Name cannot be blank";
        echo '<script>alert("Name cannot be blank")</script>';
    }
    else{
        $Name = trim($_POST['Name']);
    } 
    
    //Check for Email
    if(empty(trim($_POST['Email']))){
      $Email_err = "Email cannot be blank";
      echo '<script>alert("Email cannot be blank")</script>';
    }
    else{
        $Email = trim($_POST['Email']);
    }   
    
    //Check for Message
    if(empty(trim($_POST['Message']))){
      $Message_err = "Message cannot be blank";
      echo '<script>alert("Message cannot be blank")</script>';
    }
    else{
      $Message = trim($_POST['Message']);
    }


    // If there were no errors, go ahead and insert into the database
    if(empty($Name_err) && empty($Email_err) && empty($Message_err))
    {
        $sql = "INSERT INTO users (Name,Email,Message) VALUES (?, ?,?)";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt)
        {
            mysqli_stmt_bind_param($stmt, "sss", $param_username,$param_Email,$param_Message);

            // Set these parameters
            $param_username = $Name;
            $param_Email = $Email;
            $param_Message = $Message;

            // Try to execute the query
            if (mysqli_stmt_execute($stmt))
            {
                echo "You will get response within next 24 working hours";
                header("location: login.php");
            }
            else{
                echo "Something went wrong... cannot redirect!";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTACT</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="contact.css">
</head>
<body style="background-image:url(https://imgs.search.brave.com/AIRGOGZ7BsLbG4v6xAiTsLJ-lhVlHZd9xT9eK-55jtU/rs:fit:860:0:0/g:ce/aHR0cHM6Ly9ldmVy/eXRleHR1cmUuY29t/L3dwLWNvbnRlbnQv/dXBsb2Fkcy8yMDE4/LzEwL2V2ZXJ5dGV4/dHVyZS5jb20tc3Rv/Y2stbmF0dXJlLWdy/YXNzLXRleHR1cmUt/MDAwMTItMS00MDB4/NDAwLmpwZw);">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">CONTACT PAGE</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
  <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact us</a>
      </li>
</li>
    </ul>
  </div>
</nav>
    <section class="contact">
        <div class="content">
            <h2>Contact us</h2>
            <p>Fill the information in given box and we will contact you within 24 hours</p>
        </div>
        <div class="container">
            <div class="contactInfo">
                <div class="box">
                    <div class="text">
                        <h3>Address</h3>
                        <p>RKGIT,<br>Ghazibad</p>
                    </div>
                </div>
                <div class="box">
                    <div class="text">
                        <h3>Phone number</h3>
                        <p>9991234563</p>
                    </div>
                </div>
                <div class="box">
                    <div class="text">
                        <h3>Email</h3>
                        <p>tyagikush@gmail.com</p>
                    </div>
                </div>
            </div>
                <div class="contactForm">
                    <form method="post">
                        <h2>Send Message</h2>
                        <div class="inputBox">
                            <input type="text" name="Name" id="Name" required>
                            <span>Full Name</span>
                        </div>
                        <div class="inputBox">
                            <input type="text" name="Email" id="Email"required>
                            <span>Email</span>
                        </div>
                        <div class="inputBox">
                            <textarea rows="5" cols="35" name="Message" id="Message" required></textarea>
                            <span>Type your Message in 255 words....</span>
                        </div>
                        <div class="inputBox">
                            <input type="submit" value="Send" onclick="sumbit()">
                        </div>
                    </form>
                </div>
            </div>
    </section>
    <footer style="position: fixed; bottom: 0; width: 100%; background-color: #343a40; color: white; text-align: center;">
    <p style="margin-bottom: 0;">Copyright &copy; 2024 All rights reserved by Kush and Ayush Inc.</p>
</footer>
</body>
</html>