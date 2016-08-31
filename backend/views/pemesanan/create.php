<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pesanan */

$this->title = 'Tambah Pesanan';
$this->params['breadcrumbs'][] = ['label' => 'Data Pemesanan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pesanan-create" style="padding-top:15px;">
	<div class="row">
		<div class="col-md-8">
			<div class="box box-default">
				<div class="box-header">
					<h1 class="box-title"><?= Html::encode($this->title) ?></h1>
				</div>
				<div class="box-body">
					<?= $this->render('_form', [
						'model' => $modelPesanan,
						'modelListDetile'=>$modelListDetile
					]) ?>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<center><h3 class="panel-title"><i class="fa fa-shopping-cart" ></i>&nbsp; Info Persediaan Barang</h3></center>
				</div>
				<div class="panel-body">
					
					<table class="table table-hover">
					
						<thead>
							<tr>
								
								<th rowspan="2" style="vertical-align:middle;text-align:center;">Nama Barang</th>
								<th colspan="5" style="text-align:center;">Stok Untuk Ukuran</th>
							</tr>
							<tr>
								<th style="text-align:center;">S</th>
								<th style="text-align:center;">M</th>
								<th style="text-align:center;">L</th>
								<th style="text-align:center;">XL</th>
								<th style="text-align:center;">N/A</th>
							</tr>
						</thead>
						<tbody class="container-items">
							<?php foreach($persediaan_barang as $barang): ?>
								<tr>
									<td><?= $barang->nama_barang ?></td>
									<td><?= $barang->stok_s ?></td>
									<td><?= $barang->stok_m ?></td>
									<td><?= $barang->stok_l ?></td>
									<td><?= $barang->stok_xl ?></td>
									<td><?= $barang->stok_n ?></td>
								<tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		
		
	</div>

</div>
