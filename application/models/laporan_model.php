<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 
 * 
 */

class Laporan_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function ambilDataLaporan($tipe_laporan, $bulan, $tahun) {
        if ($tipe_laporan == 1) {
            if ($bulan == 13) {

                return $this->ambilSirkulasiTahun($tahun);
            } else {
                if($dt=$this->ambilSirkulasidiBulan($bulan, $tahun)){
                    $datahsl = array();
                    array_push($datahsl, array($dt, $bulan, $tahun));
                    return $datahsl;
                }else{
                    return false;
                }
            }
        } else if ($tipe_laporan == 2) {
            if ($bulan == 13) {

                return $this->ambilPengadaanTahun($tahun);
            } else {
                if($dt=$this->ambilPengadaanBulan($bulan, $tahun)){
                    $datahsl = array();
                    array_push($datahsl, array($dt, $bulan, $tahun));
                    return $datahsl;
                }else{
                    return false;
                }
            }
        }else if($tipe_laporan == 3){
            if($bulan==13){
                if($dt=$this->ambilSirkulasidanPengadaanTahun($tahun)){                    
                    return $dt;
                }else{
                    return false;
                } 
            } else {
                if($dt=$this->ambilSirkulasidanPengadaanBulan($bulan, $tahun)){                    
                    return $dt;
                }else{
                    return false;
                } 
            }
        }
    }

    public function ambilSirkulasidiBulan($bulan, $tahun) {
        $q = $this->db->query("select * from laporan_bulan where bulan=? and tahun=? order by id_karcis asc", array($bulan, $tahun));
        $h = $q->result();

        if ($q->num_rows() > 0) {
            $data = array();
            foreach ($h as $hs) {
                $qr = $this->db->query("select ifnull(sum(bundel_kw1),0) as kw1,ifnull(sum(bundel_kw2),0) as kw2 from pengeluaran_karcis where id_karcis=? and MONTH(waktu)=? and YEAR(waktu)=?", array($hs->id_karcis, $bulan, $tahun));
                $hsl = $qr->row();
                $sisa1 = $hs->stok_kw1_awal - $hsl->kw1;
                $sisa2 = $hs->stok_kw2_awal - $hsl->kw2;
                array_push($data, array($hs->stok_kw1_awal, $hs->stok_kw2_awal, $hsl->kw1, $hsl->kw2, $sisa1, $sisa2));
            }

            return $data;
        } else {
            return false;
        }
    }

    public function ambilSirkulasiTahun($tahun) {

        $q = $this->db->query("SELECT distinct bulan from laporan_bulan where tahun=2013 order by bulan asc");
        $h = $q->result();

         if ($q->num_rows() > 0) {
            $data = array();
            foreach ($h as $hs) {
                array_push($data, array($this->ambilSirkulasidiBulan($hs->bulan, $tahun), $hs->bulan, $tahun));
            }
            return $data;
         } else {
            return false;
        }
    }
    
    public function ambilPengadaanBulan($bulan,$tahun){
        $q = $this->db->query("select a.id_karcis,a.total_kw1,a.total_kw2,harga_cetak_per_bundel 
            from stok_sub_karcis a,stok_karcis b where a.id_stok=b.id_stok and b.bulan=? and b.tahun=? order by a.id_karcis asc",
                array($bulan,$tahun));
        $hasil = $q->result();
        
        if ($q->num_rows() > 0) {
            $data=array();
            foreach($hasil as $hs){
                array_push($data, array($hs->total_kw1,$hs->total_kw2,$hs->harga_cetak_per_bundel));
            }
         return $data;
         } else {
            return false;
        }
        
    }
    
    
    
    
    
    
    public function ambilPengadaanTahun($tahun){
        $q=$this->db->query("select id_stok,bulan from stok_karcis where tahun=?",array($tahun));
        $hasil=$q->result();
        
        
        if ($q->num_rows() > 0) {
            $data=array();
            foreach($hasil as $hs){
                array_push($data, array($this->ambilPengadaanBulan($hs->bulan, $tahun),$hs->bulan,$tahun));

            }
            return $data;
         } else {
            return false;
        }
    }
    
    public function ambilSirkulasidanPengadaanBulan($bulan,$tahun){
        $q=$this->db->query("select id from laporan_bulan where bulan=? and tahun=?",array($bulan,$tahun));
        
        if($q->num_rows()>0){
            $data=array();
            array_push($data, array($this->ambilPengadaanBulan($bulan, $tahun),$bulan,$tahun,'pengadaan'));
             array_push($data, array($this->ambilSirkulasidiBulan($bulan, $tahun),$bulan,$tahun,'sirkulasi'));
             return $data;
        }else{
            return false;
        }
        
    }
    
    public function ambilSirkulasidanPengadaanTahun($tahun){
        $q=$this->db->query("select distinct bulan from laporan_bulan where tahun=?",array($tahun));
        $hasil=$q->result();
        if($q->num_rows()>0){
            $data=array();
            foreach($hasil as $hs){
                $pengadaan=$this->ambilPengadaanBulan($hs->bulan, $tahun);
                if($pengadaan)$tp='pengadaan';else $tp='kosong';
                
                array_push($data, array($pengadaan,$hs->bulan,$tahun,$tp));                
                 array_push($data, array($this->ambilSirkulasidiBulan($hs->bulan, $tahun),$hs->bulan,$tahun,'sirkulasi'));
            }
             return $data;
        }else{
            return false;
        }
        
    }
    
    
    public function ambilPengadaanIDstok($id){
        $q = $this->db->query("select id_karcis,total_kw1,total_kw2,harga_cetak_per_bundel 
            from stok_sub_karcis where id_stok=? order by id_karcis asc",
                array($id));
        $hasil = $q->result();
        
        if ($q->num_rows() > 0) {
            $data=array();
            foreach($hasil as $hs){
                array_push($data, array($hs->total_kw1,$hs->total_kw2,$hs->harga_cetak_per_bundel));
                
            }
         return $data;
         } else {
            return false;
        }
        
    }

}