<?php
include 'function/core.php';  //include_once 'function/core.php';
$hdr = select('nama_kehadiran, warna', 'tbl_kehadiran');

$cekmgg = date("d");
$xyz = $cekmgg%2;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SMP Negri 98 Jakarta</title>
  </head>
  <link rel="stylesheet" href="<?= base('assets/css/admin.css'); ?>" media="screen" title="no title">
  <link rel="stylesheet" href="<?= base('assets/css/style.css'); ?>" media="screen" title="no title">
  <link rel="stylesheet" href="<?= base('assets/css/bootstrap.css'); ?>" media="screen" title="no title">
  <link rel="stylesheet" href="<?= base('assets/dataTables/css/dataTables.bootstrap.css'); ?>" media="screen" title="no title">
  <link rel="stylesheet" href="<?= base('assets/jquery.simplyscroll/jquery.simplyscroll.css'); ?>" media="screen" title="no title">
  <link rel="shrotcut icon" href="images/logo_dikbud.png">
  <script type="text/javascript" src="<?= base('assets/js/jquery.js'); ?>"></script>
  <script type="text/javascript" src="<?= base('assets/js/bootstrap.min.js'); ?>"></script>
  <script type="text/javascript" src="<?= base('assets/dataTables/js/jquery.dataTables.min.js'); ?>"></script>
  <script type="text/javascript" src="<?= base('assets/dataTables/js/dataTables.bootstrap.js'); ?>"></script>
  <script type="text/javascript" src="<?= base('assets/js/loader.js'); ?>"></script>
  <!--<script type="text/javascript" src="<?= base('assets/jquery.simplyscroll/jquery.simplyscroll.min.js'); ?>"></script>-->
  <script type="text/javascript">
    $(document).ready(function() {  
      /*$("#scroller").simplyScroll({
        customClass: 'simply-scroll',
        frameRate: 15,
        speed: 10,
        pauseOnHover: false,
        orientation:'vertical',
        customClass:'vert'
      });
    });*/

    $("#list-data").dataTable({
        'pageLength' : 5,
        'oLanguage':{
          "sZeroRecords":'Tidak ada data!'
        }
      });
      $(".data-utama").mouseenter(function(){
        $(".menu-data").css({
          'display':'block'
        });
      });
      $(".data-nilai").mouseenter(function(){
        $(".menu-nilai").css({
          'display':'block'
        });
      });
      $(".data-mapel").mouseenter(function(){
        $(".menu-mapel").css({
          'display':'block'
        });
      });
      $(".dropdown").mouseleave(function(){
        $(".dropdown-menu").slideUp(800);
      });
      $(".dropdown-menu > li > a").mouseenter(function(){
        $(this).css({'background':'#337ab7','color':'#fff'});
      });
      $(".dropdown-menu > li > a").mouseleave(function(){
        $(this).css({'background':'#fff','color':'#111'});
      });
    });
  </script>
  <body style="background:url('images/pattern.png');background-attachment:fixed;">
  <nav class="navbar navbar-default navbar-fixed-top" style="background:#428bca !important;color:#fff !important;box-shadow: 0px 0px 5px #222;">
      <div class="container">
        <div class="navbar-header">
          <a href="#" class="navbar-brand"><img src="images/main-logo2.png" width="175px" alt="" class="img img-responsive"></a>
        </div> <!-- end of class navbar-header -->
        <div class="collapse navbar-collapse navbar-right">
          <ul class="nav navbar-nav">
            <li>
              <h4 style="padding-top:7px;margin-right:280px;">
                <?php
                $hari = date('w');
                $tgl	= date('Y-m-d');
                echo hari($hari).', '.tglskrg($tgl); ?>
              </h4>
            </li>
          </ul>
        </div> <!-- end of class collapse -->
      </div> <!-- end of class container -->
  </nav>
    <nav class="navbar navbar-second navbar-fixed-top" style="margin-top:50px;">
      <div class="container">
        <div class="row">
          <div class="collapse navbar-collapse navbar-left">
            <ul class="nav navbar-nav">
              <li class="dropdown data-utama">
                <a class="dropdown-toggle primary" id="dropdown" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span>&nbsp;Login<span class="caret"></span> </a>
                <ul class="dropdown-menu menu-data">
                  <li><a href="<?= base('admin/login'); ?>">Admin/Operator</a></li>
                  <li><a href="<?= base('guru/login'); ?>">Guru</a></li>
                  <li><a href="<?= base(''); ?>">Siswa</a></li>
                </ul>
              </li>
              <li><a href="<?= base('#'); ?>">Visi dan Misi</a></li>
              <li><a href="<?= base('#'); ?>">Kontak Kami</a></li>  
            </ul>
          </div>
        </div> <!-- end of class row -->
      </div> <!-- end of class container -->
    </nav>
    <br/>
    <br/>
    <div class="container-fluid" id="main-content">
        <div class="row">
          <?php
            /*if ($xyz == 1) {
              echo "<audio loop autoplay><source src='music/mars.mp3'></audio>";
            } else {
              echo "<audio loop autoplay><source src='music/hymne.mp3'></audio>";
            }*/
          ?>
          <div class="col-md-9" style="background-image: url('images/pattern.png') !important;padding-right: 0px;padding-left: 5px;">
          <!--<div class="img-header">-->
            <img src="images/gambar-smp.png" width="1190px" height="300px" class="img img-responsive">
          <!--</div> end of class navbar-header --> 
          <br/>
          <br/>
            <div class="panel panel-primary">
            <div class="panel-heading">
                Artikel
              </div>
              <div class="panel-body">
                <?php
                  $atc = select('*','tbl_lain2', "id=1");
                  $p = mysqli_fetch_assoc($atc);
                  echo $p['isiart'];
                ?>
              </div> <!-- end of class panel-body -->
            </div> <!-- end of class panel-primary -->
            <hr>
          </div>
          <div class="col-md-3" style="padding-right: 5px;">
            <div class="panel panel-primary">
              <div class="panel-heading">
                Pengumuman
              </div>
              <div class="panel-body">
                <?php
                  $annc = select('*','tbl_lain', "id=1 LIMIT 1");
                  $p = mysqli_fetch_assoc($annc);
                  echo $p['isi'];
                ?>
              </div> <!-- end of class panel-body -->
            </div> <!-- end of class panel-primary -->
            <hr>
          </div> <!-- end of class col-md-3 -->
        </div> <!-- end of class row -->
    </div> <!-- end of class container or ID main-content -->

<?php 
echo "<br/>";
echo "<br/>";
include_once 'templates/footer.php'; ?>
