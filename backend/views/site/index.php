<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header">
				<center><h3 class="box-title">Selamat Datang di Aplikasi Manajemen Gudang!</h3></center>
			</div>
			<div class="box-body">
				<div class="col-md-6">
					<div class="panel">
						<div class="panel-body">
							Silahkan Pilih Menuju Menu yang anda inginkan di bilah kiri aplikasi, atau bisa klik link dibawah ini : <br/> <br/>
							<table>
								<tr>
									<td>
										<ul style="padding-left:17px;">
											<li><a href="#">Data Jenis</a></li>
											<li><a href="#">Data Barang</a></li>
											<li><a href="#">Data Supplier</a></li>
											<li><a href="#">Data Toko</a></li>
										</ul>
									</td>
									<td style="padding-left:50px;">
										<ul style="padding-left:17px;">
											<li><a href="#">Pemesanan</a></li>
											<li><a href="#">Penerimaan</a></li>
											<li><a href="#">Pengiriman</a></li>
											<li><a href="#">Manajemen User</a></li>
										</ul>
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div class='col-md-6'>
					<div id="container" style="min-width: 200px; height: 300px; max-width: 300px; margin: 0 auto"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-5">
		<div class="box box-warning">
			<div class="box-header">
				<center><h3 class="box-title">Data Pengiriman Terakhir</h3></center>
			</div>
			<div class="box-body">
				<table class="table table-bordered">
					<thead>
						<tr class="info">
							<td><center>No</center></td>
							<td><center>No PO</center></td>
							<td><center>Konsumen</center></td>
							<td><center>Tanggal</center></td>
						</tr>
					</thead>
					<tbody>
						<?php foreach($modelPengiriman as $i => $pengiriman):?>
						<tr>
							<td><center><?= $i+1 ?></center></td>
							<td><center><?= $pengiriman->no_pengiriman ?></center></td>
							<td><center><?= $pengiriman->getKodeToko()->one()->nama_toko ?></center></td>
							<td><center><?= Date('d/m/Y', strtotime($pengiriman->tgl_pengiriman)) ?></center></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class='col-md-5'>
		<div class="box box-success">
			<div class="box-header">
				<center><h3 class="box-title">Data Penerimaan Terakhir</h3></center>
			</div>
			<div class="box-body">
				<table class="table table-bordered table-condensed">
					<thead>
						<tr class="warning">
							<td><center>No</center></td>
							<td><center>No Penerimaan</center></td>
							<td><center>Supplier</center></td>
							<td><center>Tanggal</center></td>
						</tr>
					</thead>
					<tbody>
						<?php foreach($modelPenerimaan as $i => $penerimaan):?>
						<tr>
							<td><center><?= $i+1 ?></center></td>
							<td><center><?= $penerimaan->getNoPesanan()->one()->no_pesanan ?></center></td>
							<td><center><?= $penerimaan->getNoPesanan()->one()->getDataSupplier()->one()->nama_supplier ?></center></td>
							<td><center><?= Date('d/m/Y', strtotime($penerimaan->tgl_penerimaan)) ?></center></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>

<?php 
	$script = <<< JS
	$(function () {

    $(document).ready(function () {
		var listBarang = {$modelBarang};
		
		console.log(listBarang);
        // Build the chart
        $('#container').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Persentase Persediaan Barang'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Barang',
                colorByPoint: true,
                data: listBarang
            }]
        });
    });
});
JS;
	$this->registerJs($script);
	
?>