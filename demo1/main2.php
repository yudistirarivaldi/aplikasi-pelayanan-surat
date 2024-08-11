<?php
 session_start();
 if (isset($_SESSION['password'])=="" || ($_SESSION['hak_akses'])=="")  {
 header('location:login.php');
 }
 else{
 $hak_akses = $_SESSION['hak_akses'];
 }
 ?>
<?php include 'header.php'; ?>
<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<ul class="nav nav-primary">
						<li class="nav-item active">
							<a href="main2.php">
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
							if($hak_akses=="Staf"){
						?>
						<li class="nav-item">
							<a href="?halaman=tampil_user">
								<i class="fas fa-user-alt"></i>
								<p>Data Pengguna</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="?halaman=tampil_penduduk">
								<i class="fas fa-user-plus"></i>
								<p>Data Penduduk</p>
							</a>
						</li>
						<!-- <li class="nav-item">
							<a href="?halaman=tampil_dana">
								<i class="fa fa-money-bill"></i>
								<p>Data Pendanaan</p>
							</a>
						</li> -->
						<!-- <li class="nav-item">
							<a data-toggle="collapse" href="#tables">
								<i class="fas fa-table"></i>
								<p>Data Pendanaan</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="tables">
								<ul class="nav nav-collapse">
									<li>
										<a href="?halaman=tampil_dana">
											<span class="sub-item">Pendapatan</span>
										</a>
									</li>
									<li>
										<a href="?halaman=tampil_ppd">
											<span class="sub-item">PPD</span>
										</a>
									</li>
									<li>
										<a href="?halaman=tampil_bppd">
											<span class="sub-item">BPPD</span>
										</a>
									</li>
									<li>
										<a href="?halaman=tampil_bpk">
											<span class="sub-item">BPK</span>
										</a>
									</li>
									<li>
										<a href="?halaman=tampil_bpm">
											<span class="sub-item">BPM</span>
										</a>
									</li>
									<li>
										<a href="?halaman=tampil_bpbd">
											<span class="sub-item">BPBD</span>
										</a>
									</li>
									</ul>
							</div>
						</li> -->
						<li class="nav-item">
							<a href="?halaman=permohonan_surat">
								<i class="far fa-calendar-check"></i>
								<p>Cetak Surat</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="?halaman=surat_dicetak">
								<i class="far fa-calendar-check"></i>
								<p>Surat Selesai</p>
							</a>
						</li>
						<?php
							 }elseif($hak_akses=="Lurah"){
						?>
						<li class="nav-item">
							<a data-toggle="collapse" href="#tables">
								<i class="fas fa-table"></i>
								<p>Laporan</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="tables">
								<ul class="nav nav-collapse">
									<!-- <li>
										<a href="?halaman=laporan_perbulan">
											<span class="sub-item">Perbulan</span>
										</a>
									</li> -->
									<li>
										<a href="?halaman=laporan_sktm">
											<span class="sub-item">SKTM</span>
										</a>
									</li>
									<li>
										<a href="?halaman=laporan_skk">
											<span class="sub-item">SKK</span>
										</a>
									</li>
									<li>
										<a href="?halaman=laporan_skbm">
											<span class="sub-item">SKBM</span>
										</a>
									</li>
									<li>
										<a href="?halaman=laporan_sku">
											<span class="sub-item">SKU</span>
										</a>
									</li>
									<li>
										<a href="?halaman=laporan_skd">
											<span class="sub-item">SKD</span>
										</a>
									</li>
									<li>
										<a href="?halaman=laporan_skp">
											<span class="sub-item">SIU</span>
										</a>
									</li>
									<li>
										<a href="?halaman=laporan_skm">
											<span class="sub-item">SKM</span>
										</a>
									</li>
									<li>
										<a href="?halaman=laporan_skc">
											<span class="sub-item">SKC</span>
										</a>
									</li>
									<!-- <li>
										<a href="?halaman=laporan_pertahun">
											<span class="sub-item">Pertahun</span>
										</a>
									</li> -->
								</ul>
							</div>
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
			  case 'request_sku';
                include 'request_sku.php';
			  break;
			  case 'request_skp';
                include 'request_skp.php';
			  break;
			  case 'request_skd';
                include 'request_skd.php';
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
			  case 'belum_acc_skc';
                include 'belum_acc_skc.php';
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
			  case 'sudah_acc_skd';
                include 'acc_skd.php';
			  break;
			  case 'detail_skk';
                include 'detail_skk.php';
			  break;
			  case 'detail_skbm';
                include 'detail_skbm.php';
			  break;
			  case 'detail_sktm';
                include 'detail_sktm.php';
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
			  case 'detail_skm';
                include 'detail_skm.php';
			  break;
			  case 'detail_skc';
                include 'detail_skc.php';
			  break;
			  case 'cetak_sktm';
                include 'cetak_sktm.php';
			  break;
			  case 'tampil_user';
                include 'tampil_user.php';
			  break;
			  case 'tampil_penduduk';
                include 'tampil_penduduk.php';
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
			  case 'tampil_dana';
                include 'tampil_dana.php';
			  break;
			  case 'tambah_dana';
                include 'tambah_dana.php';
			  break;
			  case 'ubah_dana';
                include 'ubah_dana.php';
			  break;
			  case 'view_sktm';
                include 'view_sktm.php';
			  break;
			  case 'view_skk';
                include 'view_skk.php';
			  break;
			  case 'view_skbm';
                include 'view_skbm.php';
			  break;
			  case 'view_skm';
                include 'view_skm.php';
			  break;
			  case 'view_skc';
                include 'view_skc.php';
			  break;
			  case 'view_sku';
                include 'view_sku.php';
			  break;
			  case 'view_skp';
                include 'view_skp.php';
			  break;
			  case 'view_skd';
                include 'view_skd.php';
			  break;
			  case 'view_cetak_sktm';
                include 'view_cetak_sktm.php';
			  break;
			  case 'view_cetak_skbm';
                include 'view_cetak_skbm.php';
			  break;
			  case 'view_cetak_skm';
                include 'view_cetak_skm.php';
			  break;
			  case 'view_cetak_skc';
                include 'view_cetak_skc.php';
			  break;
			  case 'view_cetak_sku';
                include 'view_cetak_sku.php';
			  break;
			  case 'view_cetak_skp';
                include 'view_cetak_skp.php';
			  break;
			  case 'view_cetak_skd';
                include 'view_cetak_skd.php';
			  break;
			  case 'view_cetak_skk';
                include 'view_cetak_skk.php';
			  break;
			  case 'surat_dicetak';
                include 'surat_dicetak.php';
              break;
			  case 'laporan_perbulan';
                include 'laporan_perbulan.php';
			  break;
			  case 'laporan_sktm';
                include 'laporan_sktm.php';
			  break;
			  case 'laporan_sku';
                include 'laporan_sku.php';
			  break;
			  case 'laporan_skd';
                include 'laporan_skd.php';
			  break;
			  case 'laporan_skp';
                include 'laporan_skp.php';
			  break;
			  case 'laporan_skk';
                include 'laporan_skk.php';
			  break;
			  case 'laporan_skbm';
                include 'laporan_skbm.php';
			  break;
			  case 'laporan_skm';
                include 'laporan_skm.php';
			  break;
			  case 'laporan_skc';
                include 'laporan_skc.php';
			  break;
			  case 'laporan_pertahun';
                include 'laporan_pertahun.php';
			  break;
			  case 'permohonan_surat';
                include 'permohonan_surat.php';
              break;
			  //pendanaan ppd
			  case 'tampil_ppd';
                include 'tampil_ppd.php';
              break;
			  case 'tambah_ppd';
			  include 'tambah_ppd.php';
			break;
			case 'ubah_ppd';
                include 'ubah_ppd.php';
              break;
			  //pendanaan bppd
			  case 'tampil_bppd';
			  include 'tampil_bppd.php';
			break;
			case 'tambah_bppd';
                include 'tambah_bppd.php';
              break;
			  case 'ubah_bppd';
                include 'ubah_bppd.php';
              break;
			  //pendanaan bpk
			  case 'tampil_bpk';
			  include 'tampil_bpk.php';
			break;
			case 'tambah_bpk';
                include 'tambah_bpk.php';
              break;
			  case 'ubah_bpk';
                include 'ubah_bpk.php';
              break;
				//pendanaan bpm
			  case 'tampil_bpm';
			  include 'tampil_bpm.php';
			break;
			case 'tambah_bpm';
                include 'tambah_bpm.php';
              break;
			  case 'ubah_bpm';
                include 'ubah_bpm.php';
              break;

				//pendanaan bpbd
				case 'tampil_bpbd';
				include 'tampil_bpbd.php';
			break;
			case 'tambah_bpbd';
				  include 'tambah_bpbd.php';
				break;
				case 'ubah_bpbd';
				  include 'ubah_bpbd.php';
				break;

              default:
                echo "<center>HALAMAN KOSONG</center>";
              break;
            }
          }else{
            include 'beranda2.php';
          }
        ?>
			</div>
<?php include 'footer.php'; ?>