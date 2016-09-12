<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Barang */

$this->title = 'Data Barang #'.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tambah Data Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="barang-view" style="padding-top:15px;">
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
										'attribute'=>'kode_barang',
										'format'=>'raw',
										'value'=> '<span class="label label-success">'.$model->kode_barang.'</span>',
										'valueColOptions'=>['style'=>'width:30%']
									],
									[
										'attribute'=>'nama_barang',
										'format'=>'raw',
										'valueColOptions'=>['style'=>'width:30%']
									]
								
								]
								
								
							],
							[	
								
								'columns'=>[
									[
										'attribute'=>'gender',
										'format'=>'raw',
										'value'=> '<span class="label label-warning">'.$model->gender.'</span>',
										'valueColOptions'=>['style'=>'width:30%']										
									],
									[
										'attribute'=>'kode_jenis',
										'format'=>'raw',
										'value'=>$model->getKodeJenis()->one()->kode_jenis,
										
										'valueColOptions'=>['style'=>'width:30%']
									]
								
								]
								
								
							],
							[	
								
								'columns'=>[
									[
										'attribute'=>'warna',
										'format'=>'raw',
										'valueColOptions'=>['style'=>'width:30%']										
									],
									[
										'attribute'=>'harga',
										'format'=>'raw',
										'label'=>'Harga (Rp.)',
										'format'=>['decimal', 0],
										'valueColOptions'=>['style'=>'width:30%']
									]
								
								]
								
								
							],
							[
								'group'=>true,
								'label'=>'Persediaan Barang',
								'rowOptions'=>['class'=>'info']
							],
							[	
								
								'columns'=>[
									[
										'attribute'=>'stok_s',
										'format'=>'raw',									
									],
									[
										'attribute'=>'stok_m',
										'format'=>'raw',
									],
									[
										'attribute'=>'stok_l',
										'format'=>'raw',
									],
									[
										'attribute'=>'stok_xl',
										'format'=>'raw',
									],
									[
										'attribute'=>'stok_n',
										'format'=>'raw',
									],
								]
								
								
							],
							
						],
					]) ?>
				</div>
				<div class="box-footer" style="text-align:center;">
					<?= Html::a('<i class="fa fa-arrow-circle-left"></i>&nbsp;Kembali', ['index'], ['class'=>'btn btn-danger']) ?>
				</div>
			</section>
		</div>
		
	</div>
	
    
</div>
