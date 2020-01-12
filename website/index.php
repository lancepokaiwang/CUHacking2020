<?php
require "db.php";

?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>cuHacking 2020 - RBC Analysis</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>

    <?php require "left_panel.html"?>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                </div>

                <div class="col-sm-5">
                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">

            </div>
        </div>

        <div class="content mt-3">
            <div class="col-lg-6 col-md-6">
                <div class="social-box twitter">
                    <i class="fa fa-twitter"></i>
                    <ul>
                        <li>
                            <span>Last 7 Days</span>
                        </li>
                        <li>
                            <span class="count">1621</span>
                            <span>tweets</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="social-box facebook">
                    <i class="fa fa-facebook"></i>
                    <ul>
                        <li>
                            <span>Unavailable</span>
                        </li>
                        <li>
<!--                            <span class="count"></span>-->
                            <span>Unavailable</span>
                        </li>
                    </ul>
                </div>
            </div>

<!--            <div class="col-xl-5">-->
<!--                <div class="card">-->
<!--                    <div class="card-body">-->
<!--                        <div class="row">-->
<!--                            <div class="col-sm-4">-->
<!--                                <h4 class="card-title mb-0">Traffic</h4>-->
<!--                                <div class="small text-muted">October 2017</div>-->
<!--                            </div>-->
<!--                            <!--/.col-->-->
<!--                            <div class="col-sm-8 hidden-sm-down">-->
<!--                                <button type="button" class="btn btn-primary float-right bg-flat-color-1"><i class="fa fa-cloud-download"></i></button>-->
<!--                                <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">-->
<!--                                    <div class="btn-group mr-3" data-toggle="buttons" aria-label="First group">-->
<!--                                        <label class="btn btn-outline-secondary">-->
<!--                                            <input type="radio" name="options" id="option1"> Day-->
<!--                                        </label>-->
<!--                                        <label class="btn btn-outline-secondary active">-->
<!--                                            <input type="radio" name="options" id="option2" checked=""> Month-->
<!--                                        </label>-->
<!--                                        <label class="btn btn-outline-secondary">-->
<!--                                            <input type="radio" name="options" id="option3"> Year-->
<!--                                        </label>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <!--/.col-->-->
<!---->
<!---->
<!--                        </div>-->
<!--                        <!--/.row-->-->
<!--                        <div class="chart-wrapper mt-4">-->
<!--                            <canvas id="trafficChart" style="height:200px;" height="200"></canvas>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!--                    <div class="card-footer">-->
<!--                        <ul>-->
<!--                            <li>-->
<!--                                <div class="text-muted">Visits</div>-->
<!--                                <strong>29.703 Users (40%)</strong>-->
<!--                                <div class="progress progress-xs mt-2" style="height: 5px;">-->
<!--                                    <div class="progress-bar bg-success" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>-->
<!--                                </div>-->
<!--                            </li>-->
<!--                            <li class="hidden-sm-down">-->
<!--                                <div class="text-muted">Unique</div>-->
<!--                                <strong>24.093 Users (20%)</strong>-->
<!--                                <div class="progress progress-xs mt-2" style="height: 5px;">-->
<!--                                    <div class="progress-bar bg-info" role="progressbar" style="width: 20%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>-->
<!--                                </div>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <div class="text-muted">Pageviews</div>-->
<!--                                <strong>78.706 Views (60%)</strong>-->
<!--                                <div class="progress progress-xs mt-2" style="height: 5px;">-->
<!--                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>-->
<!--                                </div>-->
<!--                            </li>-->
<!--                            <li class="hidden-sm-down">-->
<!--                                <div class="text-muted">New Users</div>-->
<!--                                <strong>22.123 Users (80%)</strong>-->
<!--                                <div class="progress progress-xs mt-2" style="height: 5px;">-->
<!--                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>-->
<!--                                </div>-->
<!--                            </li>-->
<!--                            <li class="hidden-sm-down">-->
<!--                                <div class="text-muted">Bounce Rate</div>-->
<!--                                <strong>40.15%</strong>-->
<!--                                <div class="progress progress-xs mt-2" style="height: 5px;">-->
<!--                                    <div class="progress-bar" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>-->
<!--                                </div>-->
<!--                            </li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
            <div class="col-xl-12">
                <img src="images/cloud.png" alt="">
            </div>


        </div> <!-- .content -->
    </div>


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>

</body>

</html>
