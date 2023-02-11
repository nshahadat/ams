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
    
    $bld = $_GET['bld'];
    ?>

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="building__header">
                            <?php
                            $sqlforb01 = "SELECT * FROM $tenant WHERE building = '$bld'";
                            $resultforb01 = mysqli_query($mysqli, $sqlforb01) or die(mysqli_error($mysqli));
                            echo $bld ?>
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
                                                <a href="/ams/user-details.php?user=<?= $datafortenant['tenantName'] ?>"
                                                    class="custom__a">
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
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include ROOT . '/includes/footer.php';
?>