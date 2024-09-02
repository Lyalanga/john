<?php
include 'database.php'; // Jumuisha muunganisho wa database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $is_admin = isset($_POST['is_admin']) ? 1 : 0; // 1 ikiwa admin, 0 ikiwa mtumiaji wa kawaida

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Chagua meza kulingana na ikiwa ni admin au mtumiaji
    $table = $is_admin ? 'admins' : 'users';

    try {
        $sql = "INSERT INTO $table (username, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username, $hashed_password]);

        // Usajili umefanikiwa, elekeza moja kwa moja kwenye ukurasa wa login
        header("Location: login.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="login.css"> <!-- Jumuisha CSS -->
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form action="register.php" method="POST">
            <label for="username">Jina la Mtumiaji:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Nenosiri:</label>
            <input type="password" id="password" name="password" required>

            <label for="is_admin">
                <input type="checkbox" id="is_admin" name="is_admin">
                Ni Admin
            </label>

            <input type="submit" value="Jisajili">
        </form>
    </div>
</body>
</html>
