<?php
session_start();
if (!isset($_SESSION['nik'])){
    header("Location: index.php");
}else{
  include('./config/konek.php');
  include('./config/base.php'); 
?>

<?php
$category = 'Karyawan';
?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Form Screening Covid-19 Visitor">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#0134d4">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags-->
    <!-- Title-->
    <title>Form Screening Covid-19 Karyawan</title>
    <!-- Fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
    <!-- Favicon-->
    <link rel="icon" href="img/core-img/favicon.ico">
    <link rel="apple-touch-icon" href="img/icons/icon-96x96.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/icons/icon-152x152.png">
    <link rel="apple-touch-icon" sizes="167x167" href="img/icons/icon-167x167.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/icons/icon-180x180.png">
    <!-- CSS Libraries-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/ion.rangeSlider.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="css/apexcharts.css">
    <!-- Core Stylesheet-->
    <link rel="stylesheet" href="style.css">
    <!-- Web App Manifest-->
    <link rel="manifest" href="manifest.json">
  </head>
  <body>
    <!-- Preloader-->
    <div class="preloader d-flex align-items-center justify-content-center" id="preloader">
      <div class="spinner-grow text-primary" role="status">
        <div class="sr-only">Loading...</div>
      </div>
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <div id="setting-popup-overlay"></div>
    <!-- Setting Popup Card-->
    <div class="card setting-popup-card shadow-lg" id="settingCard">
      <div class="card-body">           
        <div class="container">
          <div class="setting-heading d-flex align-items-center justify-content-between mb-3">
            <p class="mb-0">Settings</p><a class="btn-close" id="settingCardClose" href="#"></a>
          </div>
          <div class="single-setting-panel">
            <div class="form-check form-switch mb-2">
              <input class="form-check-input" type="checkbox" id="availabilityStatus" checked>
              <label class="form-check-label" for="availabilityStatus">Availability status</label>
            </div>
          </div>
          <div class="single-setting-panel">
            <div class="form-check form-switch mb-2">
              <input class="form-check-input" type="checkbox" id="sendMeNotifications" checked>
              <label class="form-check-label" for="sendMeNotifications">Send me notifications</label>
            </div>
          </div>
          <div class="single-setting-panel">
            <div class="form-check form-switch mb-2">
              <input class="form-check-input" type="checkbox" id="darkSwitch">
              <label class="form-check-label" for="darkSwitch">Dark mode</label>
            </div>
          </div>
          <div class="single-setting-panel">
            <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" id="rtlSwitch">
              <label class="form-check-label" for="rtlSwitch">RTL mode</label>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Header Area-->
    <div class="header-area" id="headerArea">
      <div class="container">
        <!-- Header Content-->
        <div class="header-content position-relative d-flex align-items-center justify-content-between">
          <!-- Back Button-->
          <div class="back-button"><a href="<?php echo base_url(); ?>dashboard">
            <svg width="32" height="32" viewBox="0 0 16 16" class="bi bi-arrow-left-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
            </svg></a>
          </div>


          <!-- Page Title-->
          <div class="page-heading">
            <h6 class="mb-0">Form Screening Untuk Karyawan</h6>
          </div>
          <!-- Settings-->
          <div class="setting-wrapper">
            <a class="setting-trigger-btn" id="settingTriggerBtn" href="#">
              <svg width="20" height="20" viewBox="0 0 16 16" class="bi bi-gear" fill="url(#gradientSettings)" xmlns="http://www.w3.org/2000/svg">
                <defs>
                  <linearGradient spreadMethod="pad" id="gradientSettings" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0" style="stop-color: #0134d4; stop-opacity:1;"/>
                    <stop offset="100%" style="stop-color: #28a745; stop-opacity:1;"/>
                  </linearGradient>
                </defs>
                <path fill-rule="evenodd" d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z"/>
                <path fill-rule="evenodd" d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z"/>
              </svg><span></span></a>
            </div>
        </div>
      </div>
    </div>

    <!-- page1 -->
    <div class="page-content-wrapper py-3" id="id_visitor">
      <div class="container">
        <div class="card bg-danger mb-3 shadow-sm element-card wow fadeInUp" data-wow-duration="1s">
          <div class="card-body">
            <div class="logo-wrapper" style="text-align:center">
              <a href="https://ehs.dashboardtakeda.com">
                <img src="img/core-img/ogol.png" alt="">
              </a>
            </div>
            <h2 class="text-white" style="text-align:center;font-size:19px">PT. Takeda Indonesia </h2>
            <p class="text-white mb-4" style="text-align:center;font-size:12px">Turut berperan aktif dalam upaya pencegahan penyebaran COVID-19 di area kerja. Takeda COVID-19 Screening dilakukan untuk memastikan semua orang yang ada di area Site dalam kondisi sehat. Sebelum memasuki area PT. Takeda Indonesia setiap orang WAJIB melaporkan kondisi kesehatannya dengan mengisi form ini.</p>
            <!-- <a class="btn btn-light" href="https://ehs.dashboardtakeda.com">Selengkapnya</a> -->
          </div>
        </div>
      </div>

      <?php
        // include('./config/konek.php');
        // $category = 'Contractor';

          $sql = "SELECT sv.id,sv.category,sv.title
                  FROM do_surveys sv
                  WHERE sv.category = '".$category."'
                  AND sv.status = 1
                  AND sv.id = 93
                  ORDER BY sv.id DESC LIMIT 1";
          $row = mysqli_fetch_assoc($conn->query($sql));
          $result=mysqli_query($conn,$sql);
          $rowcount=mysqli_num_rows($result);
      ?>

    <?php if($rowcount>0){ ?>
      <div class="container">
        <div class="card">
          <div class="card-body">
            <!-- Question Heading-->
            <div class="element-heading" style="margin-bottom:10px">
              <h6>Apakah Anda mengalami gejala berikut ini?</h6>
            </div>
            <!-- Header (Y / Tidak) -->
            <div class="row" style="padding: 10px 0;">
              <div class="col-md-6 quest"></div>
              <div class="col-md-3 d-flex justify-content-center quest">
                <div class="head-question">
                  <label class="form-check-label" for="Y">Ya</label>
                </div>
              </div>
              <div class="col-md-3 d-flex justify-content-center quest">
                <div class="head-question">
                  <label class="form-check-label" for="Y">Tidak</label>
                </div>
              </div>
            </div>
            <form method="POST" enctype="multipart/form-data" id="save_visitor" action="javascript:void(0)" >
              <?php

                  // echo $_SESSION['Nama'];
                  // echo $_SESSION['wfh'];
                  // exit();
                  if ($_SESSION['wfh']!='Y'){
                    $and ="AND qt.cat_risk NOT IN ('Location') ";
                  }else{
                    $and ="";
                  }

                  $id_survey = $row['id'];
                  $page_sort = 0;
                  $sql_qt = "SELECT
                          pg.title as page_nm,qt.*
                        FROM
                          do_pages pg 
                        LEFT JOIN do_questions qt on pg.survey = qt.survey and pg.id = qt.page
                        WHERE
                          pg.survey = ".$id_survey."
                          AND pg.sort = ".$page_sort."
                          AND pg.status = 1
                          AND qt.status = 1
                          ".$and."
                        ORDER BY qt.sort ASC";
                  // echo $sql_qt;
                  $data_qt = mysqli_query($conn, $sql_qt);

              foreach ($data_qt as $key_qt) {
                    if($key_qt['title'] == ''){
                      $title = $key_qt['desc'];
                    }else{
                      $title = $key_qt['title'];
                    }

                    if($key_qt['req'] == "Y") {
                      $req = 'required'; 
                    }else{ 
                      $req = '';
                    }
              ?>

              <!-- Question Body 1-->
              <div class="row" style="/* background-color: #f8f9fa; */margin-bottom:10px;padding: 10px 0;">
                <div class="col-md-6 quest">
                  <div class="form-group1">
                    <h6 style="margin-bottom:0"><?php echo $title; ?></h6>
                  </div>
                </div>

                <?php if($key_qt['type']=='radio'){ ?>
                  <?php
                    $sql_ans = "SELECT
                                  ans.*
                                FROM
                                  do_answers ans 
                                WHERE
                                  ans.survey = ".$id_survey."
                                  AND ans.page = ".$key_qt['page']."
                                  AND ans.question = ".$key_qt['id']."
                                  AND ans.status = 1
                                ORDER BY ans.id ASC";
                    $data_ans = mysqli_query($conn, $sql_ans);
                    foreach ($data_ans as $key_ans) {
                  ?>
                    <div class="col-md-3 d-flex justify-content-center quest">
                      <div class="head-question">
                        <input class="form-check-input" type="radio" name="ans_<?php echo $key_qt['type']; ?>_<?php echo $id_survey ?>_<?php echo $key_qt['page']; ?>_<?php echo $key_qt['id']; ?>" id="ans_<?php echo $key_qt['type']; ?>_<?php echo $id_survey ?>_<?php echo $key_qt['page']; ?>_<?php echo $key_qt['id']; ?>" value="<?php echo $key_ans['id']; ?>_<?php echo $key_ans['title']; ?>" <?php echo $req; ?> style="margin-top:0">
                      </div>
                    </div>
                  <?php } ?>
                <?php }elseif ($key_qt['type']=='check') { ?>
                  <div class="col-md-6">
                    <select class="form-select" id="ans_<?php echo $key_qt['type']; ?>_<?php echo $id_survey ?>_<?php echo $key_qt['page']; ?>_<?php echo $key_qt['id']; ?>" name="qt_<?php echo $key_qt['type']; ?>_<?php echo $id_survey ?>_<?php echo $key_qt['page']; ?>_<?php echo $key_qt['id']; ?>" aria-label="Default select example">
                      <?php
                        $sql_ans = "SELECT
                                      ans.*
                                    FROM
                                      do_answers ans 
                                    WHERE
                                      ans.survey = ".$id_survey."
                                      AND ans.page = ".$key_qt['page']."
                                      AND ans.question = ".$key_qt['id']."
                                      AND ans.status = 1
                                    ORDER BY ans.id ASC";
                        $data_ans = mysqli_query($conn, $sql_ans);
                        foreach ($data_ans as $key_ans) {
                      ?>
                        <option value="<?php echo $key_ans['id']; ?>_<?php echo $key_ans['title']; ?>"><?php echo $key_ans['title']; ?></option>
                      <?php } ?> 
                    </select>
                  </div>
                <?php }elseif($key_qt['type']=='date'){ ?>
                    <?php
                          $sql_ans = "SELECT a.title, a.id, a.rightAns
                                  FROM do_answers a 
                                  LEFT JOIN do_questions b ON a.question = b.id
                                  WHERE a.question = ".$key_qt['id']." and a.page = ".$key_qt['page']."
                                  ORDER BY a.id ASC";
                          // echo $sql;exit();
                          $row_ans = mysqli_fetch_assoc($conn->query($sql_ans));
                      ?>

                      <div class="col-md-6">
                        <div class="head-question">
                          <input class="form-control" type="date" name="ans_<?php echo $key_qt['type']; ?>_<?php echo $id_survey ?>_<?php echo $key_qt['page']; ?>_<?php echo $key_qt['id']; ?>_<?php echo $row_ans['id']; ?>" id="ans_<?php echo $key_qt['type']; ?>_<?php echo $id_survey ?>_<?php echo $key_qt['page']; ?>_<?php echo $key_qt['id']; ?>_<?php echo $row_ans['id']; ?>" <?php echo $req; ?> style="margin-top:0" placeholder="<?php echo $row_ans['title']; ?>"/>
                        </div>
                      </div>
                    
                <?php }else{ ?>
                  <?php
                      $sql_ans = "SELECT a.title, a.id, a.rightAns
                                  FROM do_answers a 
                                  LEFT JOIN do_questions b ON a.question = b.id
                                  WHERE a.question = ".$key_qt['id']." and a.page = ".$key_qt['page']."
                                  ORDER BY a.id ASC";
                      // echo $sql;exit();
                      $row_ans = mysqli_fetch_assoc($conn->query($sql_ans));
                  ?>
                  <div class="col-md-6">
                    <div class="head-question">
                      <input class="form-control" type="text" name="ans_<?php echo $key_qt['type']; ?>_<?php echo $id_survey ?>_<?php echo $key_qt['page']; ?>_<?php echo $key_qt['id']; ?>_<?php echo $row_ans['id']; ?>" id="ans_<?php echo $key_qt['type']; ?>_<?php echo $id_survey ?>_<?php echo $key_qt['page']; ?>_<?php echo $key_qt['id']; ?>_<?php echo $row_ans['id']; ?>" <?php echo $req; ?> style="margin-top:0" placeholder="<?php echo $row_ans['title']; ?>"/>
                    </div>
                  </div>
                <?php } ?>
              </div>

              <?php } ?>


              
              <!-- <a href="visitor_id3"> -->
                <button class="btn btn-primary w-100 d-flex align-items-center justify-content-center" type="submit" >Selanjutnya
                  <svg width="24" height="24" viewBox="0 0 16 16" class="bi bi-arrow-right-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                  </svg>
                </button>
              <!-- </a> -->
            </form>
          </div>
        </div>
      </div>
        
    <?php }else{ ?>
      <div class="container">
        <div class="card">
          <div class="card-header" style="padding:1.5rem">
              <div class="element-heading">
                <h6 style="color:#4f4e56">Pertanyaan belum tersedia</h6>
              </div>
          </div>
        </div>
      </div>
    <?php } ?>
    </div>

    <!-- page3 -->
    <div class="page-content-wrapper py-3" id="id_visitor2" style="display: none;">
      <div class="container">
        <div class="card bg-danger mb-3 shadow-sm element-card wow fadeInUp" data-wow-duration="1s">
          <div class="card-body">
            <div class="logo-wrapper" style="text-align:center">
              <a href="https://ehs.dashboardtakeda.com/">
                <img src="img/core-img/ogol.png" alt="">
              </a>
            </div>
            <h2 class="text-white" style="text-align:center;font-size:19px">PT. Takeda Indonesia </h2>
            <p class="text-white mb-4" style="text-align:center;font-size:12px">Turut berperan aktif dalam upaya pencegahan penyebaran COVID-19 di area kerja. Takeda COVID-19 Screening dilakukan untuk memastikan semua orang yang ada di area Site dalam kondisi sehat. Sebelum memasuki area PT. Takeda Indonesia setiap orang WAJIB melaporkan kondisi kesehatannya dengan mengisi form ini.</p>
            <!-- <a class="btn btn-light" href="https://ehs.dashboardtakeda.com/">Selengkapnya</a> -->
          </div>
        </div>
      </div>

      <?php
          $sql = "SELECT sv.id,sv.category,sv.title
                  FROM do_surveys sv
                  WHERE sv.category = '".$category."'
                  AND sv.status = 1
                  AND sv.id = 93
                  ORDER BY sv.id DESC LIMIT 1";
          $row = mysqli_fetch_assoc($conn->query($sql));
          $result=mysqli_query($conn,$sql);
          $rowcount=mysqli_num_rows($result);
      ?>

    <?php if($rowcount>0){ ?>
      <div class="container">
        <div class="card">
          <div class="card-body">
            <form method="POST" enctype="multipart/form-data" id="save_visitor2" action="javascript:void(0)" >
          <?php
            $id_survey = $row['id'];
            $page_sort = 1;
            $sql_qt = "SELECT
                    pg.title as page_nm,qt.*
                  FROM
                    do_pages pg 
                  LEFT JOIN do_questions qt on pg.survey = qt.survey and pg.id = qt.page
                  WHERE
                    pg.survey = ".$id_survey."
                    AND pg.sort = ".$page_sort."
                    AND pg.status = 1
                    AND qt.status = 1
                  ORDER BY qt.sort ASC";
            $data_qt = mysqli_query($conn, $sql_qt);

            foreach ($data_qt as $key_qt) {
                  if($key_qt['title'] == ''){
                    $title = $key_qt['desc'];
                  }else{
                    $title = $key_qt['title'];
                  }

                  if($key_qt['req'] == "Y") {
                    $req = 'required'; 
                  }else{ 
                    $req = '';
                  }
            ?>
            <?php if($key_qt['type']=='image'){ ?>
              <?php
                  $sql_ans = "SELECT a.title, a.id, a.rightAns
                              FROM do_answers a 
                              LEFT JOIN do_questions b ON a.question = b.id
                              WHERE a.question = ".$key_qt['id']." and a.page = ".$key_qt['page']."
                              ORDER BY a.id ASC";
                  // echo $sql;exit();
                  $row_ans = mysqli_fetch_assoc($conn->query($sql_ans));
              ?>
              <!-- Ambil Foto -->
              
              <div class="form-group">
                <div class="file-upload-card">
                  <svg width="50" height="50" viewBox="0 0 20 20" class="bi bi-file-earmark-arrow-up text-primary" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10,6.536c-2.263,0-4.099,1.836-4.099,4.098S7.737,14.732,10,14.732s4.099-1.836,4.099-4.098S12.263,6.536,10,6.536M10,13.871c-1.784,0-3.235-1.453-3.235-3.237S8.216,7.399,10,7.399c1.784,0,3.235,1.452,3.235,3.235S11.784,13.871,10,13.871M17.118,5.672l-3.237,0.014L12.52,3.697c-0.082-0.105-0.209-0.168-0.343-0.168H7.824c-0.134,0-0.261,0.062-0.343,0.168L6.12,5.686H2.882c-0.951,0-1.726,0.748-1.726,1.699v7.362c0,0.951,0.774,1.725,1.726,1.725h14.236c0.951,0,1.726-0.773,1.726-1.725V7.195C18.844,6.244,18.069,5.672,17.118,5.672 M17.98,14.746c0,0.477-0.386,0.861-0.862,0.861H2.882c-0.477,0-0.863-0.385-0.863-0.861V7.384c0-0.477,0.386-0.85,0.863-0.85l3.451,0.014c0.134,0,0.261-0.062,0.343-0.168l1.361-1.989h3.926l1.361,1.989c0.082,0.105,0.209,0.168,0.343,0.168l3.451-0.014c0.477,0,0.862,0.184,0.862,0.661V14.746z"></path>
                  </svg>
                  <h5 class="mt-2 mb-4"><?php echo $title; ?></h5>
                  <!-- <form method="POST" enctype="multipart/form-data" id="save_visitor3" action="javascript:void(0)" > -->
                    <div class="form-file">
                      <input class="form-control d-none" name="ans_<?php echo $id_survey ?>_<?php echo $key_qt['page']; ?>_<?php echo $key_qt['id']; ?>" id="customFile" type="file" accept="image/*" capture="environment" <?php echo $req; ?>>
                      <label class="form-file-label justify-content-center" for="customFile">
                        <span class="form-file-button btn btn-primary shadow w-100" id="id_get_file">Klik Disini</span> 
                        <span class="form-file-button btn btn-primary shadow w-100" id="id_loading" style="display: none;">loading ... </span>
                      </label>
                    </div>
                    
                  <!-- </form> -->
                </div>
              </div>

            <?php } ?>
            <?php } ?>

              <button class="btn btn-primary w-100 d-flex align-items-center justify-content-center" type="submit" id=>
                      Kirim
              </button>

              <!-- <a href="https://ehs.dashboardtakeda.com/"> -->
                <!-- <button class="btn btn-primary w-100 d-flex align-items-center justify-content-center" type="button" onclick="btn_save_visitor3()" >
                  Kirim
                </button> -->
              <!-- </a> -->
            </form>
          </div>
        </div>
      </div>
    <?php }else{ ?>
      <div class="container">
        <div class="card">
          <div class="card-header" style="padding:1.5rem">
              <div class="element-heading">
                <h6 style="color:#4f4e56">Pertanyaan belum tersedia</h6>
              </div>
          </div>
        </div>
      </div>
    <?php } ?>
    </div>
    <!-- Footer Nav-->
    <div class="footer-nav-area" id="footerNav">
      <div class="container px-0">
        <!-- Paste your Footer Content from here-->
        <!-- Footer Content-->
        <div class="footer-nav position-relative">
          <ul class="h-100 d-flex align-items-center justify-content-between ps-0">
            <li class="active"><a href="<?php echo base_url(); ?>dashboard">
              <svg width="20" height="20" viewBox="0 0 16 16" class="bi bi-house" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
          <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
        </svg><span>Home</span></a>
      </li>
            <li><a href="https://api.whatsapp.com/send/?phone=6285697391854&text=Halo+Admin%21+Saya+ingin+tanya+seputar+PIKOBAR&app_absent=0">
              <svg width="20" height="20" viewBox="0 0 16 16" class="bi bi-collection" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M14.5 13.5h-13A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5zm-13 1A1.5 1.5 0 0 1 0 13V6a1.5 1.5 0 0 1 1.5-1.5h13A1.5 1.5 0 0 1 16 6v7a1.5 1.5 0 0 1-1.5 1.5h-13zM2 3a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11A.5.5 0 0 0 2 3zm2-2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7A.5.5 0 0 0 4 1z"/>
        </svg><span></span>Chat Pikobar</a>
      </li>
            <li><a href="https://pikobar.jabarprov.go.id/distribution-case">
              <svg width="20" height="20" viewBox="0 0 16 16" class="bi bi-folder2-open" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M1 3.5A1.5 1.5 0 0 1 2.5 2h2.764c.958 0 1.76.56 2.311 1.184C7.985 3.648 8.48 4 9 4h4.5A1.5 1.5 0 0 1 15 5.5v.64c.57.265.94.876.856 1.546l-.64 5.124A2.5 2.5 0 0 1 12.733 15H3.266a2.5 2.5 0 0 1-2.481-2.19l-.64-5.124A1.5 1.5 0 0 1 1 6.14V3.5zM2 6h12v-.5a.5.5 0 0 0-.5-.5H9c-.964 0-1.71-.629-2.174-1.154C6.374 3.334 5.82 3 5.264 3H2.5a.5.5 0 0 0-.5.5V6zm-.367 1a.5.5 0 0 0-.496.562l.64 5.124A1.5 1.5 0 0 0 3.266 14h9.468a1.5 1.5 0 0 0 1.489-1.314l.64-5.124A.5.5 0 0 0 14.367 7H1.633z"/>
        </svg><span>Data Sebaran Covid-19</span></a>
      </li>
            <li><a href="<?php echo base_url(); ?>blog">
              <svg width="20" height="20" viewBox="0 0 16 16" class="bi bi-gear" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z"/>
          <path fill-rule="evenodd" d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z"/>
        </svg><span>Informasi</span></a>
      </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- All JavaScript Files-->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/default/internet-status.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/default/dark-mode-switch.js"></script>
    <script src="js/ion.rangeSlider.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/default/active.js"></script>
    <script src="js/default/clipboard.js"></script>
    <!-- PWA-->
    <script src="js/pwa.js"></script>
    <script src="sweetalert/dist/sweetalert.min.js"></script>
  </body>
</html>

<style>
  .swal-icon img {
    max-width:30%;
  }
</style>

<script type="text/javascript">
  String.prototype.escapeSpecialChars = function() {
    return this.replace(/\\n/g, "\\n")
               .replace(/\\'/g, "\\'")
               .replace(/\\"/g, '\\"')
               .replace(/\\&/g, "\\&")
               .replace(/\\r/g, "\\r")
               .replace(/\\t/g, "\\t")
               .replace(/\\b/g, "\\b")
               .replace(/\\f/g, "\\f");
  };

  $(document).ready(function (e) {

        $('#save_visitor').submit(function(e) {
            e.preventDefault();

            $("#id_visitor").hide();
            $("#id_visitor2").show();

        });

        $('#save_visitor2').submit(function(e) {
            e.preventDefault();
            var dataString = $("#save_visitor, #save_visitor2").serialize();
            var data_form = JSON.stringify(dataString);
            var data_form = data_form.escapeSpecialChars();

            $.ajax({
                type:'POST',
                url: 'employee_id_save.php',
                // data: {data:JSON.stringify(data_form)},
                data: {data:data_form},
                dataType  : "JSON",
                beforeSend: function(){
                },
                success: (data) => {
                    if(data.respon == 'SUKSES'){
                      // $("#id_html").load("visitor_id2_new.php?idResponse="+data.idResponse);
                      // $("#id_html").load("visitor_id2_new.php?idResponse="+formData);

                      var formData = new FormData(this);
                      // console.log(formData)

                      $.ajax({
                        method     : "POST",
                        dataType : "JSON",
                        url       : 'employee_id_save_picture.php',
                        data        : formData,
                        processData : false,
                        contentType : false,
                        cache       : false,
                        beforeSend: function(){
                          $("#id_get_file").hide();
                          $("#id_loading").show();
                        },
                        success: function(data_detail) {

                          swal({
                              icon: data_detail.img,
                              title: data_detail.judgement,
                              // text: data_detail.legend,
                              text: data_detail.rating_risk,
                              customClass: 'swal-icon img',
                              type: "success"
                          }).then(function() {
                              window.location = "<?php echo base_url(); ?>dashboard";
                          });

                        },    
                        error: function() {
                        
                        },
                        complete: function(){
                        },
                      });
                      
                    }
                },
                error: function(data){
                    console.log(data);
                }
            });
        });    

    });

  
</script>

<?php } ?>