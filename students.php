<?php
include 'header.php';

if (file_exists("students.txt")) {
    $students = file("students.txt");

    echo "<h2>Student List</h2>";
    foreach ($students as $student) {
        list($name, $email, $skills) = explode("|", trim($student));
        $skillsArray = explode(",", $skills);

        echo "<p>";
        echo "<strong>Name:</strong> $name<br>";
        echo "<strong>Email:</strong> $email<br>";
        echo "<strong>Skills:</strong> ";
        print_r($skillsArray);
        echo "</p><hr>";
    }
} else {
    echo "<p>No students found.</p>";
}

include 'footer.php';
?>
