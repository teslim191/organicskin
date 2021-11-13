<?php
// $server = "localhost";
// $user = "root";
// $password = "";
// $db = "skincare";

$server = "lyn7gfxo996yjjco.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$user = "v1h76ejleii4127e";
$password = "xpuo2yxhqo9kpr2s";
$db = "irmyktd035tgsoep";



$con = mysqli_connect($server,$user,$password,$db);

if (!$con) {
    die("unable to connect to database" . mysqli_connect_error());
}
echo "database connected successfully";










?>