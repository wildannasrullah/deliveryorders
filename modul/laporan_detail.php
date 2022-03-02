<?php
error_reporting(0);
session_start();
include("../config/koneksi.php");

$user = mysqli_query($conn, "select *from pengelola p left join departemen d on p.id_dep=d.id_dep where p.username='$_SESSION[username]'");
$dep = mysqli_fetch_array($user);
?>
<!-- Breadcomb area Start-->
	<div class="breadcomb-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="breadcomb-list">
						<div class="row">
							<div class="breadcomb-wp">
									<div class="breadcomb-ctn">
										<h2>Detail Laporan Surat Jalan Manual</h2>
									</div>
								</div>
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							
										<?php
										$a = mysqli_query($conn, "select *from tb_suratjalan sj left join tb_approve ta on sj.no_surat_jalan=ta.no_surat_jalan where sj.no_surat_jalan='$_GET[no]' order by sj.no_surat_jalan desc");
										$r = mysqli_fetch_array($a);
										echo"
										<div class='row'>
											<div class='form-element-list mg-t-30'>
													<div class='row'>";
												$variable = 6;
												if($dep[id_dep]==$variable){	
													echo"<div class='col-lg-4 col-md-4 col-sm-4 col-xs-12'>
															<div class='nk-int-mk'>
																<label>No. SJM / GID</label>
															</div>
															<div class='form-group ic-cmp-int'>
																<div class='nk-int-st'>
																	$_GET[no] / $r[no_gid]
																</div>
															</div>
														</div>";
												}else{
													echo"<div class='col-lg-4 col-md-4 col-sm-4 col-xs-12'>
															<div class='nk-int-mk'>
																<label>No. SJM</label>
															</div>
															<div class='form-group ic-cmp-int'>
																<div class='nk-int-st'>
																	$_GET[no]
																</div>
															</div>
														</div>";
												}
													echo"<div class='col-lg-4 col-md-4 col-sm-4 col-xs-12'>
															<div class='nk-int-mk'>
																<label>Nama Tujuan</label>
															</div>
															<div class='form-group ic-cmp-int'>
																<div class='nk-int-st'>
																	$r[nama_customer]
																</div>
															</div>
														</div>
														<div class='col-lg-4 col-md-4 col-sm-4 col-xs-12'>
															<div class='nk-int-mk'>
																<label>Alamat Kirim</label>
															</div>
															<div class='form-group ic-cmp-int'>
																<div class='nk-int-st'>
																	$r[alamat_customer]
																</div>
															</div>
														</div>
													</div>
													<div class='row'>
														<div class='col-lg-4 col-md-4 col-sm-4 col-xs-12'>
															<div class='nk-int-mk'>
																<label>Tanggal Kirim</label>
															</div>
															<div class='form-group ic-cmp-int'>
																<div class='nk-int-st'>
																	".tgl_indo($r[tanggal_kirim])."
																</div>
															</div>
														</div>
														<div class='col-lg-4 col-md-4 col-sm-4 col-xs-12'>
															<div class='nk-int-mk'>
																<label>No. PO</label>
															</div>
															<div class='form-group ic-cmp-int'>
																<div class='nk-int-st'>
																	$r[no_po]
																</div>
															</div>
														</div>
														<div class='col-lg-4 col-md-4 col-sm-4 col-xs-12'>
															<div class='nk-int-mk'>
																<label>No. SO</label>
															</div>
															<div class='form-group ic-cmp-int'>
																<div class='nk-int-st'>
																	$r[no_so]
																</div>
															</div>
														</div>
													</div>
													<div class='row'>
														<div class='col-lg-4 col-md-4 col-sm-4 col-xs-12'>
															<div class='nk-int-mk'>
																<label>COA</label>
															</div>
															<div class='form-group ic-cmp-int form-elet-mg res-mg-fcs'>
																<div class='nk-int-st'>
																	$r[coa]
																</div>
															</div>
														</div>
														<div class='col-lg-4 col-md-4 col-sm-4 col-xs-12'>
															<div class='nk-int-mk'>
																<label>NoPol Kendaraan</label>
															</div>
															<div class='form-group ic-cmp-int form-elet-mg res-mg-fcs'>
																<div class='nk-int-st'>
																	$r[nopol_kendaraan]
																</div>
															</div>
														</div>
														<div class='col-lg-4 col-md-4 col-sm-4 col-xs-12'>
															<div class='nk-int-mk'>
																<label>Sopir</label>
															</div>
															<div class='form-group ic-cmp-int form-elet-mg'>
																<div class='nk-int-st'>
																	$r[sopir]
																</div>
															</div>
														</div>
														<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
															<div class='nk-int-mk'>
																<label>Keterangan</label>
															</div>
															<div class='form-group ic-cmp-int form-elet-mg'>
																<div class='nk-int-st'>
																	$r[keterangan]
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<p align='right'><font color='red' size='1'>Tombol (Print / Approve / Edit / Delete) pindah dibawah</font></p>
									<!--	<hr>

										<div class='row'>
											<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
												<div class='row'>
														<div class='col-lg-4 col-md-4 col-sm-4 col-xs-12'>
															<div class='nk-int-mk'>
																<label>Created by :</label> $r[created_by]
															</div>
															<div class='form-group ic-cmp-int'>
																<div class='nk-int-st'>
																	<label>Created at :</label> $r[created_date]
																</div>
															</div>
														</div>
														<div class='col-lg-4 col-md-4 col-sm-4 col-xs-12'>
															<div class='nk-int-mk'>
																<label>Updated by :</label> $r[updated_by]
															</div>
															<div class='form-group ic-cmp-int'>
																<div class='nk-int-st'>
																	<label>Updated at :</label> $r[updated_date]
																</div>
															</div>
														</div>
														<div class='col-lg-4 col-md-4 col-sm-4 col-xs-12'>
															<div class='nk-int-mk'>
																<label>Approved By :</label> $r[apr_by]
															</div>
															<div class='form-group ic-cmp-int'>
																<div class='nk-int-st'>
																	<label>Printed Counter :</label> $r[jum_print]
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										
										<div style='text-align:right;'> -->
										 ";
										// $apr = mysqli_query($conn, "select *from tb_approve where no_surat_jalan = '$_GET[no]'");
										// $yt = mysqli_fetch_array($apr);
										// if($yt[status]=='waiting for approval'){
										// 	if($_SESSION[level]=='admin' || $_SESSION[level]=='mgr'){
										// 		echo"<button class='btn btn-danger notika-btn-danger btn-xs' data-toggle='modal' data-target='#myModalapr'>&nbsp;&nbsp;Approve&nbsp;&nbsp;</button> &nbsp;
										// 			<a href='?p=edit_sjm&no_jln=$r[no_surat_jalan]' title='Klik untuk edit data'>
										// 				<button class='btn btn-success notika-btn-primary btn-xs'>&nbsp;&nbsp;Edit&nbsp;&nbsp;</button>
										// 			</a>";
										// 		echo" &nbsp;
										// 				<button class='btn btn-danger notika-btn-danger btn-xs' data-toggle='modal' data-target='#myModaltwo'>&nbsp;&nbsp;Delete&nbsp;&nbsp;</button>
										// 		";
										// 	}
										// 	else{
										// 		echo"<font color='red' size='2.5'><b>Waiting for approval....!</b></font>";
												
										// 	echo" <br><br>
										// 		<button class='btn btn-default notika-btn-default btn-xs' disabled='' >&nbsp;&nbsp;Print&nbsp;&nbsp;</button>&nbsp;
										// 		<button class='btn btn-default notika-btn-default btn-xs' disabled='' >&nbsp;&nbsp;Approve&nbsp;&nbsp;</button>&nbsp;
										// 		<a href='?p=edit_sjm&no_jln=$r[no_surat_jalan]' title='Klik untuk edit data'>
										// 			<button class='btn btn-success notika-btn-primary btn-xs'>&nbsp;&nbsp;Edit&nbsp;&nbsp;</button>
										// 		</a>";
										// 	echo" 
										// 		<button class='btn btn-danger notika-btn-danger btn-xs' data-toggle='modal' data-target='#myModaltwo'>&nbsp;&nbsp;Delete&nbsp;&nbsp;</button>
										// 	";
										// 	}
											
										// }
										// elseif($yt[status]=='Disapproved'){
										// 	if($_SESSION[level]=='admin' || $_SESSION[level]=='mgr'){
										// 		echo"<button class='btn btn-danger notika-btn-danger btn-xs' data-toggle='modal' data-target='#myModalapr'>&nbsp;&nbsp;Approve&nbsp;&nbsp;</button> &nbsp;
										// 			<a href='?p=edit_sjm&no_jln=$r[no_surat_jalan]' title='Klik untuk edit data'>
										// 				<button class='btn btn-success notika-btn-primary btn-xs'>&nbsp;&nbsp;Edit&nbsp;&nbsp;</button>
										// 			</a>";
										// 		echo" &nbsp;
										// 				<button class='btn btn-danger notika-btn-danger btn-xs' data-toggle='modal' data-target='#myModaltwo'>&nbsp;&nbsp;Delete&nbsp;&nbsp;</button>
										// 		";
										// 	}
										// 	else{
										// 		echo"<font color='red' size='2.5'><b>Waiting for approval....!</b></font>";
												
										// 	echo" <br><br>
										// 	<button class='btn btn-default notika-btn-default btn-xs' disabled='' >&nbsp;&nbsp;Print&nbsp;&nbsp;</button>&nbsp;
										// 		<a href='?p=edit_sjm&no_jln=$r[no_surat_jalan]' title='Klik untuk edit data'>
										// 			<button class='btn btn-success notika-btn-primary btn-xs'>&nbsp;&nbsp;Edit&nbsp;&nbsp;</button>
										// 		</a>";
										// 	echo" 
										// 		<button class='btn btn-danger notika-btn-danger btn-xs' data-toggle='modal' data-target='#myModaltwo'>&nbsp;&nbsp;Delete&nbsp;&nbsp;</button>
										// 	";
										// 	}
										// }
										// elseif($yt[status]=='Approve'){
										// 	if($r[status_printed]=='Printed'){
										// 			echo"<button class='btn btn-warning notika-btn-warning btn-xs' onclick='print_d()'>&nbsp;&nbsp;Reprint&nbsp;&nbsp;</button>&nbsp;&nbsp;";
										// 		}else{
										// 			echo"<button class='btn btn-primary notika-btn-primary btn-xs' onclick='print_dd()'>&nbsp;&nbsp;Print&nbsp;&nbsp;</button>&nbsp;&nbsp;";	
										// 		}
										// 	echo"<button class='btn btn-default notika-btn-default btn-xs' data-toggle='modal' data-target='#myModalapr' disabled='' >&nbsp;&nbsp;Approve&nbsp;&nbsp;</button> &nbsp;
										// 			<a href='?p=edit_sjm&no_jln=$r[no_surat_jalan]' title='Klik untuk edit data'>
										// 				<button class='btn btn-success notika-btn-primary btn-xs'>&nbsp;&nbsp;Edit&nbsp;&nbsp;</button>
										// 			</a>";
										// 		echo" &nbsp;
										// 				<button class='btn btn-danger notika-btn-danger btn-xs' data-toggle='modal' data-target='#myModaltwo'>&nbsp;&nbsp;Delete&nbsp;&nbsp;</button>
										// 		";
											
										// }
										// else {
										// 	if($r[status_printed]=='Delete'){
										// 		$delete = "<div class='alert alert-danger alert-mg-b-0' role='alert'><p align='center'><B><u>DELETED</u></B></font><br><font size='2'><p align='center'>$r[alasan_delete]</p></font> </div>";
										// 	}
										// 	else{
										// 		if($r[status_printed]=='Printed'){
										// 			echo"<button class='btn btn-warning notika-btn-warning btn-xs' onclick='print_d()'>&nbsp;&nbsp;Reprint&nbsp;&nbsp;</button>";
										// 		}else{
										// 			echo"<button class='btn btn-primary notika-btn-primary btn-xs' onclick='print_dd()'>&nbsp;&nbsp;Print&nbsp;&nbsp;</button>";	
										// 		}
										// 		if($_SESSION[level]=='admin' || $_SESSION[level]=='mgr'){
										// 			echo"&nbsp;&nbsp;<button class='btn btn-warning notika-btn-warning btn-xs' data-toggle='modal' data-target='#myModaldisapr'>&nbsp;&nbsp;Disapprove&nbsp;&nbsp;</button>";
										// 		}else{
										// 			echo"&nbsp;&nbsp;<button class='btn btn-default notika-btn-default btn-xs' disabled=''>&nbsp;&nbsp;Disapprove&nbsp;&nbsp;</button>";
										// 		}
										// 		echo"&nbsp;&nbsp;<button class='btn btn-default notika-btn-default btn-xs' disabled='' >&nbsp;&nbsp;Edit&nbsp;&nbsp;</button>";
										// 		echo"&nbsp;&nbsp;<button class='btn btn-default notika-btn-default btn-xs' disabled='' >&nbsp;&nbsp;Delete&nbsp;&nbsp;</button>";
										// 	}
										// }
										// 	echo"
											
										// 	$delete
											
										// ";
										?>
										<!-- </p>
										</div> --></div>
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
										<th>Kode Barang</th>
                                        <th>Nama Barang</th>
										<th>Informasi</th>
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
										<td>$r1[kode_barang]</td>
                                        <td>$r1[nama_barang]</td>
										<td>$r1[informasi]</td>
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

