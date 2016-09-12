<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pengiriman */

?>
<div class="pengiriman-view" style="padding-top:15px; ">
	<div class="row">
		<div class="col-md-2">
			
		</div>
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
										'attribute'=>'no_pengiriman',
										'format'=>'raw',
									],
									[
										'attribute'=>'tgl_pengiriman',
										'format'=>'date',
									],
									
									[
										'attribute'=>'kode_toko',
										'value'=>$model->getKodeToko()->one()->kode_toko,
										'format'=>'raw',
									],
								]
							],
							
							
						],
					]) ?>
					
					<table class="table table-bordered">
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
						<tbody>
							<?php if($model->getListDetile()->all() != null){ ?>
							<?php foreach($model->getListDetile()->all() as $detile):?>
							<tr>
								<td><center><?= $detile->getKodeBarang()->one()->nama_barang ?></center></td>
								<td><center><?= $detile->stok_s ?></center></td>
								<td><center><?= $detile->stok_m ?></center></td>
								<td><center><?= $detile->stok_l ?></center></td>
								<td><center><?= $detile->stok_xl ?></center></td>
								<td><center><?= $detile->stok_n ?></center></td>
							</tr>
							<?php endforeach; ?>
							<?php }else{?>
								<tr>
									<td colspan="6"><center>Data Barang yang dikirim Kosong</center></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				
			</section>
		
	</div>
    

</div>
