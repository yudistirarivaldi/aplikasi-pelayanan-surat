<?php
    session_start();
    include 'konek.php';
    $level = "pemohon";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Pendanaan Desa Durian Bungkuk</title>
    <!-- core CSS -->
    <link href="main/css/bootstrap.min.css" rel="stylesheet">
    <link href="main/css/font-awesome.min.css" rel="stylesheet">
    <link href="main/css/animate.min.css" rel="stylesheet">
    <link href="main/css/owl.carousel.css" rel="stylesheet">
    <link href="main/css/owl.transitions.css" rel="stylesheet">
    <link href="main/css/prettyPhoto.css" rel="stylesheet">
    <link href="main/css/main.css" rel="stylesheet">
    <link href="main/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <style>
        
    </style>
</head>
<!--/head-->
<section>


<body id="home">

    <header id="header">
        <nav id="main-menu" class="navbar navbar-default navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><img src="main/img/logo-kertak-hanyar.png" width="54" height="54" alt="logo"></a>
                </div>

                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="scroll"><a href="index.php">Beranda</a></li>
                        <!-- <li class="scroll"><a href="#features">Jadwal</a></li>
                        <li class="scroll"><a href="#services">Informasi</a></li> -->
                        <li class="scroll active"><a href="pendanaan.php">Pendanaan</a></li>
                        <li class="scroll"><a href="pegawai.php">Pegawai</a></li>
                    </ul>
                </div>
            </div>
</header>
            <div class="container">
<center><h3>Realisasi APBD DESA</h3></center>
    <div class="table-responsive">
    <table class="display table table-striped table-hover">
    <thead>
    <!-- Table 1: data_dana -->
    <tr>
        <th>No.</th>
        <th>Tujuan Dana</th>
        <th>Anggaran</th>
        <th>Realisasi</th>
        <th>Lebih/(kurang)</th>
    </tr>
</thead>
<tbody>
    <?php
    $no = 1;
    $tampil_dana = "SELECT * FROM data_dana ORDER BY pendapatan";
    $query_dana = mysqli_query($konek, $tampil_dana);
    $anggaranTotal = 0;
    $realisasiTotal = 0;
    $sisaTotal = 0;
    // Initialize $groupValue
    $groupValue = null;

    while ($data_dana = mysqli_fetch_array($query_dana, MYSQLI_BOTH)) {
        $pendapatan = $data_dana['pendapatan'];
        $description = $data_dana['description'];
        $dana = $data_dana['dana'];
        $realisasi = $data_dana['realisasi'];
        $sisa = $data_dana['sisa'];

        // Cek apakah grup berubah, jika berubah, tambahkan judul grup
        if ($pendapatan !== $groupValue) {
            echo '<tr><td colspan="5" style="background-color: #f2f2f2; font-weight: bold;">' . $pendapatan . '</td></tr>';
            $groupValue = $pendapatan;
        }

        // Tampilkan data normal untuk setiap baris
        echo '<tr>';
        echo '<td>' . $no++ . '</td>';
        echo '<td>' . $description . '</td>';
        echo '<td>Rp. ' . number_format($dana, 2, ',', '.') . '</td>';
        echo '<td>Rp. ' . number_format($realisasi, 2, ',', '.') . '</td>';
        echo '<td>Rp. ' . number_format($sisa, 2, ',', '.') . '</td>';
        echo '</tr>';

        // Hitung total anggaran
        $anggaranTotal += $dana;
        $realisasiTotal += $realisasi;
        $sisaTotal += $sisa;
    }
    ?>
</tbody>
<tbody>
    <!-- Table 2: data_ppd -->
    <tr>
        <td colspan="5" style="background-color: #f2f2f2; font-weight: bold;">Penyelenggaraan Pemerintah Desa</td>
    </tr>
    <?php
    $no = 1;
    $tampil_ppd = "SELECT * FROM data_ppd";
    $query_ppd = mysqli_query($konek, $tampil_ppd);

    while ($data_ppd = mysqli_fetch_array($query_ppd, MYSQLI_BOTH)) {
        $description = $data_ppd['description'];
        $anggaran = $data_ppd['anggaran'];
        $realisasi = $data_ppd['realisasi'];
        $sisa = $data_ppd['sisa'];
    ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $description; ?></td>
            <td>Rp. <?php echo number_format($anggaran, 2, ',', '.'); ?></td>
            <td>Rp. <?php echo number_format($realisasi, 2, ',', '.'); ?></td>
            <td>Rp. <?php echo number_format($sisa, 2, ',', '.'); ?></td>
        </tr>
    <?php
    }
    ?>
