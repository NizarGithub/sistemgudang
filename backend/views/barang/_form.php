<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use kartik\money\MaskMoney;

/* @var $this yii\web\View */
/* @var $model app\models\Barang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="barang-form">
	
    <?php $form = ActiveForm::begin(); ?>
	<section class="panel panel-default" style="padding:0;">
		<div class="panel-body bg-success">
			<div class="row " style="margin-bottom:0;">
				<div class="col-md-6" >
					
					<?= $form->field($model, 'kode_jenis')->widget(Select2::classname(), [
						'data'=>$kode_jenis,
						'pluginOptions'=>[
							'allowClear'=>true,
						], 
						'options'=>[
							'placeholder'=>'Kode Jenis',
						]
						
						
					]) ?>
					
					<?= $form->field($model, 'kode_barang')->textInput(['maxlength' => true, 'disabled'=>true]) ?>

					<?= $form->field($model, 'nama_barang')->textInput(['maxlength' => true]) ?>

					
				</div>
				<div class="col-md-6" style="">
				
					<?= $form->field($model, 'gender')->dropDownList([ 'L' => 'L', 'P' => 'P', ], ['prompt' => 'Pilih Jenis Pakaian Untuk']) ?>
					
					<?= $form->field($model, 'warna')->textInput() ?>

					<?= $form->field($model, 'harga')->widget(MaskMoney::classname(),[
						'name'=>'harga',
						'pluginOptions' => [
							'allowNegative' => true
						]
					]) ?>
					
				</div>		
			</div>
		</div>
	</section>
	<div class="col-md-12" style="text-align:center;">		
			<div class="panel panel-primary" >
				<div class="panel-heading">
					<h3 class="panel-title">Stok Barang</h3>
				</div>
				<div class="panel-body">
					<div class="row" >
						<div class="col-md-12 form-inline" style="text-align: center;">
						
							<?= $form->field($model, 'stok_s')->textInput([
								'style'=>'width:100px; margin-right:10px;',
								'placeholder' => 'Ukuran S'
							])->label(false) ?>

							<?= $form->field($model, 'stok_m')->textInput([
								'style'=>'width:100px; margin-right:10px;',
								'placeholder' => 'Ukuran M'
							])->label(false) ?>

							<?= $form->field($model, 'stok_l')->textInput([
								'style'=>'width:100px; margin-right: 10px;',
								'placeholder' => 'Ukuran L'
							])->label(false) ?>

							<?= $form->field($model, 'stok_xl')->textInput([
								'style'=>'width:100px; margin-right:10px;',
								'placeholder' => 'Ukuran XL'
							])->label(false) ?>

							<?= $form->field($model, 'stok_n')->textInput([
								'style'=>'width:100px; margin-right:10px;',
								'placeholder' => 'Ukuran N/A'
							])->label(false) ?>
							
						</div>
					</div>
				</div>
			</div>		
	</div>
	
    <div class="box-footer" style="text-align:center;">
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"></i> &nbsp;Tambah' : '<i class="fa fa-pencil"></i> &nbsp;Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		<?= Html::a('<i class="fa fa-close"></i>&nbsp;Batal', ['index'], ['class'=>'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
