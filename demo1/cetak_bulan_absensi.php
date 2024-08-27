<?php
    include '../konek.php';
?>
<!-- Fonts and icons -->
<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../assets/css/demo.css">
<?php
	if(isset($_GET['bulan'])){
        $bln=$_GET['bulan'];
		$sql = "SELECT
		absensi.nik,
		absensi.nama,
		absensi.tanggal,
		absensi.absen_msk,
		absensi.absen_plg
	FROM
		absensi
    WHERE month(absensi.tanggal) = '$bln'
    ";
    
    if($bln=="1"){
        $bln="JANUARI";
    }elseif($bln=="2"){
        $bln="FEBRUARI";
    }elseif($bln=="3"){
        $bln="MARET";
    }elseif($bln=="4"){
        $bln="APRIL";
    }elseif($bln=="5"){
        $bln="MEI";
    }elseif($bln=="6"){
        $bln="JUNI";
    }elseif($bln=="7"){
        $bln="JULI";
    }elseif($bln=="8"){
        $bln="AGUSTUS";
    }elseif($bln=="9"){
        $bln="SEPTEMBER";
    }elseif($bln=="10"){
        $bln="OKTOBER";
    }elseif($bln=="11"){
        $bln="NOVEMBER";
    }elseif($bln=="12"){
        $bln="DESEMBER";
    }
 
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CETAK BULAN</title>
</head>
<body>
<table border="0" align="center">
        <tr>
        <td><img src="/main/img/logo-kertak-hanyar.png" width="70" height="87" alt=""></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
            <td>
                <center>
                    <font size="4"><b>LAPORAN ABSENSI</b></font><br>
                    <font size="4"><b> DESA DURIAN BUNGKUK</b></font><br>
                    <font size="4"><b>BULAN <?php echo $bln;?></b></font><br>
                </center>
            </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        </tr>
        <tr>
            <td colspan="45"><hr color="black"></td>
        </tr>
    </table>
    <br>
    <center>
<table class="table table-bordered">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Nik</th>
            <th scope="col">Nama</th>
            <th scope="col">Absen Masuk</th>
            <th scope="col">Absen Keluar</th>
        </tr>
        <?php
            $no=0;
            $query=mysqli_query($konek,$sql);
            while($data=mysqli_fetch_array($query,MYSQLI_BOTH)){
                $no++;
                $nik = $data['nik'];	
                $nama = $data['nama'];
                $tanggal = $data['tanggal'];
                $tgl = date('d F Y', strtotime($tanggal));
                $abs_masuk = $data['absen_msk'];
                $abs_plg = $data['absen_plg'];
        ?>
        <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $tgl;?></td>
                <td><?php echo $nik;?></td>
                <td><?php echo $nama;?></td>
                <td><?php echo $abs_masuk;?></td>
                <td><?php echo $abs_plg;?></td>
            </tr>
        </tbody>
        <?php
            }
        }
        ?>
</table>
    </center>


<br>
<br>
        <table border='0' align="right">
            <tr>
                <td style="text-align: center"><b>Tanah Laut, <?php echo date('d F Y');?></b></td>
            </tr>
        </table>
        <br><br><br><br><br>
        <table border='0' align="right">
            <tr>
                <td style="text-align: center"><b>Lurah Desa Durian Bungkuk</b></td>
            </tr>
            <tr>
                <td style="text-align: center"><b>H . SUNHAJI</b></td>
            </tr>
        </table>
</body>
</html>
        <script>
            window.print();
        </script>