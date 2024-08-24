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
                        <h4 class="card-title">Data Absensi</h4>
                            <a href="?halaman=tambah_absensi" id="absenButton" class="btn btn-primary btn-round ml-auto">
                                <i class="fa fa-plus"></i>
                                    Absensi Masuk
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
                                                            <th>NIK / Nama</th>
                                                            <th>Absen Masuk</th>
                                                            <th>Absen Pulang</th>
                                                            <th>Tanggal</th>
                                                            <th style="width: 10%">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $no=1;
                                                            $tampil = "SELECT * FROM absensi WHERE nik = '" . $_SESSION['nik'] . "'";
                                                            $query = mysqli_query($konek,$tampil);
                                                            while($data=mysqli_fetch_array($query,MYSQLI_BOTH)){
                                                                $id = $data['id'];
                                                                $username = $data['nik'];
                                                                $nama = $data['nama'];
                                                                $absen_msk = $data['absen_msk'];
                                                                $absen_plg = $data['absen_plg'];
                                                                $tanggal = $data['tanggal'];
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $no++;?></td>
                                                            <td><?php echo $username.' - '.$nama;?></td>
                                                            <td><?php echo $absen_msk;?></td>
                                                            <td><?php echo $absen_plg ? $absen_plg : "Belum Absen";?></td>
                                                            <td><?php echo $tanggal;?></td>
                                                            <td>
                                                                <div class="form-button-action">
                                                                    <?php if(!$absen_plg) { ?>
                                                                        <!-- Jika belum absen pulang -->
                                                                        <a href="?halaman=tampil_absensi&id=<?php echo $id; ?>" data-toggle="tooltip" title="" class="btn btn-link btn-success" data-original-title="Absen Pulang" id="absenPulang">
                                                                            <i class="fa fa-check"></i>
                                                                        </a>
                                                                    <?php } else { ?>
                                                                        <!-- Jika sudah absen pulang -->
                                                                        <a href="#" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Anda Sudah Absen">
                                                                            <i class="fa fa-times"></i>
                                                                        </a>
                                                                    <?php } ?>
                                                                </div>
                                                            </td>
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


<?php

    date_default_timezone_set('Asia/Makassar');
    if(isset($_GET['id'])){ 
        $sql_hapus = "UPDATE absensi SET absen_plg = '" . date('H:i') . "' WHERE id = '" . $_GET['id'] . "'";
        $query_hapus = mysqli_query($konek,$sql_hapus);
        if($query_hapus){
            echo "<script language='javascript'>swal('Selamat...', 'Berhasil Absen Pulang', 'success');</script>" ;
            echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_absensi">';
          }else{
            echo "<script language='javascript'>swal('Gagal...', 'Gagal Absen Pulang', 'error');</script>" ;
            echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_absensi">';
          }
    }
?>

<script>
        // Mendapatkan waktu saat ini
        var now = new Date();

        // Mengatur waktu awal absensi (07:30)
        var mulaiAbsen = new Date();
        mulaiAbsen.setHours(7, 30, 0); // Jam 07:30

        // Mengatur waktu akhir absensi (08:30)
        var akhirAbsen = new Date();
        akhirAbsen.setHours(8, 30, 0); // Jam 08:30

        // Cek apakah waktu saat ini berada di dalam rentang absen
        if (now < mulaiAbsen || now > akhirAbsen) {
            // Jika diluar rentang waktu, sembunyikan tombol absen
            document.getElementById('absenButton').style.display = 'none';
        }
</script>

<script>
        // Mendapatkan waktu saat ini
        var now = new Date();

        // Mengatur waktu awal absensi (07:30)
        var mulaiAbsen = new Date();
        mulaiAbsen.setHours(16, 0, 0); // Jam 07:30

        // Mengatur waktu akhir absensi (08:30)
        var akhirAbsen = new Date();
        akhirAbsen.setHours(16, 30, 0); // Jam 08:30

        // Cek apakah waktu saat ini berada di dalam rentang absen
        if (now < mulaiAbsen || now > akhirAbsen) {
            // Jika diluar rentang waktu, sembunyikan tombol absen
            document.getElementById('absenPulang').style.display = 'none';
        }
</script>