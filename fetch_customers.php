<?php
// Database connection details 
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "onlinestore";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve search query
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Prepare and execute the SQL statement
$sql = "SELECT Customers.*, Permissions.PermissionType FROM Customers INNER JOIN Permissions ON Customers.PermissionID = Permissions.PermissionID WHERE CustomerUserName LIKE '%" . $search . "%' OR CustomerName LIKE '%" . $search . "%'";
$result = $conn->query($sql);
?>