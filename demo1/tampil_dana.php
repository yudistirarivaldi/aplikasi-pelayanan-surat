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
                        <h4 class="card-title">Data Pendapatan</h4>
                            <a href="?halaman=tambah_dana" class="btn btn-primary btn-round ml-auto">
                                <i class="fa fa-plus"></i>
                                    Add Dana
                            </a>
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
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Tujuan Dana</th>
                                                            <th>Anggaran</th>
                                                            <th>Realisasi</th>
                                                            <th>Lebih/(kurang)</th>
                                                            <th style="width: 10%">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $no = 1;
                                                            $tampil = "SELECT * FROM data_dana ORDER BY pendapatan";
                                                            $query = mysqli_query($konek, $tampil);
                                                            $anggaranTotal = 0;
                                                            $realisasiTotal = 0;
                                                            $sisaTotal = 0;
                                                            // Initialize $groupValue
                                                            $groupValue = null;
                                                            
                                                            while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
                                                                $pendapatan = $data['pendapatan'];
                                                                $description = $data['description'];
                                                                $dana = $data['dana'];
                                                                $realisasi = $data['realisasi'];
                                                                $sisa = $data['sisa'];
                                                            
                                                                // Cek apakah grup berubah, jika berubah, tambahkan judul grup
                                                                if ($pendapatan !== $groupValue) {
                                                                    echo '<tr><td colspan="7" style="background-color: #f2f2f2; font-weight: bold;">' . $pendapatan . '</td></tr>';
                                                                    $groupValue = $pendapatan;
                                                                }
                                                            
                                                                // Tampilkan data normal untuk setiap baris
                                                                echo '<tr>';
                                                                echo '<td>' . $no++ . '</td>';
                                                                echo '<td>' . $description . '</td>';
                                                                echo '<td>Rp. ' . number_format($dana, 2, ',', '.') . '</td>';
                                                                echo '<td>Rp. ' . number_format($realisasi, 2, ',', '.') . '</td>';
                                                                echo '<td>Rp. ' . number_format($sisa, 2, ',', '.') . '</td>';
                                                                echo '<td>
                                                                        <div class="form-button-action">
                                                                            <a href="?halaman=ubah_dana&nik=' . $description . '" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Dana">
                                                                                <i class="fa fa-edit"></i>
                                                                            </a>
                                                                            <a href="?halaman=tampil_dana&description=' . $description . '" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus Dana">
                                                                                <i class="fa fa-times"></i>
                                                                            </a>
                                                                        </div>
                                                                    </td>';
                                                                echo '</tr>';
                                                            
                                                                // Hitung total anggaran
                                                                $anggaranTotal += $dana;
                                                                $realisasiTotal += $realisasi;
                                                                $sisaTotal += $sisa;
                                                            }
                                                            
                                                            // Tampilkan total anggaran pada tfoot
                                                            echo '<tfoot>';
                                                            echo '<tr>';
                                                            echo '<th colspan="2">Jumlah Pendapatan</th>';
                                                            echo '<th>Rp. ' . number_format($anggaranTotal, 2, ',', '.') . '</th>';
                                                            echo '<th>Rp. ' . number_format($realisasiTotal, 2, ',', '.') . '</th>'; // Tambahkan kolom kosong untuk menyamakan jumlah kolom pada thead
                                                            echo '<th>Rp. ' . number_format($sisaTotal, 2, ',', '.') . '</th>'; // Tambahkan kolom kosong untuk menyamakan jumlah kolom pada thead
                                                            echo '<th></th>'; // Tambahkan kolom kosong untuk menyamakan jumlah kolom pada thead
                                                            echo '<th></th>'; // Tambahkan kolom kosong untuk menyamakan jumlah kolom pada thead
                                                            echo '</tr>';
                                                            echo '</tfoot>';
                                                            ?>
                                                </table>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                        </div>
        </div>
</div>


<?php
    if(isset($_GET['description'])){
        $sql_hapus = "DELETE FROM data_dana WHERE description='".$_GET['description']."'";
        $query_hapus = mysqli_query($konek,$sql_hapus);
        if($query_hapus){
            echo "<script language='javascript'>swal('Selamat...', 'Hapus Berhasil', 'success');</script>" ;
            echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_dana">';
          }else{
            echo "<script language='javascript'>swal('Gagal...', 'Hapus Gagal', 'error');</script>" ;
            echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_dana">';
          }
    }
?>