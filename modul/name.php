<?php  
error_reporting(0);
session_start();
include("../config/koneksi.php");
$m = date(m);$d = date(d);$y = date(Y); 
$dated = date('Y-m-d');	
$dd = "$m/$d/$y";
 $t = mysqli_fetch_array(mysqli_query($conn, "select year(NOW())y, (DATE_FORMAT(CURDATE(),'%m'))m, (DATE_FORMAT(CURDATE(),'%d'))d, 
 											  max(no_surat_jalan) as no , date(created_date) as date_sjm from tb_suratjaland 
 											  where date(created_date)=date(NOW()) "));
 $ye = $t['y']; $mo = $t['m']; $da = $t['d'];
										$noUrut = (int) substr($t[no], 14, 3);
										$noUrut++;
										$char = "SJM-$ye$mo$da-";
										$newID = $char . sprintf("%03s", $noUrut);
		$no_surat_jalan	= $newID;
 		$pname = $_POST['nama'];
		$number = count($_POST["nama"]);  
		if($number > 0)  
		{  
			  for($i=0; $i<$number; $i++)  
			  {  
				if(mysqli_real_escape_string($conn, $_POST["kode_barang"][$i])==''){
					$kode = NULL;
				}else{
					$kode = mysqli_real_escape_string($conn, $_POST["kode_barang"][$i]);
				}
				
				if(mysqli_real_escape_string($conn, $_POST["informasi"][$i])==''){
					$info = NULL;
				}else{
					$info = mysqli_real_escape_string($conn, $_POST["informasi"][$i]);
				}
					$no=$i+1;
						$sql = "INSERT INTO tb_suratjaland (no_surat_jalan,no,nama_barang,jumlah,satuan,created_date,kode_barang,informasi) 
								VALUES('".mysqli_real_escape_string($conn, $no_surat_jalan)."',$no,'".mysqli_real_escape_string($conn, $_POST["nama"][$i])."',
										'".mysqli_real_escape_string($conn, $_POST["jumlah"][$i])."','".mysqli_real_escape_string($conn, $_POST["satuan"][$i])."',NOW(),
										'$kode', '$info')"; 
						/* $sql = "INSERT INTO tb_suratjaland (no_surat_jalan,no,nama_barang,jumlah,satuan,created_date,kode_barang,informasi) 
								VALUES('".mysqli_real_escape_string($conn, $no_surat_jalan)."',$no,'".mysqli_real_escape_string($conn, $_POST["nama"][$i])."',
										'".mysqli_real_escape_string($conn, $_POST["jumlah"][$i])."','".mysqli_real_escape_string($conn, $_POST["satuan"][$i])."',NOW(),
										'".mysqli_real_escape_string($conn, $_POST["kode_barang"][$i])."','".mysqli_real_escape_string($conn, $_POST["informasi"][$i])."')";  */ 
						mysqli_query($conn, $sql);  
						if($sql){
							echo "Success"; 
						}else{
							echo "failed";
						}
				 
			  }  
			   
		 }  
		 else  
		 {  
			  echo "Data Barang Tidak Tersimpan. Cek Barang Anda";  
		 }  
		
 
 ?> 