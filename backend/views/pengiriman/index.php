<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PengirimanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List Data Pengiriman Barang';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengiriman-index"  style="padding-top:15px;">
	
	<section class="panel panel-primary">
		<div class="panel-heading">
			<center><h1 class="panel-title"><?= Html::encode($this->title) ?></h1></center>
		</div>
		<div class="panel-body">
			<?= GridView::widget([
				'dataProvider' => $dataProvider,
				'filterModel' => $searchModel,
				'responsiveWrap'=>false,
				'columns' => [
					['class' => 'kartik\grid\SerialColumn'],
					[
						'class'=>'kartik\grid\ExpandRowColumn',
						'width'=>'50px',
						'value'=>function ($model, $key, $index, $column) {
							return GridView::ROW_COLLAPSED;
						},
						'detail'=>function ($model, $key, $index, $column) {
							return Yii::$app->controller->renderPartial('view', ['model'=>$model]);
						},
						'headerOptions'=>['class'=>'kartik-sheet-style'], 
						'expandOneOnly'=>true
					],
					//'id',
					[
						'attribute'=>'no_pengiriman',
						'hAlign'=>'center',
						'width'=>'15%'
						
					],
					[
						'attribute'=>'tgl_pengiriman',
						'hAlign'=>'center',
						
					],
					[
						'attribute'=>'toko',
						'value'=>'kodeToko.nama_toko',
						'hAlign'=>'center',
						'width'=>'15%'						
					],
					

				],
			]); ?>
			
			
			
		</div>
		<div class="panel-footer">
			<?= Html::a('<i class="fa fa-plus"></i> &nbsp; Tambah Pengeluaran', ['create'], ['class' => 'btn btn-success']) ?>			
		</div>
	</section>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

</div>
