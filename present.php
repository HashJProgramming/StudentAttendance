<?php
include 'assets/PHP/Functions.php';
include 'assets/PHP/Connection.php';
$id = $_GET['id'];
$sql = "INSERT INTO `attendance` (`studentID`,`remarks`) VALUES ('$id','Present')";
$conn->query($sql);
header("Location:student-list.php");
