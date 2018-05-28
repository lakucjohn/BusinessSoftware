<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />
    <title>NAOD MOSES CO. LTD </title>
    <script src="http://localhost/Naod-Moses-Co/Assets/js/jquery-slim.min.js"></script>
    <!-- Bootstrap -->
    <link href="http://localhost/Naod-Moses-Co/Assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="http://localhost/Naod-Moses-Co/Assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="http://localhost/Naod-Moses-Co/Assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="http://localhost/Naod-Moses-Co/Assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="http://localhost/Naod-Moses-Co/Assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="http://localhost/Naod-Moses-Co/Assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="http://localhost/Naod-Moses-Co/Assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="http://localhost/Naod-Moses-Co/Assets/build/css/custom.min.css" rel="stylesheet">
    <link href="http://localhost/Naod-Moses-Co/Assets/css/personal.css" rel="stylesheet">
    <link href="http://localhost/Naod-Moses-Co/Assets/css/jquery.datetimepicker.min.css" rel="stylesheet">

    <script type="text/javascript">
        $(document).ready(function(){
            loadPagElements();
        });
    </script>
    <style>
        .space-doc-btn{
            margin-left:30%;
        }
    </style>
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar-brand nav_title" style="border: 0; background-color: #34495e; margin-bottom: 8%;">
                    <h4><span>NAOD MOSES CO</span></h4>
                </div>
                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <ul class="nav side-menu">
                            <li><a href="http://localhost/Naod-Moses-Co/Naod/index.php" class="dashboard"><i class="fa fa-home"></i>Dashboard</a>

                            </li>
                            <li><a><i class="fa fa-clone"></i>Inventory <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="http://localhost/Naod-Moses-Co/Naod/spares.php" class="side_menu_bar">Spare Parts</a></li>
                                    <li><a href="http://localhost/Naod-Moses-Co/Naod/stock-grouping.php" class="side_menu_bar">Categories</a></li>
                                    <li><a href="http://localhost/Naod-Moses-Co/Naod/in-stock.php" class="side_menu_bar">In Stock</a></li>
                                </ul>
                            </li>

                            <li><a><i class="fa fa-clone"></i>Purchases <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="http://localhost/Naod-Moses-Co/Naod/suppliers.php" class="side_menu_bar">Suppliers</a></li>
                                    <li><a href="http://localhost/Naod-Moses-Co/Naod/purchase-price-quotations.php" class="side_menu_bar">Price Quotations</a></li>

                                    <li><a href="http://localhost/Naod-Moses-Co/Naod/purchase-receipts.php" class="side_menu_bar">Incoming Receipts</a></li>
                                    <li><a href="http://localhost/Naod-Moses-Co/Naod/purchase-invoices.php" class="side_menu_bar">Incoming Invoices</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-clone"></i>Sales <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="http://localhost/Naod-Moses-Co/Naod/customers.php" class="side_menu_bar">Customers</a></li>
                                    <li><a href="http://localhost/Naod-Moses-Co/Naod/cash-receipts.php" class="side_menu_bar">Cash Sale Receipts</a></li>
                                    <li><a href="http://localhost/Naod-Moses-Co/Naod/sales-invoices.php" class="side_menu_bar">Customer Invoices</a></li>
                                    <li><a><i class="fa fa-clone"></i>Price List <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="http://localhost/Naod-Moses-Co/Naod/cash-transactions-price-list.php" class="side_menu_bar">Cash Transactions</a></li>
                                            <li><a href="http://localhost/Naod-Moses-Co/Naod/credit-transactions-price-list.php" class="side_menu_bar">Credit Transactions</a></li>
                                        </ul>
                                    </li>


                                </ul>
                            </li>

                        </ul>
                    </div>


                </div>
                <!-- /sidebar menu -->
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="images/img.jpg" alt="">John Doe
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="javascript:;"> Profile</a></li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span>Settings</span>
                                    </a>
                                </li>
                                <li><a href="javascript:;">Help</a></li>
                                <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-green">6</span>
                            </a>
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                <li>
                                    <a>
                                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <div class="text-center">
                                        <a>
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <input type="hidden" value="" name="patientid" />

        <!-- page content -->
        <div class="right_col" id="contents" role="main" style="min-height: 5537px;">
            <?php include 'dashboard.php'; ?>
        </div><!-- /page content -->


        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>


<!-- Bootstrap -->
<!-- jQuery -->
<script src="http://localhost/Naod-Moses-Co/Assets/vendors/jquery/dist/jquery.min.js"></script>

<script src="http://localhost/Naod-Moses-Co/Assets/build/js/custom.js"></script>
<script src="http://localhost/Naod-Moses-Co/Assets/build/js/custom.min.js"></script>

<script src="http://localhost/Naod-Moses-Co/Assets/js/main.js"></script>
<script src="http://localhost/Naod-Moses-Co/Assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="http://localhost/Naod-Moses-Co/Assets/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="http://localhost/Naod-Moses-Co/Assets/vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="http://localhost/Naod-Moses-Co/Assets/vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="http://localhost/Naod-Moses-Co/Assets/vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="http://localhost/Naod-Moses-Co/Assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="http://localhost/Naod-Moses-Co/Assets/vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="http://localhost/Naod-Moses-Co/Assets/vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="http://localhost/Naod-Moses-Co/Assets/vendors/Flot/jquery.flot.js"></script>
<script src="http://localhost/Naod-Moses-Co/Assets/vendors/Flot/jquery.flot.pie.js"></script>
<script src="http://localhost/Naod-Moses-Co/Assets/vendors/Flot/jquery.flot.time.js"></script>
<script src="http://localhost/Naod-Moses-Co/Assets/vendors/Flot/jquery.flot.stack.js"></script>
<script src="http://localhost/Naod-Moses-Co/Assets/vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="http://localhost/Naod-Moses-Co/Assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="http://localhost/Naod-Moses-Co/Assets/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="http://localhost/Naod-Moses-Co/Assets/vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="http://localhost/Naod-Moses-Co/Assets/vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="http://localhost/Naod-Moses-Co/Assets/vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="http://localhost/Naod-Moses-Co/Assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="http://localhost/Naod-Moses-Co/Assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="http://localhost/Naod-Moses-Co/Assets/vendors/moment/min/moment.min.js"></script>
<script src="http://localhost/Naod-Moses-Co/Assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- Custom Theme Scripts -->
<script src="http://localhost/Naod-Moses-Co/Assets/build/js/custom.min.js"></script>
<script src="http://localhost/Naod-Moses-Co/Assets/js/jquery.datetimepicker.full.min.js"></script>
<script src="http://localhost/Naod-Moses-Co/Assets/js/popper.min.js"></script>
<script>
    $(function() {
        $('input[type="radio"]').change(function() {
            var rad = $(this).attr('id');
            $('#' + rad + 'Div').show();
            $('#' + rad + 'Div').siblings('div').hide();
        });
    });


</script>
</body>


</html>
