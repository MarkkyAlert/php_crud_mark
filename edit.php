<?php
session_start();
require('config.php');
error_reporting(E_ALL & ~E_NOTICE);

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    $query = "UPDATE users SET firstname = '$firstname', lastname = '$lastname' WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION['update_success'] = "Update Successfully";
        header('refresh:2; index.php');
    } else {
        $_SESSION['update_err'] = "Query Wrong";
        header('location: edit.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/mdb.min.css">
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/style.css">
</head>

<body>
    <!-- Default form login -->
    <form class="text-center border border-light p-5" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        <p class="display-3 mb-4">Edit</p>
        <?php if (isset($_SESSION['update_err'])) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_SESSION['update_err']; ?>
            </div>
        <?php endif; ?>
        <?php if (isset($_SESSION['update_success'])) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_SESSION['update_success'] ?>
            </div>
        <?php endif; ?>
        <?php
        if (isset($_REQUEST['update_id'])) {
            $id = $_REQUEST['update_id'];

            $query = "SELECT * FROM users WHERE id = $id";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
        }
        ?>
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <input type="text" id="defaultLoginFormEmail" name="firstname" class="form-control mb-4" placeholder="First Name" value="<?php echo $row['firstname']; ?>">


        <input type="text" id="defaultLoginFormPassword" name="lastname" class="form-control mb-4" placeholder="Last Name" value="<?php echo $row['lastname']; ?>">

        <input type="submit" name="submit" class="btn btn-info" value="Update">






    </form>
    <!-- Default form login -->
    <script type="text/javascript" src="node_modules/mdbootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="node_modules/mdbootstrap/js/popper.min.js"></script>
    <script type="text/javascript" src="node_modules/mdbootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="node_modules/mdbootstrap/js/mdb.min.js"></script>
</body>

</html>

<?php
if (isset($_SESSION['update_err']) || isset($_SESSION['update_success'])) {
    session_destroy();
}
?>