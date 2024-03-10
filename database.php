<?php

    $hostName = "sql104.infinityfree.com";
    $dbUser = "if0_36115051";
    $dbPassword = "HFWvyHDed6XWLKF";
    $dbName = "if0_36115051_personalwebdatabase"; //database name

    $mysqli = new mysqli(hostname: $hostName,
                        username: $dbUser,
                        password: $dbPassword,
                        database: $dbName);

    if ($mysqli->connect_errno) {
        die("Something went wrong!" . $mysqli->connect_error);
    }

    return $mysqli;