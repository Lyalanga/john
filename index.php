<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
    <button id="menu-toggle" aria-label="Toggle navigation">☰</button>
    <nav>
        <ul id="navbar">
            <li id="ab"><a href="about.html">About Me</a></li>
            <li><a href="projects.php">Projects</a></li>
            <li id="cont"><a href="contacts.php">Contact</a></li>
        </ul>
    </nav>
</header>
<section>
        <h1>Welcome to My Portfolio</h1>
        <p>A glimpse into my skills and projects. <br>so as to gain new skills</p>
</section>
<section class="skills">
    <h2>What I Do</h2>
    <ul>
        <li>💻 Web Design & Development (HTML, CSS, JavaScript)</li>
        <li>📱 Responsive Design for all Devices</li>
        <li>⚙️ Backend Development with PHP & MySQL</li>
        <li>🌟 Optimized and Fast Web Solutions</li>
    </ul>
</section>

<section class="projects">
    <h2>Featured Projects</h2>
    <ul>
        <li>
            <strong>Project 1:</strong> <a href="projects.php#project1">E-commerce Website</a> - A fully functional online shopping platform.
        </li>
        <li>
            <strong>Project 2:</strong> <a href="projects.php#project2">Portfolio Website</a> - A personal portfolio showcasing skills and projects.
        </li>
        <li>
            <strong>Project 3:</strong> <a href="projects.php#project3">Blog Website</a> - A dynamic platform for publishing articles.
        </li>
    </ul>
</section>

<div class="cta">
    <a href="contacts.php">Let's Connect!</a>
</div>

<footer id="footer">
        <p>&copy; <span id="currentYear"></span> My Portfolio</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>