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
    $result = mysqli_query($mysqli, $fetchbldsql) or die(mysqli_error($mysqli));
    ?>

    <div class="main-content" style="max-height:100vh;">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card extra-margin">
                            <div class="card-header">
                                Add Apartment
                            </div>
                            <div class="card-body card-block">
                                <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal"
                                    id="info-form">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Select Building</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="whichbuilding" id="select" class="form-control">
                                                <?php while ($data = $result->fetch_assoc()) { ?>
                                                    <option value="<?= $data['buildingName'] ?>">
                                                        <?= $data['buildingName'] ?>
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
                                            <label for="select" class=" form-control-label">Enter Owner Name</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="ownerName"
                                                placeholder="Owner of this building" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <input type="submit" name="addApt" class="btn btn-primary btn-sm">
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

if (isset($_POST['addApt'])) {
    $aptBld = $_POST['whichbuilding'];
    $aptflr = $_POST['whichfloor'];
    $aptside = $_POST['whichwing'];
    $aptName = "B" . $aptBld . "AP" . $aptflr . $aptside;
    $owner = $_POST['ownerName'];

    $aptcheck = "SELECT * FROM $apartment WHERE apartmentName = '$aptName'";
    $result = $mysqli->query($aptcheck) or die($mysqli->error);
    $numrows = mysqli_num_rows($result);

    if ($numrows > 0) {
        echo "<script>
        alert('This apartment is already added.');
        window.location='/ams/add-apt.php';
        </script>";
    } else {
        $insertaptsql = "INSERT IGNORE INTO $apartment(apartmentName, building, aptOwner) VALUES ('$aptName','$aptBld','$owner')";
        $mysqli->query($insertaptsql) or die($mysqli->error);

        echo "<script>
    alert('Apartment added succesfully');
    window.location='/ams/add-apt.php';
    </script>";
    }
}

?>
<?php
include ROOT . '/includes/footer.php';
?>