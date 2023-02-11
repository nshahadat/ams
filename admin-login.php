<?php
session_start();
define('ROOT', 'C:/xampp/htdocs/ams');
include ROOT . '/includes/header.php';
include ROOT . '/includes/db-config.php';
?>
<div class="main-content" style="max-height:100vh;">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-header">Admin Login</div>
                        <div class="card-body card-block">
                            <form action="#" method="post">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <input type="email" id="email" name="useremail" placeholder="Admin Email"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-asterisk"></i>
                                        </div>
                                        <input type="password" id="password" name="userpassword"
                                            placeholder="Admin Password" class="form-control">
                                    </div>
                                </div>
                                <div class="form-actions form-group">
                                    <input type="submit" value="Login" name="loginBtn" class="btn btn-success btn-sm">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['loginBtn'])) {

    $useremail = $_POST['useremail'];
    $userpassword = $_POST['userpassword'];

    $sql = "SELECT * FROM $admin WHERE adminEmail = '$useremail' AND adminPass = '$userpassword'";

    $result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
    $numrows = mysqli_num_rows($result);

    if ($numrows == 0) {
        echo "<script>
            alert('Wrong email or password or user type');
            window.location='/apartment/index.php';
            </script>";
    } else {

        $data = $result->fetch_assoc();

        $_SESSION['username'] = $data['adminName'];
        $_SESSION['usertype'] = "admin";
        echo "<script>window.location='/ams/add-tenant.php'</script>";
    }
}
?>
<?php
include ROOT . '/includes/header.php';
?>