<?php
	function kirim_email_2() {
        require ("./config/PHPMailer/src/PHPMailer.php");
        require("./config/PHPMailer/src/SMTP.php");

        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'mail.dosurveys.id';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'admin@dosurveys.id';                 // SMTP username
        $mail->Password = 'Admin@99';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                

        $mail->setFrom('admin@dosurveys.id', 'Coba');
        $mail->addAddress('rayci232@gmail.com', 'Panel Ku');

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Judulku ke 2 ya';
        $mail->Body    = 'Ini menggunakan HTML <b>ini tebal!</b>';

        if(!$mail->send())
        {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
        else
        {
            echo 'Message has been sent';
        }
      // exit();
    }

function kirim_email() {
  echo "Hello world!";
  // exit();
}
?>