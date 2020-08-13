<?php
include("action/koneksi.php");
session_destroy();
echo "<script>window.location=('$hosting')</script>";
?>