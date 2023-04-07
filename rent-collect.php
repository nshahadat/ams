<?php
session_start();
error_reporting(0);
define('ROOT', 'C:/xampp/htdocs/ams');
include ROOT . '/includes/db-config.php';
include ROOT . '/includes/header.php';
include ROOT . '/includes/header-mobile.php';
include ROOT . '/includes/sidebar.php'; ?>
<div class="page-container">
    <?php
    include ROOT . '/includes/header-desktop.php';
    ?>
    <?php
    $fetchbldsql = "SELECT * FROM $building";
    $resultbld = mysqli_query($mysqli, $fetchbldsql) or die(mysqli_error($mysqli));
    ?>

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card extra-margin">
                            <div class="card-header">
                                Rent Collection Form
                            </div>
                            <div class="card-body card-block">
                                <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal"
                                    id="info-form">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Select Building</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="whichbuilding" id="selectbld" class="form-control">
                                                <option disabled selected>Choose</option>
                                                <?php while ($databld = $resultbld->fetch_assoc()) { ?>
                                                    <option value="<?= $databld['buildingName'] ?>">
                                                        <?= $databld['buildingName'] ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="apted"></div>
                                    <div id="pred"></div>
                                    <div class="row form-group" id="due">
                                        <div class="col col-md-3"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Rent of the month</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="paymentmonth" id="select" class="form-control">
                                                <option value="January">January</option>
                                                <option value="February">February</option>
                                                <option value="March">March</option>
                                                <option value="April">April</option>
                                                <option value="May">May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="August">August</option>
                                                <option value="September">September</option>
                                                <option value="October">October</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Received from</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="receivedfrom"
                                                placeholder="Enter Full Name" class="form-control">
                                            <small class="form-text text-muted">Person who is giving the rent</small>
                                        </div>
                                    </div>
                                    <!-- <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class="form-control-label">Monthly Rent</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="number" id="monthly" name="monthlyrent"
                                                placeholder="Monthly Rent for this apartment" class="form-control"
                                                required>
                                        </div>
                                    </div> -->
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class="form-control-label">Gas Bill</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="number" id="gas" name="gasbill"
                                                placeholder="Gas bill of this month" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class="form-control-label">Electricity Bill</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="number" id="elc" name="elcbill"
                                                placeholder="Electricity bill of this month" class="form-control"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Others Bill</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="number" id="other" name="otherbill"
                                                placeholder="Others bill of this month" class="form-control" required>
                                        </div>
                                    </div>
                                    <!-- <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Due</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="number" id="text-input" name="rentdue"
                                                placeholder="Dues of this month" class="form-control" required>
                                            <small class="help-block form-text">Enter if there are any dues. If it
                                                doesn't
                                                then enter
                                                0</small>
                                        </div>
                                    </div> -->
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email-input" class=" form-control-label">Received Amount</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="number" id="recamount" name="amount" placeholder="Enter Amount"
                                                class="form-control" required>
                                            <small class="help-block form-text">Total amount that has been
                                                received</small>
                                        </div>
                                    </div>
                                    <div id="tots"></div>
                                    <div class="row form-group" id="total">
                                        <div class="col col-md-3"></div>
                                        <div class="col-12 col-md-9">
                                            <button type="button" id="totalbtn"
                                                class="btn btn-secondary btn-sm">Total</button>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <input type="submit" name="collectBtn" value="Collect"
                                            class="btn btn-primary btn-sm">
                                        <button type="reset" class="btn btn-danger btn-sm"
                                            onclick="resetform()">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        var selectedBld = '';
        var selectedFlr = '';

        $("#selectbld").change(function () {
            selectedBld = $(this).val();
            console.log(selectedBld);

            $.ajax({
                method: "GET",
                url: "/ams/rent-show-apt.php",
                data: "bld=" + selectedBld,
                success: function (response) {
                    $("#apted").html(response);
                }
            })
        });
        $("#info-form").on('change', '#selectflr', function () {
            selectedFlr = $(this).val();
            console.log(selectedFlr);
            $.ajax({
                method: "GET",
                url: "/ams/dues-backend.php",
                data: "flr=" + selectedFlr,
                success: function (response) {
                    $("#pred").html(response);
                }
            })
        });
        $("#totalbtn").click(function () {
            monthbtn = document.getElementById('monthly');
            monthvalue = monthbtn.placeholder;
            console.log(monthvalue);
            elcbtn = document.getElementById('elc');
            elcvalue = elcbtn.value;
            gasbtn = document.getElementById('gas');
            gasvalue = gasbtn.value;
            otherbtn = document.getElementById('other');
            othervalue = otherbtn.value;
            recbtn = document.getElementById('recamount');
            recvalue = recbtn.value;
            prevdueinput = document.getElementById('prevdue');
            prevvalue = prevdueinput.placeholder;
            $.ajax({
                method: "GET",
                url: "/ams/total-backend.php",
                data: "month=" + monthvalue + "&elc=" + elcvalue + "&gas=" + gasvalue + "&prev=" + prevvalue + "&rec=" + recvalue + "&other=" + othervalue,
                success: function (response) {
                    $("#tots").html(response);
                    console.log(response);

                }
            })
        });
    });
