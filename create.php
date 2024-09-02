<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sajili Mwanafunzi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h2 {
            color: #333;
        }
        form {
            width: 300px;
            margin-top: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .success-message {
            margin-top: 20px;
            color: #28a745;
        }
        .view-student {
            display: inline-block;
            margin-top: 10px;
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 4px;
        }
        .view-student:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>Sajili Mwanafunzi Mpya</h2>
    <form action="create.php" method="POST">
        <label for="full_name">Jina Kamili:</label>
        <input type="text" name="full_name" required>
        
        <label for="email">Barua pepe:</label>
        <input type="email" name="email" required>
        
        <label for="course">Kozi:</label>
        <input type="text" name="course" required>
        
        <input type="submit" value="Sajili">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include 'database.php';

        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $course = $_POST['course'];

        $sql = "INSERT INTO students (full_name, email, course) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$full_name, $email, $course]);

        // Pata ID ya mwanafunzi mpya aliyesajiliwa
        $student_id = $conn->lastInsertId();

        echo "<div class='success-message'>Mwanafunzi amesajiliwa kwa mafanikio!</div>";
        echo "<a class='view-student' href='view.php?id=" . $student_id . "'>Angalia Taarifa za Mwanafunzi</a>";
    }
    ?>
</body>
</html>
