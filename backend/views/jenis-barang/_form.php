<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JenisBarang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jenis-barang-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kode_jenis')->textInput(['maxlength' => true, 'disabled'=>true]) ?>

    <?= $form->field($model, 'nama_jenis')->textInput(['maxlength' => true]) ?>

    <div class="box-footer" style="text-align:center;">
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"></i> &nbsp;Tambah' : '<i class="fa fa-pencil"></i> &nbsp;Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		<?= Html::a('<i class="fa fa-close"></i>&nbsp;Batal', ['index'], ['class'=>'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
