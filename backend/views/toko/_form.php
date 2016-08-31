<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Toko */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="toko-form">

    <?php $form = ActiveForm::begin(); ?>
	<div class="row">
		<div class="col-md-6">
			<?= $form->field($model, 'kode_toko')->textInput(['maxlength' => true, 'disabled'=>true]) ?>

			<?= $form->field($model, 'nama_toko')->textInput(['maxlength' => true]) ?>
			
			<?= $form->field($model, 'telp_toko')->textInput(['maxlength' => true]) ?>
		</div>
		
		<div class="col-md-6">
			<?= $form->field($model, 'contact_person_toko')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'alamat_toko')->textArea(['rows' => 4]) ?>
		</div>
	</div>
	
	
    <div class="box-footer" style="text-align:center;">
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"></i> &nbsp; Tambah' : '<i class="fa fa-pencil"></i> &nbsp;Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>.
		<?= Html::a('<i class="fa fa-close"></i> &nbsp; Batal', ['index'], ['class'=>'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
