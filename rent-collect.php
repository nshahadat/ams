<?php
session_start();
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
                                            <label for="select" class=" form-control-label">Select Building of the
                                                Apartment</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="whichbuilding" id="select" class="form-control">
                                                <?php while ($databld = $resultbld->fetch_assoc()) { ?>
                                                    <option value="<?= $databld['buildingName'] ?>">
                                                        <?= $databld['buildingName'] ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Select Floor</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="whichfloor" id="select" class="form-control">
                                                <?php for ($af = 0; $af < 15; $af++) { ?>
                                                    <option value="<?= $af ?>">
                                                        <?= $af ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Select Side</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="whichwing" id="select" class="form-control">
                                                <?php for ($cnt = 1; $cnt < 2; $cnt++) {
                                                    foreach (range('A', 'Z') as $sideapt) { ?>
                                                        <option value="<?= $sideapt ?>">
                                                            <?= $sideapt ?>
                                                        </option>
                                                    <?php }
                                                } ?>
                                            </select>
                                        </div>
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
                                                placeholder="Enter Full Name" class="form-control" required>
                                            <small class="form-text text-muted">Person who is giving the rent</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class="form-control-label">Monthly Rent</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="number" id="text-input" name="monthlyrent"
                                                placeholder="Monthly Rent for this apartment" class="form-control"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class="form-control-label">Gas Bill</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="number" id="text-input" name="gasbill"
                                                placeholder="Gas bill of this month" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class="form-control-label">Electricity Bill</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="number" id="text-input" name="elcbill"
                                                placeholder="Electricity bill of this month" class="form-control"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Others Bill</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="number" id="text-input" name="otherbill"
                                                placeholder="Others bill of this month" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row form-group">
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
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email-input" class=" form-control-label">Received Amount</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="number" name="amount" placeholder="Enter Amount"
                                                class="form-control" required>
                                            <small class="help-block form-text">Total amount that has been
                                                received</small>
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

<?php
if (isset($_POST['collectBtn'])) {
    $selectBuilding = $_POST['whichbuilding'];
    $floor = $_POST['whichfloor'];
    $side = $_POST['whichwing'];
    $apartment = "B" . $selectBuilding . "AP" . $floor . $side;
    $month = $_POST['paymentmonth'];
    $receivedfrom = $_POST['receivedfrom'];
    $amount = $_POST['amount'];
    $gasbill = $_POST['gasbill'];
    $elcbill = $_POST['elcbill'];
    $otherbill = $_POST['otherbill'];
    $rentdue = $_POST['rentdue'];
    $monthlyrent = $_POST['monthlyrent'];

    $rentsql = "INSERT IGNORE INTO $rent (rentMonth, rentReceived, rentGas, rentCurrent, rentOthers, rentDue, rentAmount, rentApt) VALUES ('$month', '$receivedfrom', '$gasbill', '$elcbill', '$otherbill', '$rentdue',  '$amount', '$apartment')";
    $mysqli->query($rentsql) or die($mysqli->error);

    $updatemonth = "UPDATE $tenant SET lastPaid = '$month' WHERE apartmentName = '$apartment'";
    $mysqli->query($updatemonth) or die($mysqli->error);

    echo "<script>alert('Rent is collected!')</script>";
    $_SESSION['apartment'] = $apartment;
    $_SESSION['month'] = $month;
    $_SESSION['receivedfrom'] = $receivedfrom;
    $_SESSION['amount'] = $amount;
    $_SESSION['gasbill'] = $gasbill;
    $_SESSION['elcbill'] = $elcbill;
    $_SESSION['otherbill'] = $otherbill;
    $_SESSION['rentdue'] = $rentdue;
    $_SESSION['monthlyrent'] = $monthlyrent;

    include ROOT . '/modal.php';
}
?>
<?php
include ROOT . '/includes/footer.php';
?>