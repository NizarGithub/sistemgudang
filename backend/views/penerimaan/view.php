<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Penerimaan */

?>
<div class="penerimaan-view" style="padding-top:15px;">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<section class="box box-primary">
				<div class="box-header with-border">
					<h1 class="box-title"><?= Html::encode($this->title) ?></h1>
					
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
										'attribute'=>'tgl_penerimaan',
										'format'=>'date',
									],
									[
										'attribute'=>'status_penerimaan',
										'format'=>'raw',
										'value'=>$model->status_penerimaan == 'diterima' ? '<span class="label label-success">Diterima</span>' : '<span class="label label-warning">Belum Diterima</span>',
										
									],
								
								]
								
								
							],
							
							
						],
					]) ?>
					
					<?= DetailView::widget([
						'model' => $model->getNoPesanan()->one(),
						'attributes' => [
							//'id',
							[
								'group'=>true,
								'label'=>'Detile Pesanan',
								'rowOptions'=>['class'=>'info']
							],
							[	
								
								'columns'=>[
									[
										'attribute'=>'no_pesanan',
										'format'=>'raw',
										'value'=> '<span class="label label-success">'.$model->getNoPesanan()->one()->no_pesanan.'</span>',
										'valueColOptions'=>['style'=>'width:30%']
									],
									
									[
										'attribute'=>'tgl_pesanan',
										'format'=>'date',
										'valueColOptions'=>['style'=>'width:30%']
									],
									[
										'attribute'=>'supplier',
										'value'=>$model->getNoPesanan()->one()->getDataSupplier()->one()->nama_supplier,
										'valueColOptions'=>['style'=>'width:30%']
									],
								
								]
							],
							
						],
					]) ?>
					
					<table class="table table-bordered">
					<caption><em>Detile Pesanan Barang</em></caption>
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
						<?php foreach($model->getNoPesanan()->one()->getDetilePesanans()->all() as $detile):?>
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
			</section>
		</div>
		
	</div>
    

</div>
