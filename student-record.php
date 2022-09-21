<?php
include "assets/PHP/Connection.php";
include "assets/PHP/Functions.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Student List</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Table-With-Search-search-table.css">
    <link rel="stylesheet" href="assets/css/Table-With-Search.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md fixed-top navbar-shrink py-3" id="mainNav">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="index.php"><span class="bs-icon-sm bs-icon-circle bs-icon-primary shadow d-flex justify-content-center align-items-center me-2 bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-bezier">
                        <path fill-rule="evenodd" d="M0 10.5A1.5 1.5 0 0 1 1.5 9h1A1.5 1.5 0 0 1 4 10.5v1A1.5 1.5 0 0 1 2.5 13h-1A1.5 1.5 0 0 1 0 11.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm10.5.5A1.5 1.5 0 0 1 13.5 9h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM6 4.5A1.5 1.5 0 0 1 7.5 3h1A1.5 1.5 0 0 1 10 4.5v1A1.5 1.5 0 0 1 8.5 7h-1A1.5 1.5 0 0 1 6 5.5v-1zM7.5 4a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z"></path>
                        <path d="M6 4.5H1.866a1 1 0 1 0 0 1h2.668A6.517 6.517 0 0 0 1.814 9H2.5c.123 0 .244.015.358.043a5.517 5.517 0 0 1 3.185-3.185A1.503 1.503 0 0 1 6 5.5v-1zm3.957 1.358A1.5 1.5 0 0 0 10 5.5v-1h4.134a1 1 0 1 1 0 1h-2.668a6.517 6.517 0 0 1 2.72 3.5H13.5c-.123 0-.243.015-.358.043a5.517 5.517 0 0 0-3.185-3.185z"></path>
                    </svg></span><span>Student Attendance List</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav mx-auto"></ul><a class="btn btn-primary shadow" role="button" href="student-list.php">Student List</a>
            </div>
        </div>
    </nav>
    <section class="py-5 mt-5">
        <div class="container py-5">
            <div class="row mx-auto" style="/*max-width: 700px;*/">
                <div class="table-responsive table table-hover table-bordered results">
                    <table class="table table-hover table-bordered">
                        <thead class="bill-header cs">
                        <tr>
                            <th id="trs-hd-1" class="col-lg-1">Student ID.</th>
                            <th id="trs-hd-2" class="col-lg-2">Student Name</th>
                            <th id="trs-hd-3" class="col-lg-1">Course</th>
                            <th id="trs-hd-4" class="col-lg-2">Email</th>
                            <th id="trs-hd-6" class="col-lg-3">Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="warning no-result">
                            <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                        </tr>
                        <?php
                            $sql = "SELECT * FROM `remarks` WHERE ID = '".$_GET['std_id']."'";
                            $result = $conn->query($sql);

                            while ($row = $result->fetch_assoc()) {
                                echo " <tr>
                     <td>".$row['ID']."</td>
                    <td>".$row['StudentName']."</td>
                    <td>".$row['Course']."</td>
                    <td>".$row['Email']."</td>
                    <td>".$row['CreatedDate']."</td>
                    </tr>";
                            }
                        ?>

                        </tbody>
                    </table>
                </div>


















