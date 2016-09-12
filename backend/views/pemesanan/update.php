<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pesanan */

$this->title = 'Update Pesanan: #' . $modelPesanan->id;
$this->params['breadcrumbs'][] = ['label' => 'Data Pemesanan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Data Pemesanan : #'.$modelPesanan->id, 'url' => ['view', 'id' => $modelPesanan->id]];
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
						'model' => $modelPesanan,
						'modelListDetile'=>$modelListDetile
					]) ?>
				</div>
			</div>
		</div>
		
	</div>

</div>
