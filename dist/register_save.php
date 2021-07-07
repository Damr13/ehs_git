<?php
	include('./config/konek.php');
    // include('./config/send_mail.php');

    #cek last idResponse;
    $sql_last_resp = "SELECT MAX(idResponse) AS idResponse
                    FROM do_responses
                    LIMIT 1
                ";
    $last_resp = mysqli_fetch_assoc($conn->query($sql_last_resp));
    $idResponse = $last_resp['idResponse']+1;
    
    $arr    = json_decode($_POST['data']);
    // print_r($arr);exit();
    $arr2 = explode("&", $arr);
    foreach ($arr2 as $key) {
        $data = explode("=", $key);
        $param=$data[0];
        $param2 = explode("_", $param);
        $type = $param2[1];
        $survey = $param2[2];
        $page = $param2[3];
        $question = $param2[4];
        if($type=='radio' or $type=='check'){
            $val_awal=$data[1];
            $val_awal = explode("_", $val_awal);
            $answer = $val_awal[0];
            $val = $val_awal[1];
            // $val = preg_replace("/[^a-zA-Z]/", "", $val);
        }else{
            $answer = $param2[5];
            $val = $data[1];
            // $val = preg_replace("/[^A-Za-z0-9]/", "", $val);
        }

        
        

        // echo $param.'|'.$type.':'.$survey.':'.$page.':'.$question.':'.$answer.':'.$val.' || ';exit();
        $sql_ans = "SELECT *
                    FROM do_answers
                    WHERE survey = ".$survey." 
                    AND page = ".$page." 
                    AND question = ".$question." 
                    AND id = ".$answer." 
                    ";
        $ans = mysqli_fetch_assoc($conn->query($sql_ans));
        $skor=$ans['skor'];

        $sql_insert = "INSERT INTO do_responses (response, survey, page, question, answer, idResponse, timestamps, skor)
             VALUES ('".$val."',".$survey.",".$page.",".$question.",".$answer.",".$idResponse.",NOW(),".$skor.")";
        $insert_ans = mysqli_query($conn,$sql_insert);
    }
    
    $sql_skor = "SELECT *
                  FROM
                    do_responses
                WHERE idResponse=".$idResponse;
    // echo $sql_skor;exit();
    $data_skor = mysqli_query($conn, $sql_skor);
    $skor=array();
    foreach ($data_skor as $key_skor) {
        $skor[]=$key_skor['skor'];

    }
    // print_r($skor);
    $hasil_skor = implode("",$skor);
    if (strpbrk($hasil_skor,"5")){
        $judgement='High Risk';
        $level_skor = 5;
        kirim_email($idResponse,$judgement);
    }elseif (strpbrk($hasil_skor,"4")) {
        $judgement='Severe / Medium High';
        $level_skor = 4;
        kirim_email($idResponse,$judgement);
    }elseif (strpbrk($hasil_skor,"3")) {
        $judgement='Medium Risk';
        $level_skor = 3;
        kirim_email($idResponse,$judgement);
    }elseif (strpbrk($hasil_skor,"2")) {
        $judgement='Medium Low';
        $level_skor = 2;
        kirim_email($idResponse,$judgement);
    }else{
        $judgement='Low Risk';
        $level_skor = 1;
        kirim_email($idResponse,$judgement);
    }
    

	$return = array('respon' => 'SUKSES','judgement' => $judgement,'level_skor' => $level_skor);
    echo json_encode($return);


    function kirim_email($idResponse,$judgement) {
        require ("./config/PHPMailer/src/PHPMailer.php");
        require("./config/PHPMailer/src/SMTP.php");

        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'mail.dashboardtakeda.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'sys@dashboardtakeda.com';                 // SMTP username
        $mail->Password = '1mgrZ6*dW];K';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;               

        $mail->setFrom('sys@dashboardtakeda.com', 'Takeda EHS Departement');
        $mail->addAddress('rayci232@gmail.com', 'Admin');
        $mail->addAddress('rizkym84@gmail.com', 'Admin');

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = "Takeda EHS Departement Screening Form";
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

        include('./config/konek.php');
        $sql = "SELECT qt.title,rp.response
                FROM
                do_responses rp
                LEFT JOIN do_questions qt on rp.question = qt.id
                WHERE rp.idResponse=".$idResponse;
        $data = mysqli_query($conn, $sql);
        $no=1;
        foreach ($data as $key) {
            $body.='
                            <tr>
                                <td>'.$no.'</td>
                                <td>'.$key['title'].'</td>
                                <td>'.$key['response'].'</td>
                            <tr>';
            $no++;
        }
        
        $body.='
                        </tbody>
                    </table>

                    <br/>
                    <span style="color:#000;"><br>Hasil : '.$judgement.'</span>


                    <br/><br/>
                    <span style="color:#000;">Bagi Yang Beraktivitas di Lingkungan PT.Takeda Indonesia Wajib Menjalankan Protokol Kesehatan,</span>
                    <span style="color:#000;">Best regards,</span>
                    <br/>
                    <b style="color:#000;">EHS Departement</b>

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