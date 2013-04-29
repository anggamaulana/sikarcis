<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 
 * 
 */

class Pengadaan_model extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
    
    
    public function getOperator(){
        $data=$this->db->query("select id_operator,nama_operator from operator");
        
       return $data->result();
    }
    
    
    public function simpanStok($data){
        
//        $this->db->trans_begin();
        
        $stok=$this->db->query("select id_karcis,stok_kw1,stok_kw2 from jenis_karcis where id_karcis in(1,2,3,4,5,6,7,8) order by id_karcis asc");
        $stokakhir=$stok->result();
        $stokkarcis=array();
        foreach($stokakhir as $st){            
            array_push($stokkarcis, array($st->stok_kw1,$st->stok_kw2));
        }
        
        //tabel stok karcis
        $this->db->query("insert into stok_karcis(nama_penyetok,bulan,tahun) values(?,?,?)",array($data['nama_operator'],$data['bulan'],date('Y')));
        
        $id_stok=$this->db->insert_id();
        
        //insert tabel stok karcis sub
        //$total=($data['bus_besar_kw1']+$data['bus_besar_kw2'])*$data['bus_besar_bundel'];
        $this->db->query("insert into stok_sub_karcis(id_stok,id_karcis,total_kw1,total_kw2) values(?,?,?,?) ",
                array($id_stok,1,$data['bus_besar_kw1'],$data['bus_besar_kw2']));
        
        //$total=($data['bus_sedang_kw1']+$data['bus_sedang_kw2'])*$data['bus_sedang_bundel'];
        $this->db->query("insert into stok_sub_karcis(id_stok,id_karcis,total_kw1,total_kw2) values(?,?,?,?) ",
                array($id_stok,2,$data['bus_sedang_kw1'],$data['bus_sedang_kw2']));
        
        //$total=($data['truk_besar_kw1']+$data['truk_besar_kw2'])*$data['truk_besar_bundel'];
        $this->db->query("insert into stok_sub_karcis(id_stok,id_karcis,total_kw1,total_kw2) values(?,?,?,?) ",
                array($id_stok,3,$data['truk_besar_kw1'],$data['truk_besar_kw2']));
        
       // $total=($data['truk_sedang_kw1']+$data['truk_sedang_kw2'])*$data['truk_sedang_bundel'];
        $this->db->query("insert into stok_sub_karcis(id_stok,id_karcis,total_kw1,total_kw2) values(?,?,?,?) ",
                array($id_stok,4,$data['truk_sedang_kw1'],$data['truk_sedang_kw2']));
        
        //$total=($data['truk_gandeng_kw1']+$data['truk_gandeng_kw2'])*$data['truk_gandeng_bundel'];
        $this->db->query("insert into stok_sub_karcis(id_stok,id_karcis,total_kw1,total_kw2) values(?,?,?,?) ",
                array($id_stok,5,$data['truk_gandeng_kw1'],$data['truk_gandeng_kw2']));
        
        //$total=($data['sepeda_motor_kw1']+$data['sepeda_motor_kw2'])*$data['sepeda_motor_bundel'];
        $this->db->query("insert into stok_sub_karcis(id_stok,id_karcis,total_kw1,total_kw2) values(?,?,?,?) ",
                array($id_stok,6,$data['sepeda_motor_kw1'],$data['sepeda_motor_kw2']));
        
        //$total=($data['mobil_kw1']+$data['mobil_kw2'])*$data['mobil_bundel'];
        $this->db->query("insert into stok_sub_karcis(id_stok,id_karcis,total_kw1,total_kw2) values(?,?,?,?) ",
                array($id_stok,7,$data['mobil_kw1'],$data['mobil_kw2']));
        
        //$total=($data['sepeda_kw1']+$data['sepeda_kw2'])*$data['sepeda_bundel'];
        $this->db->query("insert into stok_sub_karcis(id_stok,id_karcis,total_kw1,total_kw2) values(?,?,?,?) ",
                array($id_stok,8,$data['sepeda_kw1'],$data['sepeda_kw2']));
        
        
//        if($this->db->trans_status()===FALSE){
//            $this->db->trans_rollback();
//            log_message();
//        }else{        
//            $this->db->trans_commit();
//        }
//        
//        $this->db->trans_begin();
       
        
        
        $data_karcis=array();
        array_push($data_karcis, array($data['bus_besar_kw1'],$data['bus_besar_kw2']));
        array_push($data_karcis, array($data['bus_sedang_kw1'],$data['bus_sedang_kw2']));
        array_push($data_karcis, array($data['truk_besar_kw1'],$data['truk_besar_kw2']));
        array_push($data_karcis, array($data['truk_sedang_kw1'],$data['truk_sedang_kw2']));
        array_push($data_karcis, array($data['truk_gandeng_kw1'],$data['truk_gandeng_kw2']));
        array_push($data_karcis, array($data['sepeda_motor_kw1'],$data['sepeda_motor_kw2']));
        array_push($data_karcis, array($data['mobil_kw1'],$data['mobil_kw2']));
        array_push($data_karcis, array($data['sepeda_kw1'],$data['sepeda_kw2']));
        
        
        $stokkarcis[0][0]+=$data['bus_besar_kw1'];
        $stokkarcis[0][1]+=$data['bus_besar_kw2'];
        
        $stokkarcis[1][0]+=$data['bus_sedang_kw1'];
        $stokkarcis[1][1]+=$data['bus_sedang_kw2'];
        
        $stokkarcis[2][0]+=$data['truk_besar_kw1'];
        $stokkarcis[2][1]+=$data['truk_besar_kw2'];
        
        $stokkarcis[3][0]+=$data['truk_sedang_kw1'];
        $stokkarcis[3][1]+=$data['truk_sedang_kw2'];
        
        $stokkarcis[4][0]+=$data['truk_gandeng_kw1'];
        $stokkarcis[4][1]+=$data['truk_gandeng_kw2'];
        
        $stokkarcis[5][0]+=$data['sepeda_motor_kw1'];
        $stokkarcis[5][1]+=$data['sepeda_motor_kw2'];
        
        $stokkarcis[6][0]+=$data['mobil_kw1'];
        $stokkarcis[6][1]+=$data['mobil_kw2'];
        
        $stokkarcis[7][0]+=$data['sepeda_kw1'];
        $stokkarcis[7][1]+=$data['sepeda_kw2'];
        
        
        //insert tabel laporan bulan
        $tahun=date('Y');
        $cek=$this->cekLaporanBulan($data['bulan']);
        
        for($i=0;$i<8;$i++){
            
            if($cek){
                //updating data laporan bulan
                $this->db->query("update laporan_bulan set stok_kw1_awal=stok_kw1_awal+?,stok_kw2_awal=stok_kw2_awal+? where id_karcis=? and bulan=? and tahun=?",
                        array($data_karcis[$i][0],$data_karcis[$i][1],$i+1,$data['bulan'],$tahun));
                
            }else{
                //inserting data laporan bulan
                $this->db->query("insert into laporan_bulan(bulan,tahun,id_karcis,stok_kw1_awal,stok_kw2_awal) values(?,?,?,?,?) ",
                array($data['bulan'],$tahun,$i+1,$stokkarcis[$i][0],$stokkarcis[$i][1]));
            }
            
            //update stok porporasi dan gudang
            $this->db->query("update jenis_karcis set stok_kw1=?,stok_kw2=?,stok_kw1_gudang=stok_kw1_gudang-?,stok_kw2_gudang=stok_kw2_gudang-? where id_karcis=?",
                    array($stokkarcis[$i][0],$stokkarcis[$i][1],$data_karcis[$i][0],$data_karcis[$i][1],$i+1));
        }
        
        
    
    }
    
     public function cekLaporanBulan($bulan){
       
       $tahun = date('Y');
       
       $q=$this->db->query("select id from laporan_bulan where bulan=? and tahun=?",array($bulan,$tahun));
       if($q->num_rows()>0){
           return true;
       }else{
           return false;
       }
     }
     
     public function cekSudahPengadaan($bulan,$tahun){
         $q=$this->db->query("select id_stok from stok_karcis where bulan=? and tahun=?",
                 array($bulan,$tahun));
         
         if($q->num_rows>0){
             return true;
         }else{
             return false;
         }
         
     }
     
     public function PengadaanBulanIni(){
         $q=$this->db->query("select id_stok,nama_penyetok from stok_karcis where bulan=? and tahun=?",
                 array(date('n'),date('Y')));
         
         if($q->num_rows>0){
             $h=$q->row();
             
             return array($h->id_stok,$h->nama_penyetok);
         }else{
             return array('','Tidak ada');
         }
         
     }
     
      public function PengadaanIDStok($id){
         $q=$this->db->query("select id_stok,nama_penyetok,bulan,tahun,waktu from stok_karcis where id_stok=?",
                 array($id));
         
         if($q->num_rows>0){
             $h=$q->row();
             
             return array($h->id_stok,$h->nama_penyetok,$h->bulan,$h->tahun,$h->waktu);
         }else{
             return array('','Tidak ada');
         }
         
     }
     
     public function PengadaanGudangIDStok($id){
         $q=$this->db->query("select id_stok_gudang,nama_penyetor,bulan,tahun,waktu from stok_gudang where id_stok_gudang=?",
                 array($id));
         
         if($q->num_rows>0){
             $h=$q->row();
             
             return array($h->id_stok_gudang,$h->nama_penyetor,$h->bulan,$h->tahun,$h->waktu);
         }else{
             return array('','Tidak ada');
         }
         
     }
     
     public function batalkanPengadaan($id){
         $bulan=$this->PengadaanIDStok($id);
         
         if($bulan[2]==date('n') && $bulan[3]==date('Y')){
             
             
            //ambil data karcis
             $hasil=$this->db->query("select total_kw1,total_kw2 from stok_sub_karcis where id_stok=? order by id_karcis asc",array($id)); 
             $hs=$hasil->result();
             
             $karcis=array();
             foreach($hs as $h){
                 array_push($karcis, array($h->total_kw1,$h->total_kw2));
             }
             
             //delete stok_sub_karcis
             $this->db->query("delete from stok_sub_karcis where id_stok=?",array($id));

            //delete stok_karcis
             $this->db->query("delete from stok_karcis where id_stok=?",array($id));
             
             //pengurangan laporan bulan
             for($i=0;$i<count($karcis);$i++){
                $this->db->query("update laporan_bulan set stok_kw1_awal=stok_kw1_awal-?, stok_kw2_awal=stok_kw2_awal-? where bulan=".date('n')." and tahun=".date('Y')." and id_karcis=".($i+1),
                        array((int)$karcis[$i][0],(int)$karcis[$i][1]));
             }
             
             //pengurangan stok karcis
             for($i=0;$i<count($karcis);$i++){
                $this->db->query("update jenis_karcis set stok_kw1=stok_kw1-?,stok_kw2=stok_kw2-? where id_karcis=".($i+1),
                        array((int)$karcis[$i][0],(int)$karcis[$i][1]));
             }
             
             return true;
         }else{
             return false;
         }
     }
     
     
     public function cekStokKW1DiGUdang($idkarcis,$stok){
         $q=$this->db->query("select id_karcis from jenis_karcis where id_karcis=? and stok_kw1_gudang>=?",
                 array($idkarcis,$stok));
         if($q->num_rows()>0){
             return true;
         }else{
             return false;
         }
         
     }
     
     public function cekStokKW2DiGUdang($idkarcis,$stok){
         $q=$this->db->query("select id_karcis from jenis_karcis where id_karcis=? and stok_kw2_gudang>=?",
                 array($idkarcis,$stok));
         if($q->num_rows()>0){
             return true;
         }else{
             return false;
         }
         
     }
}