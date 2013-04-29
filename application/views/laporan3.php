<h3>Laporan Sirkulasi Gudang Tahun <?php echo $this->input->post('tahun',true); ?> Untuk Mobil Dan Motor</h3>
<table width="1000" border="1" style="color:#000">
  <tr>
    <td rowspan="2" bordercolor="#666666" bgcolor="#FFFFFF"><div align="center">No</div></td>
    <td rowspan="2" bordercolor="#666666" bgcolor="#FFFFFF"><div align="center">Bulan</div>      <div align="center"></div></td>
    <td colspan="4" bordercolor="#CC6633" bgcolor="#CCCCCC"><div align="center"><strong>Stok Awal<br>(Gudang) </strong></div></td>
    <td colspan="4" bordercolor="#CC6633" bgcolor="#FFFFFF"><div align="center"><strong>Cetak</strong></div></td>
    <td colspan="4" bordercolor="#CC6633" bgcolor="#CCCCCC"><div align="center"><strong>Jumlah<br>(Stok Awal+Cetak)</strong></div></td>
    <td colspan="4" bordercolor="#3366FF" bgcolor="#FFFFFF"><div align="center"><strong>Porporasi</strong></div></td>
    <td colspan="4" bgcolor="#99CC33"><div align="center"><strong>Sisa di Gudang<br>(Jumlah-Porporasi)</strong></div></td>
  </tr>
  <tr>
    <td bordercolor="#CC6633" bgcolor="#CCCCCC"><div align="center">Motor Kw1 </div></td>
    <td bordercolor="#CC6633" bgcolor="#CCCCCC"><div align="center">Mobil Kw1 </div></td>
    <td bordercolor="#CC6633" bgcolor="#CCCCCC"><div align="center">Motor Kw2 </div></td>
    <td bordercolor="#CC6633" bgcolor="#CCCCCC"><div align="center">Mobil Kw2 </div></td>
    <td bordercolor="#CC6633" bgcolor="#FFFFFF"><div align="center">Motor Kw1 </div></td>
    <td bordercolor="#CC6633" bgcolor="#FFFFFF"><div align="center">Mobil Kw1 </div></td>
    <td bordercolor="#CC6633" bgcolor="#FFFFFF"><div align="center">Motor Kw2 </div></td>
    <td bordercolor="#CC6633" bgcolor="#FFFFFF"><div align="center">Mobil Kw2 </div></td>
    <td bordercolor="#CC6633" bgcolor="#CCCCCC"><div align="center">Motor Kw1 </div></td>
    <td bordercolor="#CC6633" bgcolor="#CCCCCC"><div align="center">Mobil Kw1 </div></td>
    <td bordercolor="#CC6633" bgcolor="#CCCCCC"><div align="center">Motor Kw2 </div></td>
    <td bordercolor="#CC6633" bgcolor="#CCCCCC"><div align="center">Mobil Kw2 </div></td>
    <td bordercolor="#3366FF" bgcolor="#FFFFFF"><div align="center">Motor Kw1 </div></td>
    <td bordercolor="#3366FF" bgcolor="#FFFFFF"><div align="center">Mobil Kw1 </div></td>
    <td bordercolor="#3366FF" bgcolor="#FFFFFF"><div align="center">Motor Kw2 </div></td>
    <td bordercolor="#3366FF" bgcolor="#FFFFFF"><div align="center">Mobil Kw2 </div></td>
    <td bgcolor="#99CC33"><div align="center">Motor Kw1 </div></td>
    <td bgcolor="#99CC33"><div align="center">Mobil Kw1 </div></td>
    <td bgcolor="#99CC33"><div align="center">Motor Kw2 </div></td>
    <td bgcolor="#99CC33"><div align="center">Mobil Kw2 </div></td>
  </tr>
  <tr>
    <td bordercolor="#666666" bgcolor="#FFFFFF"><div align="center">1</div></td>
    <td bgcolor="#FFFFFF">Januari</td>
    <?php
        for($i=0;$i<=3;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#CCCCCC">'.$laporan[0][$i].'&nbsp;</td>';
        }
    ?>
    <?php
        for($i=4;$i<=7;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#FFF">'.$laporan[0][$i].'&nbsp;</td>';
        }
    ?>
   <?php
        for($i=8;$i<=11;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#CCCCCC">'.$laporan[0][$i].'&nbsp;</td>';
        }
    ?>
    <?php
        for($i=12;$i<=15;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#FFF">'.$laporan[0][$i].'&nbsp;</td>';
        }
    ?>
    <?php
        for($i=16;$i<=19;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#99CC33">'.$laporan[0][$i].'&nbsp;</td>';
        }
    ?>
  </tr>
  <tr>
    <td bordercolor="#666666" bgcolor="#FFFFFF"><div align="center">2</div></td>
    <td bgcolor="#FFFFFF">Februari</td>
    <?php
        for($i=0;$i<=3;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#CCCCCC">'.$laporan[1][$i].'&nbsp;</td>';
        }
    ?>
    <?php
        for($i=4;$i<=7;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#FFF">'.$laporan[1][$i].'&nbsp;</td>';
        }
    ?>
   <?php
        for($i=8;$i<=11;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#CCCCCC">'.$laporan[1][$i].'&nbsp;</td>';
        }
    ?>
    <?php
        for($i=12;$i<=15;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#FFF">'.$laporan[1][$i].'&nbsp;</td>';
        }
    ?>
    <?php
        for($i=16;$i<=19;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#99CC33">'.$laporan[1][$i].'&nbsp;</td>';
        }
    ?>
  </tr>
  <tr>
    <td bordercolor="#666666" bgcolor="#FFFFFF"><div align="center">3</div></td>
    <td bgcolor="#FFFFFF">Maret</td>
    <?php
        for($i=0;$i<=3;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#CCCCCC">'.$laporan[2][$i].'&nbsp;</td>';
        }
    ?>
    <?php
        for($i=4;$i<=7;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#FFF">'.$laporan[2][$i].'&nbsp;</td>';
        }
    ?>
   <?php
        for($i=8;$i<=11;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#CCCCCC">'.$laporan[2][$i].'&nbsp;</td>';
        }
    ?>
    <?php
        for($i=12;$i<=15;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#FFF">'.$laporan[2][$i].'&nbsp;</td>';
        }
    ?>
    <?php
        for($i=16;$i<=19;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#99CC33">'.$laporan[2][$i].'&nbsp;</td>';
        }
    ?>
  </tr>
  <tr>
    <td bordercolor="#666666" bgcolor="#FFFFFF"><div align="center">4</div></td>
    <td bgcolor="#FFFFFF">April</td>
    <?php
        for($i=0;$i<=3;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#CCCCCC">'.$laporan[3][$i].'&nbsp;</td>';
        }
    ?>
    <?php
        for($i=4;$i<=7;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#FFF">'.$laporan[3][$i].'&nbsp;</td>';
        }
    ?>
   <?php
        for($i=8;$i<=11;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#CCCCCC">'.$laporan[3][$i].'&nbsp;</td>';
        }
    ?>
    <?php
        for($i=12;$i<=15;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#FFF">'.$laporan[3][$i].'&nbsp;</td>';
        }
    ?>
    <?php
        for($i=16;$i<=19;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#99CC33">'.$laporan[3][$i].'&nbsp;</td>';
        }
    ?>
  </tr>
  <tr>
    <td bordercolor="#666666" bgcolor="#FFFFFF"><div align="center">5</div></td>
    <td bgcolor="#FFFFFF">Mei</td>
    <?php
        for($i=0;$i<=3;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#CCCCCC">'.$laporan[4][$i].'&nbsp;</td>';
        }
    ?>
    <?php
        for($i=4;$i<=7;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#FFF">'.$laporan[4][$i].'&nbsp;</td>';
        }
    ?>
   <?php
        for($i=8;$i<=11;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#CCCCCC">'.$laporan[4][$i].'&nbsp;</td>';
        }
    ?>
    <?php
        for($i=12;$i<=15;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#FFF">'.$laporan[4][$i].'&nbsp;</td>';
        }
    ?>
    <?php
        for($i=16;$i<=19;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#99CC33">'.$laporan[4][$i].'&nbsp;</td>';
        }
    ?>
  </tr>
  <tr>
    <td bordercolor="#666666" bgcolor="#FFFFFF"><div align="center">6</div></td>
    <td bgcolor="#FFFFFF">Juni</td>
    <?php
        for($i=0;$i<=3;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#CCCCCC">'.$laporan[5][$i].'&nbsp;</td>';
        }
    ?>
    <?php
        for($i=4;$i<=7;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#FFF">'.$laporan[5][$i].'&nbsp;</td>';
        }
    ?>
   <?php
        for($i=8;$i<=11;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#CCCCCC">'.$laporan[5][$i].'&nbsp;</td>';
        }
    ?>
    <?php
        for($i=12;$i<=15;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#FFF">'.$laporan[5][$i].'&nbsp;</td>';
        }
    ?>
    <?php
        for($i=16;$i<=19;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#99CC33">'.$laporan[5][$i].'&nbsp;</td>';
        }
    ?>
  </tr>
  <tr>
    <td bordercolor="#666666" bgcolor="#FFFFFF"><div align="center">7</div></td>
    <td bgcolor="#FFFFFF">Juli</td>
   <?php
        for($i=0;$i<=3;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#CCCCCC">'.$laporan[6][$i].'&nbsp;</td>';
        }
    ?>
    <?php
        for($i=4;$i<=7;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#FFF">'.$laporan[6][$i].'&nbsp;</td>';
        }
    ?>
   <?php
        for($i=8;$i<=11;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#CCCCCC">'.$laporan[6][$i].'&nbsp;</td>';
        }
    ?>
    <?php
        for($i=12;$i<=15;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#FFF">'.$laporan[6][$i].'&nbsp;</td>';
        }
    ?>
    <?php
        for($i=16;$i<=19;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#99CC33">'.$laporan[6][$i].'&nbsp;</td>';
        }
    ?>
  </tr>
  <tr>
    <td bordercolor="#666666" bgcolor="#FFFFFF"><div align="center">8</div></td>
    <td bgcolor="#FFFFFF">Agustus</td>
    <?php
        for($i=0;$i<=3;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#CCCCCC">'.$laporan[7][$i].'&nbsp;</td>';
        }
    ?>
    <?php
        for($i=4;$i<=7;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#FFF">'.$laporan[7][$i].'&nbsp;</td>';
        }
    ?>
   <?php
        for($i=8;$i<=11;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#CCCCCC">'.$laporan[7][$i].'&nbsp;</td>';
        }
    ?>
    <?php
        for($i=12;$i<=15;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#FFF">'.$laporan[7][$i].'&nbsp;</td>';
        }
    ?>
    <?php
        for($i=16;$i<=19;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#99CC33">'.$laporan[7][$i].'&nbsp;</td>';
        }
    ?>
  </tr>
  <tr>
    <td bordercolor="#666666" bgcolor="#FFFFFF"><div align="center">9</div></td>
    <td bgcolor="#FFFFFF">September</td>
    <?php
        for($i=0;$i<=3;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#CCCCCC">'.$laporan[8][$i].'&nbsp;</td>';
        }
    ?>
    <?php
        for($i=4;$i<=7;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#FFF">'.$laporan[8][$i].'&nbsp;</td>';
        }
    ?>
   <?php
        for($i=8;$i<=11;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#CCCCCC">'.$laporan[8][$i].'&nbsp;</td>';
        }
    ?>
    <?php
        for($i=12;$i<=15;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#FFF">'.$laporan[8][$i].'&nbsp;</td>';
        }
    ?>
    <?php
        for($i=16;$i<=19;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#99CC33">'.$laporan[8][$i].'&nbsp;</td>';
        }
    ?>
  </tr>
  <tr>
    <td bordercolor="#666666" bgcolor="#FFFFFF"><div align="center">10</div></td>
    <td bgcolor="#FFFFFF">Oktober</td>
   <?php
        for($i=0;$i<=3;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#CCCCCC">'.$laporan[9][$i].'&nbsp;</td>';
        }
    ?>
    <?php
        for($i=4;$i<=7;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#FFF">'.$laporan[9][$i].'&nbsp;</td>';
        }
    ?>
   <?php
        for($i=8;$i<=11;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#CCCCCC">'.$laporan[9][$i].'&nbsp;</td>';
        }
    ?>
    <?php
        for($i=12;$i<=15;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#FFF">'.$laporan[9][$i].'&nbsp;</td>';
        }
    ?>
    <?php
        for($i=16;$i<=19;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#99CC33">'.$laporan[9][$i].'&nbsp;</td>';
        }
    ?>
  </tr>
  <tr>
    <td bordercolor="#666666" bgcolor="#FFFFFF"><div align="center">11</div></td>
    <td bgcolor="#FFFFFF">November</td>
    <?php
        for($i=0;$i<=3;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#CCCCCC">'.$laporan[10][$i].'&nbsp;</td>';
        }
    ?>
    <?php
        for($i=4;$i<=7;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#FFF">'.$laporan[10][$i].'&nbsp;</td>';
        }
    ?>
   <?php
        for($i=8;$i<=11;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#CCCCCC">'.$laporan[10][$i].'&nbsp;</td>';
        }
    ?>
    <?php
        for($i=12;$i<=15;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#FFF">'.$laporan[10][$i].'&nbsp;</td>';
        }
    ?>
    <?php
        for($i=16;$i<=19;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#99CC33">'.$laporan[10][$i].'&nbsp;</td>';
        }
    ?>
  </tr>
  <tr>
    <td bordercolor="#666666" bgcolor="#FFFFFF"><div align="center">12</div></td>
    <td bgcolor="#FFFFFF">Desember</td>
    <?php
        for($i=0;$i<=3;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#CCCCCC">'.$laporan[11][$i].'&nbsp;</td>';
        }
    ?>
    <?php
        for($i=4;$i<=7;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#FFF">'.$laporan[11][$i].'&nbsp;</td>';
        }
    ?>
   <?php
        for($i=8;$i<=11;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#CCCCCC">'.$laporan[11][$i].'&nbsp;</td>';
        }
    ?>
    <?php
        for($i=12;$i<=15;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#FFF">'.$laporan[11][$i].'&nbsp;</td>';
        }
    ?>
    <?php
        for($i=16;$i<=19;$i++){
            echo'<td bordercolor="#CC6633" bgcolor="#99CC33">'.$laporan[11][$i].'&nbsp;</td>';
        }
    ?>
  </tr>
  <tr>
    <td bordercolor="#666666" bgcolor="#FFFFFF"><div align="center"></div></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bordercolor="#CC6633" bgcolor="#CCCCCC">&nbsp;</td>
    <td bordercolor="#CC6633" bgcolor="#CCCCCC">&nbsp;</td>
    <td bordercolor="#CC6633" bgcolor="#CCCCCC">&nbsp;</td>
    <td bordercolor="#CC6633" bgcolor="#CCCCCC">&nbsp;</td>
    <td bordercolor="#CC6633" bgcolor="#FFFFFF">&nbsp;</td>
    <td bordercolor="#CC6633" bgcolor="#FFFFFF">&nbsp;</td>
    <td bordercolor="#CC6633" bgcolor="#FFFFFF">&nbsp;</td>
    <td bordercolor="#CC6633" bgcolor="#FFFFFF">&nbsp;</td>
    <td bordercolor="#CC6633" bgcolor="#CCCCCC">&nbsp;</td>
    <td bordercolor="#CC6633" bgcolor="#CCCCCC">&nbsp;</td>
    <td bordercolor="#CC6633" bgcolor="#CCCCCC">&nbsp;</td>
    <td bordercolor="#CC6633" bgcolor="#CCCCCC">&nbsp;</td>
    <td bordercolor="#3366FF" bgcolor="#FFFFFF">&nbsp;</td>
    <td bordercolor="#3366FF" bgcolor="#FFFFFF">&nbsp;</td>
    <td bordercolor="#3366FF" bgcolor="#FFFFFF">&nbsp;</td>
    <td bordercolor="#3366FF" bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#99CC33">&nbsp;</td>
    <td bgcolor="#99CC33">&nbsp;</td>
    <td bgcolor="#99CC33">&nbsp;</td>
    <td bgcolor="#99CC33">&nbsp;</td>
  </tr>
</table>
