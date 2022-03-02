<?php
error_reporting(0);
session_start();
include("../config/koneksi.php");
$aksi = "modul/act_departemen.php";
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
										<h2>Master Departemen</h2>
										<p>Surat Jalan Manual <span class="bread-ntd"> - Krisanthium Offset Printing, PT</span></p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="breadcomb-report">
									<a href="?p=departemen&act=add-dep"><button data-toggle="tooltip" data-placement="left" title="Tambah Departemen" class="btn">Tambah Departemen</button></a>
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
									<th width='7%'>#</th>
                                        <th>Nama Departemen</th>
										<th width='12%'>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php
								$i=1;
								$a = mysqli_query($conn, "select *from departemen order by id_dep desc");
								while($r = mysqli_fetch_array($a)){
								echo"
                                    <tr>
										<td>$i.</td>
                                        <td>$r[nama_dep]</td>
										<td>
											<a href='?p=departemen&act=update&id=$r[id_dep]'><button type='button' class='btn btn-info notika-btn-info btn-xs'>Edit</button></a>
											<a href='$aksi?p=departemen&act=delete&id=$r[id_dep]'><button type='button' class='btn btn-warning notika-btn-warning btn-xs'>Hapus</button></a>
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
case "add-dep":
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
										<h2>Tambah Departemen</h2>
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
					<form method="POST" action="<?php echo "$aksi?p=departemen&act=add"; ?>">
                        <div class="cmp-tb-hd cmp-int-hd">
                            <h2>Form Tambah Departemen</h2>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Nama Departemen</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" name="nama_dep" class="form-control input-sm" placeholder="Nama Departemen" autofocus>
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
										<h2>Edit Departemen</h2>
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
					$t = mysqli_query($conn, "select *from departemen where id_dep = '$_GET[id]'");
					$u = mysqli_fetch_array($t);
				?>
					<form method="POST" action="<?php echo "$aksi?p=departemen&act=update"; ?>">
					<input type="hidden" name="id_dep" value="<?php echo"$u[id_dep]"; ?>">
                        <div class="cmp-tb-hd cmp-int-hd">
                            <h2>Form Update Departemen</h2>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Nama Lengkap</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" name="nama_dep" class="form-control input-sm" placeholder="Nama Departemen" value="<?php echo"$u[nama_dep]"; ?>" >
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