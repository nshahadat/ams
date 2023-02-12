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
    
    $sqlformonth = "SELECT * FROM $rent ORDER BY rentApt ASC";
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
                                        <th>Received Date</th>
                                        <th>Apartment</th>
                                        <th>Received from</th>
                                        <th>Last Paid Month</th>
                                        <th>Last Paid <br>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($dataformonth = $resultformonth->fetch_assoc()) { ?>
                                        <tr>
                                            <td>
                                                <a class="custom__a"
                                                    href="/ams/date-received.php?date=<?= $dataformonth['rentDateOnly'] ?>"><?=
                                                          $dataformonth['rentDate'] ?></a>
                                            </td>
                                            <td>
                                                <a class="custom__a"
                                                    href="/ams/apt-payment-details.php?apt=<?= $dataformonth['rentApt'] ?>"><?=
                                                          $dataformonth['rentApt'] ?></a>
                                            </td>
                                            <td>
                                                <?= $dataformonth['rentReceived'] ?>
                                            </td>
                                            <td>
                                                <a class="custom__a"
                                                    href="/ams/monthly-details.php?month=<?= $dataformonth['rentMonth'] ?>"><?=
                                                          $dataformonth['rentMonth'] ?></a>
                                            </td>
                                            <td>
                                                <?= $dataformonth['rentAmount'] ?>
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