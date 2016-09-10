<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
				<center><h3 class="box-title">List Persediaan Barang</h3></center>
			</div>
			<div class="box-body">
				<br />
				<table class="table table-bordered">
					<caption><em>*List Barang Dapat Berubah otomatis dengan melakukan transaksi penerimaan/pengeluaran</em></caption>
					<thead>
						<tr>
							<td rowspan="2" style="vertical-align:middle;"><center><b>No</b></center></td>
							<td rowspan="2" style="vertical-align:middle;"><center><b>Nama Barang</b></center></td>
							<td colspan="5"><center><b>Stok Barang Dengan Ukuran</b></center></td>
							
						</tr>
						<tr>
							<td><center><b>S</b></center></td>
							<td><center><b>M</b></center></td>
							<td><center><b>L</b></center></td>
							<td><center><b>XL</b></center></td>
							<td><center><b>N/A</b></center></td>
						</tr>
					</thead>
					<tbody>
					<?php foreach($model as $i => $barang): ?>
						<tr>
							<td><center><?= $i +1 ?></center></td>
							<td><?= $barang->nama_barang ?></td>
							<td <?= $barang->stok_s < 20 ? "class='bg-danger'": "" ?>><center><?= $barang->stok_s  ?></center></td>
							<td <?= $barang->stok_m < 20 ? "class='bg-danger'": "" ?>><center><?= $barang->stok_m ?></center></td>
							<td <?= $barang->stok_l < 20 ? "class='bg-danger'": "" ?>><center><?= $barang->stok_l ?></center></td>
							<td <?= $barang->stok_xl < 20 ? "class='bg-danger'": "" ?>><center><?= $barang->stok_xl ?></center></td>
							<td <?= $barang->stok_n < 20 ? "class='bg-danger'": "" ?>><center><?= $barang->stok_n ?></center></td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
				
				
			</div>
		</div>
	</div>
</div>