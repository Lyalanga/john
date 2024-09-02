<?php
session_start(); // Anza session

include 'database.php'; // Jumuisha muunganisho wa database

// Angalia kama form imewasilishwa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role']; // Pata thamani ya role kutoka kwenye form

    try {
        // Tafuta mtumiaji kwa jina la mtumiaji na role
        $table = $role == 'admin' ? 'admins' : 'users'; // Chagua meza kulingana na role
        $sql = "SELECT * FROM $table WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Anza session kwa mtumiaji aliyeingia
            $_SESSION['user'] = $user;

            if ($role == 'admin') {
                header("Location: admin.php"); // Elekeza kwenye ukurasa wa admin
            } else {
                header("Location: user.php"); // Elekeza kwenye ukurasa wa user
            }
            exit();
        } else {
            // Nenosiri si sahihi au mtumiaji hayupo
            $error = "Jina la mtumiaji au nenosiri si sahihi. Tafadhali jisajili.";
            header("Location: register.php"); // Elekeza kwenye ukurasa wa usajili
            exit();
        }
    } catch (PDOException $e) {
        $error = "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="login.css"> <!-- Jumuisha CSS -->
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form action="login.php" method="POST">
            <label for="username">Jina la Mtumiaji:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Nenosiri:</label>
            <input type="password" id="password" name="password" required>

            <label for="role">Login as:</label>
            <select id="role" name="role" required>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>

            <input type="submit" value="Ingiza">
        </form>
    </div>
</body>
</html>
