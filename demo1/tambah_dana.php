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
														<label>Pilih Pendapatan</label>
														<select name="pendapatan" class="form-control">
  														<option value="Pendapatan Asli Desa">Pendapatan Asli Desa</option>
  														<option value="Pendapatan Transfer">Pendapatan Transfer</option>
  														<option value="Pendapatan Lain-lain">Pendapatan Lain-lain</option>
										</select>
													</div>
												<div class="form-group">
													<label>Tujuan</label>
													<input type="text" name="description" class="form-control" placeholder="Tujuan Dana.." autofocus>
												</div>
												<div class="form-group">
													<label>Jumlah</label>
													<input type="number" name="dana" class="form-control" placeholder="Jumlah Dana...">
												</div>
												<div class="form-group">
													<label>Jumlah</label>
													<input type="number" name="realisasi" class="form-control" placeholder="Jumlah Realisasi...">
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
	$dana = $_POST['dana']; 
    $realisasi = $_POST['realisasi'];
    $sisa = $dana - $realisasi; // Calculate
	$pendapatan= $_POST['pendapatan'];


	$sql = "INSERT INTO data_dana (description, dana, realisasi, sisa, pendapatan) VALUES ('$description', '$dana', '$realisasi', '$sisa', '$pendapatan')";
	$query = mysqli_query($konek,$sql);

	if($query){
		echo "<script language='javascript'>swal('Selamat...', 'Simpan Berhasil', 'success');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_dana">';
	  }else{
		echo "<script language='javascript'>swal('Gagal...', 'Simpan Gagal', 'error');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tambah_dana">';
	  }
}
?>