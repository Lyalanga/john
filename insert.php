<?php
// Database connection
$host = 'localhost';
$username = 'root';
$password = ''; // Update with your MySQL password
$dbname = 'portfolio';

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $Phone_Number = mysqli_real_escape_string($conn, $_POST['Phone_Number']);

    // Handling file upload
    $target_dir = "uploads/"; // Directory to store uploaded images
    $target_file = $target_dir . basename($_FILES['image']['name']);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a valid image type
    $valid_extensions = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($imageFileType, $valid_extensions)) {
        die("Error: Only JPG, JPEG, PNG, & GIF files are allowed.");
    }

    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        // Save project details in the database
        $sql = "INSERT INTO projects (title, description, image_url, Phone_Number) 
                VALUES ('$title', '$description', '$target_file', '$Phone_Number')";

        if ($conn->query($sql) === TRUE) {
            echo "New project added successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error uploading the file.";
    }
}

$conn->close();
?>
