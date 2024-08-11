<?php include '../konek.php';?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>  
<?php
if(isset($_GET['id_request_skbm'])){
    $id=$_GET['id_request_skbm'];
	$tampil_nik = "SELECT * FROM data_request_skbm NATURAL JOIN data_user WHERE id_request_skbm=$id";
	$query = mysqli_query($konek,$tampil_nik);
    $data = mysqli_fetch_array($query,MYSQLI_BOTH);
    $id=$data['id_request_skbm'];
	$nik = $data['nik'];
    $nama = $data['nama'];
    $ktp = $data['scan_ktp'];
    $photo = $data['scan_photo'];
    $pernyataan = $data['scan_pernyataan'];
    $keperluan = $data['keperluan'];
}
?>
<div class="page-inner">
					<div class="row">
						<div class="col-md-12">	
						<form method="POST" enctype="multipart/form-data">
							<div class="card">
								<div class="card-header">
									<div class="card-title">UBAH REQUEST SKBM</div>
								</div>
								<div class="card-body">
									<div class="row">
											<div class="col-md-6 col-lg-6">
                                                <div class="form-group">
													<label>NIK</label>
													<input type="text" name="nik" class="form-control" value="<?= $nik.' - '.$nama;?>" readonly>
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
													<input type="text" name="keperluan" class="form-control" value="<?= $keperluan?>" placeholder="Keperluan Anda.." autofocus>
												</div>
											</div>
											<div class="col-md-6 col-lg-6">	
                                                <div class="form-group">
													<label>Scan KTP</label><br>
                                                    <img src="../dataFoto/scan_ktp/<?= $ktp;?>" value="<?= $ktp;?>" width="200" height="100" alt="">
    
												</div>	
												<div class="form-group">
													<input type="file" name="ktp" class="form-control" size="37">
												</div>
												<div class="form-group">
													<label>Scan PHOTO</label><br>
													<img src="../dataFoto/scan_photo/<?= $photo;?>" value="<?= $photo;?>" width="200" height="100" alt="">
												</div>
                                                <div class="form-group">
													<input type="file" name="photo" class="form-control" size="37">
												</div>
												<div class="form-group">
													<label>Scan Surat Pernyataan</label><br>
													<img src="../dataFoto/scan_pernyataan/<?= $pernyataan;?>" value="<?= $pernyataan;?>" width="200" height="100" alt="">
												</div>
                                                <div class="form-group">
													<input type="file" name="pernyataan" class="form-control" size="37">
												</div>
											</div>
									</div>
								</div>
								<div class="card-action">
									<button name="ubah" class="btn btn-success">Ubah</button>
									<a href="?halaman=tampil_status" class="btn btn-default">Batal</a>
								</div>
							</div>
						</div>
						</form>
					</div>
</div>

<?php
if(isset($_POST['ubah'])){
	$keperluan = $_POST['keperluan'];
		$nama_ktp = isset($_FILES['ktp']);
		$file_ktp = $_POST['nik']."_".".jpg";
		$nama_photo = isset($_FILES['photo']);
    	$file_photo = $_POST['nik']."_".".jpg";
		$nama_pernyataan = isset($_FILES['pernyataan']);
    	$file_pernyataan = $_POST['nik']."_".".jpg";
    $sql = "UPDATE data_request_skbm SET
    keperluan='$keperluan',
    scan_ktp='$file_ktp',
    scan_photo='$file_photo', 
    scan_pernyataan='$file_pernyataan' WHERE id_request_skbm=$id";
	$query = mysqli_query($konek,$sql);

	if($query){
		copy($_FILES['ktp']['tmp_name'],"../dataFoto/scan_ktp/".$file_ktp);
		copy($_FILES['photo']['tmp_name'],"../dataFoto/scan_photo/".$file_photo);
		copy($_FILES['pernyataan']['tmp_name'],"../dataFoto/scan_pernyataan/".$file_pernyataan);
		echo "<script language='javascript'>swal('Selamat...', 'Ubah Berhasil', 'success');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
	  }else{
		echo "<script language='javascript'>swal('Gagal...', 'Ubah Gagal', 'error');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=ubah_skbm">';
	  }
}
	
?>