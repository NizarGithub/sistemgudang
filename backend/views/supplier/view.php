<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Supplier */

$this->title = 'Data Supplier : #'.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Data Supplier', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supplier-view" style="padding-top:15px;">
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
										'attribute'=>'kode_supplier',
										'format'=>'raw',
										'value'=> '<span class="label label-success">'.$model->kode_supplier.'</span>',
										'valueColOptions'=>['style'=>'width:30%']
									],
									[
										'attribute'=>'nama_supplier',
										'format'=>'raw',
										'valueColOptions'=>['style'=>'width:30%']
									],
									
								
								]
								
								
							],
							[	
								
								'columns'=>[
									[
										'attribute'=>'telp_supplier',
										'format'=>'raw',
										'valueColOptions'=>['style'=>'width:30%']										
									],
									[
										'attribute'=>'alamat_supplier',
										'format'=>'raw',
										
										
										'valueColOptions'=>['style'=>'width:30%']
									]
								
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
