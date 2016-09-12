<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BarangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Data Barang';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="barang-index" style="padding-top:15px;">
	<section class="panel panel-primary">
		<div class="panel-heading">
			<center><h1 class="panel-title"><?= Html::encode($this->title) ?></h1></center>
		</div>
		<div class="panel-body">
			<?php //echo $this->render('_search', ['model' => $searchModel]); ?>
			<?= GridView::widget([
				'dataProvider' => $dataProvider,
				'filterModel' => $searchModel,
				'responsiveWrap'=>false,
				'hover'=>true,
				'columns' => [
					['class' => 'yii\grid\SerialColumn'],

					//'id',
					[
						'attribute'=>'kode_barang',
						'hAlign'=>'center',
						'width'=>'15%'
						
					],
					[
						'attribute'=>'kodejenis',
						'value'=>'kodeJenis.kode_jenis',
						'label'=>'Kode Jenis',
						'hAlign'=>'center',
						'width'=>'15%'
						
					],
					[
						'attribute'=>'nama_barang',
						'hAlign'=>'center'
					],
					[
						'attribute'=>'gender',
						'hAlign'=>'center',
						'width'=>'10%'
					],
					[
						'attribute'=>'warna',
						'hAlign'=>'center',
						'width'=>'15%'						
					],
					// 'harga',
					// 'stok_s',
					// 'stok_m',
					// 'stok_l',
					// 'stok_xl',
					// 'stok_n',
					// 'kode_jenis',

					['class' => 'yii\grid\ActionColumn'],
				],
			]); ?>
		</div>
		<div class="panel-footer">
			<?= Html::a('<i class="fa fa-plus"></i> &nbsp; Tambah Barang', ['create'], ['class' => 'btn btn-success']) ?>			
		</div>
	</section>
    
    

    
    
</div>
