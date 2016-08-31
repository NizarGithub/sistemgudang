<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Toko */

$this->title = 'Tambah Toko';
$this->params['breadcrumbs'][] = ['label' => 'Data Toko', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="toko-create" style="padding-top:15px;">
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
