<?php
include ("../config/koneksi.php");
$kodedk=$_GET['kodedk'];
	if($_GET['module']=='tambah'){
		$t1=$_POST['t1'];
		$t2=$_POST['t2'];
		$t3=$_POST['t3'];
		$t4=$_POST['t4'];
		$t5=$_POST['t5'];
		$t6=$_POST['t6'];
		$t7=$_POST['t7'];
		$query=mysql_query("INSERT INTO dokter (kodeDokter, nama_dokter, spesialis, jk, alamat, no_hp, kodeuser) VALUES ('$t1','$t2','$t3','$t4','$t5','$t6','$t7')");
		header("location:../media.php?module=dokter");
	
	}
	elseif($_GET['module']=='hapus'){		
		$query=mysql_query("DELETE FROM dokter WHERE kodeDokter='$kodedk'");
		header("location:../media.php?module=dokter");		
	}
	elseif($_GET['module']=='edit'){
		$t1=$_POST['t1'];
		$t2=$_POST['t2'];
		$t3=$_POST['t3'];
		$t4=$_POST['t4'];
		$t5=$_POST['t5'];
		$t6=$_POST['t6'];
		$t7=$_POST['t7'];
		
		$query=mysql_query("UPDATE dokter SET nama_dokter='$t2', spesialis='$t3', jk='$t4', alamat='$t5', no_hp='$t6' WHERE kodeDokter='$t1'");
		header("location:../media.php?module=dokter");
	
		
		}
		?>