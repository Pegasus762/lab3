<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
    <body>
        <!--Main container-->
    <div class="container d-flex justify-content-center align-items-center  min-vh-100">
    <!--Login container-->
    <div class="row border rounded-5 p-3 bg-white shadow box-area">    
  
    <!--Left side-->
<div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left box"
    style="background:lightblue">
      <div class="edu-image">
        <img src="edu-image.jpg" class="image-fluid" style="width: 250px;">
        <!--(image-fluid) images automatically scale to fit the width of their parent container-->
      </div>
</div>

    <!--Right box-->
<div class="col-md-6 right box">
    <div class="row align-items-center">
        <div class="header-text mb-4">
            <p>Hello again!</p>   
   
            <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Username">
                </div>
                <div class="input-group mb-1">
                    <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password">
                </div>
                <div class="input-group mb-5 d-flex justify-content-between">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="formCheck">
                        <label for="formCheck" class="form-check-label text-secondary"><small>Remember Me</small></label>
                    </div>
                    <div class="register">
                        <small><a href="admin_regis.php">Don't have an account? Register here</a></small>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <button type ="button" onclick="location.href='homepage.php'" class="btn btn-lg btn-primary w-100 fs-6" >Login</button>
                </div>
                <div class="input-group mb-3">
                    <button class="btn btn-lg btn-light w-100 fs-6"><img src="google.png" style="width:20px" class="me-2"><small>Sign In with Google</small></button>
                </div>
       
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>
</html>

<?php
session_start(); // Starting Session
include "db.php"; // Using database connection file here

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Check if form is submitted
    $username = mysqli_real_escape_string($conn, $_POST['username']); // Get the username value
    $password = $_POST['password']; // Get the password value from the form

    $sql = "SELECT * FROM users_reg WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {       //check if user exists
        $row = mysqli_fetch_assoc($result);    //get the data from the database

        if (password_verify($password, $row['password'])) {     //first is from form, second is from database
                                                                //check if password matches
            $_SESSION['username'] = $username;                
            header("Location: homepage.php");     //redirect to the homepage
            exit(); // Always exit after header redirection
        } else {
            echo "Invalid username or password";
        }
    } else {
        echo "No user found wtih that username";
    }
}
?>
