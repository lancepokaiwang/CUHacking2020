<?php
require "db.php";
$DAO = new DatabaseAccessObject();
$stop_words = array();
$words = $DAO->execute("SELECT * FROM filtering_words");
foreach($words as $key => $value){
    array_push($stop_words, $value["word"]);
}
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

    <style>
        .twitter:hover, .facebook:hover{
            cursor: pointer;
        }
    </style>

</head>

<body style="background-color: #fff;">

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

        <div class="content mt-3 justify-content-md-center">
            <div class="col-lg-6 col-md-6">
                <div class="social-box twitter">
                    <i class="fa fa-twitter"></i>
                    <ul>
                        <li>
                            <span style="color: #000">Last 7 Days</span>
                        </li>
                        <li>
                            <span class="count" style="color: #000">1621</span>
                            <span style="color: #000">tweets</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="social-box facebook">
                    <i class="fa fa-facebook"></i>
                    <ul>
                        <li>
                            <span style="color: #000">Unavailable</span>
                        </li>
                        <li>
<!--                            <span class="count"></span>-->
                            <span style="color: #000">Unavailable</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title mb-3">Trend in One Graph</strong>
                    </div>
                    <div class="card-body">
                        <img src="images/cloud.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title mb-3"><a href="insight.php" style="color: #000;">Essentials in a Look</a></strong>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Word</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $words = $DAO->execute("SELECT * FROM tf_idf_freq ORDER BY score DESC LIMIT 30");
                            $index = 0;
                            foreach($words as $key => $value){
                                $display = true;
                                for ($i = 0; $i < count($stop_words); $i++){
                                    if($stop_words[$i] == $value["word"]){
                                        $display = false;
                                    }
                                }
                                if(is_numeric($value["word"]))
                                {
                                    $display = false;
                                }
                                if($display){
                                    $index += 1;
                                    if($index <= 10){
                                        echo '
                                    <tr>
                                        <td>'.$index.'</td>
                                        <td>'.$value["word"].'</td>
                                    </tr>
                                    ';
                                    }
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
<!--            <div class="col-xl-6">-->
<!--                <h3>Trend in One Graph</h3>-->
<!--                -->
<!--            </div>-->
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
            $(".twitter").click(function () {
                window.open("https://twitter.com/RBC", '_blank');
            });
            $(".facebook").click(function () {
                window.open("https://www.facebook.com/rbc/", '_blank');
            });
        })(jQuery);

    </script>

</body>

</html>
