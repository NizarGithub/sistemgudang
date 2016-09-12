<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TokoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="toko-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'kode_toko') ?>

    <?= $form->field($model, 'nama_toko') ?>

    <?= $form->field($model, 'alamat_toko') ?>

    <?= $form->field($model, 'telp_toko') ?>

    <?php // echo $form->field($model, 'contact_person_toko') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
