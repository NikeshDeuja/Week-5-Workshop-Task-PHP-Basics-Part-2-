<?php
include 'header.php';
include 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $name = formatName($_POST['name']);
        $email = $_POST['email'];
        $skillsInput = $_POST['skills'];

        if (!$name || !validateEmail($email)) {
            throw new Exception("Invalid input");
        }

        $skillsArray = cleanSkills($skillsInput);
        saveStudent($name, $email, $skillsArray);

        echo "<p>Student saved successfully!</p>";
    } catch (Exception $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
    }
}
?>

<h2>Add Student Info</h2>
<form method="post">
    Name: <input type="text" name="name" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Skills (comma-separated): <input type="text" name="skills" required><br><br>
    <button type="submit">Save</button>
</form>

<?php include 'footer.php'; ?>
