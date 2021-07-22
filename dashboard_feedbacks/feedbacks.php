<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Just4Camper</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.1/chart.min.js" integrity="sha512-5vwN8yor2fFT9pgPS9p9R7AszYaNn0LkQElTXIsZFCL7ucT8zDCAqlQXDdaqgA1mZP47hdvztBMsIoFxq/FyyQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('memory_limit', '1024M');
ini_set('max_execution_time', '5000');


try {
    $bdd = new PDO('mysql:host=localhost;dbname=;charset=utf8', '', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

if (!isset($_GET["colonne"])) {
    $_GET["colonne"] = '';
} else {
    $_GET["colonne"] = ' order by ' . $_GET["colonne"];
}
if (!isset($_GET["valeur"])) {
    $_GET["valeur"] = '';
}

$questionsrequest = $bdd->query("select resolution,count(idFeedBack) 
  from survey_feedbacks
  group by resolution
order by count(idFeedBack) desc
limit 20");
$tableau_resolution  = $questionsrequest->fetchAll(PDO::FETCH_ASSOC);


$questionsrequest = $bdd->query("SELECT count(*) FROM `survey_feedbacks` ");
$total_entre = $questionsrequest->fetch(PDO::FETCH_ASSOC);

$debutsemaine = date('w');

//this week
$questionsrequest = $bdd->query("SELECT count(idFeedBack)
  FROM `survey_feedbacks` 
  WHERE date_creation 
  > date(now())");
$countEntrerThisWeek = $questionsrequest->fetchAll(PDO::FETCH_ASSOC);


//1 week ago
$questionsrequest = $bdd->query('SELECT count(idFeedBack) FROM `survey_feedbacks` 
  WHERE date_creation between 
  date(subdate(now(),7+' . $debutsemaine . ')) and date(subdate(now(),' . $debutsemaine . '))');
$countEntrer1WeekAgo = $questionsrequest->fetchAll(PDO::FETCH_ASSOC);


//2 week ago
$questionsrequest = $bdd->query('SELECT count(idFeedBack) FROM `survey_feedbacks` 
  WHERE date_creation between 
  date(subdate(now(),14+' . $debutsemaine . ')) and date(subdate(now(),7+' . $debutsemaine . '))');
$countEntrer2WeekAgo = $questionsrequest->fetchAll(PDO::FETCH_ASSOC);

//3 week ago
$questionsrequest = $bdd->query('SELECT count(idFeedBack) FROM `survey_feedbacks` 
  WHERE date_creation between 
  date(subdate(now(),21+' . $debutsemaine . ')) and date(subdate(now(),14+' . $debutsemaine . '))');
$countEntrer3WeekAgo = $questionsrequest->fetchAll(PDO::FETCH_ASSOC);

//4 week ago
$questionsrequest = $bdd->query('SELECT count(idFeedBack) FROM `survey_feedbacks` 
  WHERE date_creation between 
  date(subdate(now(),28+' . $debutsemaine . ')) and date(subdate(now(),21+' . $debutsemaine . '))');
$countEntrer4WeekAgo = $questionsrequest->fetchAll(PDO::FETCH_ASSOC);

//5 week ago
$questionsrequest = $bdd->query('SELECT count(idFeedBack) FROM `survey_feedbacks` 
  WHERE date_creation between 
  date(subdate(now(),35+' . $debutsemaine . ')) and date(subdate(now(),28+' . $debutsemaine . '))');
$countEntrer5WeekAgo = $questionsrequest->fetchAll(PDO::FETCH_ASSOC);

//6 week ago
$questionsrequest = $bdd->query('SELECT count(idFeedBack) FROM `survey_feedbacks` 
  WHERE date_creation between 
  date(subdate(now(),42+' . $debutsemaine . ')) and date(subdate(now(),35+' . $debutsemaine . '))');
$countEntrer6WeekAgo = $questionsrequest->fetchAll(PDO::FETCH_ASSOC);

//7 week ago
$questionsrequest = $bdd->query('SELECT count(idFeedBack) FROM `survey_feedbacks` 
  WHERE date_creation between 
  date(subdate(now(),49+' . $debutsemaine . ')) and date(subdate(now(),42+' . $debutsemaine . '))');
$countEntrer7WeekAgo = $questionsrequest->fetchAll(PDO::FETCH_ASSOC);

//8 week ago
$questionsrequest = $bdd->query('SELECT count(idFeedBack) FROM `survey_feedbacks` 
  WHERE date_creation between 
  date(subdate(now(),56+' . $debutsemaine . ')) and date(subdate(now(),49+' . $debutsemaine . '))');
$countEntrer8WeekAgo = $questionsrequest->fetchAll(PDO::FETCH_ASSOC);

//9 week ago
$questionsrequest = $bdd->query('SELECT count(idFeedBack) FROM `survey_feedbacks` 
  WHERE date_creation between 
  date(subdate(now(),63+' . $debutsemaine . ')) and date(subdate(now(),56+' . $debutsemaine . '))');
$countEntrer9WeekAgo = $questionsrequest->fetchAll(PDO::FETCH_ASSOC);


//Url depart
$questionsrequest = $bdd->query('select count(idFeedBack),url_depart 
from survey_feedbacks
group by url_depart
order by count(idfeedback) desc
limit 10');
$url_depart = $questionsrequest->fetchAll(PDO::FETCH_ASSOC);
$total_entre10 = 0;
foreach ($url_depart as $compteur) {

    $total_entre10 += $compteur["count(idFeedBack)"];
}

//Tableau Recapitulatif
$questionsrequest = $bdd->query('select *
from survey_feedbacks');
$tableau_recapitulatif = $questionsrequest->fetchAll(PDO::FETCH_ASSOC);




?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="img/logo.jpg" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>


            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">

                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>



                <li class="nav-item">

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php" role="button">
                        <img src="img/logout.png" width="20px" alt="logout">
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index.php" class="brand-link">
                <img src="img/logo.jpg" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Just4Camper</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                        <li class="nav-item">
                            <a href="https://stats.just4camper.fr/dashboard_feedbacks/feedbacks.php" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Analyse Feedbacks

                                </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="https://stats.just4camper.fr/dashboard_feedbacks/bug.php" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Analyse Bugs Reports

                                </p>
                            </a>
                        </li>


                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            <!-- /.content-header -->


            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-12 connectedSortable">


                <h2 class="m-1">Analyse des Feedbacks</h2>

                <br>
                <div class="row">



                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Analyse des Résolutions d'écrans :</h3>
                            </div>
                            <!--  TABLEAU RESOLUTION ECRAN -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th>Résolution</th>
                                            <th>Nombre</th>
                                            <th>Pourcentage</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($tableau_resolution as $rows) {
                                        ?>
                                            <tr style="text-align:center">
                                                <td><?php echo $rows["resolution"]; ?></td>
                                                <td><?php echo $rows["count(idFeedBack)"]; ?></td>

                                                <td>
                                                    <?php

                                                    echo $pourcentage = round($rows["count(idFeedBack)"] * 100 / $total_entre["count(*)"]) . " %"



                                                    ?>
                                                </td>


                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>


                    <!-- GRAPHIQUE BATON PAR SEMAINE -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Analyse des Entrées pas semaines :</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <canvas id="baton_date" width="500" height="400"></canvas>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>



                    <!-- TABLEAU TOP 10 URL DEPART -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Top 10 des Url de départ :</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr style="text-align: center;">

                                            <th>Nombre</th>
                                            <th>Pourcentage</th>
                                            <th>URL de Départ</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($url_depart as $entry) {
                                        ?>
                                            <tr style="text-align:center">
                                                <td><?php echo $entry["count(idFeedBack)"]; ?></td>
                                                <td><?php echo $pourcentage = round($entry["count(idFeedBack)"] * 100 / $total_entre10) . " %";   ?></td>
                                                <td><?php echo $entry["url_depart"]; ?></td>




                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>


                    <!-- TABLEAU RECAPITULATIF -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Affichage de toutes les entrées :</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table id="tableau_recap" class="table table-striped">
                                    <thead>
                                        <tr style="text-align: center;">

                                            <th>Score /5</th>
                                            <th>Satisfait ?</th>
                                            <th>Reflexion</th>
                                            <th>Nom</th>
                                            <th>Email</th>
                                            <th>Téléphone</th>
                                            <th>Résolution</th>
                                            <th>Naviguateur</th>
                                            <th>IP</th>
                                            <th>URL de Depart</th>
                                            <th>Date de création</th>



                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($tableau_recapitulatif as $entry2) {
                                        ?>
                                            <tr style='text-align:center;'>
                                                <td <?php
                                                    switch ($entry2["score"]) {
                                                        case 1:
                                                            echo "style='text-align:center;background-color:#FF0000;width:5px;'";
                                                            break;
                                                        case 2:
                                                            echo "style='text-align:center;background-color:#FF7800;width:5px;'";
                                                            break;
                                                        case 3:
                                                            echo "style='text-align:center;background-color:#E0E61B;width:5px;'";
                                                            break;
                                                        case 4:
                                                            echo "style='text-align:center;background-color:#36AE21;width:5px;'";
                                                            break;
                                                        case 5:
                                                            echo "style='text-align:center;background-color:#39F019;width:5px;'";
                                                            break;
                                                    } ?>><?php echo $entry2["score"]; ?></td>
                                                <td><?php echo $entry2["find"];   ?></td>
                                                <td><?php echo substr($entry2["texte"],0,40); ?></td>
                                                <td><?php echo $entry2["nom"]; ?></td>
                                                <td><?php echo $entry2["mail"];   ?></td>
                                                <td><?php echo $entry2["tel"]; ?></td>
                                                <td><?php echo $entry2["resolution"]; ?></td>
                                                <td><?php echo substr($entry2["navigateur"], 0, 12) . "...";   ?></td>
                                                <td><?php echo $entry2["ip"]; ?></td>
                                                <td><?php echo substr($entry2["url_depart"], 26); ?></td>
                                                <td><?php echo substr($entry2["date_creation"], 0, 10);   ?></td>





                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>


                    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->


        <script type="text/javascript" src="DataTables/datatables.min.js"></script>

        <script>
          jQuery(document).ready(function($) {
            $('#tableau_recap').DataTable({
              "iDisplayLength": '10',
              "lengthMenu": [
                [5, 10, 15, 20, 25, 50, 999999999999],
                ["Afficher 5 produits", "Afficher 10 produits", "Afficher 15 produits", "Afficher 20 produits", "Afficher 25 produits", "Afficher 50 produits", "Afficher tous les produits"]
              ],
              "order": [
                [0, "desc"]
              ],
              "language": {
                "sProcessing": "Traitement en cours...",
                "sSearch": "Rechercher&nbsp;:",
                "sLengthMenu": "_MENU_",
                "sInfo": "Affichage du produits _START_ &agrave; _END_ sur _TOTAL_ produits",
                "sInfoEmpty": "Affichage du produits 0 &agrave; 0 sur 0 produits",
                "sInfoFiltered": "(filtr&eacute; de _MAX_ produits au total)",
                "sInfoPostFix": "",
                "sLoadingRecords": "Chargement en cours...",
                "sZeroRecords": "Aucun produits &agrave; afficher",
                "sEmptyTable": "Aucune donn&eacute;e disponible dans le tableau",
                "oPaginate": {
                  "sFirst": "Premier",
                  "sPrevious": "Pr&eacute;c&eacute;dent",
                  "sNext": "Suivant",
                  "sLast": "Dernier"
                },
                "oAria": {
                  "sSortAscending": ": activer pour trier la colonne par ordre croissant",
                  "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
                },
              }
            });
          });
        </script>


<script>
                    $(document).ready(function() {
                    $('#tableau_recap').DataTable();
                    } );
</script>



                </div>

                <!-- SUITE GRAPHIQUE BATON PAR SEMAINE -->
                <script>
                    /******************************************************  Graphique Baton date ******************************************************/
                    var ctx = document.getElementById('baton_date').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['9 Days Ago', 'Today -8', 'Today -7', 'Today -6', 'Today -5', 'Today -4', 'Today -3', 'Today -2', 'Today -1', 'Today'],
                            datasets: [{

                                data: [
                                    <?php echo $countEntrer9WeekAgo[0]["count(idFeedBack)"]; ?>,
                                    <?php echo $countEntrer8WeekAgo[0]["count(idFeedBack)"] ?>,
                                    <?php echo $countEntrer7WeekAgo[0]["count(idFeedBack)"] ?>,
                                    <?php echo $countEntrer6WeekAgo[0]["count(idFeedBack)"] ?>,
                                    <?php echo $countEntrer5WeekAgo[0]["count(idFeedBack)"]; ?>,
                                    <?php echo $countEntrer4WeekAgo[0]["count(idFeedBack)"]; ?>,
                                    <?php echo $countEntrer3WeekAgo[0]["count(idFeedBack)"]; ?>,
                                    <?php echo $countEntrer2WeekAgo[0]["count(idFeedBack)"] ?>,
                                    <?php echo $countEntrer1WeekAgo[0]["count(idFeedBack)"]; ?>,
                                    <?php echo $countEntrerThisWeek[0]["count(idFeedBack)"] ?>


                                ],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(255, 99, 132, 0.2)',


                                ],
                                label: "Inscrit",
                                borderColor: [

                                    'rgba(255, 99, 132, 1)',
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(255, 99, 132,1)',
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(255, 99, 132,1)',
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(255, 99, 132,1)',

                                ],
                                borderWidth: 1
                            }, ],


                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                </script>




        </div>




        <!-- Control Sidebar -->

        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
</body>

</html>
