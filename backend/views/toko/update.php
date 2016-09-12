<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Toko */

$this->title = 'Update Toko: #' . $model->kode_toko;
$this->params['breadcrumbs'][] = ['label' => 'Data Toko', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Data Toko : #'.$model->kode_toko, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update Toko: #' . $model->kode_toko;
?>
<div class="toko-update" style="padding-top:15px;">
	<div class="row">
		<div class="col-md-8">
			<div class="box box-default">
				<div class="box-header">
					<h1 class="box-title"><?= Html::encode($this->title) ?></h1>
				</div>
				<div class="box-body">
					<?= $this->render('_form', [
						'model' => $model,
					]) ?>
				</div>
			</div>
		</div>
		
	</div>

</div>
