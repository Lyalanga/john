<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Projects</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #007BFF;
        }
        #filter-box {
            text-align: center;
            margin-bottom: 20px;
        }
        #filter-input {
            width: 300px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px auto;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        table thead {
            background: #007BFF;
            color: #fff;
        }
        table th, table td {
            padding: 15px;
            text-align: left;
            border: 1px solid #ddd;
        }
        table th {
            font-weight: bold;
        }
        table tr:nth-child(even) {
            background-color:rgba(238, 237, 240, 0.03);
        }
        table tr:hover {
            background-color:rgb(175, 192, 175);
        }
        .no-projects {
            text-align: center;
            font-size: 1.2em;
            color: #888;
        }
        .hidden {
            display: none;
        }
        #ad{
            background-color: #007BFF;
            width: 70px;
            height: 40px;
            border-radius: 6px;
            margin-left: 45%;
        }
        #ad a{
            text-emphasis: none;
            color: #fff;
        }
    </style>
</head>
<body>
<header>
    <button id="menu-toggle" aria-label="Toggle navigation">☰</button>
    <nav>
        <ul id="navbar">
            <li><a href="index.php">Home</a></li>
            <li id="ab"><a href="about.html">About Me</a></li>
            <li><a href="projects.php">Projects</a></li>
            <li id="cont"><a href="contacts.php">Contact</a></li>
        </ul>
    </nav>
</header>

<h1>My Projects</h1>

<!-- Filter Input -->
<div id="filter-box">
    <input type="text" id="filter-input" placeholder="Search projects by title...">
</div>

<?php
// Include database connection
$host = 'localhost';
$username = 'root';
$password = ''; // Update with your MySQL password
$dbname = 'portfolio';

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Fetch projects
$sql = "SELECT * FROM projects";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table id="projects-table">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>S/N</th>';
    echo '<th>Title</th>';
    echo '<th>Description</th>';
    echo '<th>Image</th>';
    echo '<th>Connect</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    $count = 1;
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $count++ . '</td>';
        echo '<td>' . htmlspecialchars($row['title']) . '</td>';
        echo '<td>' . htmlspecialchars($row['description']) . '</td>';
        if (!empty($row['image_url'])) {
            echo '<td><img src="' . htmlspecialchars($row['image_url']) . '" alt="' . htmlspecialchars($row['title']) . '" style="width: 100px; height: auto; border-radius: 5px;"></td>';
        } else {
            echo '<td>No Image</td>';
        }
        if (!empty($row['Phone_Number'])) {
            echo '<td>' . htmlspecialchars($row['Phone_Number']) . '</td>';
        } else {
            echo '<td>Not Available</td>';
        }
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
} else {
    echo '<p class="no-projects">No projects available.</p>';
}

$conn->close();
?>

<button id="ad"><a href="pojects_add.php">Add</a></button>

<footer id="footer">
    <p>&copy; <span id="currentYear"></span> My Portfolio</p>
</footer>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const filterInput = document.getElementById('filter-input');
        const tableRows = document.querySelectorAll('#projects-table tbody tr');

        filterInput.addEventListener('input', () => {
            const query = filterInput.value.toLowerCase().trim();

            tableRows.forEach(row => {
                const title = row.children[1].textContent.toLowerCase();
                if (title.includes(query)) {
                    row.classList.remove('hidden');
                } else {
                    row.classList.add('hidden');
                }
            });
        });
    });

    // Update footer year dynamically
    document.getElementById('currentYear').textContent = new Date().getFullYear();
</script>
<script src="script.js"></script>
</body>
</html>
