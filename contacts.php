<?php 
// Database connection
$host = 'localhost';
$username = 'root';
$password = ''; // Update with your MySQL password
$dbname = 'portfolio';

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    // Insert data into the database
    $sql = "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')";
    if ($conn->query($sql) === TRUE) {
        $feedback = "<p style='color: green; text-align: center;'>Your message has been sent successfully!</p>";
    } else {
        $feedback = "<p style='color: red; text-align: center;'>Error: " . $conn->error . "</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Contact Me</title>
</head>
<body>
    <header>
        <button id="menu-toggle" aria-label="Toggle navigation">☰</button>
        <nav>
            <ul id="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.html">About Me</a></li>
                <li><a href="projects.php">Projects</a></li>
                <li><a href="contacts.php">Contact</a></li>
            </ul>
        </nav>
    </header>

    <section id="contact">
        <h2>Contact Me</h2>
        <?php
        if (isset($feedback)) {
            echo $feedback;
        }
        ?>
        <form id="contactForm" action="" method="POST">
            <div>
                <input type="text" id="name" name="name" placeholder="Your Name" required>
                <p class="error" id="nameError"></p>
            </div>
            <div>
                <input type="email" id="email" name="email" placeholder="Your Email" required>
                <p class="error" id="emailError"></p>
            </div>
            <div>
                <textarea id="message" name="message" placeholder="Your Message" required></textarea>
                <p class="error" id="messageError"></p>
            </div>
            <button id="button" type="submit">Send</button>
        </form>
    </section>

    <footer id="footer">
        <p>&copy; <span id="currentYear"></span> My Portfolio</p>
    </footer>
    <script>
        // JavaScript for form validation
document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("contactForm");
    const nameInput = document.getElementById("name");
    const emailInput = document.getElementById("email");
    const messageInput = document.getElementById("message");
    const submision = document.getElementById("button");

    const nameError = document.getElementById("nameError");
    const emailError = document.getElementById("emailError");
    const messageError = document.getElementById("messageError");

    form.addEventListener("submit", (e) => {
        let isValid = true;

        // Validate Name
        if (nameInput.value.trim() === "") {
            nameError.textContent = "Name is required.";
            isValid = false;
        } else if (nameInput.value.length < 3) {
            nameError.textContent = "Name must be at least 3 characters.";
            isValid = false;
        } else {
            nameError.textContent = "";
        }

        // Validate Email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (emailInput.value.trim() === "") {
            emailError.textContent = "Email is required.";
            isValid = false;
        } else if (!emailRegex.test(emailInput.value)) {
            emailError.textContent = "Enter a valid email address.";
            isValid = false;
        } else {
            emailError.textContent = "";
        }

        // Validate Message
        if (messageInput.value.trim() === "") {
            messageError.textContent = "Message is required.";
            isValid = false;
        } else if (messageInput.value.length < 10) {
            messageError.textContent = "write a short Message not less than ten characters.";
            isValid = false;
        } else {
            messageError.textContent = "";
        }

        // If validation fails, prevent form submission
        if (!isValid) {
            e.preventDefault();
        }
    });

    // Display current year in footer
    document.getElementById("currentYear").textContent = new Date().getFullYear();
});
//submission;
    </script>
    <script src="script.js"></script>
</body>
</html>
