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
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="breadcomb-wp">
									<div class="breadcomb-ctn">
										<h2>Detail Laporan Surat Jalan Manual</h2>
										<br>
									</div>
								</div>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<p>
										<?php
										$a = mysqli_query($conn, "select *from tb_suratjalan sj left join tb_approve ta on sj.no_surat_jalan=ta.no_surat_jalan where sj.no_surat_jalan='$_GET[no]' order by sj.no_surat_jalan desc");
										$r = mysqli_fetch_array($a);
										echo"
											<table border='0' width='100%'>
											<tr ><td width='17%'><h5>No. Surat Jalan</h5></td><td width='1%'><h5>:</h5></td><td width='50%'><h5> $r[no_surat_jalan]</h5></td><td width='10%'><h5>Created By : </h5></td><td width='17%'><h5>$r[created_by]</h5></td></tr>
											<tr><td><h5>Nama Customer</h5></td><td><h5>:</h5></td><td><h5> $r[nama_customer]</h5></td><td><h5>Created Date : </h5></td><td><h5>$r[created_date]</h5></td></tr>
											<tr><td><h5>Alamat Customer</h5></td><td><h5>:</h5></td><td><h5> $r[alamat_customer]</h5></td><td><h5>Updated By : </h5></td><td><h5>$r[updated_by]</h5></td></tr>
											<tr><td><h5>Tanggal Kirim</h5></td><td><h5>:</h5></td><td><h5> $r[tanggal_kirim]</h5></td><td><h5>Updated Date : </h5></td><td><h5>$r[updated_date]</h5></td></tr>
											<tr><td><h5>NoPol. Kendaraan</h5></td><td><h5>:</h5></td><td><h5> $r[nopol_kendaraan]</h5></td><td><h5>Print Counter : </h5></td><td><h5>$r[jum_print]</h5></td></tr>
											<tr><td><h5>No. PO</h5></td><td><h5>:</h5></td><td><h5> $r[no_po]</h5></td><td><h5>Approved By : </h5></td><td><h5>$r[apr_by]</h5></td>
											<tr><td><h5>&nbsp;</h5></td><td><h5>&nbsp;</h5></td><td><h5> &nbsp;</h5></td><td></td>
											<td align='left'>";
										$apr = mysqli_query($conn, "select *from tb_approve where no_surat_jalan = '$_GET[no]'");
										$yt = mysqli_fetch_array($apr);
										if($yt[status]=='waiting for approval'){
											if($_SESSION[level]=='admin' || $_SESSION[level]=='mgr'){
												echo"<button class='btn btn-danger notika-btn-danger btn-xs' data-toggle='modal' data-target='#myModalapr'>&nbsp;&nbsp;Approve&nbsp;&nbsp;</button> &nbsp;
													<a href='?p=edit_sjm&no_jln=$r[no_surat_jalan]' title='Klik untuk edit data'>
														<button class='btn btn-success notika-btn-primary btn-xs'>&nbsp;&nbsp;Edit&nbsp;&nbsp;</button>
													</a>";
												echo" &nbsp;
														<button class='btn btn-danger notika-btn-danger btn-xs' data-toggle='modal' data-target='#myModaltwo'>&nbsp;&nbsp;Delete&nbsp;&nbsp;</button>
												";
											}
											else{
												echo"<font color='red' size='2.5'><b>Waiting for approval....!</b></font>";
												
											echo" <br><br>
												<a href='?p=edit_sjm&no_jln=$r[no_surat_jalan]' title='Klik untuk edit data'>
													<button class='btn btn-success notika-btn-primary btn-xs'>&nbsp;&nbsp;Edit&nbsp;&nbsp;</button>
												</a>";
											echo" &nbsp;
												<button class='btn btn-danger notika-btn-danger btn-xs' data-toggle='modal' data-target='#myModaltwo'>&nbsp;&nbsp;Delete&nbsp;&nbsp;</button>
											";
											}
										}
										else{
											if($r[status_printed]=='Delete'){
												echo"<font color='red' size='2.5'><b>$r[status_printed]</b></font>";
											}
											else{
												if($r[status_printed]=='Printed'){
													echo"<button class='btn btn-warning notika-btn-warning btn-xs' onclick='print_d()'>&nbsp;&nbsp;Reprint&nbsp;&nbsp;</button>";
												}else{
													echo"<button class='btn btn-primary notika-btn-primary btn-xs' onclick='print_dd()'>&nbsp;&nbsp;Print&nbsp;&nbsp;</button>";	
												}
												echo"&nbsp;&nbsp;<button class='btn btn-default notika-btn-default btn-xs' disabled='' >&nbsp;&nbsp;Approved&nbsp;&nbsp;</button>";
											}
										}
											echo"
											</td></tr>
											</table>
										";
										?>
										</p>
										</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Breadcomb area End-->
    <!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No. </th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah Barang</th>
                                        <th>Satuan</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php
								$no=1;
								$a1 = mysqli_query($conn, "select *from tb_suratjaland where no_surat_jalan = '$_GET[no]'");
								while($r1 = mysqli_fetch_array($a1)){
								echo"
                                    <tr>
										<td>$no. </td>
                                        <td>$r1[nama_barang]</td>
                                        <td>".ribu($r1[jumlah])."</td>
                                        <td>".strtoupper($r1[satuan])."</td>
                                    </tr>
									";
									$no++;
								}
								?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                         
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	<div class="modal fade" id="myModalone" role="dialog">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
											<form method='POST' action='?p=report-sjm-detail&act=rep&no=<?php echo $_GET[no]; ?>' onclick='print_d()'>
												
                                            <div class="modal-body">
                                                <h2>Alasan Reprint</h2>
												<font color='blue' size='2'>Mengapa Anda ingin reprint dokumen <?php echo $_GET[no]; ?> ?</font><br><br>
                                                <p>
												 <input type="text" class="form-control" name="alasan_rep" autofocus />
												</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Reprint</button>
                                            </div>
											</form>
                                        </div>
                                    </div>
                                </div>
	
	<div class="modal fade" id="myModaltwo" role="dialog">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
											<form method='POST' action='?p=report-sjm-detail&act=del&no=<?php echo $_GET[no]; ?>'>
												
                                            <div class="modal-body">
                                                <h2>Alasan Delete</h2>
												<font color='red' size='2'>Mengapa Anda ingin menghapus dokumen <?php echo $_GET[no]; ?> ?</font><br><br>
                                                <p>
												 <input type="text" class="form-control" name="alasan_rep" autofocus />
												</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-default">Delete</button>
                                            </div>
											</form>
                                        </div>
                                    </div>
                                </div>
	<div class="modal fade" id="myModalapr" role="dialog">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
											<form method='POST' action='?p=report-sjm-detail&act=apr&no=<?php echo $_GET[no]; ?>'>
												
                                            <div class="modal-body">
                                                <h2>Konfirmasi</h2>
												<font color='red' size='2'>Apakah Anda yakin untuk menyetujui surat jalan dengan nomor <?php echo $_GET[no]; ?> ?</font><br><br>
                                             </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-default">Yes</button>
                                            </div>
											</form>
                                        </div>
                                    </div>
                                </div>
<script type="text/javascript">
	function print_dd(){
		window.open("<?php echo "modul/print/print.php?no_jln=$_GET[no]"?>","target=_blank");
	}
</script>

	<script type="text/javascript">
	function print_d(){
		window.open("<?php echo "modul/print/print.php?no_jln=$_GET[no]&reprint='$_POST[alasan_rep]'&ke=$jp"?>","target=_blank");
	}
</script>
<?php
 if($_GET[act]=='del'){
	mysqli_query($conn, "update tb_suratjalan set updated_by='$_SESSION[username]', status_printed = 'Delete', alasan_delete='$_POST[alasan_del]' where no_surat_jalan = '$_GET[no]'");
	$link = "<script>window.location='?p=report-sjm';</script>";
	echo $link;
 }
 if($_GET[act]=='apr'){
	mysqli_query($conn, "update tb_approve set status = 'Approve', apr_by='$_SESSION[username]', apr_date = NOW(), apr_change_date=NOW() where no_surat_jalan = '$_GET[no]'");
	$link = "<script>window.location='?p=report-sjm';</script>";
	echo $link;
 }
 ?>