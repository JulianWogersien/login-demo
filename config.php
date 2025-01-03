Copyright (C) 2024 Julian Wogersien
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, version 3.

<?php

define('DB_HOST', 'localhost');
define ('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','login_system');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS);

$conn->query('CREATE DATABASE IF NOT EXISTS ' . DB_NAME);
$conn->select_db(DB_NAME);

$conn->query("
    CREATE TABLE IF NOT EXISTS users (
        id INT PRIMARY KEY AUTO_INCREMENT,
        username VARCHAR(50) UNIQUE NOT NULL,
        password_hash VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )
");

?>