</script>

<?php
if (isset($_POST['collectBtn'])) {
    $selectBuilding = $_POST['whichbuilding'];
    $floor = $_POST['whichfloor'];
    $month = $_POST['paymentmonth'];
    $receivedfrom = $_POST['receivedfrom'];
    $amount = $_POST['amount'];
    $gasbill = $_POST['gasbill'];
    $elcbill = $_POST['elcbill'];
    $otherbill = $_POST['otherbill'];
    $rentdate = date("Y-m-d");

    $aptcheck = "SELECT * FROM apartment WHERE apartmentName = '$floor'";
    $result = $mysqli->query($aptcheck) or die($mysqli->error);
    $numrows = mysqli_num_rows($result);
    $aptdata = mysqli_fetch_assoc($result);
    $monthlyrent = $aptdata['aptFair'];

    if ($numrows > 0) {
        $rentsql = "INSERT IGNORE INTO $rent 
        (rentMonth, rentReceived, rentGas, rentCurrent, rentOthers, rentAmount, rentApt, rentDateOnly) 
        VALUES 
        ('$month', '$receivedfrom', '$gasbill', '$elcbill', '$otherbill', '$amount', '$floor', '$rentdate')";
        $mysqli->query($rentsql) or die($mysqli->error);

        $updatemonth = "UPDATE $tenant SET lastPaid = '$month' WHERE apartmentName = '$floor'";
        $mysqli->query($updatemonth) or die($mysqli->error);

        $dueupdate = $_SESSION['userduepayment'];
        $updatedue = "UPDATE $dues SET dueAmount = '$dueupdate' WHERE dueApt = '$floor'";
        $mysqli->query($updatedue) or die($mysqli->error);
        echo $updatedue . $dueupdate;

        echo "<script>alert('Rent is collected!')</script>";
        $_SESSION['apartment'] = $floor;
        $_SESSION['month'] = $month;
        $_SESSION['receivedfrom'] = $receivedfrom;
        $_SESSION['amount'] = $amount;
        $_SESSION['gasbill'] = $gasbill;
        $_SESSION['elcbill'] = $elcbill;
        $_SESSION['otherbill'] = $otherbill;
        $_SESSION['rentdue'] = $_SESSION['prevdues'];
        $_SESSION['monthlyrent'] = $monthlyrent;
        $_SESSION['newdue'] = $dueupdate;
        $rentdue = $_SESSION['rentdue'];
        $year = date("Y");
        $totalrec = $_SESSION['totalrec'];

        $invoicesql = "INSERT IGNORE INTO 
        invoice(month, receivedFrom, amount, gasBill, elcBill, otherBill, rentDue, monthlyRent, newDue, year, apartment, total)
        VALUES('$month', '$receivedfrom', '$amount', '$gasbill', '$elcbill', '$otherbill', '$rentdue', '$monthlyrent', '$dueupdate', '$year', '$floor', '$totalrec')";
        mysqli_query($mysqli, $invoicesql) or die(mysqli_error($mysqli));

        include ROOT . '/modal.php';

    } else {
        echo "<script>
        alert('This apartment is not yet inlisted. Add it to collect rent.');
        window.location='/ams/add-apt.php';
        </script>";
    }
}
?>
<?php
include ROOT . '/includes/footer.php';
?>