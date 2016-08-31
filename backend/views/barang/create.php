<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Barang */

$this->title = 'Tambah Data Barang';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Data Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="barang-create" style="padding-top:15px;">
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
