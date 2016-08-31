<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pesanan */

$this->title = 'Update Pesanan: #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Data Pemesanan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Data Pemesanan : #'.$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pesanan-update" style="padding-top:15px;">

    <div class="row" >
		<div class="col-md-8">
			<div class="box box-default">
				<div class="box-header">
					<h1 class="box-title"><?= Html::encode($this->title) ?></h1>
				</div>
				<div class="box-body">
					<?= $this->render('_form', [
						'model' => $model,
						'list_barang'=>$list_barang
					]) ?>
				</div>
			</div>
		</div>
		
	</div>

</div>
