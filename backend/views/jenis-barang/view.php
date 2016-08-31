<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\JenisBarang */

$this->title = 'Data Jenis : #'.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Jenis Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-barang-view" style="padding-top:15px;">
	<div class="col-md-6">
		<section class="box box-primary">
			<div class="box-header with-border">
				<h1 class="box-title">
					<?= Html::encode($this->title) ?> 
					
				</h1>
				<div class="box-tools pull-right">
					<?= Html::a('<i class="fa fa-plus"></i>', ['create'], ['class' => 'btn btn-box-tool']) ?>
					<?= Html::a('<i class="fa fa-pencil"></i>', ['update', 'id' => $model->id], ['class' => 'btn btn-box-tool']) ?>
					<?= Html::a('<i class="fa fa-trash"></i>', ['delete', 'id' => $model->id], [
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
						'id',
						'kode_jenis',
						'nama_jenis',
					],
				]) ?>
			</div>
			<div class="box-footer" style="text-align:center;">
				<?= Html::a('<i class="fa fa-arrow-circle-left"></i>&nbsp;Kembali', ['index'], ['class'=>'btn btn-danger']) ?>
			</div>
			
		</section>
	</div>
    

    

</div>
