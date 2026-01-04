<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit();
}

// Set cookie
if (isset($_POST['theme'])) {
    setcookie("theme", $_POST['theme'], time() + 86400 * 30);
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Theme Preference</title>
</head>
<body>

<h2>Select Theme</h2>

<form method="POST">
    <select name="theme">
        <option value="light">Light Mode</option>
        <option value="dark">Dark Mode</option>
    </select><br><br>

    <button type="submit">Save Preference</button>
</form>

</body>
</html>
