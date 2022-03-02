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
<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
    <div class="recent-items-wp notika-shadow sm-res-mg-t-30">
        <div class="rc-it-ltd">
<p><div class="alert alert-warning" role="alert">
<center>Form Surat Jalan Manual PT Krisanthium Offset Printing</center>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group ic-cmp-int float-lb floating-lb">
        <div class="form-ic-cmp">
            <label>Nomor Surat Jalan</label>
                <input type="text" class="form-control" id="no_surat_jalan" value="" disabled=''/>
		</div>
    </div>
</div>
<?php
if($dep['id_dep']==$variable_s)
{
echo "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-12' style='display:inline'>";
}
else
{
	
	echo "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-12' style='display:none'>";
}
?>
    <div class="form-group ic-cmp-int float-lb floating-lb">
        <div class="form-ic-cmp">
            <label>Goods Issue Doc.</label>
                <input type="text" class="form-control" id="no_gid" placeholder='Masukan nomor GID sesuai SIM' autofocus />
		</div>
    </div>
</div>

<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <div class="form-group ic-cmp-int float-lb floating-lb">
        <div class="form-ic-cmp">
            <label>Nama Tujuan</label>
			<?php
			if($dep['id_dep']==$variable_p)
				{
			?>
                		<input type="text" class="form-control" id="nama_customer" value='PT. Krisanthium Offset Printing' readonly='' />
			<?php
				}else{
			?>
				 <input type="text" class="form-control" id="nama_customer" />	
			<?php
				}
			?>	
		</div>
    </div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="form-group ic-cmp-int float-lb floating-lb">
        <div class="form-ic-cmp">
            <label>Alamat lengkap</label>
			<?php
			if($dep['id_dep']==$variable_p)
				{
			?>
					<textarea class="form-control" rows="3" id="alamat_customer" readonly='' >Jl. Rungkut Industri III No. 19/23 Surabaya</textarea>
			<?php
				}
				else{
			?>
					<textarea class="form-control" rows="3" id="alamat_customer"></textarea>
			<?php	
				}
			?>
		</div>
    </div>
</div>
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
    <div class="form-group ic-cmp-int float-lb floating-lb">
        <div class="form-ic-cmp">
            <label>No. SO</label>
                <input type="text" class="form-control" id="no_so">
		</div>
    </div>
</div>
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
    <div class="form-group ic-cmp-int float-lb floating-lb">
        <div class="form-ic-cmp">
            <label>No. PO</label>
                <input type="text" class="form-control" id="no_po">
		</div>
    </div>
</div>
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
    <div class="form-group ic-cmp-int float-lb floating-lb">
        <div class="form-ic-cmp">
            <label>C O A</label>
                <input type="text" class="form-control" id="coa">
		</div>
    </div>
</div>
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
    <div class="form-group ic-cmp-int float-lb floating-lb">
        <div class="form-ic-cmp">
            <label>Tanggal Kirim</label>
                <input type="date" class="form-control" id="tanggal_kirim" <?php echo "value='".date('Y-m-d')."'";?>>
		</div>
    </div>
</div>
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
    <div class="form-group ic-cmp-int float-lb floating-lb">
        <div class="form-ic-cmp">
            <label>No. Kendaraan</label>
                <input type="text" class="form-control" id="nopol_kendaraan">
		</div>
    </div>
</div>
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
    <div class="form-group ic-cmp-int float-lb floating-lb">
        <div class="form-ic-cmp">
            <label>Sopir</label>
                <input type="text" class="form-control" id="sopir">
		</div>
    </div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="form-group ic-cmp-int float-lb floating-lb">
        <div class="form-ic-cmp">
            <label>Keterangan</label>
                <input type="text" class="form-control" id="keterangan">
		</div>
    </div>
</div>
<table class="table">
<tbody>
</tbody>
</table>
<div class='alert alert-info' role='alert'>
<?php  
 $bil = 0;
 while($bil<=0)
 {
	 $bil++;
 }
