<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TokoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Toko';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="toko-index" style="padding-top:15px;">
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
					['class' => 'yii\grid\SerialColumn'],

					//'id',
					[
						'attribute'=>'kode_toko',
						'hAlign'=>'center',
						'width'=>'15%'
						
					],
					[
						'attribute'=>'nama_toko',
						'hAlign'=>'center',
						'width'=>'20%'
						
					],
					[
						'attribute'=>'alamat_toko',
						'hAlign'=>'left',
						'noWrap' => false,
						//the line below has solved the issue
						'contentOptions' => [
							'style'=>'max-width: 350px; overflow: auto; white-space:initial;'],
					],
					[
						'attribute'=>'telp_toko',
						'hAlign'=>'center',
						'width'=>'20%'
					],
					// 'contact_person_toko',

					['class' => 'yii\grid\ActionColumn'],
				],
			]); ?>
		</div>
		<div class="panel-footer">
			<?= Html::a('<i class="fa fa-plus"></i> &nbsp; Tambah Toko', ['create'], ['class' => 'btn btn-success']) ?>			
		</div>
	</section>
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

</div>
