<h3>Pengadaan Gudang atau Pencetakan Bulan <?php echo $this->karcis->bulan_id(date('n'));?> Tahun <?php echo date('Y');?></h3>
<br>
<div style="float:left">
    <form action="" name="pengadaan_gudang" method="POST" >
<table width="200" border="1" bordercolor="#000000">
  <tr>
    <td width="50"><div align="center"><strong>Jenis Karcis </strong></div></td>
    <td width="33"><div align="center"><strong>KW I (Kode Wilayah II) </strong></div></td>
    <td width="31"><strong>KW II (Kode Wilayah II)  </strong></td>
   
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
        <br><br>
        <label style="color:red;">
        <input type="checkbox" name="stoklama" value="1" />
Hapus Stok Lama (Stok Porporasi dan Stok Gudang lama akan dihapus)</label>
            
    <br><br>
    <p><strong>NAMA PENYETOR :</strong> 
  <input name="nama_operator" type="text" id="nama_operator" />
</p>
<p>
          <input type="submit" name="submit" value="Submit" />
    </form>
    </div>
<div style="float:left;margin-left:20px">
    
<?php echo validation_errors();

?>
</div>

<div style="clear:both"></div>
