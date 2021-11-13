<?php
include "db.php";
if (isset($_POST['comment'])) {
    $post_id = $_POST['id'];
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    if (empty($name) or empty($message)) {
        echo "<script>alert('>Name or Message field is empty')</script>";
    }
    else {
        $sql = "INSERT INTO comments(post_id,username,email,message) VALUES('$post_id','$name',
        '$email','$message')";
        $query = mysqli_query($con, $sql);
        if ($query) {
            echo"<script>alert('Comment added successfully')</script>";
            header("Location: viewpost.php?id=".$post_id);
        }
        else {
            echo"<script>alert('Unable to add comment')</script>";
        }
    }
}









?>