<?php include '../konek.php';?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> 
<div class="page-inner">
					<div class="row">
						<div class="col-md-12">	
						<form method="POST">
							<div class="card">
								<div class="card-header">
									<div class="card-title">FORM TAMBAH DANA</div>
								</div>
								<div class="card-body">
									<div class="row">
											<div class="col-md-6 col-lg-6">
												<div class="form-group">
													<label>Tujuan</label>
													<input type="text" name="description" class="form-control" placeholder="Tujuan Dana.." autofocus>
												</div>
												<div class="form-group">
													<label>Jumlah</label>
													<input type="number" name="anggaran" class="form-control" placeholder="Jumlah Anggaran...">
												</div>
                                                <div class="form-group">
													<label>Jumlah</label>
													<input type="number" name="realisasi" class="form-control" placeholder="Jumlah Realiasi...">
												</div>
												<!-- <div class="form-group">
													<label>Tempat Lahir</label>
													<input type="text" name="tempat" class="form-control" placeholder="Tempat Lahir.." >
												</div> -->
												<!-- <div class="form-group">
													<label>Tanggal Lahir</label>
													<input type="date" name="tanggal" class="form-control" >
												</div> -->
												<!-- <div class="form-group">
													<label>Jenis Kelamin</label>
													<select name="jekel" class="form-control">
														<option disabled="" selected="">Pilih Jenis Kelamin</option>
														<option value="Laki-Laki">Laki-Laki</option>
														<option value="Perempuan">Perempuan</option>
													</select>
												</div>
												<div class="form-group">
													<label>Alamat</label>
													<textarea name="alamat" class="form-control" cols="30" rows="10" placeholder="Alamat.."></textarea>
												</div>
												<div class="form-group">
													<label>Status Warga</label>
													<select name="status_warga" class="form-control">
														<option disabled="" selected="">Pilih Status Warga</option>
														<option value="Sekolah">Sekolah</option>
														<option value="Kerja">Kerja</option>
														<option value="Belum Bekerja">Belum Bekerja</option>
													</select>
												</div>
												<div class="form-group">
													<label>Password</label>
													<input type="password" name="password" class="form-control" placeholder="Password..">
												</div>
												<div class="form-group">
													<label>Hak Akses</label>
													<select name="hak_akses" class="form-control">
														<option disabled="" selected="">Pilih Hak Akses</option>
														<option value="Pemohon">Pemohon</option>
														<option value="Lurah">Lurah</option>
														<option value="Staf">Staf</option>
													</select>
												</div> -->
											</div>
									</div>
								</div>
								<div class="card-action">
									<button name="simpan" class="btn btn-success btn-sm">Simpan</button>
									<a href="?halaman=tampil_user" class="btn btn-default btn-sm">Batal</a>
								</div>
							</div>
						</div>
						</form>
					</div>
</div>

<?php
if(isset($_POST['simpan'])){
	$description = $_POST['description'];
	$anggaran = $_POST['anggaran']; 
    $realisasi = $_POST['realisasi'];
    $sisa = $anggaran - $realisasi; // Calculate

	$sql = "INSERT INTO data_ppd (description, anggaran, realisasi, sisa) VALUES ('$description', '$anggaran', '$realisasi', '$sisa')";
	$query = mysqli_query($konek, $sql);

	if($query){
		echo "<script language='javascript'>swal('Selamat...', 'Simpan Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_ppd">';
	}else{
		echo "<script language='javascript'>swal('Gagal...', 'Simpan Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tambah_ppd">';
	}
}
?>