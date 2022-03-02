<?php
error_reporting(0);
session_start();
include("../config/koneksi.php");
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
<!-- Breadcomb area Start-->
	<div class="breadcomb-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="breadcomb-list">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="breadcomb-wp">
									<div class="breadcomb-icon">
										<i class="notika-icon notika-windows"></i>
									</div>
									<div class="breadcomb-ctn">
										<h2>Cari Surat Jalan Manual</h2>
										<p>Surat Jalan Manual <span class="bread-ntd"> - Krisanthium Offset Printing, PT</span></p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="breadcomb-report">
								<!--	<button data-placement="left" title="Download Report" class="btn" data-toggle='modal' data-target='#myModaltwo'><i class="notika-icon notika-sent"></i></button></a> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- MODAL REPORT-->
	<div class="modal fade" id="myModaltwo" role="dialog">
                                    
     </div>
    <!-- Data Table area Start-->
<?php
 error_reporting(0);
session_start(); 
$m = date(m);$d = date(d);$y = date(Y);
switch($_GET[act]){
default:
?>
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
					<?php
					$user = mysqli_query($conn, "select *from pengelola where username='$_SESSION[username]'");
					$dep = mysqli_fetch_array($user);
					echo"
						<form method='post' action='?p=report-sjm-cari&act=hasil'>
								<table border='0' width='100%'>
								<tr><td width='15%'>No. Dok. SJM</td><td>";?>
										<input type='text' class='form-control' name='no_sjm' />
									<?php
									echo"
									</td><td>&nbsp;</td><td width='15%'>&nbsp;</td><td>&nbsp;</td></tr>
									<tr><td width='15%'>Tujuan </td><td>
										<input type='text' class='form-control' name='nm_tujuan' />
									</td><td>&nbsp;</td>
									<td width='15%'>&nbsp;</td><td>&nbsp;</td></tr>
									<tr><td width='20%'>Tanggal SJM Mulai</td><td><input type='date' name='begda' class='form-control' value= '$y-$m-01'></td><td>&nbsp;</td>
									<td width='10%' align='center'>Sampai </td><td width='33%'><input type='date' name='endda' class='form-control' value= '$y-$m-$d' ></td></tr>
									
								</table><br /><br />
								<p align='right'>";
								?>
								<button class="btn btn-danger" type="submit"><b><i class='fa fa-print'></i>&nbsp; &nbsp; TAMPILKAN</button>
								<?php
								echo"
							</form>";
					?>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
<?php
break;
case "hasil":
?>
	<div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
					<?php
						echo"<a href='p.php?p=report-sjm'><button class='btn btn-info notika-btn-info btn-xs' data-toggle='modal'>&nbsp;&nbsp;Tampilkan Hari ini&nbsp;&nbsp;</button></a>&nbsp;&nbsp;
						<a href='p.php?p=report-sjm&t=all'><button class='btn btn-warning notika-btn-warning btn-xs' data-toggle='modal'>&nbsp;&nbsp;Tampilkan Dari Awal&nbsp;&nbsp;</button></a>&nbsp;&nbsp;
						<a href='p.php?p=report-sjm-cari'><button class='btn btn-danger notika-btn-success btn-xs' data-toggle='modal'>&nbsp;&nbsp;Cari Data&nbsp;&nbsp;</button></a>
						<br><br>";
					?>
                        <div class="table-responsive">
                            <table id="data-table-buttons" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                    	<th>#</th>
                                        <th width='20%'><b>No. Dok</b></th>
                                        <th width='20%'><b>Nama Tujuan</b></th>
										<th width='15%'><b>Tanggal Kirim</b></th>
                                        <th width='10%'><b>Nopol</b></th>
                                        <th width='15%'><b>No PO</b></th>
                                        <th width='15%'><b>No SO</b></th>
										<th width='15%'><b>Sopir</b></th>
										<th width='15%'><b>Bagian</b></th>
										<th width='10%'><b>Status</b></th>
										<th width='10%'><b>Dibuat Oleh</b></th>
										<th width='10%'><b>Dibuat Pada</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
								$i=1;
								$date = date('d');
								$datem = date('m');
								$datey = date('Y');
									$a ="select ts.*, ta.status, d.* from tb_suratjalan ts 
												  left join tb_approve ta on ts.no_surat_jalan=ta.no_surat_jalan
												  left join pengelola p on ts.created_by = p.username 
												  left join departemen d on p.id_dep = d.id_dep
												  WHERE ts.tanggal_kirim between '$_POST[begda]' and '$_POST[endda]'";
								if($_POST[no_sjm]!=NULL){
									$a .= " AND ts.no_surat_jalan = '$_POST[no_sjm]'";
								}if($_POST[nm_tujuan]!=NULL){
									$a .= " AND ts.nama_customer = '$_POST[nm_tujuan]'";
								}
									$a .= "group by ts.no_surat_jalan
												  order by ts.created_date desc";
								$hasil  = mysqli_query($conn,$a);
								while($r = mysqli_fetch_array($hasil)){
								echo"
                                    <tr>
										<td>$i.</td>
                                        <td><a href='p.php?p=report-sjm-detail&no=$r[no_surat_jalan]' title='Klik untuk melihat detail'><u>$r[no_surat_jalan]</u></a></td>
                                        <td>$r[nama_customer]</td>
                                        <td>$r[tanggal_kirim]</td>
                                        <td>$r[nopol_kendaraan]</td>
                                        <td>$r[no_po]</td>
										<td>$r[no_so]</td>
										<td>$r[sopir]</td>
										<td>$r[nama_dep]</td>
										<td align='center'><font color='red' size='2.5'><b>";
										if($_SESSION[level]=='admin' || $_SESSION[level]=='mgr'){
											if($r[status]=='waiting for approval'){
												echo"<a href='?p=report-sjm-detail&no=$r[no_surat_jalan]'><button class='btn btn-info notika-btn-info btn-xs' data-toggle='modal'>&nbsp;&nbsp;Approve&nbsp;&nbsp;</button></a>";
												// echo"<a href='?p=report-sjm-detail&act=apr&no=$r[no_surat_jalan]'><button class='btn btn-info notika-btn-info btn-xs' data-toggle='modal'>&nbsp;&nbsp;Approve&nbsp;&nbsp;</button></a>";
											}else if($r[status_printed]=='Open'){
												echo "$r[status]";
											}else{
												echo "$r[status_printed]";
											}
										}
										else{
											if($r[status_printed]=='Open'){
												echo "$r[status]";
											}else{
												echo "$r[status_printed]";
											}
										}
										echo"</b></font></td>
										<td>$r[created_by]</td>
										<td>$r[created_date]</td>
                                    </tr>
									";
									$i++;
									}
								?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
break;
}
 if($_GET[act]=='apr'){
	mysqli_query($conn, "update tb_approve set status = 'Approved', apr_by='$_SESSION[username]', apr_date = NOW(), apr_change_date=NOW() where no_surat_jalan = '$_GET[no]'");
	$link = "<script>window.location='?p=$_GET[p]';</script>";
	echo $link;
 }
 mysqli_close($conn);
 ?>
 <script>
	$(".theSelect").select2();
</script>
