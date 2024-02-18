<?php
    ob_start();

    // Start sessions
    session_start();

    // Sets timezone for saving datetimes in DB
    

    // Create connection
    // URL, USER, PW, DB
    $con = mysqli_connect("127.0.0.1:3307", "root", "", "spotify-clone");

    if(mysqli_connect_errno()) {
        echo "Failed to connect" . mysqli_connect_errno();
    }
?>