<?php
echo"
    <hr>
										<div class='row'>
											<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
												<div class='row'>
														<div class='col-lg-4 col-md-4 col-sm-4 col-xs-12'>
															<div class='nk-int-mk'>
																<label>Created by :</label> $r[created_by]
															</div>
															<div class='form-group ic-cmp-int'>
																<div class='nk-int-st'>
																	<label>Created at :</label> $r[created_date]
																</div>
															</div>
														</div>
														<div class='col-lg-4 col-md-4 col-sm-4 col-xs-12'>
															<div class='nk-int-mk'>
																<label>Updated by :</label> $r[updated_by]
															</div>
															<div class='form-group ic-cmp-int'>
																<div class='nk-int-st'>
																	<label>Updated at :</label> $r[updated_date]
																</div>
															</div>
														</div>
														<div class='col-lg-4 col-md-4 col-sm-4 col-xs-12'>
															<div class='nk-int-mk'>
																<label>Approved By :</label> $r[apr_by]
															</div>
															<div class='form-group ic-cmp-int'>
																<div class='nk-int-st'>
																	<label>Printed Counter :</label> $r[jum_print]
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										
										<div style='text-align:right;'>
										";
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
												<button class='btn btn-default notika-btn-default btn-xs' disabled='' >&nbsp;&nbsp;Print&nbsp;&nbsp;</button>&nbsp;
												<button class='btn btn-default notika-btn-default btn-xs' disabled='' >&nbsp;&nbsp;Approve&nbsp;&nbsp;</button>&nbsp;
												<a href='?p=edit_sjm&no_jln=$r[no_surat_jalan]' title='Klik untuk edit data'>
													<button class='btn btn-success notika-btn-primary btn-xs'>&nbsp;&nbsp;Edit&nbsp;&nbsp;</button>
												</a>";
											echo" 
												<button class='btn btn-danger notika-btn-danger btn-xs' data-toggle='modal' data-target='#myModaltwo'>&nbsp;&nbsp;Delete&nbsp;&nbsp;</button>
											";
											}
											
										}
										elseif($yt[status]=='Disapproved'){
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
											<button class='btn btn-default notika-btn-default btn-xs' disabled='' >&nbsp;&nbsp;Print&nbsp;&nbsp;</button>&nbsp;
												<a href='?p=edit_sjm&no_jln=$r[no_surat_jalan]' title='Klik untuk edit data'>
													<button class='btn btn-success notika-btn-primary btn-xs'>&nbsp;&nbsp;Edit&nbsp;&nbsp;</button>
												</a>";
											echo" 
												<button class='btn btn-danger notika-btn-danger btn-xs' data-toggle='modal' data-target='#myModaltwo'>&nbsp;&nbsp;Delete&nbsp;&nbsp;</button>
											";
											}
										}
										elseif($yt[status]=='Approve'){
											if($r[status_printed]=='Printed'){
													echo"<button class='btn btn-warning notika-btn-warning btn-xs' onclick='print_d()'>&nbsp;&nbsp;Reprint&nbsp;&nbsp;</button>&nbsp;&nbsp;";
												}else{
													echo"<button class='btn btn-primary notika-btn-primary btn-xs' onclick='print_dd()'>&nbsp;&nbsp;Print&nbsp;&nbsp;</button>&nbsp;&nbsp;";	
												}
											echo"<button class='btn btn-default notika-btn-default btn-xs' data-toggle='modal' data-target='#myModalapr' disabled='' >&nbsp;&nbsp;Approve&nbsp;&nbsp;</button> &nbsp;
													<a href='?p=edit_sjm&no_jln=$r[no_surat_jalan]' title='Klik untuk edit data'>
														<button class='btn btn-success notika-btn-primary btn-xs'>&nbsp;&nbsp;Edit&nbsp;&nbsp;</button>
													</a>";
												echo" &nbsp;
														<button class='btn btn-danger notika-btn-danger btn-xs' data-toggle='modal' data-target='#myModaltwo'>&nbsp;&nbsp;Delete&nbsp;&nbsp;</button>
												";
											
										}
										else {
											if($r[status_printed]=='Delete'){
												$delete = "<div class='alert alert-danger alert-mg-b-0' role='alert'><p align='center'><B><u>DELETED</u></B></font><br><font size='2'><p align='center'>$r[alasan_delete]</p></font> </div>";
											}
											else{
												if($r[status_printed]=='Printed'){
													echo"<button class='btn btn-warning notika-btn-warning btn-xs' onclick='print_d()'>&nbsp;&nbsp;Reprint&nbsp;&nbsp;</button>";
												}else{
													echo"<button class='btn btn-primary notika-btn-primary btn-xs' onclick='print_dd()'>&nbsp;&nbsp;Print&nbsp;&nbsp;</button>";	
												}
												if($_SESSION[level]=='admin' || $_SESSION[level]=='mgr'){
													echo"&nbsp;&nbsp;<button class='btn btn-warning notika-btn-warning btn-xs' data-toggle='modal' data-target='#myModaldisapr'>&nbsp;&nbsp;Disapprove&nbsp;&nbsp;</button>";
												}else{
													echo"&nbsp;&nbsp;<button class='btn btn-default notika-btn-default btn-xs' disabled=''>&nbsp;&nbsp;Disapprove&nbsp;&nbsp;</button>";
												}
												echo"&nbsp;&nbsp;<button class='btn btn-default notika-btn-default btn-xs' disabled='' >&nbsp;&nbsp;Edit&nbsp;&nbsp;</button>";
												echo"&nbsp;&nbsp;<button class='btn btn-default notika-btn-default btn-xs' disabled='' >&nbsp;&nbsp;Delete&nbsp;&nbsp;</button>";
											}
										}
											echo"
											
											$delete
											
										";
										?>
										</p>
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
												 <input type="text" class="form-control" name="alasan_del" autofocus required />
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
								<div class="modal fade" id="myModaldisapr" role="dialog">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
											<form method='POST' action='?p=report-sjm-detail&act=disapr&no=<?php echo $_GET[no]; ?>'>
												
                                            <div class="modal-body">
                                                <h2>Konfirmasi</h2>
												<font color='red' size='2'>Apakah Anda yakin untuk MEMBATALKAN PERSETUJUAN surat jalan dengan nomor <br><?php echo $_GET[no]; ?> ?</font><br><br>
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
	mysqli_query($conn, "delete from tb_approve where no_surat_jalan='$_GET[no]'");
	$link = "<script>window.location='?p=report-sjm';</script>";
	echo $link;
 }
 if($_GET[act]=='apr'){
	mysqli_query($conn, "update tb_approve set status = 'Approved', apr_by='$_SESSION[username]', apr_date = NOW(), apr_change_date=NOW() where no_surat_jalan = '$_GET[no]'");
	$link = "<script>window.location='?p=report-sjm';</script>";
	echo $link;
 }
 if($_GET[act]=='disapr'){
	mysqli_query($conn, "update tb_approve set status = 'Disapproved', apr_by='$_SESSION[username]', apr_change_date=NOW() where no_surat_jalan = '$_GET[no]'");
	$link = "<script>window.location='?p=report-sjm';</script>";
	echo $link;
 }
 ?>