<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\JenisBarang */

$this->title = 'Tambah Jenis Barang';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Jenis Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-barang-create" style="padding-top:10px">
	<div class="row">
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h1 class="box-title"><?= Html::encode($this->title) ?></h1>
				<div>
				
				<div class="box-body">
					<?= $this->render('_form', [
						'model' => $model,
					]) ?>
				</div>
			</div>
		</div>
	</div>
	
    

    

</div>
