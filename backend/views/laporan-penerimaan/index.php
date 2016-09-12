<?php 
	use yii\helpers\Json;
	use yii\widgets\ActiveForm;
	use yii\helpers\Html;
	use kartik\widgets\DatePicker
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
						<?= $form->field($searchModel, 'tgl_penerimaan')->dropDownList([''=>'Pilih Bulan',1=>'Januari', 2=>'Februari', 3=>'Maret', 4=>'April', 5=>'Mei', 6=>'Juni', 7=>'Juli', 8=>'Agustus', 9=>'September', 10=>'Oktober', 11=>'November', 12=>'Desember'])->label(false) ?>
						
						<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
					<?php ActiveForm::end()?>
					<br />
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<td><center>No</center></td>
								<td><center>Nomor Pesanan</center></td>
								<td><center>Tanggal</center></td>
								<td><center>Status</center></td>
							</tr>
						</thead>
						<tbody>
							<?php if(!($dataProvider['dataProvider']->getModels()== null)){ ?>
								<?php foreach($dataProvider['dataProvider']->getModels() as $i => $penerimaan): ?>
								<tr>
									<td width="10%"><center><?= $i + 1 ?></center></td>
									<td><center><?= $penerimaan->getNoPesanan()->one()->no_pesanan ?></center></td>
									<td><center><?= date('d-M-Y', strtotime($penerimaan->tgl_penerimaan)) ?></center></td>
									<td><center><?= $penerimaan->status_penerimaan === 'diterima'? '<span class="label label-success">'.$penerimaan->status_penerimaan.'</span>' : '<span class="label label-danger">'.$penerimaan->status_penerimaan.'</span>'?></center></td>
								</tr>
								<?php endforeach; ?>
							<?php }else{ ?>
								<tr>
									<td colspan="4"><center>Tidak Ada Data</center></td>
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
				text: 'Data Jumlah Barang Yang Diterima Dari Supplier'
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
				pointFormat: 'Jumlah Barang Diterima: <b>{point.y:.1f}</b>'
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