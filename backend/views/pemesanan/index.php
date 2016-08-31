<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PesananSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Pemesanan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pesanan-index" style="padding-top:15px;">
	<section class="panel panel-primary">
		<div class="panel-heading">
			<center><h1 class="panel-title"><?= Html::encode($this->title) ?></h1></center>
		</div>
		<?php 
			$layout = <<< HTML
<div class="pull-right">
    {summary}
</div>
<div class="clearfix"></div>
{items}
<center style="margin-bottom:0px; padding-bottom:0px;">{pager}</center>
HTML;
		?>
		<div class="panel-body">
			<?= GridView::widget([
				'dataProvider' => $dataProvider,
				'filterModel' => $searchModel,
				'responsiveWrap'=>false,
				'layout'=>$layout,
				'columns' => [
					['class' => 'yii\grid\SerialColumn'],

					//'id',
					[
						'attribute'=>'no_pesanan',
						'hAlign'=>'center',
						
					],
					[
						'attribute'=>'tgl_pesanan',
						'hAlign'=>'center',
						'filterType'=>GridView::FILTER_DATE,
						'format'=>'date',
						'filterWidgetOptions'=>[
							'value'=>date('yyyy-mm-dd', strtotime('+2 days')),
							'options'=>['placeholder'=>'Pilih Tanggal'],
							'pluginOptions'=>[
								'autoclose'=>true, 
								'format'=>'yyyy-mm-dd',
								'todayHighlight'=>true
							]
						]
					],
					[
						'attribute'=>'nama_supplier',
						'value'=>'dataSupplier.nama_supplier',
						'hAlign'=>'center',
					],
					// 'contact_person_toko',

					[
						'class' => 'yii\grid\ActionColumn',
					],
				],
			]); ?>
		</div>
		<div class="panel-footer">
			<?= Html::a('<i class="fa fa-plus"></i> &nbsp; Tambah Pesanan', ['create'], ['class' => 'btn btn-success']) ?>			
		</div>
	</section>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

</div>
