<?php
// Mulai sesi
session_start();

// Periksa apakah pengguna sudah login dan role-nya admin
if (!isset($_SESSION["loggedin"]) || $_SESSION["role"] !== "admin") {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Selamat datang, Admin</h1>
    <p>Halo, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</p>
    <a href="logout.php">Logout</a>
</body>
</html>
