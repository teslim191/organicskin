<?php
// $server = "localhost";
// $user = "root";
// $password = "";
// $db = "skincare";

$server = "lyn7gfxo996yjjco.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$user = "gl7vuvvo1q9tof8f";
$password = "ytpguptakixn7aqw";
$db = "v61ocarchuuz9mm9";



$con = mysqli_connect($server,$user,$password,$db);

if (!$con) {
    die("unable to connect to database" . mysqli_connect_error());
}
// echo "database connected successfully";










?>
