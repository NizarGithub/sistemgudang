<?php 
	use yii\helpers\Html;
	use yii\helpers\Url;
	use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin() ?>
<div class="row">
	<div class="col-md-6">
		<div class="box box-default">
			<div class="box-header">
				<center><h3 class="box-title">
					Tambah Anggota
				</h3></center>
			</div>
			<div class="box-body">
				<?= $form->field($model,'username')->textInput()?>	
				<?= $form->field($model,'email')->textInput()?>
				<?= $form->field($model,'password')->passwordInput()?>
				<?= $form->field($model,'role')->dropDownList(['user'=>'Operator Aplikasi','admin'=>'Admin Aplikasi'])?>
				
				<div class="box-footer" style="text-align:center;">
					<?= Html::submitButton('<i class="fa fa-plus"></i>&nbsp; Tambah', ['class'=>'btn btn-primary']) ?>
					<?= Html::a('<i class="fa fa-close"></i>&nbsp;Batal', ['index'], ['class'=>'btn btn-danger']) ?>
				</div>
			</div>
		</div>
		
	</div>
</div>
<?php ActiveForm::end() ?>