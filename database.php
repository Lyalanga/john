<?php
$host = 'localhost';
$db = 'students_db'; // Badilisha na jina la database yako
$user = 'root'; // Badilisha na jina la mtumiaji wa database
$pass = ''; // Badilisha na nenosiri la mtumiaji wa database

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
