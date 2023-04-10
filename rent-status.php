<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:/ams/admin.php");
}
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
    // $user = $_SESSION['usertype'];
// if (isset($user)) {
//     if ($user != 'admin') {
//         echo "<script>
//         alert('Youre not allowed to access this page.');
//         window.location='/apartment/manager/managerFeed.php';
//         </script>";
//     }
// }
    
    $paid = "Paid";
    $due = "Due";
    $sqlfordue = "SELECT tenant.apartmentName, tenant.building, tenant.tenantName, tenant.lastPaid, IF(STRCMP(tenant.lastPaid, MONTHNAME(CURRENT_DATE))=0,'$paid','$due') AS rentStatus FROM $tenant";
    $resultfordue = mysqli_query($mysqli, $sqlfordue) or die(mysqli_error($mysqli));

    $fetchbldsql = "SELECT * FROM $building";
    $resultbld = mysqli_query($mysqli, $fetchbldsql) or die(mysqli_error($mysqli));
    ?>

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-11">
                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                    <tr>
                                        <th>Apartment</th>
                                        <th>Building</th>
                                        <th>Tenant</th>
                                        <th>Rent Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($datafordue = $resultfordue->fetch_assoc()) { ?>
                                        <tr>
                                            <td>
                                                <a class="custom__a"
                                                    href="/ams/apt-payment-details.php?apt=<?= $datafordue['apartmentName'] ?>"><?= $datafordue['apartmentName'] ?>
                                            </td>
                                            <td>
                                                <?= $datafordue['building'] ?>
                                            </td>
                                            <td>
                                                <?= $datafordue['tenantName'] ?>
                                            </td>
                                            <td>
                                                <?= $datafordue['rentStatus'] ?> | Last Paid (
                                                <?= $datafordue['lastPaid'] ?>)
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include ROOT . '/includes/footer.php';
?>