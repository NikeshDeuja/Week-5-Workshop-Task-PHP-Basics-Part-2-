<?php
include 'header.php';
include 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo uploadPortfolioFile($_FILES['portfolio']);
}
?>

<h2>Upload Portfolio File</h2>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="portfolio" required>
    <br><br>
    <button type="submit">Upload</button>
</form>

<?php include 'footer.php'; ?>
