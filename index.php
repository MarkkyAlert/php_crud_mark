<?php
session_start();
require('config.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/mdb.min.css">
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/style.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="display-3 text-center">Information</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="add.php" class="btn aqua-gradient">Add+</a>
            </div>
        </div>
        <?php if (isset($_SESSION['delete_err'])) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_SESSION['delete_err']; ?>
            </div>
        <?php endif; ?>
        <?php if (isset($_SESSION['delete_success'])) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_SESSION['delete_success']; ?>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>

                            <th>
                                <p class="text-center font-weight-bold">First Name</p>
                            </th>
                            <th>
                                <p class="text-center font-weight-bold">Last Name</p>
                            </th>
                            <th>
                                <p class="text-center font-weight-bold">Edit</p>
                            </th>
                            <th>
                                <p class="text-center font-weight-bold">Delete</p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM users";
                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?php echo $row['firstname']; ?></td>
                                <td><?php echo $row['lastname']; ?></td>
                                <td>
                                    <p class="text-center"><a href="edit.php?update_id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a></p>
                                </td>
                                <td>
                                    <p class="text-center"><a href="delete.php?delete_id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a></p>
                                </td>
                            </tr>

                        <?php } ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="node_modules/mdbootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="node_modules/mdbootstrap/js/popper.min.js"></script>
    <script type="text/javascript" src="node_modules/mdbootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="node_modules/mdbootstrap/js/mdb.min.js"></script>
</body>

</html>

<?php
if (isset($_SESSION['delete_err']) || isset($_SESSION['delete_success'])) {
    session_destroy();
}
?>