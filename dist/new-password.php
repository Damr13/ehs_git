<?php
include('./config/base.php'); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Takeda Screening Form">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#0134d4">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags-->
    <!-- Title-->
    <title>New Password - Takeda Covid-19 Form Screening</title>
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
    <!-- Back Button-->
    <div class="login-back-button"><a href="<?php echo base_url(); ?>"><svg width="32" height="32" viewBox="0 0 16 16" class="bi bi-arrow-left-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
</svg></a></div>
   <!-- Login Wrapper Area-->
   <div class="login-wrapper d-flex align-items-center justify-content-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5">
            <div class="text-center px-4"><img class="login-intro-img" src="img/bg-img/36.png" alt=""></div>
            <!-- Register Form-->
            <div class="register-form mt-4 px-4">
              <!-- <form action="https://ehs.dashboardtakeda.com"> -->
                <!-- <div class="form-group text-start mb-3">
                  <input class="form-control" type="text" placeholder="Enter 8 digit security code">
                </div> -->
                <input class="form-control input-psswd" type="hidden" id="id" value="<?php echo $_GET['em']; ?>" readonly="">
                <input class="form-control input-psswd" type="hidden" id="key" value="<?php echo $_GET['key']; ?>" readonly="">
                <div class="form-group text-start mb-3">
                  <input class="form-control input-psswd" id="new_password" type="password" placeholder="New Password">
                </div>
                <div class="form-group text-start mb-3">
                  <input class="form-control" id="password_konfirm" type="password" placeholder="Re-write Password Confirm">
                </div>
                <button class="btn btn-primary w-100" onclick="ubah_password()">Update Password</button>
              <!-- </form> -->
            </div>
          </div>
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

    <script type="text/javascript">
        $(document).ready(function (e) {
            cek_key(); 
        });

        function cek_key(){
            var id = $('#id').val();
            var key = $('#key').val();
            $.ajax({
                type:'POST',
                url: 'new-password-cek-key.php',
                data: {id:id, key:key},
                dataType  : "JSON",
                beforeSend: function(){
                },
                success: (data) => {
                    if(data.respon != 'SUKSES'){
                        swal({
                              title: "PERINGATAN",
                              text: "Key invalid",
                              type: "warning"
                          }).then(function() {
                              window.location = "<?php echo base_url(); ?>";
                          });
                    }

                },
                error: function(data){
                    console.log(data);
                }
            });
        }

        function ubah_password(){
            var id = $('#id').val();
            var new_password = $('#new_password').val();
            var password_konfirm = $('#password_konfirm').val();
            $.ajax({
                type:'POST',
                url: 'new-password-act.php',
                data: {id:id, password:new_password},
                dataType  : "JSON",
                beforeSend: function(){
                    if(new_password==''){
                        swal("PERINGATAN","Password tidak boleh kosong", "warning");
                        return false;
                    }else if(password_konfirm==''){
                        swal("PERINGATAN","Password Confirm tidak boleh kosong", "warning");
                        return false;
                    }else if(new_password != password_konfirm){
                        swal("PERINGATAN","Password dan Password Confirm tidak sama", "warning");
                        return false;
                    } 
                },
                success: (data) => {
                    if(data.respon == 'SUKSES'){
                        swal({
                              title: "BERHASIL",
                              text: "Ubah password berhasil, silakan login menggunakan password baru anda",
                              type: "success"
                          }).then(function() {
                              window.location = "<?php echo base_url(); ?>";
                          });
                    }

                },
                error: function(data){
                    console.log(data);
                }
            });
        }
      
    </script>
  </body>
</html>