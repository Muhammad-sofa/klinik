<?php
include ("../config/koneksi.php");
	if($_GET['module']=='tambah'){
		$t1=$_POST['t1'];
		$t2=$_POST['t2'];
		$query=mysql_query("INSERT INTO tindakan (nm_tindakan, ket) VALUES ('$t1','$t2')");
		header("location:../media.php?module=tindakan");
	
	}
	elseif($_GET['module']=='hapus'){		
		$id_tindakan=$_GET['id_tindakan'];
		$query=mysql_query("DELETE FROM tindakan WHERE id_tindakan='$id_tindakan'");
		header("location:../media.php?module=tindakan");		
	}
	elseif($_GET['module']=='edit'){
		$id_tindakan=$_POST['id_tindakan'];
		$t1=$_POST['t1'];
		$t2=$_POST['t2'];
		$id_tindakan=$_POST['id_tindakan'];
		$query=mysql_query("UPDATE tindakan SET nm_tindakan='$t1', ket='$t2' WHERE id_tindakan='$id_tindakan'");
		header("location:../media.php?module=tindakan");	
		}
?>