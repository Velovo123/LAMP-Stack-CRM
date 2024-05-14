<?php
include "db_conn.php";

if(isset($_GET['getAllRecords'])) {
    // Query to retrieve all records
    $sql = "SELECT * FROM `staff`";
    $result = mysqli_query($conn, $sql);
    
    // Fetch data and generate HTML table rows
    $output = "";
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "<tr>";
        $output .= "<td>{$row['id']}</td>";
        $output .= "<td>{$row['firstName']}</td>";
        $output .= "<td>{$row['lastName']}</td>";
        $output .= "<td>{$row['phoneNumber']}</td>";
        $output .= "<td>{$row['title']}</td>";
        $output .= "<td>";
        $output .= "<a href='edit.php?id={$row['id']}' class='link-dark'><i class='fa-solid fa-pen-to-square fs-5 me-3'></i></a>";
        $output .= "<a href='delete.php?id={$row['id']}' class='link-dark' onclick='return confirmDelete();'><i class='fa-solid fa-trash fs-5'></i></a>";
        $output .= "</td>";
        $output .= "</tr>";
    }
    echo $output;
} elseif(isset($_GET['firstName']) && isset($_GET['lastName'])) {
    // Retrieve records by first name and last name
    $firstName = $_GET['firstName'];
    $lastName = $_GET['lastName'];
    
    // Query to retrieve records by first name and last name
    $sql = "SELECT * FROM `staff` WHERE firstName='$firstName' AND lastName='$lastName'";
    $result = mysqli_query($conn, $sql);
    
    // Fetch data and generate HTML table rows
    $output = "";
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "<tr>";
        $output .= "<td>{$row['id']}</td>";
        $output .= "<td>{$row['firstName']}</td>";
        $output .= "<td>{$row['lastName']}</td>";
        $output .= "<td>{$row['phoneNumber']}</td>";
        $output .= "<td>{$row['title']}</td>";
        $output .= "<td>";
        $output .= "<a href='edit.php?id={$row['id']}' class='link-dark'><i class='fa-solid fa-pen-to-square fs-5 me-3'></i></a>";
        $output .= "<a href='delete.php?id={$row['id']}' class='link-dark' onclick='return confirmDelete();'><i class='fa-solid fa-trash fs-5'></i></a>";
        $output .= "</td>";
        $output .= "</tr>";
    }
    echo $output;
} else {
    echo "No data requested.";
}

