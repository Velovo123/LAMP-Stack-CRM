<?php
include "db_conn.php";
$id = $_GET["id"];

if (isset($_POST["submit"])) {
  // Validate form inputs
  $errors = [];
  $first_name = mysqli_real_escape_string($conn, $_POST['firstName']);
  $last_name = mysqli_real_escape_string($conn, $_POST['lastName']);
  $phoneNumber = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);
  $title = mysqli_real_escape_string($conn, $_POST['title']);
  
  if (empty($first_name)) {
    $errors[] = "First name is required";
  }

  if (empty($last_name)) {
    $errors[] = "Last name is required";
  }

  if (empty($phoneNumber)) {
    $errors[] = "Phone number is required";
  }

  if (empty($address)) {
    $errors[] = "Address is required";
  }

  if (empty($title)) {
    $errors[] = "Title is required";
  }

  // If there are no validation errors, proceed with the update
  if (empty($errors)) {
    $sql = "UPDATE `staff` SET `lastName`='$last_name',`firstName`='$first_name',`phoneNumber`='$phoneNumber',`address`='$address', `title`='$title' WHERE id = $id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
      header("Location: staff.php?msg=Data updated successfully");
      exit();
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

  <title>PHP CRUD Application</title>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
    LABA
  </nav>

  <div class="container">
    <div class="text-center mb-4">
      <h3>Edit User Information</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>

    <?php
    $sql = "SELECT * FROM `staff` WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="row mb-3">
          <div class="col">
            <label class="form-label">First Name:</label>
            <input type="text" class="form-control" name="firstName" value="<?php echo $row['firstName'] ?>" required>
          </div>

          <div class="col">
            <label class="form-label">Last Name:</label>
            <input type="text" class="form-control" name="lastName" value="<?php echo $row['lastName'] ?>" required>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Phone Number:</label>
          <input type="tel" class="form-control" name="phoneNumber" value="<?php echo $row['phoneNumber'] ?>" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Address:</label>
          <input type="text" class="form-control" name="address" value="<?php echo $row['address'] ?>" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Title:</label>
          <input type="text" class="form-control" name="title" value="<?php echo $row['title'] ?>" required>
        </div>
        <div>
          <button type="submit" class="btn btn-success" name="submit">Update</button>
          <a href="staff.php" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>