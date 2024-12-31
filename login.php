Copyright (C) 2024 Julian Wogersien
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, version 3.

<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once 'config.php';
    require_once 'functions.php';
    session_start();
    
    if (isset($_SESSION["user_id"])) {
        header('Location: dashboard.php');
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once 'config.php';

        $username = filter_input(INPUT_POST,'username', FILTER_UNSAFE_RAW);
        $password = $_POST['password'];

        if ($user_id = verify_login($username, $password)) {
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $username;
            header('Location: dashboard.php');
            exit();
        } else {
            $error = 'Invalid username or password';
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        .container {
            width: 300px;
            margin: 100px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .error {
            color: red;
            margin-bottom: 10px;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <?php if (isset($error)): ?>
            <div class="error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
            <a href="register.php" style="display: block; text-align: center; margin-top: 10px;">Need an account? Register</a>
        </form>
    </div>
</body>
</html>
