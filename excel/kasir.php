<style> .str{ mso-number-format:\@; } </style>
<table border="1">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>HP</th>
			<th>Email</th>
			<th>Alamat</th>
			<th>Toko</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$no = 1;
	$id_pemilik  = $_SESSION['alpokat']['id'];
	$sql = mysql_query("SELECT * FROM kasir WHERE id_pemilik='$id_pemilik'");
	while($r= mysql_fetch_array($sql)){
		
		$a = mysql_query("SELECT * FROM toko WHERE id_toko='$r[id_toko]'");
		$b = mysql_fetch_array($a);
		
		echo "	<tr>
				<td>$no</td>
				<td>$r[nama]</td>
				<td class='str'>$r[hp]</td>
				<td>$r[email]</td>
				<td>$r[alamat]</td>
				<td>$b[nama_toko]</td>
			</tr>";
		$no++;
	}
	?>	
	</tbody>
</table>
					
					