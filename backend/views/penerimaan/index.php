<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PenerimaanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List Data Penerimaan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penerimaan-index" style="padding-top:15px;">
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
				'layout'=>$layout,
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
						'attribute'=>'no_pesanan',
						'value'=>'noPesanan.no_pesanan',
						'hAlign'=>'center',
						'width'=>'15%'
						
					],
					[
						'attribute'=>'tgl_penerimaan',
						'hAlign'=>'center',
						'format'=>'date',
						'filterType'=>GridView::FILTER_DATE,
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
						'attribute'=>'status_penerimaan',
						'hAlign'=>'center',
						'width'=>'15%'						
					],
					

					[
						'class' => 'yii\grid\ActionColumn', 
						'template'=>'<center>{update} {delete}</center>',
						'buttons'=>[
							'update' => function ($url, $model) {
								return $model->status_penerimaan==='diterima' ? '': Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
											'title' => Yii::t('app', 'Update'),                                 
								]);
							},
							'delete' => function ($url, $model) {
								return $model->status_penerimaan==='diterima' ? '': Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
											'title' => Yii::t('app', 'Delete'),                                 
								]);
							},
						]
					],
				],
			]); ?>
		</div>
		<div class="panel-footer">
			<?= Html::a('<i class="fa fa-plus"></i> &nbsp; Tambah Penerimaan', ['create'], ['class' => 'btn btn-success']) ?>			
		</div>
	</section>
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
    
</div>
