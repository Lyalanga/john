<?php
// Anzisha connection ya database
include 'database.php';

// Fanya query ili kupata data za wanafunzi
$sql = "SELECT * FROM students";
$stmt = $conn->prepare($sql);
$stmt->execute();

// Hakikisha variable $students ipo na ni array
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="style.css"> <!-- Jumuisha CSS -->
</head>
<body>
    <header>
        <h1>Admin Panel</h1>
        <nav>
            <a href="admin.php">Home</a>
            <a href="create.php">Sajili Mwanafunzi Mpya</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>
    
    <div class="container">
        <h2>Orodha ya Wanafunzi</h2>
        <a href="create.php" class="button">Sajili Mwanafunzi Mpya</a>
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
                    <td><?php echo $student['id']; ?></td>
                    <td><?php echo $student['full_name']; ?></td>
                    <td><?php echo $student['email']; ?></td>
                    <td><?php echo $student['course']; ?></td>
                    <td>
                        <a href="view.php?id=<?php echo $student['id']; ?>" class="button">Personal Details</a>
                        <a href="update.php?id=<?php echo $student['id']; ?>" class="button">Edit</a>
                        <a href="delete.php?id=<?php echo $student['id']; ?>" class="button">View</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Hakuna wanafunzi waliopatikana.</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>
