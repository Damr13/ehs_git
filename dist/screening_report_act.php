<?php
	include('./config/konek.php');
    session_start();

        // $requestData = $this->input->post();  
        $nik = $_SESSION['nik'];
        $sql_del = "DELETE from do_temp_date WHERE nik = ".$nik;
        $query_del = mysqli_query($conn,$sql_del);

        date_default_timezone_set('Asia/Jakarta');
        $kalender = CAL_GREGORIAN;
        $bulan = date("m");
        $tahun = date("Y");
        $jml_hari = cal_days_in_month($kalender, $bulan, $tahun);
        for ($i=1; $i <= $jml_hari ; $i++) { 
            if($i<10){
                $tgl_insert=date("Y-m").'-0'.$i;
            }else{
                $tgl_insert=date("Y-m").'-'.$i;
            }
            $sql_insert = "INSERT into do_temp_date (nik,`date`)
                        VALUES ('".$nik."','".$tgl_insert."')";
            // echo $sql_insert;exit();
            $query_insert = mysqli_query($conn,$sql_insert);
        }


        $requestData = $_POST;    
        $dateStart = $requestData['dateStart'];
        $dateFinish = $requestData['dateFinish'];
        if($dateStart!='' AND $dateFinish!=''){
            $and_date = "AND (DATE_FORMAT(tp.date, '%Y-%m-%d') BETWEEN '".$dateStart."' AND '".$dateFinish."')";
        }else{
            $and_date = "";
        }
        // echo $dateStart.' : '.$dateFinish;exit(); 

        $columns = array( 
        // datatable column index  => database column name
            // 0 => 'no',
            0 => 'DATE_FORMAT(tp.date, "%d %M  %Y")',
            1 => 'DATE_FORMAT(tp.date, "%d %M  %Y")',
            2 => 'Jam',
            3 => 'cek',
            4 => 'judgement'
        );

        

        $nik = $_SESSION['nik'];
        // $sql = "SELECT distinct a.nik,a.Nama,DATE_FORMAT(a.tgl, '%d %M  %Y') as tanggal,TIME(a.tgl) as Jam,b.cek,a.judgement
        //         from screening a,(select Nama,count(judgement) as cek from screening group by Nama,tgl) b
        //         where a.Nama=b.Nama
        //         AND a.nik = ".$nik."
        //         ".$and_date."
        //         ";

        $sql = "
                SELECT tp.nik,tp.date,DATE_FORMAT(tp.date, '%d %M  %Y') as date2,dt.Nama,dt.tanggal,dt.Jam,dt.cek,dt.judgement
                FROM do_temp_date tp
                LEFT JOIN(
                    SELECT distinct a.nik,a.Nama,DATE_FORMAT(a.tgl, '%d %M  %Y') as tanggal,TIME(a.tgl) as Jam,b.cek,
                    a.judgement,DATE_FORMAT(a.tgl, '%Y-%m-%d') as tanggal2
                    from screening a,(select Nama,count(judgement) as cek from screening group by Nama,tgl) b
                    where a.Nama=b.Nama
                )dt on tp.nik = dt.nik AND tp.date = dt.tanggal2
                WHERE tp.nik ='".$nik."'
                ".$and_date."
                ";

        $query = mysqli_query($conn,$sql);

        $totalData = mysqli_num_rows($query);

        $totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

        $nik = $_SESSION['nik'];
        // $sql = "SELECT distinct a.nik,a.Nama,DATE_FORMAT(a.tgl, '%d %M  %Y') as tanggal,TIME(a.tgl) as Jam,b.cek,a.judgement
        //         from screening a,(select Nama,count(judgement) as cek from screening group by Nama,tgl) b
        //         where a.Nama=b.Nama
        //         AND a.nik = ".$nik."
        //         ".$and_date."
        //         AND 1 = 1";

        $sql = "
                SELECT tp.nik,tp.date,DATE_FORMAT(tp.date, '%d %M  %Y') as date2,dt.Nama,dt.tanggal,dt.Jam,dt.cek,dt.judgement
                FROM do_temp_date tp
                LEFT JOIN(
                    SELECT distinct a.nik,a.Nama,DATE_FORMAT(a.tgl, '%d %M  %Y') as tanggal,TIME(a.tgl) as Jam,b.cek,
                    a.judgement,DATE_FORMAT(a.tgl, '%Y-%m-%d') as tanggal2
                    from screening a,(select Nama,count(judgement) as cek from screening group by Nama,tgl) b
                    where a.Nama=b.Nama
                )dt on tp.nik = dt.nik AND tp.date = dt.tanggal2
                WHERE tp.nik ='".$nik."'
                ".$and_date."
                AND 1 = 1
                GROUP BY date";




        // getting records as per search parameters
        if( !empty($requestData['search']['value']) ){   
            $sql.=" AND ( 
                        lower(DATE_FORMAT(tp.date, '%d %M  %Y')) LIKE lower('%".$requestData['search']['value']."%')  
                        OR lower(Jam) LIKE lower('%".$requestData['search']['value']."%') 
                        OR lower(judgement) LIKE lower('%".$requestData['search']['value']."%') 
                    )";
        }
        

        
        $query = mysqli_query($conn,$sql);
        $totalFiltered = mysqli_num_rows($query);   
        
        $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['length']." OFFSET ".$requestData['start']." ";  // adding length
        
        // echo $sql;exit();
        $query= mysqli_query($conn,$sql);
        
        $data = array();
        $no = 1;
        // $no = $_POST['start'];       

        foreach($query as $row){

            
            
            $nestedData=array(); 


            // $this->format_uang->rp_format($kfm->nominal_deposit)

            $nestedData[] = $no;
            if($row['Nama']!=''){
                $nestedData[] = $row['tanggal'];            
                $nestedData[] = $row['Jam'];
                $nestedData[] = '<i class="fa fa-check-circle" style="color:green;font-size:20px"></i>';
                $nestedData[] = $row['judgement'];
            }else{
                $nestedData[] = $row['date2'];            
                $nestedData[] = '';
                $nestedData[] = '<i class="fa fa-times" style="color:red;font-size:20px"></i>';
                $nestedData[] = '';
            }
                                 
            $data[] = $nestedData;
            $no++;
        }   

        $json_data = array(
                    "draw"            => intval( $requestData['draw'] ),   
                    "recordsTotal"    => intval( $totalData ),  
                    "recordsFiltered" => intval( $totalFiltered ), 
                    "data"            => $data   
                    );

        echo json_encode($json_data); 


    

?>