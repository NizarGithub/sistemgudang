<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pengiriman */

$this->title = 'Update Pengiriman: #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'List Data Pengiriman Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Data Pengiriman : #'.$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengiriman-update" style="padding-top:15px;">
	<div class="row">
		<div class="col-md-8">
			<div class="box box-default">
				<div class="box-header">
					<h1 class="box-title"><?= Html::encode($this->title) ?></h1>
				</div>
				<div class="box-body">
					<?= $this->render('_form', [
						'model' => $model,
						'list_toko'=>$list_toko,
					]) ?>
				</div>
			</div>
		</div>
	</div>
    

</div>
