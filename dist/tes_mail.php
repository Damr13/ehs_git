<?php
	// include('./config/konek.php');
    include('./config/send_mail.php');

    kirim_email_2();

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

        $mail->setFrom('admin@dosurveys.id', 'System');
        $mail->addAddress('rayci232@gmail.com', 'Admin');

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'High Risk';
        $body = "";
        $body.='    
                <!DOCTYPE html>
                <html lang="en">
                <body>
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pertanyaan</th>
                                <th>Jawaban</th>
                            </tr>
                        </thead>
                        <tbody>';
        $body.='
                            <tr>
                                <td>no</td>
                                <td>pertanyaan</td>
                                <td>jawaban</td>
                            <tr>';
        $body.='
                        </tbody>
                    </table>
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
      // exit();
    }

?>