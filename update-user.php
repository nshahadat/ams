<?php
session_start();
define('ROOT', 'C:/xampp/htdocs/ams');
include ROOT . '/includes/db-config.php';
include ROOT . '/includes/header.php';
include ROOT . '/functions.php';
include ROOT . '/includes/header-mobile.php';
include ROOT . '/includes/sidebar.php'; ?>
<div class="page-container">
    <?php
    include ROOT . '/includes/header-desktop.php';
    ?>
    <?php
    $user = $_GET['name'];
    $usersql = "SELECT * FROM $tenant WHERE tenantName = '$user'";
    $resultforupdate = mysqli_query($mysqli, $usersql) or die(mysqli_error($mysqli));
    $dataforupdate = $resultforupdate->fetch_assoc();
    ?>
    <?php
    $fetchbldsql = "SELECT * FROM $building";
    $resultbld = mysqli_query($mysqli, $fetchbldsql) or die(mysqli_error($mysqli));
    ?>

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="card extra-margin">
                            <div class="card-header">
                                Update Tenant Form
                            </div>
                            <div class="card-body card-block">
                                <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal"
                                    id="info-form">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Tenant Name
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="tenantName"
                                                placeholder="Tenant Name" class="form-control" required>
                                            <small class="form-text text-muted">
                                                <?= $dataforupdate['tenantName'] ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Father's Name
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="fatherName"
                                                placeholder="Father's Name" class="form-control" required>
                                            <small class="form-text text-muted">
                                                <?= $dataforupdate['fatherName'] ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email-input" class=" form-control-label">Tenant Email
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="email" id="email-input" name="tenantEmail"
                                                placeholder="Tenant Email" class="form-control" required>
                                            <small class="help-block form-text">
                                                <?= $dataforupdate['tenantEmail'] ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email-input" class=" form-control-label">Tenant Mobile
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="tel" name="tenantContact" placeholder="Tenant Contact Number"
                                                class="form-control" required>
                                            <small class="help-block form-text">
                                                <?= $dataforupdate['tenantContact'] ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Permanent
                                                Address
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="prmntadr"
                                                placeholder="Full Address" class="form-control" required>
                                            <small class="form-text text-muted">
                                                <?= $dataforupdate['pAddress'] ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Village
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="village" placeholder="Village"
                                                class="form-control" required>
                                            <small class="form-text text-muted">
                                                <?= $dataforupdate['village'] ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">P. O.
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="po" placeholder="Post Office"
                                                class="form-control" required>
                                            <small class="form-text text-muted">
                                                <?= $dataforupdate['po'] ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">P. S.
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="ps" placeholder="Police Station"
                                                class="form-control" required>
                                            <small class="form-text text-muted">
                                                <?= $dataforupdate['ps'] ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">District
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="district" id="select" class="form-control">
                                                <option value="Dhaka">Dhaka</option>
                                                <option value="Rajshahi">Rajshahi</option>
                                                <option value="Khulna">Khulna</option>
                                                <option value="Barisal">Barisal</option>
                                                <option value="Sylhet">Sylhet</option>
                                                <option value="Chittagong">Chittagong</option>
                                                <option value="Rangpur">Rangpur</option>
                                                <option value="Mymensingh">Mymensingh</option>
                                            </select>
                                            <small class="form-text text-muted">
                                                <?= $dataforupdate['district'] ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email-input" class=" form-control-label">Monthly Rent
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="number" name="monRent" class="form-control"
                                                placeholder="Monthly rent Amount" required>
                                            <small class="form-text text-muted">
                                                <?= $dataforupdate['monRent'] ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email-input" class=" form-control-label">Tenant Start
                                                Date
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="date" name="startDate" class="form-control" required>
                                            <small class="help-block form-text">
                                                <?= $dataforupdate['tenantStart'] ?>
                                            </small>
                                        </div>
                                    </div>
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
                                            <label for="text-input" class=" form-control-label">NID Number
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="nidno" placeholder="NID Number"
                                                class="form-control" required>
                                            <small class="help-block form-text">
                                                <?= $dataforupdate['nidNumber'] ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <input type="submit" name="submitBtn" value="Update"
                                            class="btn btn-primary btn-sm">
                                        <button type="reset" class="btn btn-danger btn-sm" onclick="resetform()">
                                            Reset
                                        </button>
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
if (isset($_POST['submitBtn'])) {
    $tenantName = $_POST['tenantName'];
    $fName = $_POST['fatherName'];
    $tenantEmail = $_POST['tenantEmail'];
    $tenantContact = $_POST['tenantContact'];
    $pAdd = $_POST['prmntadr'];
    $vill = $_POST['village'];
    $po = $_POST['po'];
    $ps = $_POST['ps'];
    $district = $_POST['district'];
    $monRent = $_POST['monRent'];
    $startDate = $_POST['startDate'];
    $selectBuilding = $_POST['whichbuilding'];
    $floor = $_POST['whichfloor'];
    $side = $_POST['whichwing'];
    $nidno = $_POST['nidno'];
    $apartment = "B" . $selectBuilding . "AP" . $floor . $side;

    $sql = "UPDATE $tenant SET 
    tenantName = '$tenantName', 
    apartmentName = '$apartment', 
    tenantContact = '$tenantContact', 
    monRent = '$monRent', 
    tenantStart = '$startDate', 
    tenantEmail = '$tenantEmail', 
    building = '$selectBuilding', 
    fatherName = '$fName', 	
    pAddress = '$pAdd', 
    po = '$po', 
    ps = '$ps', 
    district = '$district', 
    village = '$vill', 
    nidNumber = '$nidno' 
    WHERE tenantID = '$user'";

    $mysqli->query($sql) or die($mysqli->error);

    echo "<script>
    alert('Updated succesfully');
    window.location='/ams/tenants-list.php';
    </script>";
}
?>
<?php
include ROOT . '/includes/footer.php';
?>