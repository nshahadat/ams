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
    // $usertype = $_SESSION['usertype'];
// if ($usertype != 'manager') {
//     echo "<script>
//     alert('You cannot check complains. Only manager can check.');
//     window.location='/apartment/index.php';</script>";
// }
    ?>
    <?php
    $cmpsql = "SELECT * FROM $complain";
    $result = mysqli_query($mysqli, $cmpsql) or die(mysqli_error($mysqli));
    ?>

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- DATA TABLE-->
                        <div class="table-responsive m-b-40">
                            <table class="table table-borderless table-data3">
                                <thead>
                                    <tr>
                                        <th>Who Complained</th>
                                        <th>Complain Details</th>
                                        <th>Apartment</th>
                                        <th>Complain Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($data = $result->fetch_assoc()) { ?>
                                        <tr>
                                            <td>
                                                <?= $data['cmpEmail'] ?>
                                            </td>
                                            <td>
                                                <?= $data['cmpDetails'] ?>
                                            </td>
                                            <td>
                                                <?= $data['cmpApt'] ?>
                                            </td>
                                            <td>
                                                <?= $data['cmpTime'] ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- END DATA TABLE-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include ROOT . '/includes/footer.php';
?>