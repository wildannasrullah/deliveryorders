<?php
error_reporting(0);
session_start();
include("../config/koneksi.php");
$aksi = "modul/act_approval.php";
switch($_GET[act]){
default:
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
										<h2>Master Manager</h2>
										<p>Surat Jalan Manual <span class="bread-ntd"> - Krisanthium Offset Printing, PT</span></p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="breadcomb-report">
									<a href="?p=approval&act=add-app"><button data-toggle="tooltip" data-placement="left" title="Tambah Approval" class="btn">Tambah Manager</button></a>
								</div>
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
                            <table id="data-table-basic" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
									<th>#</th>
                                        <th>Nama Lengkap</th>
                                        <th><i>Departemen</i></th>
										 <th><i>Level</i></th>
										<th width='12%'>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php
								$i=1;
								$a = mysqli_query($conn, "select *from manager p left join departemen d on p.id_dep=d.id_dep
														  left join pengelola k on p.username=k.username order by k.fullname desc;");
								while($r = mysqli_fetch_array($a)){
								echo"
                                    <tr>
										<td>$i.</td>
                                        <td>$r[fullname]</td>
                                        <td>$r[nama_dep]</td>
                                        <td>$r[level]</td>
										<td>
											<a href='?p=approval&act=update&id=$r[id_mgr]'><button type='button' class='btn btn-info notika-btn-info btn-xs'>Edit</button></a>
											<a href='$aksi?p=approval&act=delete&id=$r[id_mgr]'><button type='button' class='btn btn-warning notika-btn-warning btn-xs'>Hapus</button></a>
										</td>
                                    </tr>
									";
									$i++;
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
break;
case "add-app":
?>
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
										<h2>Tambah Manager</h2>
										<p>Surat Jalan Manual <span class="bread-ntd"> - Krisanthium Offset Printing, PT</span></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-example-wrap mg-t-30">
					<form method="POST" action="<?php echo "$aksi?p=approval&act=add"; ?>">
                        <div class="cmp-tb-hd cmp-int-hd">
                            <h2>Form Tambah Manager</h2>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Nama Lengkap</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <select class="form-control" name="username">
											<option value=''>--Pilih Nama Pengguna--</option>";
											<?php
											$d=mysqli_query($conn, "select *from pengelola where level not in ('keluar','user') order by username asc");
											while($t = mysqli_fetch_array($d)){
												echo"
												<option value='$t[username]'>$t[fullname]</option>";	
											}
											
											?>
											</select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Departemen</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <select class="form-control" name="dep">
											<option value=''>--Pilih Departemen--</option>";
											<?php
											$d=mysqli_query($conn, "select *from departemen order by nama_dep asc");
											while($t = mysqli_fetch_array($d)){
												echo"
												<option value='$t[id_dep]'>$t[nama_dep]</option>";	
											}
											
											?>
											</select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int mg-t-15">
                            <div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                </div>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <button type="submit" class="btn btn-success notika-btn-success">Simpan</button>&nbsp; <button type="reset" class="btn btn-danger notika-btn-danger">Batal</button>
                                </div>
                            </div>
                        </div>
					</form>
                </div>
            </div>
<?php
break;
case "update":
?>
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
										<h2>Edit Manager</h2>
										<p>Surat Jalan Manual <span class="bread-ntd"> - Krisanthium Offset Printing, PT</span></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-example-wrap mg-t-30">
				<?php
					$t = mysqli_query($conn, "select *from manager where id_mgr = '$_GET[id]'");
					$u = mysqli_fetch_array($t);
				?>
					<form method="POST" action="<?php echo "$aksi?p=approval&act=update"; ?>">
					<input type="hidden" name="id_mgr" value="<?php echo"$u[id_mgr]"; ?>">
                        <div class="cmp-tb-hd cmp-int-hd">
                            <h2>Form Update Manager</h2>
                        </div>
                       <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Nama Lengkap</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <select class="form-control" name="username">
											<option value=''>--Pilih Nama Pengguna--</option>";
											<?php
											$d=mysqli_query($conn, "select *from pengelola where level not in ('keluar','user') order by username asc");
											while($t = mysqli_fetch_array($d)){
												if($u[username]==$t[username]){
													
												echo"
												<option value='$t[username]' selected >$t[fullname]</option>";
												}else{
													
												echo"
												<option value='$t[username]'>$t[fullname]</option>";
												}	
											}
											
											?>
											</select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Departemen</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <select class="form-control" name="dep">
											<option value=''>--Pilih Departemen--</option>";
											<?php
											$d=mysqli_query($conn, "select *from departemen order by nama_dep asc");
											while($t = mysqli_fetch_array($d)){
												if($u[id_dep]==$t[id_dep]){
													echo"
												<option value='$t[id_dep]' selected >$t[nama_dep]</option>";
												}else{
													echo"
												<option value='$t[id_dep]'>$t[nama_dep]</option>";
												}
													
											}
											
											?>
											</select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-example-int mg-t-15">
                            <div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                </div>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <button type="submit" class="btn btn-success notika-btn-success">Simpan</button>&nbsp; <button type="reset" class="btn btn-danger notika-btn-danger">Batal</button>
                                </div>
                            </div>
                        </div>
					</form>
                </div>
            </div>
<?php
break;
}
?>