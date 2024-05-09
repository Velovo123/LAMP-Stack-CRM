<?php
include "db_conn.php";
$id = $_GET["id"];

if (isset($_POST["submit"])) {
  $name = $_POST['name'];
  $type_id = $_POST['type_id'];
  $rating = $_POST['rating'];

  $sql = "UPDATE `tv_show` SET `name`='$name',`type_id`='$type_id', `rating`='$rating' WHERE id = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: show.php?msg=Data updated successfully");
  } else {
    echo "Failed: " . mysqli_error($conn);
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

  <title>Edit TV Show</title>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
    TV Shows CRUD Application
  </nav>

  <div class="container">
    <div class="text-center mb-4">
      <h3>Edit TV Show Information</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>

    <?php
    $sql = "SELECT * FROM `tv_show` WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="mb-3">
          <label class="form-label">Name:</label>
          <input type="text" class="form-control" name="name" value="<?php echo $row['name'] ?>" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Type:</label>
          <select class="form-select" name="type_id" required>
            <?php
            $types_sql = "SELECT * FROM `show_type`";
            $types_result = mysqli_query($conn, $types_sql);
            while ($type_row = mysqli_fetch_assoc($types_result)) {
              $selected = ($type_row['id'] == $row['type_id']) ? 'selected' : '';
              echo "<option value='" . $type_row['id'] . "' $selected>" . $type_row['type'] . "</option>";
            }
            ?>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Rating:</label>
          <input type="number" class="form-control" name="rating" step="0.1" min="0" max="10" value="<?php echo $row['rating'] ?>" required>
        </div>

        <div>
          <button type="submit" class="btn btn-success" name="submit">Update</button>
          <a href="tv_shows.php" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>