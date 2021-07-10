<script type="text/javascript" src="chartjs/Chart.js"></script>

<!DOCTYPE html>
<html lang="id">
	<head>
		<title><?php include ("config/title.php"); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<link href="css/custom.css" rel="stylesheet" media="screen">
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link  href="css/bootstrap-responsive.min.css"  rel ="stylesheet"> 
        <link  href="font-awesome/css/font-awesome.min.css"  rel ="stylesheet"> 
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script><!-- Bootstrap -->
		<link rel="shortcut icon" href="logo.png" >
		
	</head>
	<body>
	<header>
	<div class="navbar">
					  <div class="navbar-inner">
						<div class="container">
						  <!-- Menampilkan tombol trigger -->
						  <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-responsive-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						  </a><!-- Akhir dari tombol triger -->
						  <!-- Komponen navbar -->
						 
						  <div class="nav-collapse collapse navbar-responsive-collapse">
							<ul class="nav">
							  <li><a href="media.php?module=home"><i class="fa fa-home"></i> Home</a></li>
                                <li><a href="media.php?module=rekam_medik"><i class="fa fa-medkit"></i> Sistem Informasi Klinik</a></li>

							<?php
                                {
                            ?>
                            <li><a href="media.php?module=data_user"><i class="fa fa-users"></i> Data User</a></li>
                                <?php
                                }
                            
                            ?>
							  <li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wheelchair"></i> Data Pasien <b class="caret"></b></a>
								<ul class="dropdown-menu">
								 <li><a href="media.php?module=data_pasien">Data Pasien</a></li>
								 <li><a href="media.php?module=tanggungan">Data Pasien Tanggungan</a></li>
								</ul>
							  </li>

							  <li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user-md"></i> Data Dokter <b class="caret"></b></a>
								<ul class="dropdown-menu">
								 <li><a href="media.php?module=dokter">Data Dokter</a></li>
								  <li><a href="media.php?module=jadwal_dok">Jadwal Dokter</a></li>
								</ul>
							  </li>
                                <li><a href="media.php?module=pegawai"><i class="fa fa-users"></i> Data Pegawai</a></li>
								<li><a href="media.php?module=tindakan"><i class="fa fa-plus-square"></i> Kategori Tindakan</a></li>
								<li><a href="media.php?module=dataobat"><i class="fa fa-tint"></i> Data Obat</a></li>
								<li><a href="laporan.php"><i class="fa fa-globe"></i> Wilayah</a></li>
							</ul>							
							<ul class="nav pull-right">
							  <li class="divider-vertical"></li>
							  <li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-logout" ></i> Settings <b class="caret"></b></a>
								<ul class="dropdown-menu">
								  <li><a href="#"><i class="icon-refresh"></i> Ganti Password</a></li>
								  <li class="divider"></li>
								  <li><a href="media.php?module=keluar"><i class="icon-off"></i> Keluar</a></li>
								</ul>
							  </li>
							</ul>
						  </div><!-- /.nav-collapse -->
						</div>
					  </div><!-- /navbar-inner -->
					</div><!-- /navbar -->
	</header>
	

	
			
	
		<script type="text/javascript">
			$(function () {
				$(".btn").popover('show');
			});
		</script>
	</body>
</html>

<div class="container">
	<div class="row">
		<h2 align="center">Laporan Sistem Informasi Klinik<br/>PT. Inova Medika Solusindo</h2>
    <?php 
        include "config/koneksi.php";
    ?>
    <div style="width: 800px;margin: 0px auto;">
        <canvas id="myChart"></canvas>
    </div><br/><br/>
    <table border="1" cellpadding="4">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Pegawai</th>
                <th>NIP</th>
			 <th>Kelas Jabatan</th>
			 <th>Nama Pegawai</th>
			 <th>Unit</th>
			 <th>Jenis Kelamin</th>
			 <th>Alamat</th>
			 <th>Status Keluarga</th>
			 <th>Tanggal Lahir</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $no =0;
                $data = mysql_query("select * from pegawai");
                while($d=mysql_fetch_array($data)){
                $no++
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $d['id_pegawai']; ?></td>
                <td><?php echo $d['nip']; ?></td>
			 <td><?php echo $d['kj'];?></td>
			 <td><?php echo $d['nama_pegawai'];?></td>
			 <td><?php echo $d['unit'];?></td>
			 <td><?php echo $d['jk'];?></td>
			 <td><?php echo $d['alamat'];?></td>
			 <td><?php echo $d['status_kel'];?></td>
			 <td><?php echo $d['tgl_lhr']?></td>
            </tr>
            <?php 
                }
            ?>
        </tbody>
    </table>
    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Sidoarjo", "Surabaya", "Jakarta", "Bandung"],
                datasets: [{
                    label: '',
                    data: [
                    <?php 
                    $unit = mysql_query("select * from pegawai where alamat='Sidoarjo'");
                    echo mysql_num_rows($unit);
                    ?>, 
                    <?php 
                    $unit = mysql_query("select * from pegawai where alamat='Surabaya'");
                    echo mysql_num_rows($unit);
                    ?>
                    ],
                    backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>

<br>
	</div>
</div>