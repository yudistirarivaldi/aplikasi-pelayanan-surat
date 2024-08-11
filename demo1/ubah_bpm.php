<?php
if (isset($_GET['description'])) {
    $description = $_GET['description'];
    $tampil_description = "SELECT * FROM data_bpm WHERE description='$description'";
    $query = mysqli_query($konek, $tampil_description);
    $data = mysqli_fetch_array($query, MYSQLI_BOTH);
    $description = $data['description'];
    $anggaran = $data['anggaran'];
    $realisasi = $data['realisasi'];
    $sisa = $anggaran - $realisasi;
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
        <label>Tujuan Dana</label>
        <input type="text" name="description" class="form-control" placeholder="Tujuan Dana.." value="<?= $description; ?>" readonly>
    </div>
    <div class="form-group">
        <label>Jumlah Anggaran</label>
        <input type="text" name="anggaran" class="form-control" placeholder="Jumlah Anggaran..." value="<?= $anggaran; ?>">
    </div>
    <div class="form-group">
        <label>Jumlah Realisasi</label>
        <input type="text" name="realisasi" class="form-control" placeholder="Jumlah Realiasi..." value="<?= $realisasi; ?>">
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
    $description = $_POST['description'];
    $anggaran = $_POST['anggaran'];
    $realisasi = $_POST['realisasi'];
    $sisa = $anggaran - $realisasi;

    // Properly escape and quote the $description variable
    $description = mysqli_real_escape_string($konek, $description);

    // Update the SQL query to set both 'anggaran' and 'realisasi' fields
    $sql = "UPDATE data_bpm SET
            anggaran='$anggaran',
            realisasi='$realisasi',
            sisa='$sisa' WHERE description='$description'";
    
    $query = mysqli_query($konek, $sql);

    if ($query) {
        echo "<script language='javascript'>swal('Selamat...', 'Ubah Berhasil', 'success');</script>";
        echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_bpm">';
    } else {
        echo "<script language='javascript'>swal('Gagal...', 'Ubah Gagal', 'error');</script>";
        echo '<meta http-equiv="refresh" content="3; url=?halaman=ubah_bpm">';
    }
}

	
?>