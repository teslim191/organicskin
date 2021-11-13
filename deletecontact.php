<?php
include 'db.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM contact WHERE id = $id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo header("Refresh:0; url=managecontact.php");
        echo '<script>alert("Contact Deleted Successfully")</script>';
    } else {
        echo '<script>alert("Error deleting record: " . mysqli_error($con)</script>';
    }

}










?>