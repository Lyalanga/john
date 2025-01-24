<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Project</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f9;
        }
        form {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        form h2 {
            text-align: center;
            color: #007BFF;
        }
        form label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        form input, form textarea, form button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        form button {
            background-color: #007BFF;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        form button:hover {
            background-color: #0056b3;
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

    <h2>Add New Project</h2>
    <form action="insert.php" method="POST" enctype="multipart/form-data">
        <label for="title">Project Title:</label>
        <input type="text" id="title" name="title" required>

        <label for="description">Project Description:</label>
        <textarea id="description" name="description" rows="5" required></textarea>

        <label for="image">Upload Image:</label>
        <input type="file" id="image" name="image" accept="image/*" required>

        <label for="phon">Phone Number:</label>
        <input type="number" id="link" name="Phone_Number">

        <button type="submit">Add Project</button>
    </form>
    <footer id="footer">
        <p>&copy; <span id="currentYear"></span> My Portfolio</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>
