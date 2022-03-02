<!doctype html>
<?php
error_reporting(0);
session_start();
include("../config/koneksi.php");
$date = date('Y-m-d');
$m = date('m');$y = date('Y');

$user = mysqli_query($conn, "select *from pengelola where username='$_SESSION[username]'");
$dep = mysqli_fetch_array($user);
?>
    <!-- Start Status area -->
    <div class="notika-status-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2>
							<?php
							if($_SESSION[level]=='admin'){
								$q = mysqli_num_rows(mysqli_query($conn, "select *from tb_suratjalan ts  
									  left join pengelola p on ts.created_by = p.username 
									  where date(ts.created_date) = '$date'"));
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
								
										$q = mysqli_num_rows(mysqli_query($conn, "select *from tb_suratjalan ts left join tb_approve ta on ts.no_surat_jalan=ta.no_surat_jalan 
												  left join pengelola p on ts.created_by = p.username 
												  left join departemen d on p.id_dep = d.id_dep 
												  left join manager m on d.id_dep = m.id_dep 
												  where p.id_dep IN ($bag_mgr) AND date(ts.created_date) = '$date' 
												  order by ts.created_date desc"));
							}
							else{
								$q = mysqli_num_rows(mysqli_query($conn, "select *from tb_suratjalan ts  
									  left join pengelola p on ts.created_by = p.username 
									  where p.id_dep = '$dep[id_dep]' AND date(ts.created_date) = '$date'"));
							}
								echo "$q";
							?>
							</h2>
                            <p>Total <b>Surat Jalan Manual</b> Hari ini</p>
                        </div>
                        <div class="sparkline-bar-stats1">9,4,8,6,5,6,4,8,3,5,9,5</div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn"><h2>
							<?php
							if($_SESSION[level]=='admin'){
								$qw = mysqli_num_rows(mysqli_query($conn, "select *from tb_suratjalan ts  
									  left join pengelola p on ts.created_by = p.username 
									  where month(ts.created_date) = '$m' and year(ts.created_date) = '$y' "));
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
								
										$qw = mysqli_num_rows(mysqli_query($conn, "select *from tb_suratjalan ts left join tb_approve ta on ts.no_surat_jalan=ta.no_surat_jalan 
												  left join pengelola p on ts.created_by = p.username 
												  left join departemen d on p.id_dep = d.id_dep 
												  left join manager m on d.id_dep = m.id_dep 
												  where p.id_dep IN ($bag_mgr) AND month(ts.created_date) = '$m' and year(ts.created_date) = '$y' 
												  order by ts.created_date desc"));
							}
							else{
								$qw = mysqli_num_rows(mysqli_query($conn, "select *from tb_suratjalan ts  
									  left join pengelola p on ts.created_by = p.username 
									  where p.id_dep = '$dep[id_dep]' AND month(ts.created_date) = '$m' and year(ts.created_date) = '$y' "));
							}
								echo "$qw";
							?>
							</h2>
                            <p>Total <b>Surat Jalan Manual</b> Bulan Ini</p>
                        </div>
                        <div class="sparkline-bar-stats2">1,4,8,3,5,6,4,8,3,3,9,5</div>
                    </div>
                </div>
            </div>
			<br>
			
			
			
            <div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="dialog-inner">
                        <div class="contact-hd dialog-hd">
                            <h2>Surat Jalan Manual <font color='red' size='2'>* Waiting for Approval</font></h2>
                        </div>
                    </div>
            </div><br><br><br><br><br>
				<?php
					$user = mysqli_query($conn, "select *from pengelola where username='$_SESSION[username]'");
					$dep = mysqli_fetch_array($user);
				if($_SESSION[level]=='admin'){
					$q = mysqli_query($conn, "select *from tb_suratjalan ts 
									  left join tb_approve ta on ts.no_surat_jalan=ta.no_surat_jalan 
									  left join pengelola p on ts.created_by = p.username
									  left join departemen d on p.id_dep = d.id_dep
									  where status_printed IN ('Open') 
									  group by ts.no_surat_jalan
									  order by ts.created_date desc");
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
					
							$q = mysqli_query($conn, "select *from tb_suratjalan ts left join tb_approve ta on ts.no_surat_jalan=ta.no_surat_jalan 
									  left join pengelola p on ts.created_by = p.username 
									  left join departemen d on p.id_dep = d.id_dep 
									  left join manager m on d.id_dep = m.id_dep 
									  where status_printed IN ('Open') AND p.id_dep IN ($bag_mgr) 
									  group by ts.no_surat_jalan
									  order by ts.created_date desc");
				}
				else{
					$q = mysqli_query($conn, "select *from tb_suratjalan ts 
									  left join tb_approve ta on ts.no_surat_jalan=ta.no_surat_jalan 
									  left join pengelola p on ts.created_by = p.username 
									  left join departemen d on p.id_dep = d.id_dep
									  where status_printed IN ('Open') AND p.id_dep = '$dep[id_dep]' group by ts.no_surat_jalan order by ts.created_date desc");
				}
					
					if(mysqli_num_rows($q) < 1){
						echo'
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="dialog-inner">
									<div class="contact-hd dialog-hd">
										<h2><font color="red" size="2">Tidak ada surat jalan manual yang membutuhkan approval</font></h2>
									</div>
								</div>
							</div>
						';
					}
					while($r = mysqli_fetch_array($q)){
						echo"
							<div class='col-lg-6 col-md-6 col-sm-6 col-xs-12'>
								<div class='dialog-inner'>
									<div class='contact-hd dialog-hd'>
										<h2><a href='?p=report-sjm-detail&no=$r[no_surat_jalan]' title='Klik untuk melihat detail'><u>$r[no_surat_jalan]</u> <font size='2' color='red'>($r[nama_dep])</font></a><font size='2' >
										<div style='text-align:right;font-weight:bold;'>".tgl_indo($r[created_date])."</div></font>
                                        </h2>
										<p>
										<table width='100%' border='0' cellspacing='0'>
											<tr><th width='40%'><font size='2'>Nama Customer</font></th><td width='2%'>:</td><td width='58%'><font size='2'>$r[nama_customer]</font></td></tr>
											<tr><th width='40%'><font size='2'>Tanggal Kirim</font></th><td width='2%'>:</td><td width='58%'><font size='2'>".tgl_indo($r[tanggal_kirim])."</font></td></tr>
											<tr><th width='40%'><font size='2'>No PO / No SO</font></th><td width='2%'>:</td><td width='58%'><font size='2'>$r[no_po] / $r[no_so]</font></td></tr>
											<tr><th width='40%'><font size='2'>Dibuat Oleh</font></th><td width='2%'>:</td><td width='58%'><font size='2'>$r[created_by]</font></td></tr>
										</table>
										</p>
									</div>
									<div class='dialog-pro dialog' style='text-align:right;font-weight:bold;'>";
									if($_SESSION[level]=='admin' || $_SESSION[level]=='mgr'){
											if($r[status]=='waiting for approval'){
												echo "<font color='red'>waiting for approval</font>";
												// echo"<a href='?p=dashboard&act=apr&no=$r[no_surat_jalan]'><button class='btn btn-danger btn-xs' id='sa-basic'>APPROVE</button></a>";
											}
											else if($r[status_printed]=='Open'){
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
										echo"</b></font>
										
									</div>
								</div>
							</div>";
					}
					if($_GET[act]=='apr'){
						mysqli_query($conn, "update tb_approve set status = 'Approved', apr_by='$_SESSION[username]', apr_date = NOW(), apr_change_date=NOW() where no_surat_jalan = '$_GET[no]'");
						$link = "<script>window.location='?p=dashboard';</script>";
						echo $link;
					 }
					?>
            </div>
			
			
        </div>
    </div>
    <!-- End Status area-->