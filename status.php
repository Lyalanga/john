<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "passenger_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, passenger_id, amount, payment_method FROM payments";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Record</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-image: url(bg.jpg);
        }
        .container {
            max-width: 800px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: none;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px 0;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .btn-danger {
            background-color: #dc3545;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Payment Record</h2>
        <!-- Navigation Links -->
       <!--<a href="create.php" class="btn">Add New Passenger</a>
        <a href="payment.php" class="btn">Payment Form</a>
        <a href="register.php" class="btn">Registration Form</a>
        <a href="login.php" class="btn">Login Form</a>-->
        
        <table>
            <thead>
                <tr>
                    <th>Passenger_id</th>
                    <th>Amount</th>
                    <th>Payment_method</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['passenger_id']}</td>
                                <td>{$row['amount']}</td>
                                <td>{$row['payment_method']}</td>
                                <td>
                                    <a href='deletep.php?id={$row['id']}' class='btn btn-danger'>Delete</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No record</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
