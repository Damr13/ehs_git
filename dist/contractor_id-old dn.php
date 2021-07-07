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
    <title>Form Screening Covid-19 Contractor</title>
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
          <div class="back-button"><a href="https://ehs.dashboardtakeda.com/"><svg width="32" height="32" viewBox="0 0 16 16" class="bi bi-arrow-left-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
</svg></a></div>
          <!-- Page Title-->
          <div class="page-heading">
            <h6 class="mb-0">Form Screening Untuk Kontraktor</h6>
          </div>
          <!-- Settings-->
          <div class="setting-wrapper"><a class="setting-trigger-btn" id="settingTriggerBtn" href="#"><svg width="20" height="20" viewBox="0 0 16 16" class="bi bi-gear" fill="url(#gradientSettings)" xmlns="http://www.w3.org/2000/svg">
<defs>
<linearGradient spreadMethod="pad" id="gradientSettings" x1="0%" y1="0%" x2="100%" y2="100%">
<stop offset="0" style="stop-color: #0134d4; stop-opacity:1;"/>
<stop offset="100%" style="stop-color: #28a745; stop-opacity:1;"/>
</linearGradient>
</defs>
<path fill-rule="evenodd" d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z"/>
<path fill-rule="evenodd" d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z"/>
</svg><span></span></a></div>
        </div>
      </div>
    </div>
    <div class="page-content-wrapper py-3">
      <div class="container">
        <!-- Element Heading-->
        <div class="element-heading">
          <h6></h6>
          <div class="codeview-wrapper shadow-sm"><a class="clipboard-btn" href="#"></a>
            <pre class="html-code"><code><span class="comment">&lt;!-- Input Text --&gt;</span><span class="code">&lt;div class=&quot;form-group&quot;&gt;<span class="code">&lt;label class=&quot;form-label&quot; for=&quot;exampleInputText&quot;&gt;Input text&lt;/label&gt;</span><span class="code">&lt;input class=&quot;form-control&quot; id=&quot;exampleInputText&quot; type=&quot;text&quot; placeholder=&quot;Designing World&quot;&gt;</span></span><span class="code">&lt;/div&gt;</span><span class="comment">&lt;!-- Input Email --&gt;</span><span class="code">&lt;div class=&quot;form-group&quot;&gt;<span class="code">&lt;label class=&quot;form-label&quot; for=&quot;exampleInputemail&quot;&gt;Input email&lt;/label&gt;</span><span class="code">&lt;input class=&quot;form-control&quot; id=&quot;exampleInputemail&quot; type=&quot;email&quot; placeholder=&quot;care.designingworld@gmail.com&quot;&gt;</span></span><span class="code">&lt;/div&gt;</span><span class="comment">&lt;!-- Input Password --&gt;</span><span class="code">&lt;div class=&quot;form-group&quot;&gt;<span class="code">&lt;label class=&quot;form-label&quot; for=&quot;exampleInputpassword&quot;&gt;Input password&lt;/label&gt;</span><span class="code">&lt;input class=&quot;form-control&quot; id=&quot;exampleInputpassword&quot; type=&quot;password&quot;&gt;</span></span><span class="code">&lt;/div&gt;</span><span class="comment">&lt;!-- Input Number --&gt;</span><span class="code">&lt;div class=&quot;form-group&quot;&gt;<span class="code">&lt;label class=&quot;form-label&quot; for=&quot;exampleInputnumber&quot;&gt;Input number&lt;/label&gt;</span><span class="code">&lt;input class=&quot;form-control&quot; id=&quot;exampleInputnumber&quot; type=&quot;number&quot; placeholder=&quot;12&quot;&gt;</span></span><span class="code">&lt;/div&gt;</span><span class="comment">&lt;!-- Input Phone --&gt;</span><span class="code">&lt;div class=&quot;form-group&quot;&gt;<span class="code">&lt;label class=&quot;form-label&quot; for=&quot;exampleInputtelephone&quot;&gt;Input telephone&lt;/label&gt;</span><span class="code">&lt;input class=&quot;form-control&quot; id=&quot;exampleInputtelephone&quot; type=&quot;tel&quot; placeholder=&quot;+880 123 456 7890&quot;&gt;</span></span><span class="code">&lt;/div&gt;</span><span class="comment">&lt;!-- Input URL --&gt;</span><span class="code">&lt;div class=&quot;form-group&quot;&gt;<span class="code">&lt;label class=&quot;form-label&quot; for=&quot;exampleInputurl&quot;&gt;Input url&lt;/label&gt;</span><span class="code">&lt;input class=&quot;form-control&quot; id=&quot;exampleInputurl&quot; type=&quot;url&quot; placeholder=&quot;https://themeforest.net/user/designing-world&quot;&gt;</span></span><span class="code">&lt;/div&gt;</span><span class="comment">&lt;!-- Readonly Input --&gt;</span><span class="code">&lt;div class=&quot;form-group&quot;&gt;<span class="code">&lt;label class=&quot;form-label&quot; for=&quot;exampleInputReadonly&quot;&gt;Readonly input&lt;/label&gt;</span><span class="code">&lt;input class=&quot;form-control&quot; id=&quot;exampleInputReadonly&quot; type=&quot;text&quot; placeholder=&quot;Designing World&quot; readonly&gt;</span></span><span class="code">&lt;/div&gt;</span><span class="comment">&lt;!-- Readonly Plain Text --&gt;</span><span class="code">&lt;div class=&quot;form-group&quot;&gt;<span class="code">&lt;label class=&quot;form-label&quot; for=&quot;exampleInputText3&quot;&gt;Readonly plain text&lt;/label&gt;</span><span class="code">&lt;input class=&quot;form-control-plaintext&quot; id=&quot;exampleInputText3&quot; type=&quot;text&quot; placeholder=&quot;Designing World&quot; readonly&gt;</span></span><span class="code">&lt;/div&gt;</span><span class="comment">&lt;!-- Color Picker --&gt;</span><span class="code">&lt;div class=&quot;form-group&quot;&gt;<span class="code">&lt;label class=&quot;form-label&quot; for=&quot;exampleColorInput&quot;&gt;Color picker&lt;/label&gt;</span><span class="code">&lt;input class=&quot;form-control form-control-color&quot; id=&quot;exampleColorInput&quot; type=&quot;color&quot; value=&quot;#563d7c&quot; data-bs-toggle=&quot;tooltip&quot; data-bs-placement=&quot;right&quot; title=&quot;Choose your color&quot;&gt;</span></span><span class="code">&lt;/div&gt;</span><span class="comment">&lt;!-- Input Large --&gt;</span><span class="code">&lt;div class=&quot;form-group&quot;&gt;<span class="code">&lt;label class=&quot;form-label&quot; for=&quot;exampleInputText2&quot;&gt;Input large&lt;/label&gt;</span><span class="code">&lt;input class=&quot;form-control form-control-lg&quot; id=&quot;exampleInputText2&quot; type=&quot;text&quot; placeholder=&quot;Designing World&quot;&gt;</span></span><span class="code">&lt;/div&gt;</span><span class="comment">&lt;!-- Input Small --&gt;</span><span class="code">&lt;div class=&quot;form-group&quot;&gt;<span class="code">&lt;label class=&quot;form-label&quot; for=&quot;exampleInputText3&quot;&gt;Input small&lt;/label&gt;</span><span class="code">&lt;input class=&quot;form-control form-control-sm&quot; id=&quot;exampleInputText3&quot; type=&quot;text&quot; placeholder=&quot;Designing World&quot;&gt;</span></span><span class="code">&lt;/div&gt;</span></code></pre>
          </div>
        </div>
      </div>
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
          </div>
        </div>
      </div>
      <div class="container">
        <div class="card">
          <div class="card-header" style="padding:1.5rem">
            <!-- Header -->
              <div class="element-heading>
                <h6 style="color:#4f4e56">Saya menyatakan bahwa semua informasi yang saya berikan dibawah ini adalah benar</h6>
              </div>
              <p style="color: #d93025;margin-top:13px;margin-bottom:0">* Required</p>
          </div>
          <div class="card-body">
            <form action="#" method="GET">
              <div class="form-group">
                <label class="form-label" for="exampleInputText">Nama Lengkap</label>
                <input class="form-control" id="exampleInputText" type="text" placeholder="Nama Lengkap">
              </div>
              <div class="form-group">
                <label class="form-label" for="exampleInputText">Perusahaan / Instansi</label>
                <input class="form-control" id="exampleInputText" type="text" placeholder="Perusahaan/Instansi">
              </div>
              <div class="form-group">
                <label class="form-label" for="exampleInputText">Alamat Domisili</label>
                <input class="form-control" id="exampleInputText" type="text" placeholder="Alamat Domisili">
              </div>
              <div class="form-group">
                <label class="form-label" for="defaultSelect">
                  Sebelum berkunjung/ datang ke Takeda apakah Anda mengunjungi atau bekerja di 
                  tempat lain dimana terdapat kasus positif COVID-19?
                </label>
                <select class="form-select" id="defaultSelect" name="defaultSelect" aria-label="Default select example">
                  <option></option>
                  <option value="1">Ya</option>
                  <option value="2">Tidak</option>
                </select>
              </div>
              <!-- <div class="container">
                <h8>Sebelum berkunjung/ datang ke Takeda apakah Anda mengunjungi atau bekerja di 
                    tempat lain dimana terdapat kasus positif COVID-19?
                </h8>
                <div class="card">
                  <div class="card-body">
                    <div class="single-plan-check shadow-sm active-effect">
                      <div class="form-check mb-0">
                        <input class="form-check-input" type="radio" name="Ya" id="Ya">
                        <label class="form-check-label" for="Ya">Ya</label>
                      </div>
                      <svg width="24" height="24" viewBox="0 0 16 16" class="bi bi-person text-primary" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                      </svg>
                    </div>
                    <div class="single-plan-check active shadow-sm active-effect">
                      <div class="form-check mb-0">
                        <input class="form-check-input" type="radio" name="planChoose" id="Tidak" checked>
                        <label class="form-check-label" for="Tidak">Tidak</label>
                      </div>
                      <svg width="24" height="24" viewBox="0 0 16 16" class="bi bi-people text-success" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1h7.956a.274.274 0 0 0 .014-.002l.008-.002c-.002-.264-.167-1.03-.76-1.72C13.688 10.629 12.718 10 11 10c-1.717 0-2.687.63-3.24 1.276-.593.69-.759 1.457-.76 1.72a1.05 1.05 0 0 0 .022.004zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10c-1.668.02-2.615.64-3.16 1.276C1.163 11.97 1 12.739 1 13h3c0-1.045.323-2.086.92-3zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                      </svg>
                    </div>
                  </div>
                </div>
              </div> -->
              <div class="form-group">
                <label class="form-label" for="exampleInputText">Berapa Suhu Badan Anda Hari Ini</label>
                <input class="form-control" id="exampleInputText" type="text" placeholder="Contoh 36,7">
              </div>
              <!-- Button Next -->
              <a href="https://ehs.dashboardtakeda.com/contractor_id2">
                <button class="btn btn-primary w-100 d-flex align-items-center justify-content-center" type="button" href="https://ehs.dashboardtakeda.com/contractor_id2" >Selanjutnya
                  <svg width="24" height="24" viewBox="0 0 16 16" class="bi bi-arrow-right-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                  </svg>
                </button>
              </a>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer Nav-->
    <div class="footer-nav-area" id="footerNav">
      <div class="container px-0">
        <!-- Paste your Footer Content from here-->
        <!-- Footer Content-->
        <!-- Footer Content-->
        <div class="footer-nav position-relative">
          <ul class="h-100 d-flex align-items-center justify-content-between ps-0">
            <li class="active"><a href="https://ehs.dashboardtakeda.com/"><svg width="20" height="20" viewBox="0 0 16 16" class="bi bi-house" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
