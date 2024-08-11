<?php
 session_start();
 if (isset($_SESSION['password'])=="" || ($_SESSION['hak_akses'])=="")  {
 header('location:login.php');
 }
 else{
 $hak_akses = $_SESSION['hak_akses'];
 $nama = $_SESSION['nama'];
 $nik = $_SESSION['nik'];
 }
 ?>
<?php include 'header.php'; ?>
<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<ul class="nav nav-primary">
						<li class="nav-item active">
							<a href="main.php">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">fitur</h4>
						</li>
						 <?php
						 	if($hak_akses=="Pemohon"){
						 ?>
						<li class="nav-item">
							<a href="?halaman=tampil_pemohon">
								<i class="fas fa-user-alt"></i>
								<p>Biodata Anda</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="?halaman=tampil_status">
								<i class="far fa-calendar-check"></i>
								<p>Status Request</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="?halaman=tampil_dana_pemohon">
								<i class="fa fa-money-bill"></i>
								<p>Tampilan Dana</p>
							</a>
						</li>
						<?php
							}
						?>
						<li class="mx-4 mt-2">
							<a href="/" class="btn btn-danger btn-block"><span class="btn-label mr-2"> <i class="icon-logout"></i> </span>Logout</a> 
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
			<?php
          if(isset($_GET['halaman'])){
            $hal = $_GET['halaman'];
            switch($hal){
              case 'beranda';
                include 'beranda.php';
              break;
              case 'ubah_pemohon';
                include 'ubah_pemohon.php';
			  break;
			  case 'tampil_pemohon';
                include 'tampil_pemohon.php';
			  break;
			  case 'request_sktm';
                include 'request_sktm.php';
			  break;
			  case 'request_skk';
                include 'request_skk.php';
			  break;
			  case 'request_skbm';
                include 'request_skbm.php';
			  break;
			  case 'request_skm';
                include 'request_skm.php';
			  break;
			  case 'request_skc';
                include 'request_skc.php';
			  break;
			  case 'request_sku';
                include 'request_sku.php';
			  break;
			  case 'request_skp';
                include 'request_skp.php';
			  break;
			  case 'request_skd';
                include 'request_skd.php';
			  break;
			  case 'tampil_status';
                include 'status_request.php';
			  break;
			  case 'belum_acc_sktm';
                include 'belum_acc_sktm.php';
			  break;
			  case 'belum_acc_skk';
                include 'belum_acc_skk.php';
			  break;
			  case 'belum_acc_skbm';
                include 'belum_acc_skbm.php';
			  break;
			  case 'belum_acc_skm';
                include 'belum_acc_skm.php';
			  break;
			  case 'belum_acc_cerai';
                include 'belum_acc_cerai.php';
			  break;
			  case 'belum_acc_sku';
                include 'belum_acc_sku.php';
			  break;
			  case 'belum_acc_skp';
                include 'belum_acc_skp.php';
			  break;
			  case 'belum_acc_skd';
                include 'belum_acc_skd.php';
			  break;
			  case 'sudah_acc_sktm';
                include 'acc_sktm.php';
			  break;
			  case 'sudah_acc_sku';
                include 'acc_sku.php';
			  break;
			  case 'sudah_acc_skp';
                include 'acc_skp.php';
			  break;
			  case 'sudah_acc_skd';
                include 'acc_skd.php';
			  break;
			  case 'sudah_acc_skk';
                include 'acc_skk.php';
			  break;
			  case 'sudah_acc_skbm';
                include 'acc_skbm.php';
			  break;
			  case 'sudah_acc_skm';
                include 'acc_skm.php';
			  break;
			  case 'sudah_acc_skc';
                include 'acc_skc.php';
			  break;
			  case 'detail_sktm';
                include 'detail_sktm.php';
			  break;
			  case 'detail_skm';
                include 'detail_skm.php';
			  break;
			  case 'detail_skc';
                include 'detail_skc.php';
			  break;
			  case 'detail_skk';
                include 'detail_skk.php';
			  break;
			  case 'detail_skbm';
                include 'detail_skbm.php';
			  break;
			  case 'detail_sku';
                include 'detail_sku.php';
			  break;
			  case 'detail_skp';
                include 'detail_skp.php';
			  break;
			  case 'detail_skd';
                include 'detail_skd.php';
			  break;
			  case 'cetak_sktm';
                include 'cetak_sktm.php';
			  break;
			  case 'cetak_skk';
                include 'cetak_skk.php';
			  break;
			  case 'cetak_skbm';
                include 'cetak_skbm.php';
			  break;
			  case 'tampil_user';
                include 'tampil_user.php';
			  break;
			  case 'tampil_penduduk';
                include 'tampil_penduduk.php';
			  break;
			  case 'tampil_dana';
                include 'tampil_dana.php';
			  break;
			  case 'tampil_dana_pemohon';
                include 'tampil_dana_pemohon.php';
			  break;
			  case 'tambah_user';
                include 'tambah_user.php';
			  break;
			  case 'tambah_penduduk';
                include 'tambah_penduduk.php';
			  break;
			  case 'ubah_user';
                include 'ubah_user.php';
			  break;
			  case 'ubah_penduduk';
                include 'ubah_penduduk.php';
			  break;
			  case 'ubah_sktm';
                include 'ubah_request_sktm.php';
			  break;
			  case 'ubah_skm';
                include 'ubah_request_skm.php';
			  break;
			  case 'ubah_skc';
                include 'ubah_request_skc.php';
			  break;
			  case 'ubah_skk';
                include 'ubah_request_skk.php';
			  break;
			  case 'ubah_skbm';
                include 'ubah_request_skbm.php';
			  break;
			  case 'ubah_sku';
                include 'ubah_request_sku.php';
			  break;
			  case 'ubah_skp';
                include 'ubah_request_skp.php';
			  break;
			  case 'ubah_skd';
                include 'ubah_request_skd.php';
              break;
			  case 'laporan_perbulan';
                include 'laporan_perbulan.php';
			  break;
			  case 'laporan_sktm';
                include 'laporan_sktm.php';
			  break;
			  case 'laporan_skk';
                include 'laporan_skk.php';
			  break;
			  case 'laporan_skm';
                include 'laporan_skm.php';
			  break;
			  case 'laporan_skc';
                include 'laporan_skc.php';
			  break;
			  case 'laporan_skbm';
                include 'laporan_skbm.php';
			  break;
			  case 'laporan_sku';
                include 'laporan_sku.php';
			  break;
			  case 'laporan_skd';
                include 'laporan_skd.php';
			  break;
			  case 'laporan_pertahun';
                include 'laporan_pertahun.php';
              break;
              default:
                echo "<center>HALAMAN KOSONG</center>";
              break;
            }
          }else{
            include 'beranda.php';
          }
        ?>
			</div>
<?php include 'footer.php'; ?>