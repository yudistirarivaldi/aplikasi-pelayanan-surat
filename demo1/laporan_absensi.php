<?php 

include '../konek.php';
date_default_timezone_set('Asia/Jakarta');
?>
<?php
	if(!isset($_POST['tampilkan'])){
		$bulan = isset($_POST['bulan']) ? $_POST['bulan'] : '';
		$sql = "SELECT
		absensi.nik,
		absensi.nama,
		absensi.tanggal,
		absensi.absen_msk,
		absensi.absen_plg
	FROM
		absensi";
	$query = mysqli_query($konek,$sql);

	}elseif(isset($_POST['tampilkan'])){
		$bulan = isset($_POST['bulan']) ? $_POST['bulan'] : '';
		$sql = "SELECT
		absensi.nik,
		absensi.nama,
		absensi.tanggal,
		absensi.absen_msk,
		absensi.absen_plg
	FROM
		absensi
	WHERE month(absensi.tanggal) = '$bulan'";
	$query = mysqli_query($konek,$sql);
	}

?>
			    <div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">LAPORAN PERBULAN ABSENSI STAFF</h2>
							</div>
						</div>
					</div>
                </div>
                <div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-6">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-tools">
                                        <form action="" method="POST">
                                            <div class="form-group">
                                                <select name="bulan" id="bulan" class="form-control">
													<option value="">Pilih</option>
                                                    <option value="1">Januari</option>
                                                    <option value="2">Februari</option>
                                                    <option value="3">Maret</option>
                                                    <option value="4">April</option>
                                                    <option value="5">Mei</option>
                                                    <option value="6">Juni</option>
                                                    <option value="7">Juli</option>
                                                    <option value="8">Agustus</option>
                                                    <option value="9">September</option>
                                                    <option value="10">Oktober</option>
                                                    <option value="11">Nopember</option>
                                                    <option value="12">Desember</option>
												</select>
                                                <div class="form-group">
                                                    <input type="submit" name="tampilkan" value="Tampilkan" class="btn btn-primary btn-sm">
													<a href="?halaman=laporan_perbulan">
													<input type="submit" value="Reload" class="btn btn-primary btn-sm">
													</a>
                                                </div>
                                            </div>
                                        </form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-tools">
											<a href="cetak_bulan_absensi.php?bulan=<?php echo $bulan;?>" target="_blank" class="btn btn-info btn-border btn-round btn-sm">
												<span class="btn-label">
													<i class="fa fa-print"></i>
												</span>
												Print
											</a>
										</div>
								</div>
								<div class="card-body">
									<table class="table mt-3">
										<thead>
											<tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">Nik</th>
												<th scope="col">Nama</th>
												<th scope="col">Absen Masuk</th>
												<th scope="col">Absen Keluar</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$no=0;
												while($data=mysqli_fetch_array($query,MYSQLI_BOTH)){
													$no++;
													$nik = $data['nik'];	
													$nama = $data['nama'];
													$tanggal = $data['tanggal'];
													$tgl = date('d F Y', strtotime($tanggal));
													$abs_masuk = $data['absen_msk'];
													$abs_plg = $data['absen_plg'];
											?>
											<tr>
												<td><?php echo $no;?></td>
												<td><?php echo $tgl;?></td>
												<td><?php echo $nik;?></td>
												<td><?php echo $nama;?></td>
												<td><?php echo $abs_masuk;?></td>
												<td><?php echo $abs_plg;?></td>
											</tr>
											<?php
												}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>