<path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
</svg><span>Home</span></a></li>
            <li><a href="https://pikobar.jabarprov.go.id/articles?tab=jabar"><svg width="20" height="20" viewBox="0 0 16 16" class="bi bi-collection" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M14.5 13.5h-13A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5zm-13 1A1.5 1.5 0 0 1 0 13V6a1.5 1.5 0 0 1 1.5-1.5h13A1.5 1.5 0 0 1 16 6v7a1.5 1.5 0 0 1-1.5 1.5h-13zM2 3a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11A.5.5 0 0 0 2 3zm2-2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7A.5.5 0 0 0 4 1z"/>
</svg><span></span>Info Penting</a></li>
            <li><a href="https://pikobar.jabarprov.go.id/distribution-case"><svg width="20" height="20" viewBox="0 0 16 16" class="bi bi-folder2-open" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M1 3.5A1.5 1.5 0 0 1 2.5 2h2.764c.958 0 1.76.56 2.311 1.184C7.985 3.648 8.48 4 9 4h4.5A1.5 1.5 0 0 1 15 5.5v.64c.57.265.94.876.856 1.546l-.64 5.124A2.5 2.5 0 0 1 12.733 15H3.266a2.5 2.5 0 0 1-2.481-2.19l-.64-5.124A1.5 1.5 0 0 1 1 6.14V3.5zM2 6h12v-.5a.5.5 0 0 0-.5-.5H9c-.964 0-1.71-.629-2.174-1.154C6.374 3.334 5.82 3 5.264 3H2.5a.5.5 0 0 0-.5.5V6zm-.367 1a.5.5 0 0 0-.496.562l.64 5.124A1.5 1.5 0 0 0 3.266 14h9.468a1.5 1.5 0 0 0 1.489-1.314l.64-5.124A.5.5 0 0 0 14.367 7H1.633z"/>
</svg><span>Data Sebaran Covid-19</span></a></li>
            <li><a href="https://ehs.dashboardtakeda.com/blog"><svg width="20" height="20" viewBox="0 0 16 16" class="bi bi-gear" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z"/>
<path fill-rule="evenodd" d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z"/>
</svg><span>Informasi</span></a></li>
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
  </body>
</html>