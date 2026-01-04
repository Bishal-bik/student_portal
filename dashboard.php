<?php
session_start();

// If not logged in → redirect
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit();
}

// Read theme from cookie
$theme = $_COOKIE['theme'] ?? "light";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    <style>
        body {
            background-color: <?php echo ($theme == "dark") ? "#000" : "#fff"; ?>;
            color: <?php echo ($theme == "dark") ? "#fff" : "#000"; ?>;
        }
    </style>
</head>

<body>
    <h2>Welcome, <?php echo $_SESSION['student_name']; ?></h2>

    <a href="preference.php">Change Theme</a> |
    <a href="logout.php">Logout</a>
</body>
</html>
