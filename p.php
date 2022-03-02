<?php
error_reporting(0);
session_start();
include("config/koneksi.php");
include("config/fungsi_ribuan.php");
include("config/fungsi_indotgl.php");

	//cek apakah user sudah login 
	if(!isset($_SESSION['username'])){ 
	?><script language='javascript'>alert('You are not logged in. Please login first!');
	document.location='index.php'</script><?php
	    //jika belum login jangan lanjut.. 
	}
?>

<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Surat Jalan Manual | KOP</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/logo/ico.jpg">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<link href="extensions/Buttons/css/buttons.bootstrap.min.css" rel="stylesheet" />
	<link href="extensions/Responsive/css/responsive.bootstrap.min.css" rel="stylesheet" />
	<link href="extensions/AutoFill/css/autoFill.bootstrap.min.css" rel="stylesheet" />
	<link href="extensions/ColReorder/css/colReorder.bootstrap.min.css" rel="stylesheet" />
	<link href="extensions/KeyTable/css/keyTable.bootstrap.min.css" rel="stylesheet" />
	<link href="extensions/RowReorder/css/rowReorder.bootstrap.min.css" rel="stylesheet" />
	<link href="extensions/Select/css/select.bootstrap.min.css" rel="stylesheet" />
	<link href="extensions/Buttons/css/buttons.bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu/meanmenu.min.css">
	 <!-- dialog CSS
		============================================ -->
    <link rel="stylesheet" href="css/dialog/sweetalert2.min.css">
    <link rel="stylesheet" href="css/dialog/dialog.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
	 <!-- Data Table JS
		============================================ -->
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- jvectormap CSS
		============================================ -->
    <link rel="stylesheet" href="css/jvectormap/jquery-jvectormap-2.0.3.css">
    <!-- notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/notika-custom-icon.css">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="css/wave/waves.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
<div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        <a href="#"><img src="img/logo/logo2.png" alt="" /></a> 
                    </div>
                </div><br>
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" >
                    <div class="logo-area" style='text-align:right'>
                       <?php
					   $q = mysqli_query($conn, "select *from pengelola where username = '$_SESSION[username]'");
					   $t = mysqli_fetch_array($q);
						echo"<h5>$t[fullname] ($_SESSION[username])</h5><h5><font color='yellow'>Versi 1.0.0.2</font></h5>";
					   ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<marquee><h4>
	<!-- <img src='img/att.gif' width='25px' height='25px' />&nbsp; -->
	<font color='red'>SELAMAT BERAKTIVITAS </font>-<font color='blue'> Tetap terapkan Protokol Kesehatan.</font>
				<font color='red'> Semoga kita semua senantiasa di beri kesehatan. Selamat bekerja.</font></marquee>
    <!-- End Header Top Area -->
    <!-- Mobile Menu start -->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                                <li><a href="?p=dashboard">Beranda</a>
                                  </li>
								<?php
								$apr = mysqli_query($conn, "select *from tb_approve where status = 'waiting for approval'");
								/* $yt = mysqli_num_rows($apr);
								if($yt != '0'){
									 ?><li><a href='#'  onclick="alert('Terdapat surat jalan manual yang belum di APPROVE.');window.location='?p=report-sjm'"><i class='notika-icon notika-mail'></i> Surat Jalan Manual</a></li><?php
								}else{ */
									echo "<li><a href='?p=input-sjm'>Surat Jalan Manual</a></li>";
								//}
								?>
                                <li><a href="?p=report-sjm">Laporan</a>
                                </li>
								<li><a href="?p=report-detail">Laporan Detail</a>
                                </li>
								<?php
										if($_SESSION[level]=='admin'){
										?>
										<li><a href="?p=user">Master User</a>
                                        </li>
										<?php
										}else{}?>
								<li><a href="?p=edit-password">Edit Password</a></li>
								<li><a href="logout.php">Logout</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu end -->
    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li><a href="?p=dashboard"><i class="notika-icon notika-house"></i> Beranda</a>
                        </li>
                       
						<?php
						/*$apr = mysqli_query($conn, "select *from tb_approve where status = 'waiting for approval'");
								$yt = mysqli_num_rows($apr);
								if($yt != '0'){
									 ?><li><a href='#'  onclick="alert('Terdapat surat jalan manual yang belum di APPROVE.');window.location='?p=report-sjm'"><i class='notika-icon notika-mail'></i> Surat Jalan Manual</a></li><?php
									
								}else{ */
									echo " <li><a href='?p=input-sjm'><i class='notika-icon notika-mail'></i> Surat Jalan Manual</a></li>";
								//}
						?>
                        <li><a data-toggle="collapse" data-target="#reportn" href="#"><i class="notika-icon notika-edit"></i> Laporan</a>
                                    <ul id="reportn"  class='dropdown-menu'>
									
										<li><a href="?p=report-sjm">Laporan Surat Jalan</a>
                                        </li>
										<li><a href="?p=report-detail">Laporan Detail Surat Jalan</a>
                                        </li>
                                    </ul>
                                </li>
						<?php
							if($_SESSION[level]=='admin'){
						?>
						<li><a data-toggle="collapse" data-target="#Pagemoc" href="#"><i class="notika-icon notika-mail"></i> Master</a>
                                    <ul id="Pagemoc"  class='dropdown-menu'>
									
										<li><a href="?p=departemen">Master Departemen</a>
                                        </li>
										<li><a href="?p=approval">Master Approval</a>
                                        </li>
                                    </ul>
                                </li>
						<?php
							}else{}?>
						<li><a data-toggle="collapse" data-target="#Pagemob" href="#"><i class="notika-icon notika-support"></i> User</a>
                                    <ul id="Pagemob"  class='dropdown-menu'>
									<?php
										if($_SESSION[level]=='admin'){
										?>
										<li><a href="?p=user">Master User</a>
                                        </li>
										<?php
										}else{}?>
                                        <li><a href="?p=edit-password">Edit Password</a>
                                        </li>
                                        <li><a href="logout.php">Logout</a>
                                        </li>
                                    </ul>
                                </li>
						
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Menu area End-->
	<br>
    <!-- Start Email Statistic area-->
    <div class="notika-email-post-area">
        <div class="container">
            <div class="row">
                <?php
					include("content.php");
				?>
            </div>
        </div>
    </div>
    <!-- End Email Statistic area-->
    <br><br>
    <!-- Start Footer area-->
    <div class="footer-copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
                        <p>Copyright © 2018-2019
