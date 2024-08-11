<?php
// Ubah nama variabel $description di bagian SELECT
if (isset($_GET['description'])) {
    $selected_description = $_GET['description'];
    $tampil_description = "SELECT * FROM data_bppd WHERE description='$selected_description'";
    $query = mysqli_query($konek, $tampil_description);
    $data = mysqli_fetch_array($query, MYSQLI_BOTH);
    $dana = $data['dana'];
    $realisasi = $data['realisasi'];
    $sisa = $dana - $realisasi; // Calculate
    $pendapatan = $data['pendapatan'];
}
?>

<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> 
<div class="page-inner">
					<div class="row">
						<div class="col-md-12">	
						<form method="POST">
							<div class="card">
								<div class="card-header">
									<div class="card-title">UBAH DANA</div>
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
													<input type="text" name="description" class="form-control" placeholder="Tujuan Dana.." value="<?= $description; ?>" >
												</div>
													<div class="form-group">
													<label>Jumlah Dana</label>
													<input type="number" name="dana" class="form-control" placeholder="Jumlah Dana..." value="<?= $dana;?>">
												</div>
												<div class="form-group">
													<label>Jumlah Realisasi</label>
													<input type="number" name="realisasi" class="form-control" placeholder="Jumlah Realisasi..." value="<?= $realisasi;?>">
												</div>
												</div>										
											</div>
									</div>
								</div>
								<div class="card-action">
									<button name="ubah" class="btn btn-success">Ubah</button>
									<a href="?halaman=beranda" class="btn btn-default">Batal</a>
								</div>
							</div>
						</div>
						</form>
					</div>
</div>

<?php
if (isset($_POST['ubah'])) {
	error_reporting(error_reporting() & ~E_NOTICE);
    $description = $_POST['description'];
    $dana = floatval($_POST['dana']);
    $realisasi = floatval($_POST['realisasi']);
    $sisa = $dana - $realisasi;
    $pendapatan = $_POST['pendapatan'];

    // // Use prepared statement to update data
    // $sql = "UPDATE data_bppd SET
    //         dana = ?,
    //         realisasi = ?,
    //         sisa = ?
    //         WHERE description = ?";

    // $stmt = mysqli_prepare($konek, $sql);

    // // Sesuaikan tipe data dengan kolom dalam tabel
    // mysqli_stmt_bind_param($stmt, "ddds", $dana, $realisasi, $sisa, $description);

    // if (mysqli_stmt_execute($stmt)) {
    //     echo "<script language='javascript'>swal('Selamat...', 'Ubah Berhasil', 'success');</script>";
    //     echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_dana">';
    // } else {
    //     echo "<script language='javascript'>swal('Gagal...', 'Ubah Gagal', 'error');</script>";
    //     echo '<meta http-equiv="refresh" content="3; url=?halaman=ubah_dana">';
    // }

    // mysqli_stmt_close($stmt);
	// Properly escape and quote the $description variable
    $description = mysqli_real_escape_string($konek, $description);

    // Update the SQL query to set both 'anggaran' and 'realisasi' fields
    $sql = "UPDATE data_dana SET
            dana='$dana',
            sisa='$sisa',
            realisasi='$realisasi',
            sisa='$sisa' 
			WHERE description='$description'";
    
    $query = mysqli_query($konek, $sql);

    if ($query) {
        echo "<script language='javascript'>swal('Selamat...', 'Ubah Berhasil', 'success');</script>";
        echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_dana">';
    } else {
        echo "<script language='javascript'>swal('Gagal...', 'Ubah Gagal', 'error');</script>";
        echo '<meta http-equiv="refresh" content="3; url=?halaman=ubah_dana">';
    }
}
?>

