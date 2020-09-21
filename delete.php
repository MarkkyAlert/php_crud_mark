<?php
    session_start();
    require('config.php');

    if (isset($_REQUEST['delete_id'])) {
        $id = $_REQUEST['delete_id'];

        $query = "DELETE FROM users WHERE id = $id";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $_SESSION['delete_success'] = "Delete Successfully";
            header('location: index.php');
        } else {
            $_SESSION['delete_err'] = "Query Wrong";
            header('location: index.php');
        }
    }
?>