<?php 
	use yii\helpers\Json;
	use yii\widgets\ActiveForm;
	use yii\helpers\Html;
	use kartik\widgets\DatePicker;

    $this->title = "Laporan Pengeluaran Barang";
?>

<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
				<center><h3 class="box-title">Daftar Penerimaan</h3></center>
			</div>
			<div class="box-body">
				<div class="col-md-6">
					<?php $form = ActiveForm::begin([
						'action' => ['index'],
						'method' => 'get',
					]); ?>
						<?= $form->field($searchModel, 'tgl_pengiriman')->dropDownList([''=>'Pilih Bulan',1=>'Januari', 2=>'Februari', 3=>'Maret', 4=>'April', 5=>'Mei', 6=>'Juni', 7=>'Juli', 8=>'Agustus', 9=>'September', 10=>'Oktober', 11=>'November', 12=>'Desember'])->label(false) ?>
						
						<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
					<?php ActiveForm::end()?>
					<br />
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<td><center>No</center></td>
								<td><center>Nomor PO</center></td>
								<td><center>Tanggal</center></td>
							</tr>
						</thead>
						<tbody>
							<?php if(!($dataProvider['dataProvider']->getModels()== null)){ ?>
								<?php foreach($dataProvider['dataProvider']->getModels() as $i => $pengiriman): ?>
								<tr>
									<td width="10%"><center><?= $i + 1 ?></center></td>
									<td><center><?= $pengiriman->no_pengiriman ?></center></td>
									<td><center><?= date('d-M-Y', strtotime($pengiriman->tgl_pengiriman)) ?></center></td>
									
								</tr>
								<?php endforeach; ?>
							<?php }else{ ?>
								<tr>
									<td colspan="3"><center>Tidak Ada Data</center></td>
								</tr>
							<?php } ?>
						</tbody>
						
					</table>
				</div>
				<div class="col-md-6">
					<div id="container" style="min-width: 300px; height: 300px; max-width: 400px; margin: 0 auto"></div>
				</div>
			</div>
		</div>
	</div>
	
</div>

<?php 
	$dataCart = Json::encode($dataProvider["dataCart"]);
	$data = <<< JS
	$(function () {
		var dataCart = {$dataCart};
		
		$('#container').highcharts({
			chart: {
				type: 'column'
			},
			title: {
				text: 'Data Jumlah Barang Yang Keluar'
			},
			
			xAxis: {
				type: 'category',
				labels: {
					rotation: -45,
					style: {
						fontSize: '13px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			},
			yAxis: {
				min: 0,
				title: {
					text: 'Population (millions)'
				}
			},
			legend: {
				enabled: false
			},
			tooltip: {
				pointFormat: 'Jumlah Barang Keluar: <b>{point.y:.1f}</b>'
			},
			series: [{
				name: 'Population',
				data: dataCart,
				dataLabels: {
					enabled: true,
					rotation: -90,
					color: '#FFFFFF',
					align: 'right',
					format: '{point.y:.1f}', // one decimal
					y: 10, // 10 pixels down from the top
					style: {
						fontSize: '13px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			}]
		});
	});
JS;

$this->registerJs($data);

?>