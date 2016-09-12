<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pesanan */

$this->title = 'Data Pesanan : #'.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Data Pesanan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pesanan-view">
	<div class="row">
		<div class="col-md-8">
			<section class="box box-primary">
				<div class="box-header with-border">
					<h1 class="box-title"><?= Html::encode($this->title) ?></h1>
					<div class="box-tools pull-right">
						<?= Html::a('<i class="fa fa-plus"></i>', ['create'], ['class' => 'btn btn-box-tool']) ?>
						<?= Html::a('<li class="fa fa-pencil"></li>', ['update', 'id' => $model->id], ['class' => 'btn btn-box-tool']) ?>
						<?= Html::a('<li class="fa fa-close"></li>', ['delete', 'id' => $model->id], [
							'class' => 'btn btn-box-tool',
							'data' => [
								'confirm' => 'Are you sure you want to delete this item?',
								'method' => 'post',
							],
						]) ?>
					</div>
				</div>
				<div class="box-body">
					<?= DetailView::widget([
						'model' => $model,
						'attributes' => [
							//'id',
							[
								'group'=>true,
								'label'=>'Data Umum',
								'rowOptions'=>['class'=>'info']
							],
							[	
								
								'columns'=>[
									[
										'attribute'=>'no_pesanan',
										'format'=>'raw',
										'value'=> '<span class="label label-success">'.$model->no_pesanan.'</span>',
										'valueColOptions'=>['style'=>'width:30%']
									],
									
									[
										'attribute'=>'tgl_pesanan',
										'format'=>'date',
										'valueColOptions'=>['style'=>'width:30%']
									],
								
								]
							],
							[	
								
								'columns'=>[
									
									[
										'attribute'=>'supplier',
										'value'=>$model->getDataSupplier()->one()->nama_supplier,
										'valueColOptions'=>['style'=>'width:30%']
									],
									[
										'attribute'=>'supplier',
										'value'=>$model->getDataSupplier()->one()->alamat_supplier,
										'valueColOptions'=>['style'=>'width:30%']
									]
								
								]
							],
						],
					]) ?>
					
					<table class="table table-bordered">
					<caption><em>Detile Pembelian Barang</em></caption>
					<thead class="bg-danger">
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
					<tbody>
						<?php foreach($model->getDetilePesanans()->all() as $detile):?>
						<tr>
							<td><center><?= $detile->getBarang()->one()->nama_barang ?></center></td>
							<td><center><?= $detile->stok_s ?></center></td>
							<td><center><?= $detile->stok_m ?></center></td>
							<td><center><?= $detile->stok_l ?></center></td>
							<td><center><?= $detile->stok_xl ?></center></td>
							<td><center><?= $detile->stok_n ?></center></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
					</table>
				</div>
				<div class="box-footer" style="text-align:center;">
					<?= Html::a('<i class="fa fa-arrow-circle-left"></i>&nbsp;Kembali', ['index'], ['class'=>'btn btn-danger']) ?>
				</div>
			</section>
		</div>
		
	</div>
    
</div>
