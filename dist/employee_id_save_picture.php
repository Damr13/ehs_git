<?php
    include('./config/konek.php');
    include('./config/base.php');
    session_start();


    #cek last idResponse;
    $sql_last_resp = "SELECT MAX(idResponse) AS idResponse
                    FROM do_responses
                    LIMIT 1
                ";
    $last_resp = mysqli_fetch_assoc($conn->query($sql_last_resp));
    $idResponse = $last_resp['idResponse'];

    foreach($_FILES as $Field => $Data){
        // var_dump($Field);
        // var_dump($_FILES[$Field]);
        // var_dump($_FILES[$Field]['tmp_name']);
        $tmp       = $_FILES[$Field]['tmp_name'];
        $rand       = rand();
        $ekstensi   = array('png','jpg','jpeg','gif');
        $filename   = $_FILES[$Field]['name'];
        $ukuran     = $_FILES[$Field]['size'];
        $ext        = pathinfo($filename, PATHINFO_EXTENSION);
        // echo $ext;exit();
        
        $filename = $rand.'_'.$filename;
        // move_uploaded_file($_FILES[$Field]['tmp_name'], './assets/img/'.$filename);

        // if(move_uploaded_file($_FILES[$Field]['tmp_name'], './assets/img/'.$filename)){
        //     echo 'sukses';
        // }else{
        //     var_dump(move_uploaded_file($_FILES[$Field]['tmp_name'], './assets/img/'.$filename));
        // }

        // exit()

        $imageTemp = $_FILES[$Field]['tmp_name'];
        $location = './assets/img/'.$filename;
        // $compressedImage = compressImage($imageTemp, $imageUploadPath, 30); 
        compressImage($imageTemp,$location,30);

        //image file path
        $imageURL = base_url().'assets/img/'.$filename;
        

        //get location of image
        $imgLocation = get_image_location($location);

        //latitude & longitude
        $imgLat = $imgLocation['latitude'];
        $imgLng = $imgLocation['longitude'];

        $image = explode("_",$Field);
        $survey=$image[1];
        $page=$image[2];
        $question=$image[3];

        // print_r(triphoto_getGPS('http://it-spv.dcinagro-serv.local/ehs/dist/assets/img/7522_yokinoi.jpg'));
        // echo $imgLng.' : '.$imgLat.' : '.$question.' '.$imageURL;exit();

        $sql_insert = "INSERT INTO do_responses (response, survey, page, question, url,latitude,longitude, idResponse, timestamps,skor )
             VALUES ('".$filename."',".$survey.",".$page.",".$question.",'".$imageURL."','".$imgLat."','".$imgLng."',".$idResponse.",NOW(),0)";
        // echo $sql_insert;exit();
        $insert_ans = mysqli_query($conn,$sql_insert);
    }
    // exit();    
    $hasil = cek_hasil($idResponse,$conn);
    $img=$hasil['img'];
    $judgement=$hasil['judgement'];
    $legend=$hasil['legend'];
    $rating_risk=$hasil['rating_risk'];

    $return = array('respon' => 'SUKSES', 'img' => $img, 'judgement' => $judgement, 'legend' => $legend, 'rating_risk' => $rating_risk);
    echo json_encode($return);







    /*function*/
    function gps2Num($coordPart){
        echo $coordPart;exit();
        $parts = explode('/', $coordPart);
        if(count($parts) <= 0) return 0;
        if(count($parts) == 1) return $parts[0];
        return floatval($parts[0]) / floatval($parts[1]);
    }

    function get_image_location($image = ''){
        $exif = exif_read_data($image, 0, true);

        if($exif && isset($exif['GPS'])){
            $GPSLatitudeRef   = $exif['GPS']['GPSLatitudeRef'];
            $GPSLatitude      = $exif['GPS']['GPSLatitude'];
            $GPSLongitudeRef  = $exif['GPS']['GPSLongitudeRef'];
            $GPSLongitude     = $exif['GPS']['GPSLongitude'];
        
            $lat_degrees = count($GPSLatitude) > 0 ? gps2Num($GPSLatitude[0]) : 0;
            $lat_minutes = count($GPSLatitude) > 1 ? gps2Num($GPSLatitude[1]) : 0;
            $lat_seconds = count($GPSLatitude) > 2 ? gps2Num($GPSLatitude[2]) : 0;
        
            $lon_degrees = count($GPSLongitude) > 0 ? gps2Num($GPSLongitude[0]) : 0;
            $lon_minutes = count($GPSLongitude) > 1 ? gps2Num($GPSLongitude[1]) : 0;
            $lon_seconds = count($GPSLongitude) > 2 ? gps2Num($GPSLongitude[2]) : 0;
        
            $lat_direction = ($GPSLatitudeRef == 'W' or $GPSLatitudeRef == 'S') ? -1 : 1;
            $lon_direction = ($GPSLongitudeRef == 'W' or $GPSLongitudeRef == 'S') ? -1 : 1;
        
            $latitude = $lat_direction * ($lat_degrees + ($lat_minutes / 60) + ($lat_seconds / (60*60)));
            $longitude = $lon_direction * ($lon_degrees + ($lon_minutes / 60) + ($lon_seconds / (60*60)));
        
            return array('latitude'=>$latitude, 'longitude'=>$longitude);
        }else{
            return false;
        }
    }

    function compressImage($source, $destination, $quality) {

      $info = getimagesize($source);

      if ($info['mime'] == 'image/jpeg') 
        $image = imagecreatefromjpeg($source);

      elseif ($info['mime'] == 'image/gif') 
        $image = imagecreatefromgif($source);

      elseif ($info['mime'] == 'image/png') 
        $image = imagecreatefrompng($source);

      imagejpeg($image, $destination, $quality);

    }
    
    function cek_hasil($idResponse,$conn){
        // $conn = mysqli_connect($servername, $username, $password, $database);
        $sql_risk = "SELECT sum(dr.skor) as sum_risk
                    FROM do_responses dr
                    LEFT JOIN do_questions dq on dr.question = dq.id AND dr.survey=dq.survey AND dr.page = dq.page
                    WHERE dr.idResponse = '".$idResponse."'
                    AND dq.cat_risk = 'Risk'
                ";
        // echo $sql_risk;exit();
        $risk = mysqli_fetch_assoc($conn->query($sql_risk));
        $sum_risk = $risk['sum_risk'];

        $sql_tracing = "SELECT sum(dr.skor) as sum_tracing
                        FROM do_responses dr
                        LEFT JOIN do_questions dq on dr.question = dq.id AND dr.survey=dq.survey AND dr.page = dq.page
                        WHERE dr.idResponse = '".$idResponse."'
                        AND dq.cat_risk = 'Tracing'
                ";
        $tracing = mysqli_fetch_assoc($conn->query($sql_tracing));
        $sum_tracing = $tracing['sum_tracing'];

        $sql_p_tracing = "SELECT sum(da.skor) as pembagi_tracing
                        FROM do_responses dr
                        LEFT JOIN do_questions dq on dr.question = dq.id AND dr.survey=dq.survey AND dr.page = dq.page
                        LEFT JOIN do_answers da on dq.survey = da.survey AND dq.id = da.question
                        WHERE dr.idResponse = '".$idResponse."'
                        AND dq.cat_risk = 'Tracing'
                ";
        $tracing_p = mysqli_fetch_assoc($conn->query($sql_p_tracing));
        $pembagi_tracing = $tracing_p['pembagi_tracing'];
        $persen_tracing = ($sum_tracing/$pembagi_tracing)*100;

        $jd = '';
        if($sum_risk<=8){
            if($persen_tracing<=12){
                $jd = 'VERY_LOW';
            }elseif ($persen_tracing>=13 && $persen_tracing<=24) {
                $jd = 'LOW';
            }elseif ($persen_tracing>=25 && $persen_tracing<=30) {
                $jd = 'MODERATE';
            }elseif ($persen_tracing>=31) {
                $jd = 'HIGH';
            }
        }elseif ($sum_risk>=9 && $sum_risk<=11) {
            if($persen_tracing<=12){
                $jd = 'LOW';
            }elseif ($persen_tracing>=13 && $persen_tracing<=24) {
                $jd = 'MODERATE';
            }elseif ($persen_tracing>=25 && $persen_tracing<=30) {
                $jd = 'HIGH';
            }elseif ($persen_tracing>=31) {
                $jd = 'VERY_HIGH';
            }
        }elseif ($sum_risk>=12 && $sum_risk<=26) {
            if($persen_tracing<=12){
                $jd = 'MODERATE';
            }elseif ($persen_tracing>=13 && $persen_tracing<=24) {
                $jd = 'MODERATE';
            }elseif ($persen_tracing>=25 && $persen_tracing<=30) {
                $jd = 'HIGH';
            }elseif ($persen_tracing>=31) {
                $jd = 'VERY_HIGH';
            }
        }elseif ($sum_risk>=27) {
            if($persen_tracing<=12){
                $jd = 'HIGH';
            }elseif ($persen_tracing>=13 && $persen_tracing<=24) {
                $jd = 'HIGH';
            }elseif ($persen_tracing>=25 && $persen_tracing<=30) {
                $jd = 'VERY_HIGH';
            }elseif ($persen_tracing>=31) {
                $jd = 'VERY_HIGH';
            }
        }

        $img='';
        $judgement='';
        $legend = '';
        if($jd=='VERY_LOW'){
            $img = 'img/judgement/very-low.png';
            $judgement='VERY LOW';
            $legend = 'Tidak Ada Indikasi Terpapar Covid Tetap Jalankan Protokol Kesehatan';
        }elseif($jd=='LOW'){
            $img = 'img/judgement/low.png';
            $judgement='LOW';
            $legend = 'Probabilitas Terpapar Covid Rendah Tetap Jalankan Protokol Kesehatan';
        }elseif($jd=='MODERATE'){
            $img = 'img/judgement/moderate.png';
            $judgement='MODERATE';
            $legend = 'Probabilitas Terpapar Covid Level Menengah';
        }elseif($jd=='HIGH'){
            $img = 'img/judgement/high.png';
            $judgement='HIGH';
            $legend = 'Probabilitas Terpapar Covid Mendekati Tinggi Disarankan Isolasi Sementara';
        }elseif($jd=='VERY_HIGH'){
            $img = 'img/judgement/very-high.png';
            $judgement='VERY HIGH';
            $legend = 'Probabilitas Terpapar Covid Sangat Tinggi Disarankan Untuk Melakukan Swab PCR atau Rapid Antigen Dan Beristirahat';
        }

        $rating_risk = 'Overall risk of transmission and further spread of COVID-19 is considered '.$judgement;
        if($jd=='HIGH' OR $jd=='VERY_HIGH'){
            kirim_email($idResponse,$judgement,$rating_risk,$legend);
        }
        

        $sql_jdg = "INSERT INTO do_judgement (idResponse, category, tgl, total_risk, total_tracing,judgement,nama,nik,dept)
             VALUES (".$idResponse.",'Karyawan',NOW(),".$sum_risk.",".$persen_tracing.",'".$judgement."','".$_SESSION['Nama']."','".$_SESSION['nik']."','".$_SESSION['DeptName']."')";
        // echo $sql_insert;exit();
        $insert_jdg = mysqli_query($conn,$sql_jdg);

        $data = array('img' => $img, 'judgement' => $judgement, 'legend' => $legend, 'rating_risk' => $rating_risk );
        return $data;
    }

    function kirim_email($idResponse,$judgement,$rating_risk,$legend) {
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
        $mail->addAddress('ehs@dashboardtakeda.com', 'Admin');
        // $mail->addAddress('rizkym84@gmail.com', 'Admin');
        // $mail->addAddress('rayci232@gmail.com', 'Admin');

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
                    <span style="color:#000;"><br>Risk Rating : '.$judgement.'</span>
                    <span style="color:#000;"><br>'.$rating_risk.'</span>
                    <span style="color:#000;"><br>'.$legend.'</span>
                    <span style="color:#000;"><br>Employee   : <b>'.$_SESSION['Nama'].'</b></span>
                    <span style="color:#000;"><br>Department : <b>'.$_SESSION['DeptName'].'</b></span>

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