<?php
$conn=@mysql_connect("localhost","root","") or die("Tidak Terkoneksi");
$db=@mysql_select_db("db_rm") or die ("Database Tidak Ditemukan");
?>