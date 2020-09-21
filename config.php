<?php
    $conn = mysqli_connect('localhost', 'root', '', 'crud');

    if (!$conn) {
        die("Failed to connect" . mysqli_error($conn));
    }
?>