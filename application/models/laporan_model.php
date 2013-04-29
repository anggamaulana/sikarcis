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
            return $this->ambilSirkulasiGudangTahun($tahun);
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
        $q = $this->db->query("select * from laporan_bulan where bulan=? and tahun=? order by id_karcis asc", 
                array($bulan, $tahun));
        $h = $q->result();

        if ($q->num_rows() > 0) {
            $data = array();
            foreach ($h as $hs) {
                $qr = $this->db->query("select ifnull(sum(bundel_kw1),0) as kw1,ifnull(sum(bundel_kw2),0) as kw2 from pengeluaran_karcis where id_karcis=? and MONTH(waktu)=? and YEAR(waktu)=? and waktu>?",
                        array($hs->id_karcis, $bulan, $tahun,$this->waktuGantiGudang($bulan, $tahun)));
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
        $q = $this->db->query("select a.id_karcis,sum(a.total_kw1)as total_kw1,sum(a.total_kw2) as total_kw2
            from stok_sub_karcis a,stok_karcis b where a.id_stok=b.id_stok and b.bulan=? and b.tahun=? and b.waktu>? group by a.id_karcis order by a.id_karcis asc",
                array($bulan,$tahun,$this->waktuGantiGudang($bulan, $tahun)));
        $hasil = $q->result();
        
        if ($q->num_rows() > 0) {
            $data=array();
            foreach($hasil as $hs){
                array_push($data, array($hs->total_kw1,$hs->total_kw2));
            }
         return $data;
         } else {
            return false;
        }
        
    }
    
    
    
    
    
    
    public function ambilPengadaanTahun($tahun){
        $q=$this->db->query("select distinct bulan from stok_karcis where tahun=?",array($tahun));
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
        $q = $this->db->query("select id_karcis,total_kw1,total_kw2
            from stok_sub_karcis where id_stok=? order by id_karcis asc",
                array($id));
        $hasil = $q->result();
        
        if ($q->num_rows() > 0) {
            $data=array();
            foreach($hasil as $hs){
                array_push($data, array($hs->total_kw1,$hs->total_kw2));
                
            }
         return $data;
         } else {
            return false;
        }
        
    }
    
    public function ambilPengadaanGudangIDstok($id){
        $q = $this->db->query("select id_karcis,total_kw1,total_kw2
            from stok_gudang_sub where id_stok_gudang=? order by id_karcis asc",
                array($id));
        $hasil = $q->result();
        
        if ($q->num_rows() > 0) {
            $data=array();
            foreach($hasil as $hs){
                array_push($data, array($hs->total_kw1,$hs->total_kw2));
                
            }
         return $data;
         } else {
            return false;
        }
        
    }
    
    
    
    public function ambilSirkulasiGudangMobilMotorBulan($bulan,$tahun){
       
        $data=array();
        
        $stok_awal=array();
        $cetak=array();
        $jumlah=array();
        $porporasi=array();
       
        
        //stok awal
        $s=$this->db->query("select stok_kw1_awal,stok_kw2_awal from laporan_sirkulasi_gudang where bulan=? and tahun=? and id_karcis in (6,7) order by id_karcis asc",
                array($bulan,$tahun));
        if($s->num_rows>0){
            $h=$s->result();
            foreach($h as $hs){
                array_push($data,$hs->stok_kw1_awal);
                array_push($stok_awal,$hs->stok_kw1_awal);
            }
            foreach($h as $hs){
                array_push($data,$hs->stok_kw2_awal);
                 array_push($stok_awal,$hs->stok_kw2_awal);
            }
        }else{
            for($i=0;$i<4;$i++){
                array_push($data,'-');
                 array_push($stok_awal,0);
            }
        }
        
        //cetak
        
            $s=$this->db->query("select s.bulan,st.id_karcis,sum(st.total_kw1) as total_kw1,sum(st.total_kw2) as total_kw2 from stok_gudang s,stok_gudang_sub st where s.id_stok_gudang=st.id_stok_gudang and s.bulan=? and s.tahun=? and s.waktu>? and st.id_karcis in (6,7) group by st.id_karcis order by st.id_karcis asc",
                array($bulan,$tahun,$this->waktuGantiGudang($bulan, $tahun)));
        
        $h=$s->result();
        if($s->num_rows>0){
            $h=$s->result();
            foreach($h as $hs){
                array_push($data,$hs->total_kw1);
                 array_push($cetak,$hs->total_kw1);
            }
            foreach($h as $hs){
                array_push($data,$hs->total_kw2);
                array_push($cetak,$hs->total_kw2);
            }
        }else{
            for($i=0;$i<4;$i++){
                array_push($data,'-');
             array_push($cetak,0);
            }
        }
        
        //jumlah
        for($i=0;$i<4;$i++){
            array_push($jumlah,$stok_awal[$i]+$cetak[$i]);
            array_push($data,$stok_awal[$i]+$cetak[$i]);
        }
        
        //porporasi
         $s=$this->db->query("select s.bulan,st.id_karcis,sum(st.total_kw1) as total_kw1,sum(st.total_kw2) as total_kw2 from stok_karcis s,stok_sub_karcis st where s.id_stok=st.id_stok and s.bulan=? and s.tahun=? and s.waktu>? and st.id_karcis in (6,7) group by st.id_karcis order by st.id_karcis asc",
                array($bulan,$tahun,$this->waktuGantiGudang($bulan, $tahun)));
        $h=$s->result();
        if($s->num_rows>0){
            $h=$s->result();
            foreach($h as $hs){
                array_push($data,$hs->total_kw1);
                 array_push($porporasi,$hs->total_kw1);
            }
            foreach($h as $hs){
                array_push($data,$hs->total_kw2);
                array_push($porporasi,$hs->total_kw2);
            }
        }else{
            for($i=0;$i<4;$i++){
                array_push($data,'-');
             array_push($porporasi,0);
            }
        }
        
        //sisa
        for($i=0;$i<4;$i++){           
            array_push($data,$jumlah[$i]-$porporasi[$i]);
        }
        
        return $data;
        
        
    }
    
    public function ambilSirkulasiGudangTahun($tahun){
        $data=array();
        for($i=1;$i<=12;$i++){
           array_push($data, $this->ambilSirkulasiGudangMobilMotorBulan($i,$tahun));
        }
        return $data;
    }
    
    
    
    public function waktuGantiGudang($bulan,$tahun){
        $q=$this->db->query("select waktu from stok_gudang where bulan=? and tahun=? and ganti_gudang=1",
                array($bulan,$tahun));
        if($q->num_rows()>0){
            $h=$q->row();
            return $h->waktu;
        }else{
            return "";
        }
    }

}