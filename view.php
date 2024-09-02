<?php
include 'database.php'; // Jumuisha muunganisho wa database

// Hakikisha kuwa kuna parameter ya 'id' kutoka kwenye URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Jaribu kupata data ya mwanafunzi kulingana na ID
    try {
        $sql = "SELECT * FROM students WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        $student = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$student) {
            die('Data ya mwanafunzi haipatikani.');
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        die();
    }
} else {
    die('ID ya mwanafunzi haijapata.');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Mwanafunzi</title>
    <link rel="stylesheet" href="style.css"> <!-- Jumuisha CSS -->
</head>
<body>
    <header>
        <h1>View Mwanafunzi</h1>
        <nav>
            <a href="user.php">Home</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>
    
    <div class="container">
        <h2>Taarifa za Mwanafunzi</h2>
        <table>
            <tr>
                <th>ID</th>
                <td><?php echo htmlspecialchars($student['id']); ?></td>
            </tr>
            <tr>
                <th>Jina Kamili</th>
                <td><?php echo htmlspecialchars($student['full_name']); ?></td>
            </tr>
            <tr>
                <th>Barua pepe</th>
                <td><?php echo htmlspecialchars($student['email']); ?></td>
            </tr>
            <tr>
                <th>Kozi</th>
                <td><?php echo htmlspecialchars($student['course']); ?></td>
            </tr>
        </table>
        <a href="user.php" class="button">Kurudi</a>
    </div>
</body>
</html>
