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
    // $user = $_SESSION['usertype'];
// if (isset($user)) {
//     if ($user != 'admin') {
//         echo "<script>
//         alert('Youre not allowed to access this page.');
//         window.location='/apartment/manager/managerFeed.php';
//         </script>";
//     }
// }
    
    $sqlforbld = "SELECT buildingName FROM $building";
    $resultforbld = mysqli_query($mysqli, $sqlforbld) or die(mysqli_error($mysqli));
    ?>

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <?php
                    while ($dataforbld = $resultforbld->fetch_assoc()) {
                        $dtfbld = $dataforbld['buildingName'];
                        $sqlforb01 = "SELECT * FROM $tenant WHERE building = '$dtfbld'";
                        $resultforb01 = mysqli_query($mysqli, $sqlforb01) or die(mysqli_error($mysqli));
                        ?>
                        <div class="col-lg-12">
                            <h2 class="building__header">
                                <a href="/ams/single-bld.php?bld=<?= $dataforbld['buildingName'] ?>"><?=
                                      $dataforbld['buildingName'] ?></a>
                            </h2>
                            <div class="table-responsive m-b-40">
                                <table class="table table-borderless table-data3">
                                    <thead>
                                        <tr>
                                            <th>Apartment Name</th>
                                            <th>Tenant Name</th>
                                            <th>Tenant Contact</th>
                                            <th>Start Date</th>
                                            <th>Tenant Email</th>
                                            <th>Last Paid Month</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($dataforb01 = $resultforb01->fetch_assoc()) { ?>
                                            <tr>
                                                <td>
                                                    <?= $dataforb01['apartmentName'] ?>
                                                </td>
                                                <td>
                                                    <a href="/ams/user-details.php?user=<?= $dataforb01['tenantName'] ?>">
                                                        <?= $dataforb01['tenantName'] ?></a>
                                                </td>
                                                <td>
                                                    <?= $dataforb01['tenantContact'] ?>
                                                </td>
                                                <td>
                                                    <?= $dataforb01['tenantStart'] ?>
                                                </td>
                                                <td>
                                                    <?= $dataforb01['tenantEmail'] ?>
                                                </td>
                                                <td>
                                                    <?= $dataforb01['lastPaid'] ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include ROOT . '/includes/footer.php';
?>