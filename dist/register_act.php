<?php
    include('./config/konek.php');
    include('./config/base.php'); 

    

    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $dept = $_POST['dept'];
    $email = $_POST['email'];
    $password = $_POST['password_user'];
    $check_user = $_POST['check_user'];
    // echo $check_user;
    // exit();

    $sql = "SELECT count(*) as jml
            from mstEmployee
            WHERE Nik = '".$nik."' or Email = '".$email."'
                ";
    $data = mysqli_fetch_assoc($conn->query($sql));

    if($data['jml']<=0){
        $password=md5($password);

        $sql_jdg = "INSERT INTO mstEmployee (Nik, Password, Nama, Email, idDept)
             VALUES ('".$nik."','".$password."','".$nama."','".$email."','".$dept."')";
        // echo $sql_insert;exit();
        $insert_jdg = mysqli_query($conn,$sql_jdg);

        // date_default_timezone_set('Asia/Jakarta');
        // $dt = date("Y-m-d H:i:s");
        // $key=md5($dt);
        kirim_email($email,$nama);

        $respon='SUKSES';
        $msg = 'register';
    }else{
        $respon = 'GAGAL';
        $msg = 'Nik atau email sudah terdaftar';
    }
    

    $return = array('respon' => $respon, 'msg' => $msg);
    echo json_encode($return);

    function kirim_email($email,$nama) {
        require ("./config/PHPMailer/src/PHPMailer.php");
        require("./config/PHPMailer/src/SMTP.php");

        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'mail.dashboardtakeda.com';            // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                              // Enable SMTP authentication
        $mail->Username = 'sys@dashboardtakeda.com';        // SMTP username
        $mail->Password = '1mgrZ6*dW];K';                   // SMTP password
        $mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                

        $mail->setFrom('sys@dashboardtakeda.com', 'Takeda EHS Departement');
        $mail->addAddress($email, $nama);

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = "Takeda EHS Departement Screening (Register User)";
        $body = "";
        $body.='    
                <!DOCTYPE html>
                <html lang="en">
                <body>
                    
                    <span style="color:#000;">Dear '.$nama.',</span>
                    <br/><br/>

                    <span style="color:#000;">Selamat datang, silakan login menggunakan akun anda</span>
                    <span style="color:#000;"><a href="'.base_url().'login">Login</a></span>

                    <br/><br/>
                    <span style="color:#000;">Best regards,</span>
                    <br/>
                    <b style="color:#000;">Administrator</b>

                </body>
                </html>';
        $mail->Body    = $body;

        if(!$mail->send())
        {
            // echo 'Message could not be sent.';
            // echo 'Mailer Error: ' . $mail->ErrorInfo;
            return $mail->ErrorInfo;
        }
        else
        {
            // echo 'Message has been sent';
            return True;
        }
      
    }


?>