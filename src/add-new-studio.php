<?php
include "db_conn.php";

$errors = array(); 

if (isset($_POST["submit"])) {
    if (empty($_POST['name'])) {
        $errors[] = "Name is required";
    } else {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
    }

    if (empty($_POST['location'])) {
        $errors[] = "Location is required";
    } else {
        $location = mysqli_real_escape_string($conn, $_POST['location']);
    }

    if (empty($_POST['capacity'])) {
        $errors[] = "Capacity is required";
    } elseif (!is_numeric($_POST['capacity']) || $_POST['capacity'] < 1) {
        $errors[] = "Capacity must be a positive integer";
    } else {
        $capacity = mysqli_real_escape_string($conn, $_POST['capacity']);
    }

    if (empty($errors)) {
        $sql = "INSERT INTO `studio` (`name`, `location`, `capacity`) VALUES ('$name', '$location', '$capacity')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("Location: studio.php?msg=New studio created successfully");
        } else {
            echo "Failed: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Add New Studio</title>
</head>

<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
        Add New Studio
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Add New Studio</h3>
            <p class="text-muted">Complete the form below to add a new studio</p>
        </div>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px;">
                <div class="mb-3">
                    <label class="form-label">Name:</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter studio name" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Location:</label>
                    <input type="text" class="form-control" name="location" placeholder="Enter location" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Capacity:</label>
                    <input type="number" class="form-control" name="capacity" min="1" placeholder="Enter capacity" required>
                </div>

                <div>
                    <button type="submit" class="btn btn-success" name="submit">Save</button>
                    <a href="studio.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
