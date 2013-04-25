<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename = Laporan_karcis.xls");
header("Pragma: no-cache");
header("Expires: 0");

 if (isset($laporan) && $laporan) {
       
       
      
       
        if ($tipe == 1) {
            $data['laporan']=$laporan;
            
               
                $this->load->view('laporan3',$data);
            
        }else if($tipe==3){
            $data['laporan']=$laporan;
            $data['tipe_karcis']="Porporasi";
            
           for ($i = 0; $i < count($laporan); $i++) {
                $data['i']=$i;
                if(strcmp($laporan[$i][3],"pengadaan")==0)
                    $this->load->view('laporan2',$data);
                else if(strcmp($laporan[$i][3],"sirkulasi")==0)
                    $this->load->view('laporan1',$data);    
            }
        }
    }else{
        echo 'Tidak ada data';
    }
?>