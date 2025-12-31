<?php

function formatName($name) {
    return ucwords(trim($name));
}

function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function cleanSkills($string) {
    $skills = explode(",", $string);
    return array_map('trim', $skills);
}

function saveStudent($name, $email, $skillsArray) {
    try {
        $data = $name . "|" . $email . "|" . implode(",", $skillsArray) . PHP_EOL;
        if (!file_put_contents("students.txt", $data, FILE_APPEND)) {
            throw new Exception("File write failed");
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

function uploadPortfolioFile($file) {
    try {
        $allowed = ['pdf', 'jpg', 'png'];
        $maxSize = 2 * 1024 * 1024;

        if ($file['error'] !== 0) {
            throw new Exception("Upload error");
        }

        if ($file['size'] > $maxSize) {
            throw new Exception("File too large");
        }

        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        if (!in_array($ext, $allowed)) {
            throw new Exception("Invalid file type");
        }

        if (!is_dir("uploads")) {
            mkdir("uploads");
        }

        $newName = "portfolio_" . time() . "." . $ext;
        move_uploaded_file($file['tmp_name'], "uploads/" . $newName);

        return "File uploaded successfully!";
    } catch (Exception $e) {
        return "Error: " . $e->getMessage();
    }
}
