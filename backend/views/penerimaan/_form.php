<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Penerimaan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="penerimaan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'no_pesanan')->widget(Select2::classname(),[
		'data'=>$kode_pesan,
		'options'=>['placeholder'=>'Pilih Pesanan'],
		'pluginOptions'=>[
			'allowClear'=>true
		]
	]) ?>

    <?= $form->field($model, 'tgl_penerimaan')->widget(kartik\widgets\DateTimePicker::classname(),[
		'value' => '12/31/2010 05:10:20',
		'readonly' => true,
		'pluginOptions' => [
			'autoclose' => true,
			'format' => 'yyyy-mm-dd hh:ii:ss'
		]
		
	]) ?>

    <?= $form->field($model, 'status_penerimaan')->dropDownList([ 'diterima' => 'Diterima', 'belum' => 'Belum', ], ['prompt' => '']) ?>

    <div class="box-footer" style="text-align:center;">
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"></i> &nbsp;Tambah' : '<i class="fa fa-pencil"></i> &nbsp;Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		<?= Html::a('<i class="fa fa-close"></i>&nbsp;Batal', ['index'], ['class'=>'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
