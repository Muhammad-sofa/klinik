<?php
include ("../config/koneksi.php");
include ("../config/fungsi_thumb.php");
	if($_GET['module']=='tambah_pasien'){
		$id_pegawai=$_POST['id_pegawai'];
        $t1=$_POST['t1'];
		$t2=date('Y-m-d');
		$t3=date('H:i:s');
        $foto=$_FILES['foto']['name'];
        fotoPasien($foto);
		$cek=mysql_query("SELECT * FROM pasien WHERE id_pegawai='$id_pegawai'");
        $num=mysql_num_rows($cek);
        if($num>=1){
            echo "<script>
            alert('Data pasien sudah ada!');
            window.location.href='../media.php?module=data_pasien';
            </script>";
            
        }
        else{
        $query=mysql_query("INSERT INTO pasien (kodePasien,id_pegawai,foto_pasien,tgl_daf,jam_daf) VALUES ('$t1','$id_pegawai','$foto','$t2','$t3')");
		header("location:../media.php?module=data_pasien");	
        }
	}
	elseif($_GET['module']=='hapus'){
		$kodepas=$_GET['kodepasien'];
		$query=mysql_query("DELETE FROM pasien WHERE kodePasien='$kodepas'");
		header("location:../media.php?module=data_pasien");		
	}
	elseif($_GET['module']=='edit'){
		$t1=$_POST['t1'];
		$t2=$_POST['t2']; // hidden ktp
		$t3=$_POST['t3'];
		$t4=$_POST['t4'];
		$t5=$_POST['t5'];
		$t6=$_POST['t6'];
		$t7=$_POST['t7'];
		$t8=$_POST['t8'];
		$t9=$_POST['t9'];
		$t10=$_POST['t10'];
		$t11=$_POST['t11'];
		if(empty($t10)){
		$query=mysql_query("UPDATE pasien SET nip='$t3', nama_pasien='$t4', pekerjaan='$t5', jk='$t6', agama='$t7', alamat='$t8', tgl_lhr='$t9', no_tlp='$t11' WHERE kodePasien='$t1'");
		header("location:../media.php?module=data_pasien");
		}
		else{
		$query=mysql_query("UPDATE pasien SET nip='$t3', nama_pasien='$t4', pekerjaan='$t5', jk='$t6', agama='$t7', alamat='$t8', tgl_lhr='$t9', usia='$t10', no_tlp='$t11' WHERE kodePasien='$t1'");
		header("location:../media.php?module=data_pasien");
		}
		}
		?>