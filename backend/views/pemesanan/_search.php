<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PesananSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pesanan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'no_pesanan') ?>

    <?= $form->field($model, 'kode_barang') ?>

    <?= $form->field($model, 'stok_s') ?>

    <?= $form->field($model, 'stok_m') ?>

    <?php // echo $form->field($model, 'stok_l') ?>

    <?php // echo $form->field($model, 'stok_xl') ?>

    <?php // echo $form->field($model, 'stok_n') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
