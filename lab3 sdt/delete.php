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
