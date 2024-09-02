<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Badilisha Taarifa za Mwanafunzi</title>
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
    </style>
</head>
<body>
    <h2>Badilisha Taarifa za Mwanafunzi</h2>

    <?php
    include 'database.php';

    // Hakikisha kuwa ID ya mwanafunzi ipo ili kubadilisha
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Chukua taarifa za mwanafunzi kwa kutumia ID yake
        $sql = "SELECT * FROM students WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        $student = $stmt->fetch();

        if ($student) {
            // Fomu ya kubadilisha taarifa
            echo '
            <form action="update.php" method="POST">
                <input type="hidden" name="id" value="' . $student['id'] . '">
                
                <label for="full_name">Jina Kamili:</label>
                <input type="text" name="full_name" value="' . $student['full_name'] . '" required>
                
                <label for="email">Barua pepe:</label>
                <input type="email" name="email" value="' . $student['email'] . '" required>
                
                <label for="course">Kozi:</label>
                <input type="text" name="course" value="' . $student['course'] . '" required>
                
                <input type="submit" value="Badilisha">
            </form>
            ';
        } else {
            echo "Mwanafunzi hajapatikana.";
        }
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Pokea taarifa zilizobadilishwa kutoka kwenye fomu
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $course = $_POST['course'];

        // Hakikisha SQL inatumia alama za maswali sahihi na idadi yao inalingana
        $sql = "UPDATE students SET full_name = ?, email = ?, course = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$full_name, $email, $course, $id]);

        echo "Taarifa zimebadilishwa kwa mafanikio!";
    } else {
        echo "Hakuna ID ya mwanafunzi iliyotolewa!";
    }
    ?>
</body>
</html>
