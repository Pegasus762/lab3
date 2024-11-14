<html>
    <head>
        <title>Admin Registration</title>
        <link link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
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
            <p><b>Admin Registration<b></p>   
        
        <form action="admin_regis.php" method="POST">
            <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" name="username" 
                    value="password" placeholder="Username">
                </div>
                <div class="input-group mb-1">
                    <input type="password" class="form-control form-control-lg bg-light fs-6" name="password" 
                    value="password" placeholder="Password">
                </div>
        
                <div class="input-group mb-5 d-flex justify-content-between">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="formCheck">
                        <label for="formCheck" class="form-check-label text-secondary"><small>Remember Me</small></label>
                    </div>
       
                    
                </div>
                  <input type="submit" class="btn btn-primary" value="Register"><br>
            </form> 
                <a href="login.php">Login here.</a>
                
                <body>
    

<?php
    include "db.php";
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    
        $sql = "INSERT INTO users_reg(username, password) VALUES('$username', '$password')";
    
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
?>