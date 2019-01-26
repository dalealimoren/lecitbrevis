<?php

// $con = mysqli_connect(server, username, password, database);
$con = mysqli_connect('mysql', 'root', 'root', 'lecitbrevis'); // Change this according to your config

if (mysqli_connect_errno()) {
    echo "Failed to connect Mysql: " . mysqli_connect_error();
    exit();
}
