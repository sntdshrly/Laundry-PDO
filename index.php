<?php
session_start();

/* entity */
include_once 'entity/User.php';
include_once 'entity/Price.php';
include_once 'entity/Order.php';
include_once 'entity/Supplier.php';
include_once 'entity/Rating.php';

/* dao */
include_once 'dao/UserDaoImpl.php';
include_once 'dao/PriceDaoImpl.php';
include_once 'dao/OrderDaoImpl.php';
include_once 'dao/SupplierDaoImpl.php';
include_once 'dao/RatingDaoImpl.php';

/* controller */
include_once 'controller/PriceController.php';
include_once 'controller/UserController.php';
include_once 'controller/OrderController.php';
include_once 'controller/SupplierController.php';
include_once 'controller/RatingController.php';


/* connection */
include_once 'util/ConnectionUtil.php';

/* set 'web_is_logged' false supaya harus login dulu */
if (!isset($_SESSION['web_is_logged'])) {
    $_SESSION['web_is_logged'] = false;
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="">
    <title>Laundry Maranatha</title>
    <link rel="icon" href="images/favicon.png">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/dataTables.bootstrap4.min.css">
    <script src="js/jquery-3.5.1.js"></script>
    <script src="bootstrap/jquery.dataTables.min.js"></script>
    <script src="bootstrap/dataTables.bootstrap4.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://kit.fontawesome.com/c443ba26e3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">

</head>
<style>
    .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: #353a40;
        color: white;
        text-align: center;
        padding: 10px 10px 10px 10px;
    }
</style>

<body>
    <div class="container" style="position: relative; min-height:100%;">
        <?php if ($_SESSION['web_is_logged'] == true) { ?>
            <?php if ($_SESSION['role'] == 'admin') { ?>
                <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
                    <a class="navbar-brand" href="?webmenu=home">
                        <p style="font-size:25px; padding-top:15px;"><b>LAUNDRY MARANATHA</b></p>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav ml-auto">
                            <a class="nav-item nav-link active" href="?webmenu=admin-dashboard#beranda">HOME</a>
                            <a class="nav-item nav-link active" href="?webmenu=admin-dashboard#pesanan">ORDER</a>
                            <a class="nav-item nav-link active" href="?webmenu=admin-dashboard#customers">CUSTOMER PROFILE</a>
                            <a class="nav-item nav-link active" href="?webmenu=admin-dashboard#suppliers">SUPPLIER PROFILE</a>
                            <a class="nav-item nav-link active" href="?webmenu=logout">LOGOUT</a>
                        </div>
                    </div>
                </nav>
            <?php } ?>

            <?php if ($_SESSION['role'] == 'user') { ?>
                <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
                    <a class="navbar-brand" href="?webmenu=home">
                        <p style="font-size:25px; padding-top:15px;"><b>LAUNDRY MARANATHA</b></p>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="?webmenu=dashboard">HOME</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="?webmenu=dashboard#status-order">STATUS</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="?webmenu=dashboard#price">PRICE</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="?webmenu=dashboard#review">REVIEW</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="?webmenu=dashboard#profil">PROFILE</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="?webmenu=logout">LOGOUT</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                </nav>
        <?php }
        } ?>
        <?php if ($_SESSION['web_is_logged'] == false) { ?>
            <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="?webmenu=home">
                    <p style="font-size:25px; padding-top:15px;"><b>LAUNDRY MARANATHA</b></p>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ml-auto">
                        <a class="nav-item nav-link active" href="?webmenu=home">HOME</a>
                        <a class="nav-item nav-link active" href="?webmenu=signup">SIGN UP</a>
                        <a class="nav-item nav-link active nav-pills nav-fill" href="?webmenu=home#how-to-order">HOW TO ORDER</a>
                        <a class="nav-item nav-link active" href="?webmenu=home#price-list">PRICE LIST</a>
                        <a class="nav-item nav-link active" href="?webmenu=login">LOGIN</a>
                    </div>
                </div>
            </nav>

        <?php } ?>

        <?php
        $menu = filter_input(INPUT_GET, 'webmenu');
        switch ($menu) {
            case 'home';
                $priceController = new PriceController();
                $priceController->index();
                break;
            case 'signup';
                $userController = new UserController();
                $userController->signupIndex();
                break;
            case 'dashboard';
                $orderController = new OrderController();
                $orderController->allOrderByUserId();
                $ratingController = new RatingController();
                $ratingController->index();
                break;
            case 'admin-dashboard';
                $orderController = new OrderController();
                $orderController->index();
                break;
            case 'order';
                $orderController = new OrderController();
                $orderController->orderByUser();
                break;
            case 'edgen';
                $orderController = new OrderController();
                $orderController->updateIndex();
                break;
            case 'edgen2';
                $userController = new UserController();
                $userController->updateIndexUser();
                break;
            case 'edgen3';
                $userController = new UserController();
                $userController->updateProfile();
                break;
            case 'edgen4';
                $supplierController = new SupplierController();
                $supplierController->updateIndexSupplier();
                break;
            case 'add-supplier';
                $supplierController = new SupplierController();
                $supplierController->addSupplier();
                break;
            case 'howtoorder';
                break;
            case 'pricelist';
                break;
            case 'login';
                $userController = new UserController();
                $userController->loginUser();
                break;
            case 'logout';
                session_unset();
                session_destroy();
                header('location:index.php');
                break;
            default;
                $priceController = new PriceController();
                $priceController->index();
        }
        ?>
    </div>

    <div class="footer">
        © 2022 Copyright Laundry Maranatha. All right reserved.
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!--datatables-->
    <script>
        $(document).ready(function() {
            $("#id").DataTable();
        })
    </script>
</body>

</html>