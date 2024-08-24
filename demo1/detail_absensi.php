<?php include '../konek.php'; ?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> 

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Detail Absensi Bulan 
                            <?php 
                                echo date("F", mktime(0, 0, 0, $_GET['bulan'], 10)) . " " . $_GET['tahun']; 
                            ?>
                        </h4>
                        <a href="?halaman=group_absensi" class="btn btn-primary btn-round ml-auto">
                            <i class="fa fa-arrow-left"></i>
                            Kembali
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>NIK / Nama</th>
                                    <th>Absen Masuk</th>
                                    <th>Absen Pulang</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    $bulan = $_GET['bulan'];
                                    $tahun = $_GET['tahun'];

                                    // Query untuk mengambil data absensi berdasarkan bulan dan tahun
                                    $query = "SELECT * FROM absensi 
                                              WHERE nik = '" . $_SESSION['nik'] . "' 
                                              AND MONTH(tanggal) = $bulan 
                                              AND YEAR(tanggal) = $tahun";
                                    $result = mysqli_query($konek, $query);

                                    while ($data = mysqli_fetch_assoc($result)) {
                                        $username = $data['nik'];
                                        $nama = $data['nama'];
                                        $absen_msk = $data['absen_msk'];
                                        $absen_plg = $data['absen_plg'];
                                        $tanggal = $data['tanggal'];
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $username . ' - ' . $nama; ?></td>
                                    <td><?php echo $absen_msk; ?></td>
                                    <td><?php echo $absen_plg ? $absen_plg : "Belum Absen"; ?></td>
                                    <td><?php echo $tanggal; ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
