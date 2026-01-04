<?php
include "db.php";

if (isset($_POST['register'])) {
    $student_id = $_POST['student_id'];
    $name = $_POST['name'];
    $password = $_POST['password'];

    // Hash password (IMPORTANT)
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Prepared statement (secure)
    $sql = "INSERT INTO students (student_id, name, password) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "sss", $student_id, $name, $hashedPassword);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: login.php");
    } else {
        echo "Registration failed!";
    }
}
?>

<h2>Register</h2>

<form method="POST">
    Student ID: <input type="text" name="student_id" required><br><br>
    Name: <input type="text" name="name" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button type="submit" name="register">Register</button>
</form>