<a href="#" >EDP Team</a>. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer area-->
    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/meanmenu/jquery.meanmenu.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <script src="js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- jvectormap JS
		============================================ -->
    <script src="js/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="js/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/jvectormap/jvectormap-active.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/sparkline-active.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="js/flot/jquery.flot.js"></script>
    <script src="js/flot/jquery.flot.resize.js"></script>
    <script src="js/flot/curvedLines.js"></script>
    <script src="js/flot/flot-active.js"></script>
    <!-- knob JS
		============================================ -->
    <script src="js/knob/jquery.knob.js"></script>
    <script src="js/knob/jquery.appear.js"></script>
    <script src="js/knob/knob-active.js"></script>
    <!--  wave JS
		============================================ -->
    <script src="js/wave/waves.min.js"></script>
    <script src="js/wave/wave-active.js"></script>
    <!--  todo JS
		============================================ -->
    <script src="js/todo/jquery.todo.js"></script>
	<!-- Data Table JS
		============================================ -->
    <script src="js/data-table/jquery.dataTables.min.js"></script>
    <script src="js/data-table/data-table-act.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
	<!--  Chat JS
		============================================ -->
    <script src="js/chat/moment.min.js"></script>
    <script src="js/chat/jquery.chat.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
<?php
if($_GET[p]=='report-sjm'){
	?>
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/plugins/jquery/jquery-3.2.1.min.js"></script>
	<script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
	<script src="assets/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/plugins/js-cookie/js.cookie.js"></script>
	<script src="assets/js/theme/default.min.js"></script>
	<script src="assets/js/apps.min.js"></script>
	<!-- ================== END BASE JS ================== -->
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="assets/plugins/DataTables/media/js/jquery.dataTables.js"></script>
	<script src="assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js"></script>
	<script src="assets/plugins/DataTables/extensions/Buttons/js/dataTables.buttons.min.js"></script>
	<script src="assets/plugins/DataTables/extensions/Buttons/js/buttons.bootstrap.min.js"></script>
	<script src="assets/plugins/DataTables/extensions/Buttons/js/buttons.flash.min.js"></script>
	<script src="assets/plugins/DataTables/extensions/Buttons/js/jszip.min.js"></script>
	<script src="assets/plugins/DataTables/extensions/Buttons/js/pdfmake.min.js"></script>
	<script src="assets/plugins/DataTables/extensions/Buttons/js/vfs_fonts.min.js"></script>
	<script src="assets/plugins/DataTables/extensions/Buttons/js/buttons.html5.min.js"></script>
	<script src="assets/plugins/DataTables/extensions/Buttons/js/buttons.print.min.js"></script>
	<script src="assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
	<script src="assets/js/demo/table-manage-buttons.demo.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
			TableManageButtons.init();
		});
	</script>
	<?php
}
?>
</body>
</html>