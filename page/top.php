<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>KadaiDen</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->    
        <script type="text/javascript" language="JavaScript">
		function konfirmasi(){
			 tanya = confirm("Anda Yakin Akan Menghapus Data ini?");
			 if (tanya == true) return true;
			 else return false;
		}

		</script>
   
    <script type="text/javascript" src="jquery.js"></script>
	<script type='text/javascript' src='jquery.autocomplete.js'></script>
	<link rel="stylesheet" type="text/css" href="jquery.autocomplete.css" />

	<script type="text/javascript">
		var $jnoc = jQuery.noConflict();
		$jnoc().ready(function() {

			$jnoc("#nama_produk").autocomplete("produk_list.php", {
				width: 360,
				matchContains: true,
				mustMatch: true,
				//minChars: 0,
				//multiple: true,
				//highlight: false,
				//multipleSeparator: ",",
				selectFirst: false
			});

			$jnoc("#nama_produk").result(function(event, data, formatted) {
				$jnoc("#id_produk").val(data[1]);
				$jnoc("#nama_kemasan").val(data[2]);
				$jnoc("#modal").val(data[3]);
			});
			
		});
			
		

	</script>
	

<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Site Traffic"
	},
	axisX:{
		valueFormatString: "DD MMM",
		crosshair: {
			enabled: true,
			snapToDataPoint: true
		}
	},
	axisY: {
		title: "Number of Visits",
		crosshair: {
			enabled: true
		}
	},
	toolTip:{
		shared:true
	},  
	legend:{
		cursor:"pointer",
		verticalAlign: "bottom",
		horizontalAlign: "left",
		dockInsidePlotArea: true,
		itemclick: toogleDataSeries
	},
	data: [{
		type: "line",
		showInLegend: true,
		name: "Total Visit",
		markerType: "square",
		xValueFormatString: "DD MMM, YYYY",
		color: "#F08080",
		dataPoints: [
			{ x: new Date(2017, 0, 3), y: 650 },
			{ x: new Date(2017, 0, 4), y: 700 },
			{ x: new Date(2017, 0, 5), y: 710 },
			{ x: new Date(2017, 0, 6), y: 658 },
			{ x: new Date(2017, 0, 7), y: 734 },
			{ x: new Date(2017, 0, 8), y: 963 },
			{ x: new Date(2017, 0, 9), y: 847 },
			{ x: new Date(2017, 0, 10), y: 853 },
			{ x: new Date(2017, 0, 11), y: 869 },
			{ x: new Date(2017, 0, 12), y: 943 },
			{ x: new Date(2017, 0, 13), y: 970 },
			{ x: new Date(2017, 0, 14), y: 869 },
			{ x: new Date(2017, 0, 15), y: 890 },
			{ x: new Date(2017, 0, 16), y: 930 }
		]
	},
	{
		type: "line",
		showInLegend: true,
		name: "Unique Visit",
		lineDashType: "dash",
		dataPoints: [
			{ x: new Date(2017, 0, 3), y: 510 },
			{ x: new Date(2017, 0, 4), y: 560 },
			{ x: new Date(2017, 0, 5), y: 540 },
			{ x: new Date(2017, 0, 6), y: 558 },
			{ x: new Date(2017, 0, 7), y: 544 },
			{ x: new Date(2017, 0, 8), y: 693 },
			{ x: new Date(2017, 0, 9), y: 657 },
			{ x: new Date(2017, 0, 10), y: 663 },
			{ x: new Date(2017, 0, 11), y: 639 },
			{ x: new Date(2017, 0, 12), y: 673 },
			{ x: new Date(2017, 0, 13), y: 660 },
			{ x: new Date(2017, 0, 14), y: 562 },
			{ x: new Date(2017, 0, 15), y: 643 },
			{ x: new Date(2017, 0, 16), y: 570 }
		]
	}]
});
chart.render();

function toogleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	} else{
		e.dataSeries.visible = true;
	}
	chart.render();
}

}
</script>  
   
   </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="index.php">KadaiDen</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    
                    <?php 
					$id  = $_SESSION['alpokat']['id'];
					$sql = mysql_query("SELECT * FROM pemilik WHERE id_pemilik='$id'");
					$r   = mysql_fetch_array($sql);
					?>
                    
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="foto_profil/<?php echo $r['foto'] ?>" alt="<?php echo $r['nama'] ?>"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="foto_profil/<?php echo $r['foto'] ?>" alt="<?php echo $r['nama'] ?>"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name"><?php echo $r['nama'] ?></div>
                                <div class="profile-data-title"><?php echo $_SESSION['alpokat']['nama_toko'] ?></div>
                            </div>
                        </div>                                                                        
                    </li>
                                  
                    <li>
                        <a href="index.php"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>
                    </li>
                    
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-gears"></span> <span class="xn-text">Kelola Toko</span></a>
                        <ul>
                            <li><a href="?page=toko"><span class="fa fa-building"></span> Data Toko</a></li>                     
                            <li><a href="?page=kasir"><span class="fa fa-user"></span> Data Kasir</a></li>                     
                        </ul>
                    </li>
                                 
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-gears"></span> <span class="xn-text">Kelola Produk</span></a>
                        <ul>
                            <li><a href="?page=kategori"><span class="fa fa-tags"></span> Kategori Produk</a></li>                     
                            <li><a href="?page=kemasan"><span class="fa fa-bookmark"></span> Kemasan Produk</a></li>                     
                            <li><a href="?page=produk"><span class="fa fa-list"></span> Tambah Produk</a></li>                     
                        </ul>
                    </li>
                                 
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-retweet"></span> <span class="xn-text">Kelola Stok</span></a>
                        <ul>
                            
                            <li><a href="?page=produk-masuk&dari=<?php echo date('Y-m-d') ?>&hingga=<?php echo date('Y-m-d') ?>"><span class="glyphicon glyphicon-shopping-cart"></span> Produk Masuk</a></li>
                            <li><a href="?page=produk-terjual&dari=<?php echo date('Y-m-d') ?>&hingga=<?php echo date('Y-m-d') ?>"><span class="glyphicon glyphicon-shopping-cart"></span> Produk Terjual</a></li>
                            <li><a href="?page=stok-opname"><span class="glyphicon glyphicon-saved"></span> Stok Opname</a></li>                     
                                                                 
                        </ul>
                    </li>
                    
                    <li><a href="?page=laporan-keuangan&bulan=<?php echo date('m') ?>&tahun=<?php echo date('Y'); ?>">
                    <span class="fa fa-money"></span> Laporan Keuangan</a></li> 
                                
                     <li><a href="?page=laporan-penjualan&dari=<?php echo date('Y-m-d') ?>&hingga=<?php echo date('Y-m-d') ?>">
                    <span class="fa fa-money"></span> Laporan Penjualan</a></li> 
                    
                    <li><a href="?page=pelanggan"><span class="fa fa-user"></span> <span class="xn-text">Pelanggan</span></a></li>
                    
                    <li><a href="?page=setting"><span class="fa fa-wrench"></span> <span class="xn-text">Setting</span></a></li>
                    
                    
                                 
                    
                                  
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
               <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                   
                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
                    </li> 
                    <!-- END SIGN OUT -->

                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                     


                <!-- PAGE TITLE -->
                <div class="page-title">                    
<!--                    <h3> Pilih Toko</h3>-->
                </div>
                <!-- END PAGE TITLE -->     