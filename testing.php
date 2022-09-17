<?php
include 'assets/PHP/Functions.php';
include 'assets/PHP/Connection.php';

$sql = "SELECT * FROM `remarks` WHERE `ID` = '1'";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    echo $row['CreatedDate'];
    echo "<br>";
    try {
        $studentDateTime = new DateTime($row['CreatedDate']);
        $currentDateTime = new DateTime();
        $firstDateTime = new DateTime(date_format($currentDateTime, 'Y-m-d')) ;
        $secondDateTime = new DateTime(date_format($studentDateTime, 'Y-m-d'));
        $interval = $secondDateTime->diff($firstDateTime);
        echo $interval->format('%R%a');



    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
