<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Orodha ya Wanafunzi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h2 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        a {
            text-decoration: none;
            color: #3498db;
            padding: 5px 10px;
            border: 1px solid #3498db;
            border-radius: 4px;
        }
        a:hover {
            background-color: #3498db;
            color: white;
        }
        .action-buttons a {
            margin-right: 10px;
        }
        .action-buttons {
            display: flex;
            gap: 10px;
        }
    </style>
</head>
<body>
    <h2>Orodha ya Wanafunzi Waliosajiliwa</h2>
    <a href="create.php" style="display: inline-block; margin-bottom: 10px;">Sajili Mwanafunzi Mpya</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Jina Kamili</th>
                <th>Barua pepe</th>
                <th>Kozi</th>
                <th>Tarehe ya Usajili</th>
                <th>Vitendo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'database.php';
            $sql = "SELECT * FROM students";
            $stmt = $conn->query($sql);

            while ($row = $stmt->fetch()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['full_name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['course'] . "</td>";
                echo "<td>" . $row['reg_date'] . "</td>";
                echo "<td class='action-buttons'>";
                echo "<a href='update.php?id=" . $row['id'] . "'>Badilisha</a>";
                echo "<a href='delete.php?id=" . $row['id'] . "'>Futa</a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
