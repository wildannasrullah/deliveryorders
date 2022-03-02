<?php
error_reporting(0);
session_start();
include("../config/koneksi.php");
$aksi = "modul/act_user.php";
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
										<h2>Master User</h2>
										<p>Surat Jalan Manual <span class="bread-ntd"> - Krisanthium Offset Printing, PT</span></p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="breadcomb-report">
									<a href="?p=user&act=add-user"><button data-toggle="tooltip" data-placement="left" title="Tambah User" class="btn">Tambah User</button></a>
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
                                        <th><i>Username</i></th>
                                        <th><i>Password</i></th>
                                        <th><i>Departemen</i></th>
                                        <th width='10%'>Level</th>
										<th width='12%'>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php
								$i=1;
								$a = mysqli_query($conn, "select *from pengelola p left join departemen d on p.id_dep=d.id_dep order by kode_pengelola desc");
								while($r = mysqli_fetch_array($a)){
								echo"
                                    <tr>
										<td>$i.</td>
                                        <td>$r[fullname]</td>
                                        <td>$r[username]</td>
                                        <td>*******</td>
                                        <td>$r[nama_dep]</td>
                                        <td>$r[level]</td>
										<td>
											<a href='?p=user&act=update&id=$r[kode_pengelola]'><button type='button' class='btn btn-info notika-btn-info btn-xs'>Edit</button></a>
											<a href='$aksi?p=user&act=delete&id_user=$r[kode_pengelola]'><button type='button' class='btn btn-warning notika-btn-warning btn-xs'>Hapus</button></a>
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
case "add-user":
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
										<h2>Tambah User</h2>
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
					<form method="POST" action="<?php echo "$aksi?p=user&act=add"; ?>">
                        <div class="cmp-tb-hd cmp-int-hd">
                            <h2>Form Tambah User</h2>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Nama Lengkap</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" name="fullname" class="form-control input-sm" placeholder="Nama Lengkap" autofocus>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Username</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" name="username" class="form-control input-sm" placeholder="Username">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Password</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" name="password" class="form-control input-sm" placeholder="Password">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Email</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" name="email" class="form-control input-sm" placeholder="Email">
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
                        <div class="form-example-int form-horizental mg-t-15">
                            <div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
								<label class="hrzn-fm">Level</label>
                                </div>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <div class="fm-checkbox">
                                        <label><input type="radio" name="level" class="i-checks" value="admin"> <i></i> Administrator</label>&nbsp;
										<label><input type="radio" name="level" class="i-checks" value="mgr" > <i></i> Manager</label>&nbsp;
										<label><input type="radio" name="level" class="i-checks" value="user"> <i></i> User</label>
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
										<h2>Edit User</h2>
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
					$t = mysqli_query($conn, "select *from pengelola where kode_pengelola = '$_GET[id]'");
					$u = mysqli_fetch_array($t);
				?>
					<form method="POST" action="<?php echo "$aksi?p=user&act=update"; ?>">
					<input type="hidden" name="id_user" value="<?php echo"$u[kode_pengelola]"; ?>">
                        <div class="cmp-tb-hd cmp-int-hd">
                            <h2>Form Tambah User</h2>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Nama Lengkap</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" name="fullname" class="form-control input-sm" placeholder="Nama Lengkap" value="<?php echo"$u[fullname]"; ?>" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Username</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" name="username" class="form-control input-sm" placeholder="Username" value="<?php echo"$u[username]"; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Password</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="password" name="password" class="form-control input-sm" placeholder="Password" value="<?php echo"$u[password]"; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Email</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" name="email" class="form-control input-sm" placeholder="Email" value="<?php echo"$u[email]"; ?>">
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
													<option value='$t[id_dep]' selected>$t[nama_dep]</option>";
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
                        <div class="form-example-int form-horizental mg-t-15">
                            <div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
								<label class="hrzn-fm">Level</label>
                                </div>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <div class="fm-checkbox">
									<?php
									if($u[level]=='admin'){
									?>
                                        <label><input type="radio" name="level" value="admin" checked> <i></i> Administrator</label>&nbsp;
										<label><input type="radio" name="level" value="mgr" > <i></i> Manager</label>&nbsp;
										<label><input type="radio" name="level" value="user"> <i></i> User</label>
										<label><input type="radio" name="level" value="keluar"> <i></i> Keluar</label>
									<?php
									}else if($u[level]=='mgr'){
										?>
                                        <label><input type="radio" name="level" value="admin"> <i></i> Administrator</label>&nbsp;
										<label><input type="radio" name="level" value="mgr" checked> <i></i> Manager</label>&nbsp;
										<label><input type="radio" name="level" value="user"> <i></i> User</label>
										<label><input type="radio" name="level" value="keluar"> <i></i> Keluar</label>
									<?php
									}
									else if($u[level]=='user'){
									?>
                                        <label><input type="radio" name="level" value="admin" > <i></i> Administrator</label>&nbsp;
										<label><input type="radio" name="level" value="mgr"> <i></i> Manager</label>&nbsp;
										<label><input type="radio" name="level" value="user" checked> <i></i> User</label>
										<label><input type="radio" name="level" value="keluar"> <i></i> Keluar</label>
									<?php	
									}
									else{
									?>
                                        <label><input type="radio" name="level" value="admin" > <i></i> Administrator</label>&nbsp;
										<label><input type="radio" name="level" value="mgr"> <i></i> Manager</label>&nbsp;
										<label><input type="radio" name="level" value="user" > <i></i> User</label>
										<label><input type="radio" name="level" value="keluar" checked> <i></i> Keluar</label>
									<?php	
									}
									?>
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