<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: login.php");
        exit();
    }
?>

<html> 
<head> 
    <title>Update Student Details</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head> 
<body style=background-color:white> 
     <img src="fcutm.png" alt=logo width=315px height=65px>
     <br>
     <!-- navbar links -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">  <!--navbar-dark makes the links whatnot lighter-->
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="homepage.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="student_list.php">Student List</a>
        </li>
        <li class="nav-item">
           <a class="nav-link" href="register.php">Add Students</a>
        </li>
        <li class="nav-item">
           <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
    </div>
    </nav>

    <h2>Update Student Details</h2> 

    <?php 
    include "db.php"; // Using database connection file here

    if (isset($_GET['id'])) { 
        // Check if id parameter is available inside url
        $id = $_GET['id']; // Get the id parameter value
        
        $sql = "SELECT * FROM users WHERE id=$id"; // SQL query to select user data based on id
        $result = mysqli_query($conn, $sql); // Execute the query
        
        $row = mysqli_fetch_assoc($result); // Fetch the result set into an associative array

    ?>
    <div class="card mb-4">   <!-- margin bottom 4 -->
        <div class="card-header">
          <h5>Student Personal Details</h5>
        </div>

        <div class="card-body">
          <div class="mb-3">
          <form action="edit_student.php?id=<?php echo $row['id']; ?>" method="POST" class="form">
            <label for="name" class="form-label">Name : </label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" 
            placeholder="Enter your name" value="<?php echo $row['name']; ?>" required>
          </div>
        
          <div class="mb-3">
            <label for="email" class="form-label">Email : </label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="EmailHelp" 
            placeholder="Enter your e-mail" value="<?php echo $row['email']; ?>"required>
          </div>
         
          <div class="mb-3 row">
            <div class="col">
              <label for="id" class="form-label">Matric ID :</label>
              <input type="text" class="form-control" id="id" name="matric_id" aria-describedby="idHelp" 
              placeholder="Enter your Matric ID" value="<?php echo $row['matric_id']; ?>"required>
          </div>

          <div class="col">
            <label for="phone" class="form-label">Phone Number :</label>
              <input type="tel" class="form-control" id="phone" aria-describedby="numHelp" 
              placeholder="Enter your number" name="phone" value="<?php echo $row['phone']; ?>" required>
            </div>
          </div>

          <div class="mb-5">    
            <label for="gender" class="form-label">Gender </label>
            <input type="radio" id="male" name="gender" value="Male" <?php echo ($row['gender'] == 'Male') ? 'checked' : ''; ?>>
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="Female"  <?php echo ($row['gender'] == 'Female') ? 'checked' : ''; ?>>
            <label for="female">Female</label>
          </div>

    </div>

    <!-- Section for Student Academic Details -->
    <div class="card mb-4">   <!-- margin bottom 4 -->
        <div class="card-header">
            <h5>Student Academic Details</h5>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="course" class="form-label">Course:</label>
                <select id="course" class="form-select" name="course">
                    <option value="" disabled selected>Select your course</option>
                    <option value="SE" <?php echo ($row['course'] == 'SE') ? 'selected' : ''; ?>>Software Engineering</option>
                    <option value="DE" <?php echo ($row['course'] == 'DE') ? 'selected' : ''; ?>>Data Engineering</option>
                    <option value="AI" <?php echo ($row['course'] == 'AI') ? 'selected' : ''; ?>>Artificial Intelligence</option>
                    <option value="NS" <?php echo ($row['course'] == 'NS') ? 'selected' : ''; ?>>Network and Security</option>
                    <option value="BIO" <?php echo ($row['course'] == 'BIO') ? 'selected' : ''; ?>>Bioinformatics</option>
                    <option value="MUL" <?php echo ($row['course'] == 'MUL') ? 'selected' : ''; ?>>Graphics and Multimedia</option>
                </select>
            </div>

            <div class="mb-5">
                <label for="elective" class="form-label">Elective Subject:</label>
                <select id="elective" class="form-select" name="elective">
                    <option value="" disabled selected>Select your elective subject</option>
                    <option value="DS" <?php echo ($row['elective'] == 'DS') ? 'selected' : ''; ?>>Python for Data Science</option>
                    <option value="CV" <?php echo ($row['elective'] == 'CV') ? 'selected' : ''; ?>>Computer Vision</option>
                    <option value="ML" <?php echo ($row['elective'] == 'ML') ? 'selected' : ''; ?>>Advanced Machine Learning</option>
                    <option value="BD" <?php echo ($row['elective'] == 'BD') ? 'selected' : ''; ?>>Big Data Management</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Update Details</button>
        </div>
    </div>
</div>

    </form>
<?php        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $name = $_POST['name'] ?? '';
          $email = $_POST['email'] ?? '';
          $phone = $_POST['phone'];
          $gender = isset($row['gender']) ? $row['gender'] : '';
          $course = $_POST['course'];
          $matric_id = $_POST['matric_id'];
          $elective = $_POST['elective'];
            
            $sql = "UPDATE users SET 
            name = '$name', 
            email = '$email', 
            phone = '$phone', 
            gender = '$gender', 
            course = '$course', 
            matric_id = '$matric_id', 
            elective = '$elective' WHERE id = $id";
            
            if (mysqli_query($conn, $sql)) {
              echo "<div class='alert alert-success' role='alert'>Record updated successfully</div>";
          } else {
              echo "<div class='alert alert-danger' role='alert'>Error: " . $sql . "<br>" . mysqli_error($conn) . "</div>";
          }
        }
    }
    ?>
    <button type ="button" onclick="location.href='student_list.php'" class="btn btn-lg btn-primary w-18 fs-6" >Back to Student List</button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>
</html>
