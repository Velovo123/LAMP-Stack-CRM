<?php
include "db_conn.php";
$id = $_GET["id"];
$sql = "DELETE FROM `tv_show` WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: show.php?msg=TV show deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}
?>
