<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Vestibule 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20130406

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Sistem Informasi Pengelolaan Karcis</title>

<link href="<?php echo base_url().'assets/';?>style.css" rel="stylesheet" type="text/css" media="screen" />

<!--For grc -->
  <?php 

foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach;?>

<!--For grc -->

</head>
<body>
    
<div id="wrapper">
	<div id="menu-wrapper">
		<div id="menu" class="container">
			<ul>
				
                                
                            <li <?php if($menu==0) echo 'class="current_page_item"'; ?>><a href="<?php echo site_url('main');?>">Home</a></li>
				<li <?php if($menu==1) echo 'class="current_page_item"'; ?>><a href="<?php echo site_url('main/pengadaankarcis');?>">Pengadaan Porporasi</a></li>
				<li <?php if($menu==2) echo 'class="current_page_item"'; ?>><a href="<?php echo site_url('main/pengeluarankarcis');?>">Pengeluaran Karcis</a></li>
				
				<li <?php if($menu==4) echo 'class="current_page_item"'; ?>><a href="<?php echo site_url('main/jeniskarcis');?>">Stok Karcis</a></li>
				<li <?php if($menu==6) echo 'class="current_page_item"'; ?>><a href="<?php echo site_url('main/pengadaangudang');?>">Pengadaan Gudang</a></li>
                                <li><a href="<?php echo site_url('main/laporan');?>">Laporan</a></li>
				 <?php
                                if($this->session->userdata('islogin')==true){
                                ?>
                                <li><a href="<?php echo site_url('main/logout');?>">Logout</a></li>
                                <?php
                                }
                                ?>
			</ul>
		</div>
	</div>
	
	<div id="page" class="container">
		<div>
			<?php
                if($menu==1){
                    ?>
                    
                     
                    
                    <p class="style1"><h3>Pengadaan Karcis Porporasi
                     
                        Tahun : <?php echo date('Y'); ?></h3>
                    </p>
                       
                        
                 
                    <a href="<?php echo site_url('main/pengadaankarcis_add') ?>">+Tambah Pengadaan Karcis</a><br>
                        
                       
                        
                    
                    <?php
                }else if($menu==2 && strcmp($this->uri->segment(3),"add")!=0){
                    ?>
                  
                    <p class="style1"><h3>Pengeluaran Karcis Bulan : <?php echo date('F'); ?>
                     
                        Tahun : <?php echo date('Y'); ?></h3>
                    </p>
                    
                    <?php
                }else if($menu==4 && strcmp($this->uri->segment(3),"add")!=0){
                    ?>
                  
                    <p class="style1"><h3>Stok Karcis</h3>
                    </p>
                    
                    <?php
                }else if($menu==6 && strcmp($this->uri->segment(3),"add")!=0){
                    ?>
                  
                    <p class="style1"><h3>Pengadaan Stok Karcis di Gudang atau Pencetakan <?php echo date('Y'); ?></h3>
                    </p>
                         <a href="<?php echo site_url('main/pengadaangudang_add') ?>">+Tambah Pengadaan Gudang</a><br>
                    
                    <?php
                }
                echo $output;
                
                ?>
		</div>
	</div>
	<div id="three-column" class="container">
		
	</div>	
</div>
<div id="footer">
	<p>© 2013 Untitled Inc. All rights reserved. Lorem ipsum dolor sit amet nullam blandit consequat phasellus etiam lorem. Design by <a href="http://www.freecsstemplates.org">FCT</a>.  Photos by <a href="http://fotogrph.com/">Fotogrph</a>.</p>
</div>
<!-- end #footer -->
</body>
</html>