?>
<center>Daftar Barang Yang Dikirim</center>
</div>
<div class="alert">  
                <div class="form-group">  
                     <form name="add_name" id="add_name">
						<p align='right'><button type="button" name="add" id="add" class="btn btn-success">Tambah Barang</button></p>
						<div class="text">  
                               <table class="table table-bordered" id="dynamic_field" border=1>  
							   <thead>
										<tr>
											<th nowrap>No.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
											<th nowrap>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Kode &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
											<th nowrap>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nama Barang &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
											<th nowrap>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Informasi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
											<th nowrap>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jumlah &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
											<th nowrap>&nbsp;&nbsp;&nbsp;&nbsp; Satuan &nbsp;&nbsp;&nbsp;&nbsp;</th>
										</tr>
									</thead>
									<tbody>
                                    <tr>  
                                         <td width='8%'>
											<input type="hidden" class="form-control" name="no_surat_jalan[]" value="<?php echo $newID; ?>" />
											<input type="number" name="no[]" value="<?php echo "$bil" ?>" placeholder="No" class="form-control " required disabled=''/>
										</td>
										<td><input type="text" class="form-control" name="kode_barang[]" placeholder="Kode Barang" required /></td>
										<td><input type="text" class="form-control" name="nama[]" id="nama" placeholder="Nama Barang" required /></td>
										<td><input type="text" class="form-control" name="informasi[]" placeholder="Informasi" required /></td>										
										<td><input type="text" class="form-control" name="jumlah[]" id="jumlah" placeholder="Jumlah" required /></td>
										<td><input type="text" class="form-control" name="satuan[]" id='satuan' placeholder="Satuan" required /></td>		
										 <!--
										 <input type="hidden" class="form-control" name="no_surat_jalan[]" value="<?php echo $newID; ?>" />
										 <input type="number" name="no[]" value="<?php echo "$bil" ?>" placeholder="No" class="form-control name_list" required /></td> 
										 <td><input type="text" name="nama[]" placeholder="Nama Barang" class="form-control name_list" required /></td> 	
										 <td><input type="number" name="jumlah[]" placeholder="Jumlah (*harus berisi ANGKA)" class="form-control name_list" required /></td>
										 <td><input type="text" name="satuan[]" placeholder="Satuan" class="form-control name_list" required />
										 -->
                                    </tr> 
									</tbody>									
                               </table>  
                          </div>
						</div>						  
                     </form>  
                </div>  
           </div>  
<div class="form-group">
<center><table>
	<tr>
	<th><button type="button" name="submit" id="submit" onclick="myFunction()" class="btn btn-primary">Simpan</button></th>
	<td> &nbsp; </td>
	<td> &nbsp; </td>
	</tr>
</table></center>
</div>
</p>
<br><br>
 
 <p align='justify'>
 <font color='red'><h5><u>PERHATIAN</u></h5> * Nomor Surat Jalan Manual akan terbentuk ketika dokumen sudah tersimpan di sistem
 <br>* <b>KODE BARANG</b> diisi <b>jika barang mempunyai kode barang (TIDAK WAJIB DIISI)</b>
 <br>* Kolom <b>jumlah (WAJIB DIISI)</b> harus berisi angka.
 <br>* Jika jumlah barang berisi nilai <b>desimal (WAJIB DIISI)</b>, gunakan tanda titik( . ) Mis: 4.56
 <br>* Kolom Informasi <b>dapat diisi jika ada info yang ingin ditulis (TIDAK WAJIB DIISI)</b></font>
 </p>
