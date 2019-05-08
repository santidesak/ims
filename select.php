<?php
$db_host = '167.99.69.153'; // Nama Server
$db_user = 'evaazzrnax'; // User Server
$db_pass = 'Yrf5WSzPwH'; // Password Server
$db_name = 'evaazzrnax'; // Nama Database

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Gagal terhubung MySQL: ' . mysqli_connect_error());	
}

$sql = 'SELECT id_produk, tgl_transaksi, harga, kuantitas 
		FROM sales';
		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}

echo '<table>
		<thead>
			<tr>
				<th>ID PRODUK</th>
				<th>TGL TRANSAKSI</th>
				<th>HARGA</th>
				<th>KUANTITAS</th>
			</tr>
		</thead>
		<tbody>';
		
while ($row = mysqli_fetch_array($query))
{
	echo '<tr>
			<td>'.$row['id_produk'].'</td>
			<td>'.$row['tgl_transaksi'].'</td>
			<td>'.number_format($row['harga'], 0, ',', '.').'</td>
			<td class="right">'.$row['kuantitas'].'</td>
		</tr>';
}
echo '
	</tbody>
</table>';

// Apakah kita perlu menjalankan fungsi mysqli_free_result() ini? baca bagian VII
mysqli_free_result($query);

// Apakah kita perlu menjalankan fungsi mysqli_close() ini? baca bagian VII
mysqli_close($conn);
