<?php
error_reporting(0);
session_start();
include("../config/koneksi.php");
?>
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
										<h2>Laporan Surat Jalan Manual</h2>
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
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
											<form method='POST' action='modul/export/excel.php'>
												
                                            <div class="modal-body">
                                                <h2>Cetak Laporan</h2>
												<p>
												No. SJM <input type="text" name="no_sjm" class="form-control" name="alasan_del"  />
												Nama Tujuan <input type="text" name="tujuan" class="form-control" name="alasan_del"  />
												Tanggal Kirim <input type="text" name="tgl" class="form-control" name="alasan_del"  />
												No. PO <input type="text" name="no_po" class="form-control" name="alasan_del"  />
												No. SO <input type="text" name="no_so" class="form-control" name="alasan_del"  />
												Bagian <input type="text" name="date" class="form-control" name="alasan_del"  />
												</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-default">Cetak</button>
                                            </div>
											</form>
                                        </div>
                                    </div>
                                </div>
    <!-- Data Table area Start-->
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
								$user = mysqli_query($conn, "select *from pengelola where username='$_SESSION[username]'");
								$dep = mysqli_fetch_array($user);
								$i=1;
								$date = date('d');
								$datem = date('m');
								$datey = date('Y');
								if($_SESSION[level]=='admin'){
									if($_GET[t]=='all'){
										$a = mysqli_query($conn, "select ts.*, ta.status, d.* from tb_suratjalan ts 
												  left join tb_approve ta on ts.no_surat_jalan=ta.no_surat_jalan
												  left join pengelola p on ts.created_by = p.username
												  left join departemen d on p.id_dep = d.id_dep
												  group by ts.no_surat_jalan
												  order by ts.created_date desc");
									}
									else{
										$a = mysqli_query($conn, "select ts.*, ta.status, d.* from tb_suratjalan ts 
												  left join tb_approve ta on ts.no_surat_jalan=ta.no_surat_jalan
												  left join pengelola p on ts.created_by = p.username
												  left join departemen d on p.id_dep = d.id_dep
												  where day(created_date) = (DATE_FORMAT(CURDATE(),'%d')) AND MONTH(created_date) = (DATE_FORMAT(CURDATE(),'%m')) AND YEAR(created_date) = year(NOW())
												  group by ts.no_surat_jalan
												  order by ts.created_date desc");
									}
								}
								else if($_SESSION[level]=='mgr'){
					
									$query = "select m.id_dep from pengelola p left join manager m on p.username=m.username 
														left join departemen d on m.id_dep=d.id_dep where p.username = '$_SESSION[username]'";
									$sq = mysqli_query($conn, $query);
									$cek_user = array();
									while($row = mysqli_fetch_assoc($sq)) {
											$cek_user [ $row['id_dep'] ] = $row['id_dep'];
									}
									foreach($cek_user as $kode=>$cu) {
												$check_list[]=$cu;
									}  
									$checked= $check_list;
									$bag_mgr = join(",",$checked);
									if($_GET[t]=='all'){
										$a = mysqli_query($conn, "select ts.*, ta.status, d.* from tb_suratjalan ts 
												  left join tb_approve ta on ts.no_surat_jalan=ta.no_surat_jalan
												  left join pengelola p on ts.created_by = p.username
												  left join departemen d on p.id_dep = d.id_dep
												  where p.id_dep IN ($bag_mgr)
												  group by ts.no_surat_jalan
												  order by ts.created_date desc"); 
									}
									else{
											$a = mysqli_query($conn, "select ts.*, ta.status, d.* from tb_suratjalan ts 
												  left join tb_approve ta on ts.no_surat_jalan=ta.no_surat_jalan
												  left join pengelola p on ts.created_by = p.username
												  left join departemen d on p.id_dep = d.id_dep
												  where day(created_date) = (DATE_FORMAT(CURDATE(),'%d')) AND MONTH(created_date) = (DATE_FORMAT(CURDATE(),'%m')) AND YEAR(created_date) = year(NOW())
												  group by ts.no_surat_jalan
												  order by ts.created_date desc");
									}
								}
								else{
									if($_GET[t]=='all'){
										$a = mysqli_query($conn, "select ts.*, ta.status, d.* from tb_suratjalan ts 
												  left join tb_approve ta on ts.no_surat_jalan=ta.no_surat_jalan
												  left join pengelola p on ts.created_by = p.username 
												  left join departemen d on p.id_dep = d.id_dep
												  where p.id_dep = '$dep[id_dep]'
												  group by ts.no_surat_jalan
												  order by ts.created_date desc");
									}else{
										$a = mysqli_query($conn, "select ts.*, ta.status, d.* from tb_suratjalan ts 
												  left join tb_approve ta on ts.no_surat_jalan=ta.no_surat_jalan
												  left join pengelola p on ts.created_by = p.username 
												  left join departemen d on p.id_dep = d.id_dep
												  where p.id_dep = '$dep[id_dep]' and day(created_date) = (DATE_FORMAT(CURDATE(),'%d')) AND MONTH(created_date) = (DATE_FORMAT(CURDATE(),'%m')) AND YEAR(created_date) = year(NOW())
												  group by ts.no_surat_jalan
												  order by ts.created_date desc");
									}
								}
								while($r = mysqli_fetch_array($a)){
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
                                </div>
								<?php
 if($_GET[act]=='apr'){
	mysqli_query($conn, "update tb_approve set status = 'Approved', apr_by='$_SESSION[username]', apr_date = NOW(), apr_change_date=NOW() where no_surat_jalan = '$_GET[no]'");
	$link = "<script>window.location='?p=$_GET[p]';</script>";
	echo $link;
 }
 ?>