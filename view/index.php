<?php 
include '../connect.php'; 
// $query_select = "SELECT students.name, students.email, students.grade, students.section , subjects.subject , subjects.subject_code , subjects.grade FROM students INNER JOIN subjects ON students.grade = subjects.grade;";

$query_select = "SELECT 
students.name, 
students.email, 
students.grade, 
students.section, 
GROUP_CONCAT(subjects.subject SEPARATOR ', ') AS subjects
FROM 
students 
INNER JOIN 
subjects ON students.grade = subjects.grade
GROUP BY 
students.name, students.email, students.grade, students.section;";

$select = mysqli_query($con,$query_select);
$students = mysqli_fetch_all($select, MYSQLI_ASSOC);
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fetch Students</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Student List</h1>
                <a href="insert_page.html" class="btn btn-primary mb-3">Add New Student</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            
                            <th scope="col">Name</th>
                            <th scope="col">grade</th>
                            <th scope="col">section</th>
                            <th scope="col">subject</th>
                            <!-- <th scope="col">subject_code</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($students as $index => $student) : ?>
                            <tr>
                                <th scope="row"><?php echo $index + 1; ?></th>
                                
                                <td><?php echo $student['name']; ?></td>
                                
                                
                                <td><?php echo $student['grade']; ?></td>
                                <td><?php echo $student['section']; ?></td>
                                <td><?php echo $student['subjects']; ?></td>
                                

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
