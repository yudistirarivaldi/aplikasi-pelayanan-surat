<?php include '../konek.php';?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> 
                <div class="page-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">STATUS REQUEST SURAT KETERANGAN TIDAK MAMPU</h4>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="add1" class="display table table-striped table-hover" >
											<thead>
												<tr>
                                                    <th>Tanggal Request</th>
                                                    <th>NIK</th>
                                                    <th>Nama Lengkap</th>
													<th>Scan KTP</th>
													<th>Scan KK</th>
													<th>Keperluan</th>
													<th>Status</th>
													<th>Keterangan</th>
													<th>Cetak Surat</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tbody>
                                                <?php
                                                    $sql = "SELECT * FROM data_request_sktm natural join data_user WHERE nik=$_SESSION[nik]";
                                                    $query = mysqli_query($konek,$sql);
                                                    while($data=mysqli_fetch_array($query,MYSQLI_BOTH)){
														$tgl = $data['tanggal_request'];
														$format = date('d F Y', strtotime($tgl));
                                                        $nik = $data['nik'];
                                                        $nama = $data['nama'];
														$status = $data['status'];
														$ktp = $data['scan_ktp'];
														$kk = $data['scan_kk'];
														$keperluan = $data['keperluan'];
														$keterangan = $data['keterangan'];
														$id_request_sktm= $data['id_request_sktm'];

                                                        if($status=="1"){
                                                            $status = "<b style='color:green'>Sudah ACC Staf</b>";
                                                        }elseif($status=="0"){
                                                            $status = "<b style='color:red'>BELUM ACC staf</b>";
                                                        }elseif($status=="2"){
															$status = "<b style='color:blue'>Sudah ACC Lurah</b>";
														}elseif($status=="3"){
															$status = "<b style='color:green'>SURAT SUDAH DICETAK</b>";
														}
                                                ?>
												<tr>
													<td><?php echo $format;?></td>
                                                    <td><?php echo $nik;?></td>
                                                    <td><?php echo $nama;?></td>
                        
													<td><img src="../dataFoto/scan_ktp/<?php echo $ktp;?>" width="50" height="50" alt=""></td>
													<td><img src="../dataFoto/scan_kk/<?php echo $kk;?>" width="50" height="50" alt=""></td>
													<td><?php echo $keperluan;?></td>
													<td class="fw-bold text-uppercase text-danger op-8"><?php echo $status;?></td>
													<td><i><?php echo $keterangan;?></i></td>
													<td><i><a href="cetak_sktm.php?id_request_sktm=<?=$id_request_sktm;?>" class="" target="_blank">File Surat</a></i></td>
													<td>
														<div class="form-button-action">
															<a href="?halaman=tampil_status&id_request_sktm=<?=$id_request_sktm;?>">
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
																<i class="fa fa-times"></i>
															</button>
															</a>
														</div>
													</td>
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
                        
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">STATUS REQUEST SURAT KETERANGAN USAHA</h4>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="add2" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>Tanggal Request</th>
													<th>NIK</th>
													<th>Nama Lengkap</th>
													<th>Scan KTP</th>
													<th>Scan KK</th>
													<th>Usaha</th>
													<th>Keperluan</th>
													<th>Status</th>
													<th>Keterangan</th>
													<th>Cetak Surat</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
													$sql = "SELECT * FROM data_request_sku natural join data_user WHERE nik=$_SESSION[nik]";
													$query = mysqli_query($konek,$sql);
													while($data=mysqli_fetch_array($query,MYSQLI_BOTH)){
														$tgl = $data['tanggal_request'];
														$format = date('d F Y', strtotime($tgl));
														$nik = $data['nik'];
														$nama = $data['nama'];
														$status = $data['status'];
														$ktp = $data['scan_ktp'];
														$kk = $data['scan_kk'];
														$usaha  = $data['usaha'];
														$keperluan = $data['keperluan'];
														$keterangan = $data['keterangan'];
														$id_request_sku = $data['id_request_sku'];

														if($status=="1"){
															$status = "<b style='color:green'>Sudah ACC Staf</b>";
														}elseif($status=="0"){
															$status = "<b style='color:red'>BELUM ACC staf</b>";
														}elseif($status=="2"){
															$status = "<b style='color:blue'>Sudah ACC Lurah</b>";
														}elseif($status=="3"){
															$status = "<b style='color:green'>SURAT SUDAH DICETAK</b>";
														}
												?>
												<tr>
													<td><?php echo $format;?></td>
													<td><?php echo $nik;?></td>
													<td><?php echo $nama;?></td>
													<td><img src="../dataFoto/scan_ktp/<?php echo $ktp;?>" width="50" height="50" alt=""></td>
													<td><img src="../dataFoto/scan_kk/<?php echo $kk;?>" width="50" height="50" alt=""></td>
													<td><?php echo $usaha;?></td>
													<td><?php echo $keperluan;?></td>
													<td class="fw-bold text-uppercase text-danger op-8"><?php echo $status;?></td>
													<td><i><?php echo $keterangan;?></i></td>
													<td><i><a href="cetak_sku.php?id_request_sku=<?=$id_request_sku;?>" class="" target="_blank">File Surat</a></i></td>
													<td>
															<a href="?halaman=tampil_status&id_request_sku=<?= $id_request_sku;?>">
																<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus">
																	<i class="fa fa-times"></i>
																</button>
															</a>
														</div>
													</td>
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
                        
                        
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">STATUS REQUEST SURAT KETERANGAN IZIN USAHA</h4>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="add3" class="display table table-striped table-hover" >
											<thead>
												<tr>
                                                    <th>Tanggal Request</th>
                                                    <th>NIK</th>
                                                    <th>Nama Lengkap</th>
													<th>Scan KTP</th>
													<th>Scan KK</th>
													<th>Keperluan</th>
													<th>Status</th>
													<th>Keterangan</th>
													<th>Cetak Surat</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tbody>
                                                <?php
                                                    $sql = "SELECT * FROM data_request_skp natural join data_user WHERE nik=$_SESSION[nik]";
                                                    $query = mysqli_query($konek,$sql);
                                                    while($data=mysqli_fetch_array($query,MYSQLI_BOTH)){
														$tgl = $data['tanggal_request'];
														$format = date('d F Y', strtotime($tgl));
                                                        $nik = $data['nik'];
                                                        $nama = $data['nama'];
														$status = $data['status'];
														$ktp = $data['scan_ktp'];
														$kk = $data['scan_kk'];
														$keperluan = $data['keperluan'];
														$keterangan = $data['keterangan'];
														$id_request_skp=$data['id_request_skp'];
														

                                                        if($status=="1"){
                                                            $status = "<b style='color:green'>Sudah ACC Staf</b>";
                                                        }elseif($status=="0"){
                                                            $status = "<b style='color:red'>BELUM ACC staf</b>";
                                                        }elseif($status=="2"){
															$status = "<b style='color:blue'>Sudah ACC Lurah</b>";
														}elseif($status=="3"){
															$status = "<b style='color:green'>SURAT SUDAH DICETAK</b>";
														}
                                                ?>
												<tr>
													<td><?php echo $format;?></td>
                                                    <td><?php echo $nik;?></td>
													<td><?php echo $nama;?></td>
													<td><img src="../dataFoto/scan_ktp/<?php echo $ktp;?>" width="50" height="50" alt=""></td>
													<td><img src="../dataFoto/scan_kk/<?php echo $kk;?>" width="50" height="50" alt=""></td>
													<td><?php echo $keperluan;?></td>
													<td class="fw-bold text-uppercase text-danger op-8"><?php echo $status;?></td>
													<td><i><?php echo $keterangan;?></i></td>
													<td><i><a href="cetak_skp.php?id_request_skp=<?=$id_request_skp;?>" class="" target="_blank">File Surat</a></i></td>
													<td>
														<div class="form-button-action">
															<a href="?halaman=tampil_status&id_request_skp=<?= $id_request_skp;?>">
																<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus">
																	<i class="fa fa-times"></i>
																</button>
															</a>
														</div>
													</td>
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

						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">STATUS REQUEST SURAT KETERANGAN BELUM MENIKAH</h4>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="add6" class="display table table-striped table-hover" >
											<thead>
												<tr>
                                                    <th>Tanggal Request</th>
                                                    <th>NIK</th>
                                                    <th>Nama Lengkap</th>
													<th>Scan KTP</th>
													<th>Scan pas PHOTO</th>
													<th>Scan surat Pernyataan</th>
													<th>Keperluan</th>
													<th>Status</th>
													<th>Keterangan</th>
													<th>Cetak Surat</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tbody>
                                                <?php
                                                    $sql = "SELECT * FROM data_request_skbm natural join data_user WHERE nik=$_SESSION[nik]";
                                                    $query = mysqli_query($konek,$sql);
                                                    while($data=mysqli_fetch_array($query,MYSQLI_BOTH)){
														$tgl = $data['tanggal_request'];
														$format = date('d F Y', strtotime($tgl));
                                                        $nik = $data['nik'];
                                                        $nama = $data['nama'];
														$status = $data['status'];
														$ktp = $data['scan_ktp'];
														$photo = $data['scan_photo'];
														$pernyataan = $data['scan_pernyataan'];
														$keperluan = $data['keperluan'];
														$keterangan = $data['keterangan'];
														$id_request_skbm=$data['id_request_skbm'];
														

                                                        if($status=="1"){
                                                            $status = "<b style='color:green'>Sudah ACC Staf</b>";
                                                        }elseif($status=="0"){
                                                            $status = "<b style='color:red'>BELUM ACC staf</b>";
                                                        }elseif($status=="2"){
															$status = "<b style='color:blue'>Sudah ACC Lurah</b>";
														}elseif($status=="3"){
															$status = "<b style='color:green'>SURAT SUDAH DICETAK</b>";
														}
                                                ?>
												<tr>
													<td><?php echo $format;?></td>
                                                    <td><?php echo $nik;?></td>
													<td><?php echo $nama;?></td>
													<td><img src="../dataFoto/scan_ktp/<?php echo $ktp;?>" width="50" height="50" alt=""></td>
													<td><img src="../dataFoto/scan_photo/<?php echo $photo;?>" width="50" height="50" alt=""></td>
													<td><img src="../dataFoto/scan_pernyataan/<?php echo $pernyataan;?>" width="50" height="50" alt=""></td>
													<td><?php echo $keperluan;?></td>
													<td class="fw-bold text-uppercase text-danger op-8"><?php echo $status;?></td>
													<td><i><?php echo $keterangan;?></i></td>
													<td><i><a href="cetak_skbm.php?id_request_skbm=<?=$id_request_skbm;?>" class="" target="_blank">File Surat</a></i></td>
													<td>
														<div class="form-button-action">
															<a href="?halaman=tampil_status&id_request_skbm=<?= $id_request_skbm;?>">
																<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus">
																	<i class="fa fa-times"></i>
																</button>
															</a>
														</div>
													</td>
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

						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">STATUS REQUEST SURAT KETERANGAN MENIKAH</h4>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="add7" class="display table table-striped table-hover" >
											<thead>
												<tr>
                                                    <th>Tanggal Request</th>
                                                    <th>NIK</th>
                                                    <th>Nama Lengkap</th>
													<th>Scan KTP</th>
													<th>Scan KK</th>
													<th>Scan Akta</th>
													<th>Scan Photo</th>
													<th>Keperluan</th>
													<th>Status</th>
													<th>Keterangan</th>
													<th>Cetak Surat</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tbody>
                                                <?php
                                                    $sql = "SELECT * FROM data_request_skm natural join data_user WHERE nik=$_SESSION[nik]";
                                                    $query = mysqli_query($konek,$sql);
                                                    while($data=mysqli_fetch_array($query,MYSQLI_BOTH)){
														$tgl = $data['tanggal_request'];
														$format = date('d F Y', strtotime($tgl));
                                                        $nik = $data['nik'];
                                                        $nama = $data['nama'];
														$status = $data['status'];
														$ktp = $data['scan_ktp'];
														$kk = $data['scan_kk'];
														$akta = $data['scan_akta'];
														$photo = $data['scan_foto'];
														
														$keperluan = $data['keperluan'];
														$keterangan = $data['keterangan'];
														$id_request_skm=$data['id_request_skm'];
														

                                                        if($status=="1"){
                                                            $status = "<b style='color:green'>Sudah ACC Staf</b>";
                                                        }elseif($status=="0"){
                                                            $status = "<b style='color:red'>BELUM ACC staf</b>";
                                                        }elseif($status=="2"){
															$status = "<b style='color:blue'>Sudah ACC Lurah</b>";
														}elseif($status=="3"){
															$status = "<b style='color:green'>SURAT SUDAH DICETAK</b>";
														}
                                                ?>
												<tr>
													<td><?php echo $format;?></td>
                                                    <td><?php echo $nik;?></td>
													<td><?php echo $nama;?></td>
													<td><img src="../dataFoto/scan_ktp/<?php echo $ktp;?>" width="50" height="50" alt=""></td>
													<td><img src="../dataFoto/scan_kk/<?php echo $kk;?>" width="50" height="50" alt=""></td>
													<td><img src="../dataFoto/scan_akta/<?php echo $akta;?>" width="50" height="50" alt=""></td>
													<td><img src="../dataFoto/scan_photo/<?php echo $photo;?>" width="50" height="50" alt=""></td>
												
													<td><?php echo $keperluan;?></td>
													<td class="fw-bold text-uppercase text-danger op-8"><?php echo $status;?></td>
													<td><i><?php echo $keterangan;?></i></td>
													<td><i><a href="cetak_skm.php?id_request_skm=<?=$id_request_skm;?>" class="" target="_blank">File Surat</a></i></td>
													<td>
														<div class="form-button-action">
															<a href="?halaman=tampil_status&id_request_skm=<?= $id_request_skm;?>">
																<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus">
																	<i class="fa fa-times"></i>
																</button>
															</a>
														</div>
													</td>
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

							<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">STATUS REQUEST SURAT KETERANGAN CERAI</h4>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="add7" class="display table table-striped table-hover" >
											<thead>
												<tr>
                                                    <th>Tanggal Request</th>
                                                    <th>NIK</th>
                                                    <th>Nama Lengkap</th>
													<th>Scan KTP</th>
													<th>Scan KK</th>
													<th>Scan Akta</th>
													<th>Scan Photo</th>
													<th>Keperluan</th>
													<th>Status</th>
													<th>Keterangan</th>
													<th>Cetak Surat</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tbody>
                                                <?php
                                                    $sql = "SELECT * FROM data_request_skc natural join data_user WHERE nik=$_SESSION[nik]";
                                                    $query = mysqli_query($konek,$sql);
                                                    while($data=mysqli_fetch_array($query,MYSQLI_BOTH)){
														$tgl = $data['tanggal_request'];
														$format = date('d F Y', strtotime($tgl));
                                                        $nik = $data['nik'];
                                                        $nama = $data['nama'];
														$status = $data['status'];
														$ktp = $data['scan_ktp'];
														$kk = $data['scan_kk'];
														$akta = $data['scan_akta'];
														$photo = $data['scan_foto'];
														
														$keperluan = $data['keperluan'];
														$keterangan = $data['keterangan'];
														$id_request_skc=$data['id_request_skc'];
														

                                                        if($status=="1"){
                                                            $status = "<b style='color:green'>Sudah ACC Staf</b>";
                                                        }elseif($status=="0"){
                                                            $status = "<b style='color:red'>BELUM ACC staf</b>";
                                                        }elseif($status=="2"){
															$status = "<b style='color:blue'>Sudah ACC Lurah</b>";
														}elseif($status=="3"){
															$status = "<b style='color:green'>SURAT SUDAH DICETAK</b>";
														}
                                                ?>
												<tr>
													<td><?php echo $format;?></td>
                                                    <td><?php echo $nik;?></td>
													<td><?php echo $nama;?></td>
													<td><img src="../dataFoto/scan_ktp/<?php echo $ktp;?>" width="50" height="50" alt=""></td>
													<td><img src="../dataFoto/scan_kk/<?php echo $kk;?>" width="50" height="50" alt=""></td>
													<td><img src="../dataFoto/scan_akta/<?php echo $akta;?>" width="50" height="50" alt=""></td>
													<td><img src="../dataFoto/scan_photo/<?php echo $photo;?>" width="50" height="50" alt=""></td>
												
													<td><?php echo $keperluan;?></td>
													<td class="fw-bold text-uppercase text-danger op-8"><?php echo $status;?></td>
													<td><i><?php echo $keterangan;?></i></td>
													<td><i><a href="cetak_skc.php?id_request_skc=<?=$id_request_skc;?>" class="" target="_blank">File Surat</a></i></td>
													<td>
														<div class="form-button-action">
															<a href="?halaman=tampil_status&id_request_skc=<?= $id_request_skc;?>">
																<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus">
																	<i class="fa fa-times"></i>
																</button>
															</a>
														</div>
													</td>
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

						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">STATUS REQUEST SURAT KETERANGAN KELAHIRAN</h4>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="add5" class="display table table-striped table-hover" >
											<thead>
												<tr>
                                                    <th>Tanggal Request</th>
                                                    <th>NIK</th>
                                                    <th>Nama Lengkap</th>
													<th>Scan KTP</th>
													<th>Scan KK</th>
													<th>Scan SKK</th>
													<th>Keperluan</th>
													<th>Status</th>
													<th>Keterangan</th>
													<th>Cetak Surat</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tbody>
                                                <?php
                                                    $sql = "SELECT * FROM data_request_skk natural join data_user WHERE nik=$_SESSION[nik]";
                                                    $query = mysqli_query($konek,$sql);
                                                    while($data=mysqli_fetch_array($query,MYSQLI_BOTH)){
														$tgl = $data['tanggal_request'];
														$format = date('d F Y', strtotime($tgl));
                                                        $nik = $data['nik'];
                                                        $nama = $data['nama'];
														$status = $data['status'];
														$ktp = $data['scan_ktp'];
														$kk = $data['scan_kk'];
														$skk = $data['scan_skk'];
														$keperluan = $data['keperluan'];
														$keterangan = $data['keterangan'];
														$id_request_skk=$data['id_request_skk'];
														

                                                        if($status=="1"){
                                                            $status = "<b style='color:green'>Sudah ACC Staf</b>";
                                                        }elseif($status=="0"){
                                                            $status = "<b style='color:red'>BELUM ACC staf</b>";
                                                        }elseif($status=="2"){
															$status = "<b style='color:blue'>Sudah ACC Lurah</b>";
														}elseif($status=="3"){
															$status = "<b style='color:green'>SURAT SUDAH DICETAK</b>";
														}
                                                ?>
												<tr>
													<td><?php echo $format;?></td>
                                                    <td><?php echo $nik;?></td>
													<td><?php echo $nama;?></td>
													<td><img src="../dataFoto/scan_ktp/<?php echo $ktp;?>" width="50" height="50" alt=""></td>
													<td><img src="../dataFoto/scan_kk/<?php echo $kk;?>" width="50" height="50" alt=""></td>
													<td><img src="../dataFoto/scan_skk/<?php echo $skk;?>" width="50" height="50" alt=""></td>
													<td><?php echo $keperluan;?></td>
													<td class="fw-bold text-uppercase text-danger op-8"><?php echo $status;?></td>
													<td><i><?php echo $keterangan;?></i></td>
													<td><i><a href="cetak_skk.php?id_request_skk=<?=$id_request_skk;?>" class="" target="_blank">File Surat</a></i></td>
													<td>
														<div class="form-button-action">
															<a href="?halaman=tampil_status&id_request_skk=<?= $id_request_skk;?>">
																<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus">
																	<i class="fa fa-times"></i>
																</button>
															</a>
														</div>
													</td>
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
					
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">STATUS REQUEST SURAT KETERANGAN DOMISILI</h4>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="add4" class="display table table-striped table-hover" >
											<thead>
												<tr>
                                                    <th>Tanggal Request</th>
                                                    <th>NIK</th>
                                                    <th>Nama Lengkap</th>
													<th>Scan KTP</th>
													<th>Scan KK</th>
													<th>Status</th>
													<th>Keperluan</th>
													<th>Keterangan</th>
													<th>Cetak Surat</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tbody>
                                                <?php
                                                    $sql = "SELECT * FROM data_request_skd natural join data_user WHERE nik=$_SESSION[nik]";
                                                    $query = mysqli_query($konek,$sql);
                                                    while($data=mysqli_fetch_array($query,MYSQLI_BOTH)){
														$tgl = $data['tanggal_request'];
														$format = date('d F Y', strtotime($tgl));
                                                        $nik = $data['nik'];
                                                        $nama = $data['nama'];
														$status = $data['status'];
														$ktp = $data['scan_ktp'];
														$kk = $data['scan_kk'];
														$keterangan = $data['keterangan'];
														$keperluan = $data['keperluan'];
														$id_request_skd=$data['id_request_skd'];

                                                        if($status=="1"){
                                                            $status = "<b style='color:green'>Sudah ACC Staf</b>";
                                                        }elseif($status=="0"){
                                                            $status = "<b style='color:red'>BELUM ACC staf</b>";
                                                        }elseif($status=="2"){
															$status = "<b style='color:blue'>Sudah ACC Lurah</b>";
														}elseif($status=="3"){
															$status = "<b style='color:green'>SURAT SUDAH DICETAK</b>";
														}
                                                ?>
												<tr>
													<td><?php echo $format;?></td>
                                                    <td><?php echo $nik;?></td>
                                                    <td><?php echo $nama;?></td>
													<td><img src="../dataFoto/scan_ktp/<?php echo $ktp;?>" width="50" height="50" alt=""></td>
													<td><img src="../dataFoto/scan_kk/<?php echo $kk;?>" width="50" height="50" alt=""></td>
													<td class="fw-bold text-uppercase text-danger op-8"><?php echo $status;?></td>
													<td><?= $keperluan;?></td>
													<td><i><?= $keterangan;?></i></td>
													<td><i><a href="cetak_skd.php?id_request_skd=<?=$id_request_skd;?>" class="" target="_blank">File Surat</a></i></td>
													
													<td>
														<div class="form-button-action">
														
														<a href="?halaman=tampil_status&id_request_skd=<?= $id_request_skd;?>">
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus">
																<i class="fa fa-times"></i>
															</button>
														</a>
														</div>
													</td>
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
				</div>
				<?php
					if(isset($_GET['id_request_skd'])){
						$hapus = mysqli_query($konek,"DELETE FROM data_request_skd WHERE id_request_skd=$id_request_skd");
						if($hapus){
							echo "<script language='javascript'>swal('Selamat...', 'Hapus Berhasil', 'success');</script>" ;
							echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
						}else{
							echo "<script language='javascript'>swal('Gagal...', 'Hapus Gagal', 'error');</script>" ;
							echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
							}
					}elseif(isset($_GET['id_request_sktm'])){
						$hapus = mysqli_query($konek,"DELETE FROM data_request_sktm WHERE id_request_sktm=$id_request_sktm");
						if($hapus){
							echo "<script language='javascript'>swal('Selamat...', 'Hapus Berhasil', 'success');</script>" ;
							echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
						}else{
							echo "<script language='javascript'>swal('Gagal...', 'Hapus Gagal', 'error');</script>" ;
							echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
						}
					}elseif(isset($_GET['id_request_skbm'])){
						$hapus = mysqli_query($konek,"DELETE FROM data_request_skbm WHERE id_request_skbm=$id_request_skbm");
						if($hapus){
							echo "<script language='javascript'>swal('Selamat...', 'Hapus Berhasil', 'success');</script>" ;
							echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
						}else{
							echo "<script language='javascript'>swal('Gagal...', 'Hapus Gagal', 'error');</script>" ;
							echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
						}
					}elseif(isset($_GET['id_request_skp'])){
						$hapus = mysqli_query($konek,"DELETE FROM data_request_skp WHERE id_request_skp=$id_request_skp");
						if($hapus){
							echo "<script language='javascript'>swal('Selamat...', 'Hapus Berhasil', 'success');</script>" ;
							echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
						}else{
							echo "<script language='javascript'>swal('Gagal...', 'Hapus Gagal', 'error');</script>" ;
							echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
						}
					}elseif(isset($_GET['id_request_skk'])){
						$hapus = mysqli_query($konek,"DELETE FROM data_request_skk WHERE id_request_skk=$id_request_skk");
						if($hapus){
							echo "<script language='javascript'>swal('Selamat...', 'Hapus Berhasil', 'success');</script>" ;
							echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
						}else{
							echo "<script language='javascript'>swal('Gagal...', 'Hapus Gagal', 'error');</script>" ;
							echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
						}
					}elseif(isset($_GET['id_request_skm'])){
						$hapus = mysqli_query($konek,"DELETE FROM data_request_skm WHERE id_request_skm=$id_request_skm");
						if($hapus){
							echo "<script language='javascript'>swal('Selamat...', 'Hapus Berhasil', 'success');</script>" ;
							echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
						}else{
							echo "<script language='javascript'>swal('Gagal...', 'Hapus Gagal', 'error');</script>" ;
							echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
						}
					}elseif(isset($_GET['id_request_skc'])){
						$hapus = mysqli_query($konek,"DELETE FROM data_request_skc WHERE id_request_skc=$id_request_skc");
						if($hapus){
							echo "<script language='javascript'>swal('Selamat...', 'Hapus Berhasil', 'success');</script>" ;
							echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
						}else{
							echo "<script language='javascript'>swal('Gagal...', 'Hapus Gagal', 'error');</script>" ;
							echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
						}
					}elseif(isset($_GET['id_request_sku'])){
						$hapus = mysqli_query($konek,"DELETE FROM data_request_sku WHERE id_request_sku=$id_request_sku");
						if($hapus){
							echo "<script language='javascript'>swal('Selamat...', 'Hapus Berhasil', 'success');</script>" ;
							echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
						}else{
							echo "<script language='javascript'>swal('Gagal...', 'Hapus Gagal', 'error');</script>" ;
							echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
						}
					}
			
				?>