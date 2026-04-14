<?php
include("db_connect.php");

$password = password_hash("test123", PASSWORD_DEFAULT); // Hash the password before storing

$sql = "INSERT INTO users (name, username, password) VALUES ('Admin', 'admin@parimal.com', ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $password);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "User added successfully!";
} else {
    echo "Error adding user!";
}

$stmt->close();
$conn->close();
?>