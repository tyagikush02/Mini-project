<?php
require_once "config.php";

$username = $password = $confirm_password = $city = $state = "";
$username_err = $password_err = $confirm_password_err = $city_err = $state_err= "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
        echo '<script>alert("Username cannot be blank")</script>';
    }
    else{
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST['username']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is already taken"; 
                    echo '<script>alert("USER EXIST , PLEASE LOGIN")</script>';
                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }
    mysqli_stmt_close($stmt);
  

    // Check for password
    if(empty(trim($_POST['password']))){
        $password_err = "Password cannot be blank";
        echo '<script>alert("Password cannot be blank")</script>';
    }
    elseif(strlen(trim($_POST['password'])) < 5){
        $password_err = "Password cannot be less than 5 characters";
        echo '<script>alert("Password cannot be less than 5 characters")</script>';
    }
    else{
        $password = trim($_POST['password']);
    }
    
    //Check for city

    if(empty(trim($_POST['city']))){
      $city_err = "Password cannot be blank";
      echo '<script>alert("Password cannot be blank")</script>';
  }
  else{
      $city = trim($_POST['city']);
  }   
    //Check for state
    if(empty(trim($_POST['state']))){
      $state_err = "state cannot be blank";
      echo '<script>alert("state cannot be blank")</script>';
    }
    else{
      $state = trim($_POST['state']);
    }

    // Check for confirm password field
    if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
        $password_err = "Passwords should match";
        echo '<script>alert("Passwords should match")</script>';
    }

    // If there were no errors, go ahead and insert into the database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($state_err) && empty($city_err))
    {
        $sql = "INSERT INTO users (username, password,city,state) VALUES (?, ?,?,?)";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt)
        {
            mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_password, $param_city, $param_state);

            // Set these parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            $param_city = $city;
            $param_state = $state;

            // Try to execute the query
            if (mysqli_stmt_execute($stmt))
            {
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


<!--                                 HTML AND CSS  -->

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>PHP login system!</title>
  </head>
  <body style="background:url(https://img.freepik.com/premium-vector/seamless-pattern-with-paw-print-white-background-animal-print-vector-illustration_648830-156.jpg?size=626&ext=jpg);">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="register.php">Main page</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
  <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="About.php">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Contact.php">Contact Us</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container mt-4">
<h3>Please Register Here:</h3>
<hr>
<form action="" method="post" style="width:500px;padding:35px; height:500px;margin:0px auto; background-color:white; border-radius:15px; box-shadow: 2px 2px 2px 2px black;">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Username</label>
      <input type="text" class="form-control" name="username" id="inputEmail4" placeholder="Email"required>
    </div>
    <br>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" name ="password" id="inputPassword4" placeholder="Password"required>
    </div>
  </div>
  <br>
  <div class="form-group">
      <label for="inputPassword4">Confirm Password</label>
      <input type="password" class="form-control" name ="confirm_password" id="inputPassword" placeholder="Confirm Password"required>
    </div>
    <br>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity" name="city"required>
    </div>
    <br>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control" name="state" required>
        <option selected>Choose...</option>
        <option value="Arunchal pradesh">Arunchal pradesh</option>
        <option value="Assam">Assam</option>
        <option value="bihar">bihar</option>
        <option value="chattisgarh">chattisgarh</option>
        <option value="haryana">haryana</option>
        <option value="himanchal pradesh">himanchal pradesh</option>
        <option value="maharshtra">maharshtra</option>
        <option value="Madhya pradesh">Madhya pradesh</option>
        <option value="Mizoram">Mizoram</option>
        <option value="punjab">punjab</option>
        <option value="uttarkhand">uttarkhand</option>
        <option value="Uttar pradesh">Uttar pradesh</option>
        <option value="west bengal">west bengal</option>
      </select>
    </div>
  </div>
  <br>
  <br>
  <button type="submit" class="btn btn-primary">Sign in</button>
  <button class="btn btn-primary"><a href="login.php" style="color:white; text-decoration:none;">Login here</a></button>
  
</form>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 <footer style="background: #212226;color:white; text-align:center;">
    <p>Copyright &copy; 2024 All right reversed by kush and ayush Inc.</p>
</footer>
  </body>
</html>