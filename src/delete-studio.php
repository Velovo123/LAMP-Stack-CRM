<?php
include "db_conn.php";

$id = $_GET["id"];

$sql = "DELETE FROM `studio` WHERE id = $id";

$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: studio.php?msg=Studio deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}
?>
