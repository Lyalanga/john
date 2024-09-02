<?php
include 'database.php'; // Jumuisha muunganisho wa database

// Jaribu kupata data kutoka kwa database
try {
    $sql = "SELECT * FROM students"; // Badilisha `students` na jina la meza yako
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    $students = []; // Hakikisha kwamba $students ni array tupu hata kama tatizo linaendelea
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Panel</title>
    <link rel="stylesheet" href="style.css"> <!-- Jumuisha CSS -->
</head>
<body>
    <header>
        <h1>User Panel</h1>
        <nav>
            <a href="user.php">Home</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>
    
    <div class="container">
        <h2>Orodha ya Wanafunzi</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Jina Kamili</th>
                <th>Barua pepe</th>
                <th>Kozi</th>
                <th>Action</th>
            </tr>
            <?php if (!empty($students)): ?>
            <?php foreach ($students as $student): ?>
            <tr>
                <td><?php echo htmlspecialchars($student['id']); ?></td>
                <td><?php echo htmlspecialchars($student['full_name']); ?></td>
                <td><?php echo htmlspecialchars($student['email']); ?></td>
                <td><?php echo htmlspecialchars($student['course']); ?></td>
                <td>
                    <a href="view.php?id=<?php echo htmlspecialchars($student['id']); ?>" class="button">View</a>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
            <tr>
                <td colspan="5">Hakuna data inapatikana.</td>
            </tr>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>
