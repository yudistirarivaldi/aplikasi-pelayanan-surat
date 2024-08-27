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
		$sql = "SELECT
		data_penduduk.nik,
		data_penduduk.nama,
		data_penduduk.tanggal_lahir,
		data_penduduk.tempat_lahir,
		data_penduduk.jekel
	FROM
		data_penduduk";
    
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
                    <font size="4"><b>LAPORAN DATA PENDUDUK</b></font><br>
                    <font size="4"><b> DESA DURIAN BUNGKUK</b></font><br>
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
            <th scope="col">Nik</th>
            <th scope="col">Nama</th>
            <th scope="col">Tanggal Lahir</th>
            <th scope="col">Tempat Lahir</th>
            <th scope="col">Jenis Kelamin</th>
        </tr>
        <?php
            $no=0;
            $query=mysqli_query($konek,$sql);
            while($data=mysqli_fetch_array($query,MYSQLI_BOTH)){
                $no++;
                $nik = $data['nik'];	
                $nama = $data['nama'];
                $tanggal = $data['tanggal_lahir'];
                $tgl = date('d F Y', strtotime($tanggal));
                $tmp_lahir = $data['tempat_lahir'];
                $jekel = $data['jekel'];
        ?>
        <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $tgl;?></td>
                <td><?php echo $nik;?></td>
                <td><?php echo $nama;?></td>
                <td><?php echo $tmp_lahir;?></td>
                <td><?php echo $jekel;?></td>
            </tr>
        </tbody>
        <?php
            
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