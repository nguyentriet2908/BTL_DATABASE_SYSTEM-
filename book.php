<?php
if (isset($_GET['date'])) {
    $date = $_GET['date'];
}
//(isset($_POST['name=submit']))
if (isset($_POST['submit'])) {
    // $name = $_POST['name'];
    // $email = $_POST['email'];
    // $timeslot = $_POST['timeslot'];
    // $mysqli = new mysqli('localhost','root','','bookingcalendar');
    // $stmt = $mysqli->prepare("INSERT INTO bookings (name, timeslot, email ,date) VALUE(?,?,?,?)");
    // $stmt->bind_param('ssss',$name,$timeslot,$email,$date);
    // $stmt->execute();
    $msg = "<div class='alert alert-success'>Booking successfully</div>";
    // $stmt->close();
    // $mysqli->close();
}
$duration = 30;
$cleanup = 0;
$start = "08:00";
$end = "14:00";

function timeslots($duration, $cleanup, $start, $end)
{
    $start = new DateTime($start);
    $end = new DateTime($end);
    $interval = new DateInterval("PT" . $duration . "M");
    $cleanupInterval = new DateInterval("PT" . $cleanup . "M");
    $slots = array();

    for ($intStart = $start; $intStart < $end; $intStart->add($interval)->add($cleanupInterval)) {
        $endPeriod = clone $intStart;
        $endPeriod->add($interval);
        if ($endPeriod > $end) {
            break;
        }
        $slots[] = $intStart->format("H:iA") . "-" . $endPeriod->format("H:iA");
    }
    return $slots;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calendar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="container">
        <h1 class="text-center">Book for Date : <?php echo date('d/m/Y', strtotime($date)); ?></h1>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <?php echo isset($msg) ? $msg : ""; ?>
            </div>
            <?php $timeslots = timeslots($duration, $cleanup, $start, $end);
            foreach ($timeslots as $ts) {
            ?>
                <div class="col-md-2">
                    <div class="form-group mb-2">
                        <button class="btn btn-success book" data-timeslot="<?php echo $ts;  ?>"><?php echo $ts;  ?></button>
                    </div>
                </div>

            <?php
            }
            ?>
        </div>
    </div>
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Booking: <span id="slot"></span></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="post">
                                <div class="form-group mb-2">
                                    <label for="">Timeslot</label>
                                    <input required type="text" readonly name="timeslot" id="timeslot" class="form-control">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="">Name</label>
                                    <input required type="text" readonly name="name" class="form-control">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="">Email</label>
                                    <input required type="email" readonly name="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit" name="submit">Confirm</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <!-- <div class="modal-footer">
                    <button class="btn btn-primary" type="submit" name="submit">Confirm</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div> -->

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        $(".book").click(function() {
            var timeslot = $(this).attr('data-timeslot');
            $("#slot").html(timeslot);
            $("#timeslot").val(timeslot);
            $("#myModal").modal("show");
        })
    </script>
</body>

</html>