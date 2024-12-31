Copyright (C) 2024 Julian Wogersien
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, version 3.

<?php

function register_user($username, $password) {
    global $conn;
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    $stmt = $conn->prepare("INSERT INTO users (username, password_hash) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password_hash);
    return $stmt->execute();
}

function verify_login($username, $password) {
    global $conn;
    $stmt = $conn->prepare("SELECT id, password_hash FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        return password_verify($password, $row["password_hash"]) ? $row['id'] : false;
    }
    return false;
}

?>
