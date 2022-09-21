<?php


function AddStudent($conn){
    if (isset($_POST['submit'])) {
        $StudentName = $_POST['student'];
        $Course = $_POST['course'];
        $Email = $_POST['email'];
        $sql = "INSERT INTO `remarks`(`StudentName`,`Course`,`Email`) VALUES ('$StudentName', '$Course', '$Email')";
         $conn->query($sql);
        header("Location:student-list.php");
        exit();
    }
}


function StudentList($conn){
    $sql = "SELECT * FROM `remarks`";

    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $sql_attendance = "SELECT * FROM `attendance` WHERE `studentID` = '".$row['ID']."' ORDER BY `ID` DESC LIMIT 1";
        $result_attendance = $conn->query($sql_attendance) or die($conn->error);
        $row_attendance = $result_attendance->fetch_assoc();

        if (mysqli_num_rows($result_attendance) > 0) {
            $status = $row_attendance['remarks'];
            $date = $row_attendance['CreatedDate'];
        }else{
            $status = "No Record";
            $date = "No Record";
        }
        echo " <tr>
                 <td class='text-center'>".$row['ID']."</td>
                <td class='text-center'><a href='student-record.php?std_id=".$row['ID']."'>".$row['StudentName']."</a></td>
                <td class='text-center'>".$row['Course']."</td>
                <td class='text-center'>".$row['Email']."</td>
                <td class='text-center'><a class='btn btn-success' style='margin-left: 5px;' href='present.php?id=".$row['ID']."'><i class='fa fa-check' style='font-size: 15px;'></i><a class='btn btn-danger' href='absent.php?id=".$row['ID']."'><i class='fa fa-close' style='font-size: 15px;'></i></a></td>
                <td class='text-center'>".$status."</td>
                <td class='text-center'>".$date."</td>
                <td class='text-center'>".date('Y-m-d h:i:s')."</td>
                </tr>";
    }

}

function getDays($month, $year){
    $days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    return $days;
}

