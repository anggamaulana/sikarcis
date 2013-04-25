<h3>Pengadaan Karcis</h3>
<br><br>

<?php
echo '<h4>Waktu : '.$info[4];
echo '<br>';
echo 'Nama Penyetok : '.$info[1];
echo '</h4>';
$laporan[0][1]=$info[2];
$laporan[0][2]=$info[3];
$data['laporan']=$laporan;
$data['i']=0;
$data['tipe_karcis']=$tipe;

$this->load->view('laporan2',$data);

//if($info[2]==date('n') && $info[3]==date('Y')){
//   echo'<br><br><form id="form1" name="form1" method="post" action="'.site_url('main/del').'">
//  <label>
//  <input type="hidden" name="id" value="'.$info[0].'">
//  <input type="submit" name="batal" value="Batalkan Pengadaan Karcis Bulan Ini('.$this->karcis->bulan_id(date('n')).')" />
//  </label>
//</form>';
  
//}

?>
