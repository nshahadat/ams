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
    
    $sqlformonth = "SELECT * FROM $apartment ORDER BY apartmentName DESC";
    $resultformonth = mysqli_query($mysqli, $sqlformonth) or die(mysqli_error($mysqli));
    ?>

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                    <tr>
                                        <th>Apartment</th>
                                        <th>Owner</th>
                                        <th>Tenant</th>
                                        <th>Building</th>
                                        <th>Monthly Fair</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($dataformonth = $resultformonth->fetch_assoc()) { ?>
                                        <tr>
                                            <td>
                                                <?= $dataformonth['apartmentName'] ?>
                                            </td>
                                            <td>
                                                <?= $dataformonth['aptOwner'] ?>
                                            </td>
                                            <td>
                                                <?= $dataformonth['TenantName'] ?>
                                            </td>
                                            <td>
                                                <?= $dataformonth['building'] ?>
                                            </td>
                                            <td>
                                                <?= $dataformonth['aptFair'] ?>
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