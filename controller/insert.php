<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../connect.php'; 

    // Get data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $age = $_POST['age'];
    $grade = $_POST['grade'];
    $section = $_POST['section'];

    $query_insert = "INSERT INTO `students`(`name`, `email`, `password`, `age`, `grade`, `section`) VALUES ('$name','$email','$password','$age','$grade','$section')";
    $insert = mysqli_query($con, $query_insert);

    if ($insert) {
        // Insertion successful
        echo "Data inserted successfully!";
        // Redirect back to index.php after 2 seconds
        header("refresh:2;url=../view/index.php");
        exit(); // Ensure no further output is sent
    } else {
        // Insertion failed
        echo "Error: " . mysqli_error($con);
    }
}
?>
