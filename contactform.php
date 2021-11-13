<?php
include "db.php";

if (isset($_POST["submitForm"])) {
    $contactname = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    if (empty($contactname) or empty($email) or empty($message)) {
        echo"<div class='alert alert-warning alert-dismissible' role='alert'>
        <strong>All fields are required</strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
    else {
        $query = "INSERT INTO contact(contactname, email, subj) VALUES('$contactname','$email','$message')";
        $result = mysqli_query($con, $query);
        if ($result) {
            echo"<div class='alert alert-success alert-dismissible' role='alert'>
            <strong>Message sent successfully</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
        }
        else {
            echo "<div class='alert alert-warning alert-dismissible' role='alert'>
            <strong>Unable to send message</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";            
        }
    }
}










?>