<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JenisBarang */

$this->title = 'Update Jenis Barang: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Jenis Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => '#'.$model->kode_jenis, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jenis-barang-update" style="padding-top:15px;">
	<section class="box box-default">
		<div class="box-header">
			<h1 class="box-title"><?= Html::encode($this->title) ?></h1>
			
		</div>
		<div class="box-body">
			<?= $this->render('_form', [
				'model' => $model,
			]) ?>
		</div>
	</section>
    

    

</div>
