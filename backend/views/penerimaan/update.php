<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Penerimaan */

$this->title = 'Update Penerimaan: #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'List Data Penerimaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Data Penerimaan : #'.$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="penerimaan-update" style="padding-top:15px;">

    <div class="row">
		<div class="col-md-8">
			<div class="box box-default">
				<div class="box-header">
					<h1 class="box-title"><?= Html::encode($this->title) ?></h1>
				</div>
				<div class="box-body">
					<?= $this->render('_form', [
						'model' => $model,
						'kode_pesan'=>$kode_pesan
					]) ?>
				</div>
			</div>
		</div>
	</div>

</div>