</div>
</div>
</div> <!-- /container -->
<script>
function myFunction() {
    var x = document.getElementById("submit");
    x.disabled = true;
}
</script>
<script>  
 $(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'">'+
		   '<td><input type="hidden" name="no_surat_jalan[]" class="form-control" value="<?php echo $newID; ?>"/>'+
		   '<input type="number" name="no[]" placeholder="No" value='+i+' class="form-control" disabled=""></td>'+
		   '<td><input type="text" class="form-control" name="kode_barang[]" placeholder="Kode Barang" required /></div></div></div>'+
		   '<td><input type="text" class="form-control" name="nama[]" placeholder="Nama Barang" required /></td>'+
		   '<td><input type="text" class="form-control" name="informasi[]" placeholder="Informasi" required /></td>'+
		   '<td><input type="text" class="form-control" name="jumlah[]" placeholder="Jumlah (*harus berisi ANGKA)" required /></td>'+
		   '<td><input type="text" class="form-control" name="satuan[]" placeholder="Satuan" required /></td>'+
		   '<td align="right"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove(); 
		   i--;
      });   
	  $('#submit').click(function(e){  
			var no_surat_jalan  = document.getElementById("no_surat_jalan").value;
			var no_gid  = document.getElementById("no_gid").value; 			
			var nama_customer  = document.getElementById("nama_customer").value; 
            var alamat_customer  = document.getElementById("alamat_customer").value; 
			var tanggal_kirim  = document.getElementById("tanggal_kirim").value;
            var nopol_kendaraan  = document.getElementById("nopol_kendaraan").value;
			var no_po  = document.getElementById("no_po").value;
			var no_so  = document.getElementById("no_so").value;
			var coa  = document.getElementById("coa").value;
			var keterangan  = document.getElementById("keterangan").value;
			var sopir  = document.getElementById("sopir").value;
			
			var nama = document.getElementById("nama").value;
			var jumlah = document.getElementById("jumlah").value;
			var satuan = document.getElementById("satuan").value;
			<?php
			if($dep[id_dep]==$variable_s){
			?>
			if(nama_customer=="" || alamat_customer=="" || jumlah=="" || satuan=="" || nama=="" || sopir==""){
				alert("Ada data yang kosong");
				var x = document.getElementById("submit");
					x.disabled = false;
			}else{
			var dataString = 'no_surat_jalan=' + no_surat_jalan + '&no_gid=' + no_gid + '&nama_customer=' + nama_customer + '&alamat_customer=' + alamat_customer + '&tanggal_kirim=' + tanggal_kirim + '&nopol_kendaraan=' + nopol_kendaraan + '&no_po=' + no_po+ '&no_so=' + no_so+ '&coa=' + coa+ '&keterangan=' + keterangan + '&sopir=' + sopir;
			$.ajax({  
                url:"modul/name2.php",  
                method:"POST",  
                data:dataString,  
                success:function(data)  
                {  
                     $.ajax({  
						url:"modul/name.php",  
						method:"POST",  
						data:$('#add_name').serialize(),  
						success:function(data)  
						{  
							 $('#add_name')[0].reset();  
						}  
				   });   
				   alert(data);  
				   window.location='?p=report-sjm';
                }  
			});
			}
			<?php	
			}else{
			?>
			if(nama_customer=="" || alamat_customer=="" || jumlah=="" || satuan=="" || nama=="" || sopir==""){
				alert("Ada data yang kosong");
				 var x = document.getElementById("submit");
					x.disabled = false;
			}else{
			var dataString = 'no_surat_jalan=' + no_surat_jalan + '&no_gid=' + no_gid + '&nama_customer=' + nama_customer + '&alamat_customer=' + alamat_customer + '&tanggal_kirim=' + tanggal_kirim + '&nopol_kendaraan=' + nopol_kendaraan + '&no_po=' + no_po+ '&no_so=' + no_so+ '&coa=' + coa+ '&keterangan=' + keterangan + '&sopir=' + sopir;
			$.ajax({  
                url:"modul/name2.php",  
                method:"POST",  
                data:dataString,  
                success:function(data)  
                {  
                     $.ajax({  
						url:"modul/name.php",  
						method:"POST",  
						data:$('#add_name').serialize(),  
						success:function(data)  
						{  
							 $('#add_name')[0].reset();  
						}  
				   });   
				   alert(data);  
				   window.location='?p=report-sjm';
                }  
			});
			}
			<?php
			}
			?>
	  });
 });  
 </script>
 <script type="text/javascript">
	function validasi() {
		var nama = document.getElementById("nama").value;
		var email = document.getElementById("email").value;
		var alamat = document.getElementById("alamat").value;
		if (nama != "" && email!="" && alamat !="") {
			return true;
		}else{
			alert('Anda harus mengisi data dengan lengkap !');
		}
	}
</script>