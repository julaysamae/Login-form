<?php
session_start();

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "uda";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];

    
    $stmt = $conn->prepare("SELECT password FROM julaysa WHERE username = ?");
    $stmt->bind_param("s", $inputUsername);

    
    $stmt->execute();

    
    $stmt->store_result();

    
    if ($stmt->num_rows > 0) {
        
        $stmt->bind_result($storedPassword);
        $stmt->fetch();

        
        if ($storedPassword === $inputPassword) {
            $_SESSION['username'] = $inputUsername;
            header("Location: welcome.php");
            exit();
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "No user found!";
    }

    $stmt->close();
}

$conn->close();
?>
