<?php

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        .container {
            width: 600px;
            margin: 50px auto;
            padding: 20px;
        }
        .logout {
            float: right;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
        <a href="logout.php" class="logout">Logout</a>
        <p>This is your protected dashboard page.</p>
    </div>
</body>
</html>