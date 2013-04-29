<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 
 * 
 */

class Pengadaan_gudang_model extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
    
    
    public function simpanPengadaan($data){
        $tahun=date('Y');
        $bulan=date('n');
        
        $stok=$this->db->query("select id_karcis,stok_kw1_gudang,stok_kw2_gudang from jenis_karcis where id_karcis in(1,2,3,4,5,6,7,8) order by id_karcis asc");
        $stokakhir=$stok->result();
        $stokkarcis=array();
        foreach($stokakhir as $st){            
            array_push($stokkarcis, array($st->stok_kw1_gudang,$st->stok_kw2_gudang));
        }
        
        
            
         $this->db->query("insert into stok_gudang(nama_penyetor,bulan,tahun) values(?,?,?)",array($data['nama_operator'],$bulan,$tahun));
        
        $id_stok=$this->db->insert_id();
        
        $this->db->query("insert into stok_gudang_sub(id_stok_gudang,id_karcis,total_kw1,total_kw2) values(?,?,?,?) ",
                array($id_stok,1,$data['bus_besar_kw1'],$data['bus_besar_kw2']));
        
       
        $this->db->query("insert into stok_gudang_sub(id_stok_gudang,id_karcis,total_kw1,total_kw2) values(?,?,?,?) ",
                array($id_stok,2,$data['bus_sedang_kw1'],$data['bus_sedang_kw2']));
        
       
        $this->db->query("insert into stok_gudang_sub(id_stok_gudang,id_karcis,total_kw1,total_kw2) values(?,?,?,?) ",
                array($id_stok,3,$data['truk_besar_kw1'],$data['truk_besar_kw2']));
        
      
        $this->db->query("insert into stok_gudang_sub(id_stok_gudang,id_karcis,total_kw1,total_kw2) values(?,?,?,?) ",
                array($id_stok,4,$data['truk_sedang_kw1'],$data['truk_sedang_kw2']));
        
       
        $this->db->query("insert into stok_gudang_sub(id_stok_gudang,id_karcis,total_kw1,total_kw2) values(?,?,?,?) ",
                array($id_stok,5,$data['truk_gandeng_kw1'],$data['truk_gandeng_kw2']));
        
       
        $this->db->query("insert into stok_gudang_sub(id_stok_gudang,id_karcis,total_kw1,total_kw2) values(?,?,?,?) ",
                array($id_stok,6,$data['sepeda_motor_kw1'],$data['sepeda_motor_kw2']));
        
       
        $this->db->query("insert into stok_gudang_sub(id_stok_gudang,id_karcis,total_kw1,total_kw2) values(?,?,?,?) ",
                array($id_stok,7,$data['mobil_kw1'],$data['mobil_kw2']));
        
       
        $this->db->query("insert into stok_gudang_sub(id_stok_gudang,id_karcis,total_kw1,total_kw2) values(?,?,?,?) ",
                array($id_stok,8,$data['sepeda_kw1'],$data['sepeda_kw2']));
        
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
        
        
        
        for($i=0;$i<8;$i++){

            //ubah stok gudang
            $this->db->query("update jenis_karcis set stok_kw1_gudang=?,stok_kw2_gudang=? where id_karcis=?",array($stokkarcis[$i][0],$stokkarcis[$i][1],$i+1));
        }
        
        
        //new install
        if($this->install()==true){
            //sistem baru terinstall maka pengadaan pertama masuk saldo awal
            for($i=0;$i<8;$i++){

                //ubah stok gudang
                $this->db->query("update laporan_sirkulasi_gudang set stok_kw1_awal=stok_kw1_awal+?, stok_kw2_awal=stok_kw2_awal+? where id_karcis=? and bulan=? and tahun=?",
                        array((int)$data_karcis[$i][0],(int)$data_karcis[$i][1],$i+1,(int)$bulan,(int)$tahun));
            }
             $this->db->query("update stok_gudang set bulan=0 where id_stok_gudang=? ",array($id_stok));
        }
    }
    
    
    public function simpanPengadaanHapusStokLama($data){
         $tahun=date('Y');
        $bulan=date('n');
        $this->updateGantiGudang($bulan, $tahun);
        
         $this->db->query("insert into stok_gudang(nama_penyetor,bulan,tahun,ganti_gudang) values(?,?,?,?)",
                 array($data['nama_operator'],$bulan,$tahun,1));
        
        $id_stok=$this->db->insert_id();
        
        $this->db->query("insert into stok_gudang_sub(id_stok_gudang,id_karcis,total_kw1,total_kw2) values(?,?,?,?) ",
                array($id_stok,1,$data['bus_besar_kw1'],$data['bus_besar_kw2']));
        
       
        $this->db->query("insert into stok_gudang_sub(id_stok_gudang,id_karcis,total_kw1,total_kw2) values(?,?,?,?) ",
                array($id_stok,2,$data['bus_sedang_kw1'],$data['bus_sedang_kw2']));
        
       
        $this->db->query("insert into stok_gudang_sub(id_stok_gudang,id_karcis,total_kw1,total_kw2) values(?,?,?,?) ",
                array($id_stok,3,$data['truk_besar_kw1'],$data['truk_besar_kw2']));
        
      
        $this->db->query("insert into stok_gudang_sub(id_stok_gudang,id_karcis,total_kw1,total_kw2) values(?,?,?,?) ",
                array($id_stok,4,$data['truk_sedang_kw1'],$data['truk_sedang_kw2']));
        
       
        $this->db->query("insert into stok_gudang_sub(id_stok_gudang,id_karcis,total_kw1,total_kw2) values(?,?,?,?) ",
                array($id_stok,5,$data['truk_gandeng_kw1'],$data['truk_gandeng_kw2']));
        
       
        $this->db->query("insert into stok_gudang_sub(id_stok_gudang,id_karcis,total_kw1,total_kw2) values(?,?,?,?) ",
                array($id_stok,6,$data['sepeda_motor_kw1'],$data['sepeda_motor_kw2']));
        
       
        $this->db->query("insert into stok_gudang_sub(id_stok_gudang,id_karcis,total_kw1,total_kw2) values(?,?,?,?) ",
                array($id_stok,7,$data['mobil_kw1'],$data['mobil_kw2']));
        
       
        $this->db->query("insert into stok_gudang_sub(id_stok_gudang,id_karcis,total_kw1,total_kw2) values(?,?,?,?) ",
                array($id_stok,8,$data['sepeda_kw1'],$data['sepeda_kw2']));
        
        
         $data_karcis=array();
        array_push($data_karcis, array($data['bus_besar_kw1'],$data['bus_besar_kw2']));
        array_push($data_karcis, array($data['bus_sedang_kw1'],$data['bus_sedang_kw2']));
        array_push($data_karcis, array($data['truk_besar_kw1'],$data['truk_besar_kw2']));
        array_push($data_karcis, array($data['truk_sedang_kw1'],$data['truk_sedang_kw2']));
        array_push($data_karcis, array($data['truk_gandeng_kw1'],$data['truk_gandeng_kw2']));
        array_push($data_karcis, array($data['sepeda_motor_kw1'],$data['sepeda_motor_kw2']));
        array_push($data_karcis, array($data['mobil_kw1'],$data['mobil_kw2']));
        array_push($data_karcis, array($data['sepeda_kw1'],$data['sepeda_kw2']));
        
        
        for($i=0;$i<8;$i++){

            //ubah stok gudang
            $this->db->query("update jenis_karcis set stok_kw1_gudang=?,stok_kw2_gudang=?,stok_kw1=0,stok_kw2=0 where id_karcis=?",
                    array($data_karcis[$i][0],$data_karcis[$i][1],$i+1));
            
            //ubah laporan gudang
            $this->db->query("update laporan_sirkulasi_gudang set stok_kw1_awal=?,stok_kw2_awal=? where id_karcis=?",
                   array($data_karcis[$i][0],$data_karcis[$i][1],$i+1));
        }
        
        $this->updateGantiPorporasi($bulan, $tahun);
        
        //new install
        if($this->install()==true){
            //sistem baru terinstall maka pengadaan pertama masuk saldo awal
            
             $this->db->query("update stok_gudang set bulan=0 where id_stok_gudang=? ",array($id_stok));
        }
        
    }
    
     
     public function install(){       
       $q=$this->db->query("select admin from admin where admin='install' and password='yes'");
       if($q->num_rows()>0){
           $this->db->query("update admin set password='no' where admin='install'");
           return true;
       }else{
           return false;
       }
     }
     
     
     public function updateGantiGudang($bulan,$tahun){
         $this->db->query("update stok_gudang set ganti_gudang=0 where ganti_gudang=1 and bulan=? and tahun=?",
                 array($bulan,$tahun));
     }
     
     public function updateGantiPorporasi($bulan,$tahun){
         $this->db->query("update laporan_bulan set stok_kw1_awal=0, stok_kw2_awal=0 where bulan=? and tahun=?",
                 array($bulan,$tahun));
     }
     
}