<!--                <table class="table table-hover table-bordered">-->
<!--                    <tbody>-->
<!--                    <tr class="warning no-result">-->
<!--                        <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>-->
<!--                    </tr>-->
<!--                    --><?php
//                    $sql_attendance = "SELECT * FROM `attendance` WHERE `studentID` = '".$_GET['std_id']."' AND MONTH(`CreatedDate`)= MONTH(CURDATE())";
//                    $results = $conn->query($sql_attendance);
//                    $count_result = $results->num_rows;
//
//                    $month = Date('m');
//                    $year = Date('Y');
//                    $days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
//                    $week = 1;
//                    $dlist = [];
//                    while ($row = $results->fetch_assoc()) {
//
//                        if (!in_array(date('d', strtotime($row['CreatedDate'])), $dlist)) {
//                            array_push($dlist, date('d', strtotime($row['CreatedDate'])));
//                        }
//                    }
//                    for ($i = 1; $i <= $days; $i++) {
//                        $indicator = date('D', strtotime("{$year}-{$month}-{$i}"));
//                        if ($i == 1) {
//                            echo "<tr>";
//                        }
//                        if (in_array($i, $dlist)) {
//                            echo "<td class='bg-success text-white text-center'>" .$indicator." " .$i. "</td>";
//                        } else {
//                            echo "<td class='bg-danger text-white text-center'>" .$indicator." " .$i. "</td>";
//                        }
//                        if (date('D', strtotime($year . '-' . $month . '-' . $i)) == 'Sat') {
//                            echo "</tr>";
//                        }
//                    }
//                    ?>
<!--                    </tbody>-->
<!--                </table>-->
























                <div class='table-responsive table table-hover table-bordered results'>
                        <?php
                        $sql_attendance = "SELECT * FROM `attendance` WHERE `studentID` = '".$_GET['std_id']."' AND MONTH(`CreatedDate`)= MONTH(CURDATE())";

                        $results = $conn->query($sql_attendance);
                        $count_result = $results->num_rows;

                        $month = Date('m');
                        $year = Date('Y');
                        $days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
                        $week = 1;
                        $dlist = [];
                        //                           ADD DATA TO A dlist
                        while ($row = $results->fetch_assoc()) {

                            if (!in_array(date('d', strtotime($row['CreatedDate'])), $dlist)) {
                                array_push($dlist, date('d', strtotime($row['CreatedDate'])));
                            }
                        }
                        echo " <table class='table table-hover table-bordered'>
                        <tbody>
                        <tr class='warning no-result'>
                            <td colspan='12'><i class='fa fa-warning'></i>&nbsp; No Result !!!</td>
                        </tr>";

                        for ($i = 1; $i <= $days; $i++) {
                            $date_attendance = "{$year}-{$month}-{$i}";
                            if (in_array($i, $dlist)) {
                                echo "<td class='text-center'>".$date_attendance."</td>";
                            } else {
                                echo "<td class='text-center'>".$date_attendance."</td>";
                            }

                        }
echo "</tr>";
                        for ($i = 1; $i <= $days; $i++) {
                            $date_attendance = "{$year}-{$month}-{$i}";
                            $sql_attendance = "SELECT * FROM `attendance` WHERE `StudentID` = '{$_GET['std_id']}' AND YEAR(`CreatedDate`) = '{$year}' AND MONTH(`CreatedDate`) = '{$month}' AND DAY(`CreatedDate`) = '{$i}' ORDER BY `ID` DESC LIMIT 1";
                            $results = mysqli_query($conn, $sql_attendance);
                            $row = mysqli_fetch_assoc($results);

                            if (mysqli_num_rows($results) > 0) {

                                    if ($row['remarks'] == 'Present') {
                                        echo "<td class='text-center text-success'>Present</td>";
                                    } else {
                                        echo "<td class='text-center text-danger'>Absent</i></td>";
                                    }

                            } else {

                                echo "<td class='text-center text-warning'>Not Recorded</td>";
                            }
                        }

                   echo "     </tbody>
                    </table>";

                        ?>
                </div>
                <div class="table-responsive table table-hover table-bordered results">
                    <table class="table table-hover table-bordered">
                        <thead class="bill-header cs">
                        <tr>
                            <th id="trs-hd-3" class="col-lg-1">Remarks</th>
                            <th id="trs-hd-4" class="col-lg-2">Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="warning no-result">
                            <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                        </tr>
                        <?php
                        $sql = "SELECT * FROM `attendance` WHERE `studentID` = '".$_GET['std_id']."'";
                        $result = $conn->query($sql);

                        while ($row = $result->fetch_assoc()) {
                            echo " <tr>
                    <td>".$row['remarks']."</td>
                    <td>".$row['CreatedDate']."</td>
                    </tr>";
                        }
                        ?>

                        </tbody>
                    </table>





                </div>
            </div>
        </div>
    </section>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bold-and-bright.js"></script>
    <script src="assets/js/Table-With-Search.js"></script>
</body>

</html>