</tbody>
<tbody>
    <!-- Table 3: data_bppd -->
    <tr>
        <td colspan="5" style="background-color: #f2f2f2; font-weight: bold;">Bidang Perencanaan Pembangunan Desa</td>
    </tr>
    <?php
    $no = 1;
    $tampil_bppd = "SELECT * FROM data_bppd";
    $query_bppd = mysqli_query($konek, $tampil_bppd);

    while ($data_bppd = mysqli_fetch_array($query_bppd, MYSQLI_BOTH)) {
        $description = $data_bppd['description'];
        $anggaran = $data_bppd['anggaran'];
        $realisasi = $data_bppd['realisasi'];
        $sisa = $data_bppd['sisa'];
    ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $description; ?></td>
            <td>Rp. <?php echo number_format($anggaran, 2, ',', '.'); ?></td>
            <td>Rp. <?php echo number_format($realisasi, 2, ',', '.'); ?></td>
            <td>Rp. <?php echo number_format($sisa, 2, ',', '.'); ?></td>
        </tr>
    <?php
    }
    ?>
</tbody>
<tbody>
    <!-- Table 4: data_bpk -->
    <tr>
        <td colspan="5" style="background-color: #f2f2f2; font-weight: bold;">Bidang Pembinaan Kemasyarakatan</td>
    </tr>
    <?php
    $no = 1;
    $tampil_bpk = "SELECT * FROM data_bpk";
    $query_bpk = mysqli_query($konek, $tampil_bpk);

    while ($data_bpk = mysqli_fetch_array($query_bpk, MYSQLI_BOTH)) {
        $description = $data_bpk['description'];
        $anggaran = $data_bpk['anggaran'];
        $realisasi = $data_bpk['realisasi'];
        $sisa = $data_bpk['sisa'];
    ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $description; ?></td>
            <td>Rp. <?php echo number_format($anggaran, 2, ',', '.'); ?></td>
            <td>Rp. <?php echo number_format($realisasi, 2, ',', '.'); ?></td>
            <td>Rp. <?php echo number_format($sisa, 2, ',', '.'); ?></td>
        </tr>
    <?php
    }
    ?>
</tbody>
<tbody>
    <!-- Table 5: data_bpm -->
    <tr>
        <td colspan="5" style="background-color: #f2f2f2; font-weight: bold;">Bidang Pemberdayaan Masyarakat</td>
    </tr>
    <?php
    $no = 1;
    $tampil_bpm = "SELECT * FROM data_bpm";
    $query_bpm = mysqli_query($konek, $tampil_bpm);

    while ($data_bpm = mysqli_fetch_array($query_bpm, MYSQLI_BOTH)) {
        $description = $data_bpm['description'];
        $anggaran = $data_bpm['anggaran'];
        $realisasi = $data_bpm['realisasi'];
        $sisa = $data_bpm['sisa'];
    ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $description; ?></td>
            <td>Rp. <?php echo number_format($anggaran, 2, ',', '.'); ?></td>
            <td>Rp. <?php echo number_format($realisasi, 2, ',', '.'); ?></td>
            <td>Rp. <?php echo number_format($sisa, 2, ',', '.'); ?></td>
        </tr>
    <?php
    }
    ?>
</tbody>
<tbody>
    <!-- Table 6: data_bpbd -->
    <tr>
        <td colspan="5" style="background-color: #f2f2f2; font-weight: bold;">Bidang Penanggulangan Bencana, Darurat dan Mendesak Desa</td>
    </tr>
    <?php
    $no = 1;
    $tampil_bpbd = "SELECT * FROM data_bpbd";
    $query_bpbd = mysqli_query($konek, $tampil_bpbd);

    while ($data_bpbd = mysqli_fetch_array($query_bpbd, MYSQLI_BOTH)) {
        $description = $data_bpbd['description'];
        $anggaran = $data_bpbd['anggaran'];
        $realisasi = $data_bpbd['realisasi'];
        $sisa = $data_bpbd['sisa'];
    ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $description; ?></td>
            <td>Rp. <?php echo number_format($anggaran, 2, ',', '.'); ?></td>
            <td>Rp. <?php echo number_format($realisasi, 2, ',', '.'); ?></td>
            <td>Rp. <?php echo number_format($sisa, 2, ',', '.'); ?></td>
        </tr>
    <?php
    }
    ?>
</tbody>
</table>
</div>
</div>
</section>

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; <?php echo date('Y');?> KANTOR  DESA DURIAN BUNGKUK BATU AMPAR KABUPATEN TANAH LAUT
                </div>
                <div class="col-sm-6">
                    <ul class="social-icons">
                        <li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fa fa-github"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!--/#footer-->
    <script src="main/js/jquery.js"></script>
    <script src="main/js/bootstrap.min.js"></script>
    <script src="main/js/owl.carousel.min.js"></script>
    <script src="main/js/mousescroll.js"></script>
    <script src="main/js/smoothscroll.js"></script>
    <script src="main/js/jquery.prettyPhoto.js"></script>
    <script src="main/js/jquery.isotope.min.js"></script>
    <script src="main/js/jquery.inview.min.js"></script>
    <script src="main/js/wow.min.js"></script>
    <script src="main/js/main.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Swal -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.15.2/dist/sweetalert2.all.min.js"></script>
	<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
	<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
            </body>
            </html>