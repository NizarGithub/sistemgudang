<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Barang */

$this->title = 'Update Barang: #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Data Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Data Barang #'.$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update Barang: #' . $model->id;;
?>
<div class="barang-update">
	<div class="row">
		<div class="col-md-8">
			<div class="box box-default">
				<div class="box-header">
					<h1 class="box-title"><?= Html::encode($this->title) ?></h1>
				</div>
				<div class="box-body">
					<?= $this->render('_form', [
						'model' => $model,
						'kode_jenis'=>$kode_jenis
					]) ?>
				</div>
			</div>
		</div>
		
	</div>

    

</div>
