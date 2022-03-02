<?PHP
$m = date(m);$d = date(d);$y = date(Y);
$dated = date('Y-m-d');	
$dd = "$m/$d/$y";
$t = mysqli_fetch_array(mysqli_query($conn, "select max(no_surat_jalan) as no , date(created_date) as date_sjm from tb_suratjalan where date(created_date)='$dated' "));
										$noUrut = (int) substr($t[no], 14, 3);
										$noUrut++;
										$char = "SJM-$y$m$d-";
										$newID = $char . sprintf("%03s", $noUrut);
$user = mysqli_query($conn, "select *from pengelola p left join departemen d on p.id_dep=d.id_dep where p.username='$_SESSION[username]'");
$dep = mysqli_fetch_array($user);
$variable_s = 6;
$variable_p = 4;
$y = date('Y');
$m = date('m');
$d = date('d');
?>

<style>
.text{
	width: 100%;
	overflow-y:auto;
	overflow-x:scroll;
}
</style>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="form order tempered glass ">
<meta name="author" content="zona accesories">
<title>Form Surat Jalan Manual</title>
<!-- Bootstrap core CSS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
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
										<h2>Laporan Detail Surat Jalan Manual</h2>
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
<form method='POST' action='modul/report_detail/export/excel.php'>
<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
    <div class="recent-items-wp notika-shadow sm-res-mg-t-30">
        <div class="rc-it-ltd">

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group ic-cmp-int float-lb floating-lb">
        <div class="form-ic-cmp">
            <label>Nomor Surat Jalan</label>
                <input type="text" class="form-control" name="no_surat_jalan" />
		</div>
    </div>
</div>
<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
    <div class="form-group ic-cmp-int float-lb floating-lb">
        <div class="form-ic-cmp">
            <label>Nama Tujuan</label>
				<input type="text" class="form-control" name="nama_customer" />	
		</div>
    </div>
</div>
<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
    <div class="form-group ic-cmp-int float-lb floating-lb">
        <div class="form-ic-cmp">
            <label>Tanggal Kirim</label>
			<br />
			 <label>Dari</label>
               <?php
				echo "<input type='date' name='begda' class='form-control' value= '$y-$m-01'>";
			   ?>
		</div>
    </div>
</div>
<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
    <div class="form-group ic-cmp-int float-lb floating-lb">
        <div class="form-ic-cmp">
            <label>&nbsp;</label><br />
			 <label>Sampai</label>
			 <?php
			 echo"
                <input type='date' name='endda' class='form-control' value= '$y-$m-$d' >";
				?>
		</div>
    </div>
</div>
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
    <div class="form-group ic-cmp-int float-lb floating-lb">
        <div class="form-ic-cmp">
            <label>Dibuat Oleh</label>
                <input type="text" class="form-control" name="dibuat_oleh">
		</div>
    </div>
</div>

<table class="table">
<tbody>
</tbody>
</table>

<center><table>
	<tr>
	<th><button type="submit" name="submit" class="btn btn-success">Show</button></th>
	<td> &nbsp; </td>
	<td> &nbsp; </td>
	</tr>
</table></center>
</form>
</div>
</p>
</div>