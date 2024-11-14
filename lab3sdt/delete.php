<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
    <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

<?php
include "db.php"; // Using database connection file here
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM users WHERE id='$id'"; // Fixed the string termination
    $result = mysqli_query($conn, $sql);
     
        if ($result) {
            echo "
            <div class='container my-5'>
                <div class='row justify-content-center'>
                    <div class='col-md-6'>
                        <div class='card'>
                            <div class='card-header bg-success text-white'>
                                <h4 class='mb-0'>Student Record Deleted</h4>
                            </div>
                            <div class='card-body'>
                                <div class='d-flex align-items-center'>
                                    <svg class='bi flex-shrink-0 me-2' role='img' aria-label='Success:'>
                                        <use xlink:href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css#check-circle'></use>
                                    </svg>
                                    <div>The student record has been deleted successfully.</div>
                                </div>
                                <div class='d-flex justify-content-end mt-3'>
                                    <a href='student_list.php' class='btn btn-primary'>Back to Student List</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";
        } else {
            echo "
            <div class='container my-5'>
                <div class='row justify-content-center'>
                    <div class='col-md-6'>
                        <div class='card'>
                            <div class='card-header bg-danger text-white'>
                                <h4 class='mb-0'>Error Deleting Student Record</h4>
                            </div>
                            <div class='card-body'>
                                <div class='alert alert-danger' role='alert'>
                                    The student record could not be deleted. Please try again.
                                </div>
                                <div class='d-flex justify-content-end'>
                                    <a href='student_list.php' class='btn btn-secondary'>Back to Student List</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";
        }
    } else {
        echo "
        <div class='container my-5'>
            <div class='row justify-content-center'>
                <div class='col-md-6'>
                    <div class='card'>
                        <div class='card-header bg-danger text-white'>
                            <h4 class='mb-0'>Error: No User ID Provided</h4>
                        </div>
                        <div class='card-body'>
                            <div class='alert alert-danger' role='alert'>
                                No user ID was provided. Please try again.
                            </div>
                            <div class='d-flex justify-content-end'>
                                <a href='student_list.php' class='btn btn-secondary'>Back to Student List</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>";
    }
    ?>
