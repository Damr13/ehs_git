<?php
	include('./config/konek.php');
    include('./config/base.php');

    $email = $_POST['email'];
    #cek last idResponse;
    $sql = "SELECT em.*,dp.DeptCode,dp.DeptName,dp.DeptCategory
            from mstEmployee em
            LEFT JOIN mstDept dp on em.idDept = dp.id
            WHERE Email = '".$email."'
                ";
    $data = mysqli_fetch_assoc($conn->query($sql));
    $result=mysqli_query($conn,$sql);
    $rowcount=mysqli_num_rows($result);

    if($rowcount>0){
        date_default_timezone_set('Asia/Jakarta');
        $dt = date("Y-m-d H:i:s");
        $key=md5($dt);
        $sql_insert = "UPDATE mstEmployee SET key_password = '".$key."' 
                        WHERE id = ".$data['id'];
        $insert_ans = mysqli_query($conn,$sql_insert);

        kirim_email($email,$data['Nama'],$data['id'],$key);

        $respon='SUKSES';
        $msg = '';
    }else{
        $respon = 'GAGAL';
        $msg = 'Email tidak terdaftar';
    }
    

	$return = array('respon' => $respon, 'msg' => $msg);
    echo json_encode($return);

    function kirim_email($email,$nama,$id_em,$key) {
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

        $mail->Subject = "Takeda EHS Departement Screening Form (Ganti Password)";
        $body = "";
        $body.='    
                <!DOCTYPE html>
                <html lang="en">
                <body>
                    
                    <span style="color:#000;">Dear '.$nama.',</span>
                    <br/><br/>

                    <span style="color:#000;">Untuk melakukan perubahan password silakan klik link berikut ini</span>
                    <span style="color:#000;"><a href="'.base_url().'new-password?em='.$id_em.'&key='.$key.'">Ganti password</a></span>

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