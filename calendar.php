<?php
function build_Calendar($month, $year)
{
    // $mysqli = new mysqli('localhost','root','','bookingcalendar');
    // $stmt = $mysqli->prepare("INSERT INTO bookings WHERE MONTH(date)=? and YEAR(date) =?");
    // $stmt->bind_param('ss',$month,$year);
    //$booking = array();
    //if ($stmt->execute()){
    // $result = $stmt->get_result();
    // if ($result->num_rows > 0){
    //        while($row=$result->fetch_assoc()){
    //        $booking[] = $row['date'];
    //           }
    //   $stmt->close();
    //   }
    //}

    // First of all, we'll create an array containing names of all days in a week
    $daysOfWeek = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Sartuday');

    //Then we'll get first day of the month that is in the argument of this function
    $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);
    //Now getting the number of the days this month contains
    $numberDays = date('t', $firstDayOfMonth);

    //Getting some info about the first day of this month
    $dateComponents = getdate($firstDayOfMonth);

    //Getting the name of this month
    $monthName = $dateComponents['month'];

    //Getting the index value 0-6 of the first day of this month
    $dayOfWeek = $dateComponents['wday'];

    //Getting the current date
    $dateToday = date('Y-m-d');

    //Now creating HTML table
    $calendar = "<table class = 'table table-bordered'>";
    $calendar .= "<center><h2>$monthName $year</h2>";
    $calendar .= "<a class='btn btn-xs btn-primary' href='?month=" . date('m', mktime(0, 0, 0, $month - 1, 1, $year)) . "&year=" . date('Y', mktime(0, 0, 0, $month - 1, 1, $year)) . "'>Previous Month</a>";
    $calendar .= "<a class='btn btn-xs btn-primary' href='?month=" . date('m') . "&year=" . date('Y') . "'>Current Month</a>";
    $calendar .= "<a class='btn btn-xs btn-primary' href='?month=" . date('m', mktime(0, 0, 0, $month + 1, 1, $year)) . "&year=" . date('Y', mktime(0, 0, 0, $month + 1, 1, $year)) . "'>Next Month</a></center><br>";

    $calendar .= "<tr>";
    // creating the calendar headers
    foreach ($daysOfWeek as $day) {
        $calendar .= "<th class='header'>$day</th>";
    }
    $currentDay = 1;
    $calendar .= "</tr><tr>";

    //The variable $dayOfWeek will make sure that there must be only 7 columns on our table
    if ($dayOfWeek > 0) {
        for ($k = 0; $k < $dayOfWeek; $k++) {
            $calendar .= "<td class='empty'></td>";
        }
    }

    //Initiating the day counter


    //Getting the month number

    $month = str_pad($month, 2, "0", STR_PAD_LEFT);
    while ($currentDay <= $numberDays) {

        //If seventh column (sartuday) reached, start a new row
        if ($dayOfWeek == 7) {
            $dayOfWeek = 0;
            $calendar .= "</tr><tr>";
        }

        $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";

        $dayName = strtolower(date('l', strtotime($date)));
        $evenNum = 0;
        $timezone = new DateTimeZone('Asia/Ho_Chi_Minh');
        $dt = new DateTime('today', $timezone);
        $dateTo = $dt->format('Y-m-d');
        $today = $date == $dateTo ? "today" : "";
        if ($date < $dateTo) {
            $calendar .= "<td><h4>$currentDay</h4><button class='btn btn-danger btn-xs'>N/A</button>";
        }
        //elseif(in_array($date,$bookings)){
        //$calendar .= "<td class='$today'><h4>$currentDay</h4><button class='btn btn-danger btn-xs'>Already booking</button>";
        //} 
        else {
            $calendar .= "<td class='$today'><h4>$currentDay</h4><a href='book.php?date=".$date."' class='btn btn-success btn-xs'>Book</a>";
        }

        $calendar .= "</td>";

        //Implementing the counters
        $currentDay++;
        $dayOfWeek++;
    }

    //Completing the row of the last week in month, if necessary
    if ($dayOfWeek != 7) {
        $remainingDays = 7 - $dayOfWeek;
        for ($i = 0; $i < $remainingDays; $i++) {
            $calendar .= "<td clss='empty'></td>";
        }
    }
    $calendar .= "</tr>";
    $calendar .= "</table>";

    echo $calendar;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calendar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        table {
            table-layout: fixed;
        }

        td {
            width: 33%;
        }

        .today {
            background: yellow;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                $dateComponents = getdate();
                if (isset($_GET['month']) && isset($_GET['year'])) {
                    $month = $_GET['month'];
                    $year = $_GET['year'];
                } else {
                    $month = $dateComponents['mon'];
                    $year = $dateComponents['year'];
                }

                echo build_Calendar($month, $year);
                ?>
            </div>
        </div>
    </div>
</body>

</html>