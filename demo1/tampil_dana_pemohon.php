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
                        <h4 class="card-title">Tampilan Data Dana</h4>
                            
                    </div>
                </div>
                <div class="card-body">
                <!-- Modal -->
                <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header no-bd">
                                <h5 class="modal-title">
                                    <span class="fw-mediumbold">
                                        New
                                    </span> 
                                    <span class="fw-light">
                                        Row
                                    </span>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <p class="small">Create a new row using this form, make sure you fill them all</p>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group form-group-default">
                                            <label>Name</label>
                                            <input id="addName" type="text" class="form-control" placeholder="fill name">
                                        </div>
                                    </div>
                                    <div class="col-md-6 pr-0">
                                        <div class="form-group form-group-default">
                                            <label>Position</label>
                                                <input id="addPosition" type="text" class="form-control" placeholder="fill position">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group form-group-default">
                                                                        <label>Office</label>
                                                                        <input id="addOffice" type="text" class="form-control" placeholder="fill office">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer no-bd">
                                                        <button type="button" id="addRowButton" class="btn btn-primary">Add</button>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="">
                                            <div class="table-responsive">
                                                <table id="add" class="display table table-striped table-hover" >
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
                                        </form>
                                    </div>
                                </div>
                        </div>
        </div>
</div>