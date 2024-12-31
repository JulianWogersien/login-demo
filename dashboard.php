Copyright (C) 2024 Julian Wogersien
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, version 3.

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
        <video width="1920" height="1080" controls>
            <source src="nvg.mp4" type="video/mp4"
        </video>
    </div>
</body>
</html>
