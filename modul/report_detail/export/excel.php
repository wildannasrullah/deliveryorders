<?php
error_reporting(0);
session_start();
$d=date('d');$m=date('m');$y=date('y');

include('../../../config/koneksi.php');

/* $servername = "192.168.88.99";
$username = "maria";
$password = "maria123";
$db = "db_lts";

$conn = mysqli_connect($servername, $username, $password,$db);
// Check connection
if (!$conn) {
 die("Connection failed: " . mysqli_connect_error());
} */

// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=ReportSJM_Detail_$y$m$d.xls");
 
// Tambahkan table
?>
<h2 align='center'>Laporan Surat Jalan Manual</h2>
<h3 align='center'>Periode <?php echo $_POST[begda]." s/d ".$_POST[endda]; ?></h3>
<div class="table-responsive">
                            <table border='1' width='100%'>
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
								
								$cari = "select ts.*, ta.status, d.* from tb_suratjalan ts 
												  left join tb_approve ta on ts.no_surat_jalan=ta.no_surat_jalan
												  left join pengelola p on ts.created_by = p.username
												  left join departemen d on p.id_dep = d.id_dep
												  where ts.tanggal_kirim between '$_POST[begda]' and '$_POST[endda]' ";
											if($_POST[no_surat_jalan]!=NULL){
																							
												$cari .= " AND ts.no_surat_jalan = '$_POST[no_surat_jalan]' ";
											}if($_POST[nama_customer]!=NULL){
												
												$cari .= " AND ts.nama_customer='$_POST[nama_customer]' ";
											} if($_POST[dibuat_oleh]!=NULL){
												
												$cari .= " AND ts.created_by ='$_POST[dibuat_oleh]' ";
											}
												 $cari .= " group by ts.no_surat_jalan
												  order by ts.created_date desc";
										
									$hasil  = mysqli_query($conn,$cari);
								
								while($r = mysqli_fetch_array($hasil)){
								echo"
                                    <tr>
										<td rowspan='2' valign='top' align='center'>$i.</td>
                                        <td>$r[no_surat_jalan]</td>
                                        <td>$r[nama_customer]</td>
                                        <td>$r[tanggal_kirim]</td>
                                        <td>$r[nopol_kendaraan]</td>
                                        <td>$r[no_po]</td>
										<td>$r[no_so]</td>
										<td>$r[sopir]</td>
										<td>$r[nama_dep]</td>
										<td align='center'><font color='red' size='2.5'><b>$r[status_printed]</b></font></td>
										<td>$r[created_by]</td>
										<td>$r[created_date]</td>
                                    </tr>
									<tr><td valign='top' align='right'><b>Barang Kirim :</b></td>
										<td colspan='10'>
											<table border='1' width='100%'>
												<tr><th>Kode Barang</th><th>Nama Barang</th><th>Informasi</th><th>Jumlah</th><th>Satuan</th></tr>";
												$lnd = mysqli_query($conn, "select *from tb_suratjaland where no_surat_jalan='$r[no_surat_jalan]' order by no asc");
												$no=1;
													while($lng = mysqli_fetch_array($lnd)){
														echo "<tr><td>$lng[kode_barang]</td><td>$lng[nama_barang]</td>
																	<td>$lng[informasi]</td><td align='right'>$lng[jumlah]</td><td align='center'>$lng[satuan]</td></tr>";
														$no++;
													}
											echo"
											</table>
										</td>
									</tr>
									";
									$i++;
									}
								?>
                                </tbody>
                            </table>
                        </div>