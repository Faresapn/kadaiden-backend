<?php
include('action/koneksi.php');
$nama = $_GET['page'].".xls";
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$nama");
include('excel/'.$_GET['page'].'.php');

?>