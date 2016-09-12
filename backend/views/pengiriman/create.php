<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pengiriman */

$this->title = 'Tambah Pengiriman';
$this->params['breadcrumbs'][] = ['label' => 'List Data Pengiriman Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengiriman-create" style="padding-top:15px;">
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
						'modelListDetile'=> $modelListDetile
					]) ?>
				</div>
			</div>
		</div>
	</div>
    

</div>
