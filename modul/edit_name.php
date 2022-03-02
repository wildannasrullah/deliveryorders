<?php  
error_reporting(0);
session_start();
include("../config/koneksi.php");
 
 		$pname = $_POST['nama'];
		$number = count($_POST["nama"]);  
		if($number > 0)  
		{  
			  for($i=0; $i<$number; $i++)  
			  {  
		  $kode = $_POST["kode"][$i];
		  $kb = $_POST["kode_barang"][$i];
		  $n = $_POST["nama"][$i];
		  $id = $_POST["informasi"][$i];
		  $j = $_POST[jumlah][$i];
		  $s = $_POST[satuan][$i];
		  $nos = $_POST[no_surat_jalan][$i];
		  $nn = $_POST[no][$i];
		  
				   if(trim($_POST["nama"][$i] != ''))  
				   {  
						$plplp = mysqli_query($conn, "select *from tb_suratjaland where no_surat_jalan='$nos'");
						$t = mysqli_fetch_array($plplp);
						$dn = mysqli_num_rows(mysqli_query($conn, "select *from tb_suratjaland where no_surat_jalan='$nos'"));
						$g = $dn+1;
								if($kode == 'a'){
									$sql1 = "INSERT INTO tb_suratjaland (no_surat_jalan,no,nama_barang,jumlah,satuan,created_date,kode_barang,informasi) VALUES('".mysqli_real_escape_string($conn, $_POST["no_surat_jalan"][$i])."',".mysqli_real_escape_string($conn, $_POST["no"][$i]).",
																		'".mysqli_real_escape_string($conn, $_POST["nama"][$i])."','".mysqli_real_escape_string($conn, $_POST["jumlah"][$i])."',
																		'".mysqli_real_escape_string($conn, $_POST["satuan"][$i])."',NOW(),'".mysqli_real_escape_string($conn, $_POST["kode_barang"][$i])."',
																		'".mysqli_real_escape_string($conn, $_POST["informasi"][$i])."')";  
								}
								if($kode == 'e'){
									$sql2 = "UPDATE tb_suratjaland SET nama_barang = '$n', jumlah = '$j', satuan = '$s', kode_barang = '$kb', informasi = '$id'
												WHERE no_surat_jalan  = '$nos' AND no = '$nn'";
								}
								
							//eksekusi query insert
								$insert = mysqli_query($conn, $sql1);
							//eksekusi query update
								$update = mysqli_query($conn, $sql2);
							
							echo "cek lagi = $t[no_surat_jalan]";
				   }  
			  }  
			  echo "cek = $n, $j, $s, $nos, $nn, $g, $t[no]==$nn";  
		 }  
		 else  
		 {  
			  echo "Data Barang Tidak Tersimpan. Cek Barang Anda";  
		 }  
		
 
 ?> 