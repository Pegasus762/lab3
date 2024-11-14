
<html>
    <head>
        <title>Student List</title>
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
  <body style="background-color: var(--bs-light-cyan);">
  
      <img src="fcutm.png" alt=logo width=315px height=65px>
        <br>

       <!-- toggle button for mobile nav -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

       <!-- navbar links -->
       <nav class="navbar navbar-expand-lg navbar-dark bg-dark"> 
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
        <button class="btn btn-light" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
    </div>
      
    </nav>

    <br>
    <h2>Student List</h2>
    <table border="1" class="table table-hover text-center">
      <thead>
        <tr class="table-dark text-uppercase text-white">
            <td><b>ID</b></td>
            <td><b>Name</b></td>
            <td><b>Email</b></td>
            <td><b>Phone</b></td>
            <td><b>Gender</b></td>
            <td><b>Course</b></td>
            <td><b>Matric ID</b></td>
            <td><b>Elective</b></td>
            <td><b>Edit</b></td>
            <td><b>Delete</b></td>
        </tr>
      </thead>
        
<?php
include "db.php"; // Using database connection file here

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {    
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['phone'] . "</td>";
        echo "<td>" . $row['gender'] . "</td>";
        echo "<td>" . $row['course'] . "</td>";
        echo "<td>" . $row['matric_id'] . "</td>";
        echo "<td>" . $row['elective'] . "</td>";
        echo "<td> 
                <form action='edit_student.php' method='GET'>
                   <input type='hidden' name='id' value='" . $row['id'] . "'>
                   <button type='submit' class='btn btn-primary'>Edit</button>
                   </form>
              </td>"; 
        echo "<td>  
                <form action='delete.php' method='GET'>
                   <input type='hidden' name='id' value='" . $row['id'] . "'>
                   <button type='submit' class='btn btn-danger'>Delete</button>
                   </form>
              
          </td>";
        echo "</tr>";
    }
}
        ?>
        </table>
        <br><br>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>





      