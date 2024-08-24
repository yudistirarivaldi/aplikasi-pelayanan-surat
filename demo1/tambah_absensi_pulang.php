<?php include '../konek.php'; ?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<form method="POST">
				<div class="card">
					<div class="card-header">
						<div class="card-title">FORM ABSEN MASUK</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>NIK</label>
									<input type="text" name="nik" class="form-control" value="<?php echo $_SESSION['nik']; ?>" readonly>
								</div>
								<div class="form-group">
									<label>Nama</label>
									<input type="text" name="nama" class="form-control" value="<?php echo $_SESSION['nama']; ?>" readonly>
								</div>
								<div class="form-group">
									<label>Tanggal</label>
									<input type="text" name="tanggal" class="form-control" value="<?php echo date('Y-m-d'); ?>" readonly>
								</div>
								<div class="form-group">
									<label>Jam Pulang</label>
									<input type="text" name="absen_plg" class="form-control" value="<?php echo date('H:i'); ?>" readonly>
								</div>
							</div>
						</div>
					</div>
					<div class="card-action">
						<button name="simpan" class="btn btn-success btn-sm">Simpan</button>
						<a href="?halaman=tampil_absensi" class="btn btn-default btn-sm">Batal</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<?php
if (isset($_POST['simpan'])) {
	$absen_plg = $_POST['absen_plg'];
	$id_absen = $_GET['id'];
	$sql = "UPDATE absensi SET absen_plg = '$absen_plg' WHERE id = '$id_absen'";
	$query = mysqli_query($konek, $sql);

	if ($query) {
		echo "<script language='javascript'>swal('Selamat...', 'Simpan Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_absensi">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Simpan Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tambah_absensi_pulang">';
	}
}
?>