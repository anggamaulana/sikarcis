<center>
<h3>Halaman Khusus Admin</h3><br>
<form id="form1" name="form1" method="post" action="<?php echo site_url('main/login');?>">
<table width="279" border="0">
  <tr>
    <td>Username</td>
    <td>
      <label>
        <input name="username" type="text" id="username" />
        </label>
   
    </td>
  </tr>
  <tr>
    <td>Password</td>
    <td><label>
      <input name="password" type="password" id="password" />
    </label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
        <input type="hidden" name="redir" value="<?php if(strcmp($this->uri->segment(2),'login')!=0)echo current_url(); else echo $this->input->post('redir',true); ?>" />
        <label>
      <input type="submit" name="Submit" value="Masuk" />
    </label></td>
  </tr>
</table>
 </form>
<?php echo validation_errors();
if(isset($pesan))echo $pesan;

?>
</center>

