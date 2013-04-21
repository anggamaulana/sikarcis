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
<title>Vestibule  by FCT</title>

<link href="<?php echo base_url().'assets/';?>style.css" rel="stylesheet" type="text/css" media="screen" />




</head>
<body>
    
<div id="wrapper">
	<div id="menu-wrapper">
		<div id="menu" class="container">
			<ul>
				
                                
                            <li <?php if($menu==0) echo 'class="current_page_item"'; ?>><a href="<?php echo site_url('main');?>">Home</a></li>
				<li <?php if($menu==1) echo 'class="current_page_item"'; ?>><a href="<?php echo site_url('main/pengadaankarcis');?>">Pengadaan Karcis</a></li>
				<li <?php if($menu==2) echo 'class="current_page_item"'; ?>><a href="<?php echo site_url('main/pengeluarankarcis');?>">Pengeluaran Karcis</a></li>
				
				<li <?php if($menu==4) echo 'class="current_page_item"'; ?>><a href="<?php echo site_url('main/jeniskarcis');?>">Stok Karcis</a></li>
				<li <?php if($menu==5) echo 'class="current_page_item"'; ?>><a href="<?php echo site_url('main/laporan');?>">Laporan</a></li>
				
			</ul>
		</div>
	</div>
	
	<div id="page" class="container">
		<div>
			<?php
                
                $this->load->view($view);
                
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
