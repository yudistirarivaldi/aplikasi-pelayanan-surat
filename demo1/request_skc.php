<?php include '../konek.php';?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>  
<?php
	$tampil_nik = "SELECT * FROM data_user WHERE nik=$_SESSION[nik]";
	$query = mysqli_query($konek,$tampil_nik);
	$data = mysqli_fetch_array($query,MYSQLI_BOTH);
	$nik = $data['nik'];
	$nama = $data['nama'];
?>
<div class="page-inner">
					<div class="row">
						<div class="col-md-12">	
						<form method="POST" enctype="multipart/form-data">
							<div class="card">
								<div class="card-header">
									<div class="card-title">FORM TAMBAH REQUEST SURAT KETERANGAN CERAI</div>
								</div>
								<div class="card-body">
									<div class="row">
											<div class="col-md-6 col-lg-6">
											<div class="form-group">
													<label>NIK</label>
													<input type="text" name="keterangan" class="form-control" value="<?= $nik.' - '.$nama;?>" readonly>
												</div>
												<div class="form-group">
													<input type="hidden" name="nik" class="form-control" value="<?= $nik;?>" readonly>
												</div>
												<!-- <div class="form-group">
													<label>Tanggal Request</label>
													<input type="date" name="tgl" class="form-control" value="<?= $s2;?>" readonly>
												</div> -->
												<!-- <div class="form-group">
													<label>Tanggal Request</label>
													<input type="date" name="tgl" class="form-control" value=<?= $date;?> required>
												</div> -->
												<div class="form-group">
													<label>Keperluan</label>
													<input type="text" name="keperluan" class="form-control" placeholder="Keperluan Anda.." autofocus>
												</div>
											</div>
											<div class="col-md-6 col-lg-6">		
												<div class="form-group">
													<label>Scan KTP</label>
													<input type="file" name="ktp" class="form-control" size="37" required>
												</div>
												<div class="form-group">
													<label>Scan KK</label>
													<input type="file" name="kk" class="form-control" size="37" required>
												</div>
												<div class="form-group">
													<label>Scan Akta</label>
													<input type="file" name="akta" class="form-control" size="37" required>
												</div>
												<div class="form-group">
													<label>Scan Photo</label>
													<input type="file" name="photo" class="form-control" size="37" required>
												</div>
												
											</div>
									</div>
								</div>
								<div class="card-action">
									<button name="kirim" class="btn btn-success">Kirim</button>
									<a href="?halaman=beranda" class="btn btn-default">Batal</a>
								</div>
							</div>
						</div>
						</form>
					</div>
</div>

<?php
if(isset($_POST['kirim'])){
	$nik = $_POST['nik'];
	$keperluan = $_POST['keperluan'];

	$rand1 = rand();
	$rand2 = rand();
	$rand3 = rand();
	$rand4 = rand();
	$ekstensi =  array('png','jpg','jpeg','gif');
	$nama_ktp = isset($_FILES['ktp']['name']);	
	$nama_kk = isset($_FILES['kk']['name']);	
	$nama_akta = isset($_FILES['akta']['name']);	
	$nama_photo = isset($_FILES['photo']['name']);	

	$xx = $rand1.'_'.$nama_ktp.'.'.'jpg';
	$yy = $rand2.'_'.$nama_kk.'.'.'jpg';
	$zz = $rand3.'_'.$nama_akta.'.'.'jpg';
	$ww = $rand4.'_'.$nama_photo.'.'.'jpg';
	$sql = "INSERT INTO data_request_skc (nik,scan_ktp,scan_kk,scan_akta,scan_foto,keperluan) VALUES ('$nik','$xx','$yy','$zz','$ww','$keperluan')";
	$query = mysqli_query($konek,$sql) or die (mysqli_error());

	if($query){
		copy($_FILES['ktp']['tmp_name'],"../dataFoto/scan_ktp/".$xx);
		copy($_FILES['kk']['tmp_name'],"../dataFoto/scan_kk/".$yy);
		copy($_FILES['akta']['tmp_name'],"../dataFoto/scan_akta/".$zz);
		copy($_FILES['photo']['tmp_name'],"../dataFoto/scan_photo/".$ww);
		echo "<script language='javascript'>swal('Selamat...', 'Kirim Berhasil', 'success');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
	  }else{
		echo "<script language='javascript'>swal('Gagal...', 'Kirim Gagal', 'error');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=request_skm">';
	  }
}
	
?>