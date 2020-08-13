
<table border='1'>
	<thead>
		<tr>
			<th>No</th>
			<th>Jenis Kemasan</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$no = 1;
	$id_toko  = $_SESSION['alpokat']['id_toko'];
	$sql = mysql_query("SELECT * FROM kemasan WHERE id_toko='$id_toko'");
	while($r= mysql_fetch_array($sql)){
		echo "	<tr>
				<td>$no</td>
				<td>$r[nama_kemasan]</td>
				
			</tr>";
		$no++;
	}
	?>	
	</tbody>
</table>

