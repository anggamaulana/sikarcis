<p class="style1"><h3>LAPORAN PENGELOLAAN KARCIS</h3></p>
<form action="<?php echo site_url('main/laporan');?>" name="LAPORAN" method="post">
    <p class="style1">
        <select name="tipe_laporan" size="1" id="bulan_laporan">
            <option value="3" selected="selected">Penerimaan & Pengeluaran Porporasi</option>
            <option value="1">Sirkulasi Gudang</option>
           
        </select>
        Bulan : 
        <select name="bulan_laporan" size="1" id="bulan_laporan">
            <option value="13" selected="selected">Semua Bulan</option>
            <option value="1" >JANUARI</option>
            <option value="2">FEBRUARI</option>
            <option value="3">MARET</option>
            <option value="4">APRIL</option>
            <option value="5">MEI</option>
            <option value="6">JUNI</option>
            <option value="7">JULI</option>
            <option value="8">AGUSTUS</option>
            <option value="9">SEPTEMBER</option>
            <option value="10">OKTOBER</option>
            <option value="11">NOVEMBER</option>
            <option value="12">DESEMBER</option>

        </select>
        Tahun : <input type="text" name="tahun" value="<?php echo set_value('tahun');?>">
        <input type="submit" name="submit" value="Cari">
        <?php echo validation_errors(); ?>
    </p>
</form>
<form action="<?php echo site_url('main/laporanexcel');?>" name="LAPORAN" method="post">
        <input type="hidden" name="tahun" value="<?php echo set_value('tahun');?>">
        <input type="hidden" name="tipe_laporan" value="<?php echo $this->input->post('tipe_laporan');?>">
        <input type="hidden" name="bulan_laporan" value="<?php echo $this->input->post('bulan_laporan');?>">
        
    <input type="submit" name="submit" value="Export ke Excel">
</form>
<hr>
<?php
if (isset($_POST['submit'])) {
  
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
}
?>