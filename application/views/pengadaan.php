<div style="float:left">
<form action="<?php echo site_url('main/simpanpengadaan') ;?>" name="pengadaan_karcis" method="POST" >
<p class="style1"><h3>PENGADAAN BARANG / KARCIS PORPORASI</h3> </p>
<table width="200" border="1" bordercolor="#000000">
  <tr>
    <td width="50"><div align="center"><strong>Jenis Karcis </strong></div></td>
    <td width="33"><div align="center"><strong>KW I </strong></div></td>
    <td width="31"><strong>KW II </strong></td>
   
  </tr>
  <tr>
    <td>Bus Besar </td>
    <td><input name="bus_besar_kw1" type="text" id="bus_besar_kw1" size="20" value="<?php echo set_value('bus_besar_kw1');?>"/></td>
    <td><input name="bus_besar_kw2" type="text" id="bus_besar_kw2" size="20" value="<?php echo set_value('bus_besar_kw2');?>"/></td>
   
  </tr>
  <tr>
    <td>Bus Sedang </td>
    <td><input name="bus_sedang_kw1" type="text" id="bus_sedang_kw1" size="20" value="<?php echo set_value('bus_sedang_kw1');?>"/></td>
    <td><input name="bus_sedang_kw2" type="text" id="bus_sedang_kw2" size="20" value="<?php echo set_value('bus_sedang_kw2');?>"/></td>
   
  </tr>
  <tr>
    <td>Truk Besar </td>
    <td><input name="truk_besar_kw1" type="text" id="truk_besar_kw1" size="20" value="<?php echo set_value('truk_besar_kw1');?>"/></td>
    <td><input name="truk_besar_kw2" type="text" id="truk_besar_kw2" size="20" value="<?php echo set_value('truk_besar_kw2');?>"/></td>
    
  </tr>
  <tr>
    <td>Truk Sedang </td>
    <td><input name="truk_sedang_kw1" type="text" id="truk_sedang_kw1" size="20" value="<?php echo set_value('truk_sedang_kw1');?>"/></td>
    <td><input name="truk_sedang_kw2" type="text" id="truk_sedang_kw2" size="20" value="<?php echo set_value('truk_sedang_kw2');?>"/></td>
    
  </tr>
  <tr>
    <td>Truk Gandeng </td>
    <td><input name="truk_gandeng_kw1" type="text" id="truk_gandeng_kw1" size="20" value="<?php echo set_value('truk_gandeng_kw1');?>"/></td>
    <td><input name="truk_gandeng_kw2" type="text" id="truk_gandeng_kw2" size="20" value="<?php echo set_value('truk_gandeng_kw2');?>"/></td>
    
  </tr>
  <tr>
    <td>Sepeda Motor </td>
    <td><input name="sepeda_motor_kw1" type="text" id="sepeda_motor_kw1" size="20" value="<?php echo set_value('sepeda_motor_kw1');?>"/></td>
    <td><input name="sepeda_motor_kw2" type="text" id="Sepeda_motor_kw2" size="20" value="<?php echo set_value('sepeda_motor_kw2');?>"/></td>
    
  </tr>
  <tr>
    <td>Mobil</td>
    <td><input name="mobil_kw1" type="text" id="mobil_kw1" size="20" value="<?php echo set_value('mobil_kw1');?>"/></td>
    <td><input name="mobil_kw2" type="text" id="mobil_kw2" size="20" value="<?php echo set_value('mobil_kw2');?>"/></td>
    
  </tr>
  <tr>
    <td>Sepeda</td>
    <td><input name="sepeda_kw1" type="text" id="sepeda_kw1" size="20" value="<?php echo set_value('sepeda_kw1');?>"/></td>
    <td><input name="sepeda_kw2" type="text" id="sepeda_kw2" size="20" value="<?php echo set_value('sepeda_kw2');?>"/></td>

  </tr>
</table>
<p>&nbsp;</p>
<p><strong>Pengadaan Porporasi Untuk Bulan</strong> 
  <select name="bulan" size="1" id="bulan_laporan">
   
      <?php
      $bulanini=date('n');
      $bulannext=$bulanini+1;
      
      if($bulanini==12)
          $bulannext=1;
      
      echo ' <option value="'.$bulanini.'" selected="selected">'.$this->karcis->bulan_id($bulanini).'</option>';
      
      ?>
<!--      <option value="1" selected="selected">JANUARI</option>
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
    <option value="12">DESEMBER</option>-->
    
  </select>
     <?php echo date('Y'); ?>
</p>
<p><strong>NAMA OPERATOR :</strong> 
  <input name="nama_operator" type="text" id="nama_operator" />
</p>
<p>
  <input type="submit" name="Submit" value="Submit" />
</p>
</form>
    
</div>
<div style="float:left;margin-left:20px">
    <br><br>
<?php echo validation_errors();
if(isset($pengadaanada))echo $pengadaanada;
?>
</div>

<div style="clear:both"></div>