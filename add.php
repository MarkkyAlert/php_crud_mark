<?php
    session_start();
    require('config.php');
    

    if (isset($_POST['submit'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];

        $query = "INSERT INTO users (firstname, lastname) VALUES ('$firstname', '$lastname')";
        $result = mysqli_query($conn, $query);
        
        if ($result) {
            $_SESSION['success'] = "Insert Successfully";
            header('refresh:2;index.php');

        } else {
            $_SESSION['err'] = "Wrong Query";
            header('location: add.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/mdb.min.css">
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/style.css">
</head>

<body>
    <!-- Default form login -->
    <form class="text-center border border-light p-5" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        <p class="display-3 mb-4">Add+</p>
        <?php if (isset($_SESSION['err'])) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_SESSION['err']; ?>
            </div>
        <?php endif; ?>
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_SESSION['success'] ?>
            </div>
        <?php endif; ?>
        <!-- Email -->
        <input type="text" id="defaultLoginFormEmail" name="firstname" class="form-control mb-4" placeholder="First Name">

        <!-- Password -->
        <input type="text" id="defaultLoginFormPassword" name="lastname" class="form-control mb-4" placeholder="Last Name">
        <input type="submit" name="submit" class="btn btn-info" value="Insert">






    </form>
    <!-- Default form login -->
    <script type="text/javascript" src="node_modules/mdbootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="node_modules/mdbootstrap/js/popper.min.js"></script>
    <script type="text/javascript" src="node_modules/mdbootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="node_modules/mdbootstrap/js/mdb.min.js"></script>
</body>

</html>

<?php
    if (isset($_SESSION['err']) || isset($_SESSION['success'])) {
        session_destroy();
    }
?>