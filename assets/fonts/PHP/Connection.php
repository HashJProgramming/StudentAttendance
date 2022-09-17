<?php
$Server = "localhost";
$Username = "root";
$Password = "";
$Database = "myserver"; 

$conn = mysqli_connect($Server,$Username,$Password,$Database);

if (!$conn) {
    die("Can't connect to the Database! Error Message: ".mysqli_connect_error());
}
