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
    // $user = $_SESSION['usertype'];
// if (isset($user)) {
//     if ($user != 'admin') {
//         echo "<script>
//         alert('Youre not allowed to access this page.');
//         window.location='/apartment/manager/managerFeed.php';
//         </script>";
//     }
// }
    
    $sqlfortenant = "SELECT * FROM $tenant ORDER by tenantName ASC";
    $resultfortenant = mysqli_query($mysqli, $sqlfortenant) or die(mysqli_error($mysqli));
    ?>

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-11">
                        <h2 class="building__header">All the Tenants</h2>
                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                    <tr>
                                        <th>Tenant Name</th>
                                        <th>Apartment</th>
                                        <th>Last Paid</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($datafortenant = $resultfortenant->fetch_assoc()) { ?>
                                        <tr>
                                            <td>
                                                <a class="custom__a"
                                                    href="/ams/user-details.php?user=<?= $datafortenant['tenantID'] ?>">
                                                    <?= $datafortenant['tenantName'] ?></a>
                                            </td>
                                            <td>
                                                <?= $datafortenant['apartmentName'] ?>
                                            </td>
                                            <td>
                                                <?= $datafortenant['lastPaid'] ?>
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