Copyright (C) 2024 Julian Wogersien
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, version 3.

<?php

session_start();
session_destroy();
header('Location: login.php');
exit();

?>
