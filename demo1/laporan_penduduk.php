<?php 

include '../konek.php';
date_default_timezone_set('Asia/Jakarta');
?>
<?php
	if(!isset($_POST['tampilkan'])){
		$bulan = isset($_POST['bulan']) ? $_POST['bulan'] : '';
		$sql = "SELECT
		data_penduduk.nik,
		data_penduduk.nama,
		data_penduduk.tanggal_lahir,
		data_penduduk.tempat_lahir,
		data_penduduk.jekel
	FROM
		data_penduduk";
	$query = mysqli_query($konek,$sql);

	}
?>
			    <div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">LAPORAN DATA PENDUDUK</h2>
							</div>
						</div>
					</div>
                </div>
                <div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-6">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-tools">
											<a href="cetak_bulan_penduduk.php" target="_blank" class="btn btn-info btn-border btn-round btn-sm">
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
                                                <th scope="col">Nik</th>
												<th scope="col">Nama</th>
												<th scope="col">Tanggal Lahir</th>
												<th scope="col">Tempat Lahir</th>
												<th scope="col">Jenis Kelamin</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$no=0;
												while($data=mysqli_fetch_array($query,MYSQLI_BOTH)){
													$no++;
													$nik = $data['nik'];	
													$nama = $data['nama'];
													$tanggal = $data['tanggal_lahir'];
													$tgl = date('d F Y', strtotime($tanggal));
													$tmp_lahir = $data['tempat_lahir'];
													$jekel = $data['jekel'];
											?>
											<tr>
												<td><?php echo $no;?></td>
												<td><?php echo $tgl;?></td>
												<td><?php echo $nik;?></td>
												<td><?php echo $nama;?></td>
												<td><?php echo $tmp_lahir;?></td>
												<td><?php echo $jekel;?></td>
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

