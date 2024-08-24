<?php include '../konek.php'; ?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> <!-- Ensure Bootstrap JS is loaded -->
<script src="js/bootstrap.min.js"></script> <!-- Ensure Bootstrap JS is loaded -->

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Data Absensi</h4>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Filter Form -->
                    <form method="GET" action="main2.php">
                        <input type="hidden" name="halaman" value="group_absensi">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="bulan">Bulan:</label>
                                    <select name="bulan" id="bulan" class="form-control">
                                        <?php
                                            for ($i = 1; $i <= 12; $i++) {
                                                $selected = (isset($_GET['bulan']) && $_GET['bulan'] == $i) ? 'selected' : '';
                                                echo "<option value='$i' $selected>" . date("F", mktime(0, 0, 0, $i, 10)) . "</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tahun">Tahun:</label>
                                    <select name="tahun" id="tahun" class="form-control">
                                        <?php
                                            $currentYear = date("Y");
                                            for ($i = $currentYear - 3; $i <= $currentYear; $i++) {
                                                $selected = (isset($_GET['tahun']) && $_GET['tahun'] == $i) ? 'selected' : '';
                                                echo "<option value='$i' $selected>$i</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" style="margin-top: 24px;">Filter</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- Table for Grouped Monthly Data -->
                    <div class="table-responsive">
                        <table id="groupedAbsensi" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Bulan</th>
                                    <th>Total Absensi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    $bulanFilter = isset($_GET['bulan']) ? intval($_GET['bulan']) : '';
                                    $tahunFilter = isset($_GET['tahun']) ? intval($_GET['tahun']) : '';
                                    
                                    $queryGroup = "SELECT YEAR(tanggal) AS tahun, MONTH(tanggal) AS bulan, COUNT(*) AS total_absensi 
                                                   FROM absensi 
                                                   WHERE nik = '" . $_SESSION['nik'] . "'";
                                    if ($bulanFilter) {
                                        $queryGroup .= " AND MONTH(tanggal) = $bulanFilter";
                                    }
                                    if ($tahunFilter) {
                                        $queryGroup .= " AND YEAR(tanggal) = $tahunFilter";
                                    }
                                    $queryGroup .= " GROUP BY YEAR(tanggal), MONTH(tanggal)";
                                    
                                    $resultGroup = mysqli_query($konek, $queryGroup);
                                    
                                    if (mysqli_num_rows($resultGroup) > 0) {
                                        while ($rowGroup = mysqli_fetch_assoc($resultGroup)) {
                                            $bulan = $rowGroup['bulan'];
                                            $tahun = $rowGroup['tahun'];
                                            $totalAbsensi = $rowGroup['total_absensi'];
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo date("F", mktime(0, 0, 0, $bulan, 10)) . " " . $tahun; ?></td>
                                    <td><?php echo $totalAbsensi; ?></td>
                                    <td>
                                        <a href="?halaman=detail_absensi&bulan=<?php echo $bulan; ?>&tahun=<?php echo $tahun; ?>" class="btn btn-primary btn-sm">
                                            Lihat Detail
                                        </a>
                                    </td>
                                </tr>
                                <?php 
                                        } 
                                    } else {
                                ?>
                                <tr>
                                    <td colspan="4" class="text-center">Data Tidak Ada</td>
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
