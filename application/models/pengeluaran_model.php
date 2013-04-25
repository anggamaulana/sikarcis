<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 
 * 
 */

class Pengeluaran_model extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
    
    
   public function cekBatasStokKW1($st,$id){
       $q=$this->db->query("select stok_kw1 from jenis_karcis where id_karcis=? and stok_kw1<?",array($id,$st));
       if($q->num_rows()>0){
           return false;
       }else{
           return true;
       }
   }
   
    public function cekBatasStokKW2($st,$id){
       $q=$this->db->query("select stok_kw1 from jenis_karcis where id_karcis=? and stok_kw1<?",array($id,$st));
       if($q->num_rows()>0){
           return false;
       }else{
           return true;
       }
   }
   
   public function cekLaporanBulanIni(){
       $bulan = date('n');
       $tahun = date('Y');
       
       $q=$this->db->query("select id from laporan_bulan where bulan=? and tahun=?",array($bulan,$tahun));
       if($q->num_rows()>0){
           return true;
       }else{
           return false;
       }
   }
   
   public function cekLaporanGudangBulanIni(){
       $bulan = date('n');
       $tahun = date('Y');
       
       $q=$this->db->query("select id from laporan_sirkulasi_gudang where bulan=? and tahun=?",array($bulan,$tahun));
       if($q->num_rows()>0){
           return true;
       }else{
           return false;
       }
   }
   
    public function tambahLaporanGudangBulanIni(){
       $ambilstoksekarang=$this->db->query("select id_karcis,stok_kw1_gudang,stok_kw2_gudang from jenis_karcis where id_karcis in(1,2,3,4,5,6,7,8) order by id_karcis asc");
       $hasil=$ambilstoksekarang->result();
       $bulan = date('n');
       $tahun = date('Y');
       
       foreach($hasil as $hs){
           $this->db->query("insert into laporan_sirkulasi_gudang(bulan,tahun,id_karcis,stok_kw1_awal,stok_kw2_awal) values(?,?,?,?,?)",
                   array($bulan,$tahun,$hs->id_karcis,$hs->stok_kw1_gudang,$hs->stok_kw2_gudang));
       }
   }
   
   public function tambahLaporanBulanIni(){
       $ambilstoksekarang=$this->db->query("select id_karcis,stok_kw1,stok_kw2 from jenis_karcis where id_karcis in(1,2,3,4,5,6,7,8) order by id_karcis asc");
       $hasil=$ambilstoksekarang->result();
       $bulan = date('n');
       $tahun = date('Y');
       
       foreach($hasil as $hs){
           $this->db->query("insert into laporan_bulan(bulan,tahun,id_karcis,stok_kw1_awal,stok_kw2_awal) values(?,?,?,?,?)",
                   array($bulan,$tahun,$hs->id_karcis,$hs->stok_kw1,$hs->stok_kw2));
       }
   }
   
   public function penguranganStokKarcis($id_karcis,$kw1,$kw2){
        $this->db->query("update jenis_karcis set stok_kw1=stok_kw1-?,stok_kw2=stok_kw2-? where id_karcis=?",array($kw1,$kw2,$id_karcis));
   }
   
   public function kembalikan_stok($primary_key){
       $q=$this->db->query("select id_karcis,bundel_kw1,bundel_kw2 from pengeluaran_karcis where id_pengeluaran=?",array($primary_key));
       $hasil=$q->row();
       $this->db->query("update jenis_karcis set stok_kw1=stok_kw1+?, stok_kw2=stok_kw2+? where id_karcis=?",
               array($hasil->bundel_kw1,$hasil->bundel_kw2,$hasil->id_karcis));
       
   }
   
}