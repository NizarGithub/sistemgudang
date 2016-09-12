<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Supplier */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="supplier-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kode_supplier')->textInput(['maxlength' => true, 'disabled'=>true]) ?>

    <?= $form->field($model, 'nama_supplier')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_supplier')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telp_supplier')->textInput(['maxlength' => true]) ?>

    <div class="box-footer" style="text-align:center;">
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"></i> &nbsp; Tambah' : '<i class="fa fa-pencil"></i> &nbsp;Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>.
		<?= Html::a('<i class="fa fa-close"></i> &nbsp; Batal', ['index'], ['class'=>'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
