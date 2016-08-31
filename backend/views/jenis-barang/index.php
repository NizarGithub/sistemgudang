<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JenisBarangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Jenis Barang';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-barang-index" style="padding-top:15px;">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<center><h3 class="panel-title"><?= Html::encode($this->title) ?></h3></center>
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
						'attribute'=>'kode_jenis',
						'hAlign' => 'center',
					],
					[
						'attribute'=>'nama_jenis',
						'hAlign' => 'center',
					],

					['class' => 'yii\grid\ActionColumn'],
				],
			]); ?>
		</div>
		<div class="panel-footer"><?= Html::a('<span class="fa fa-plus"></span>&nbsp; Tambah Jenis', ['create'], ['class' => 'btn btn-success']) ?></div>
	</div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        
    </p>
    
</div>
