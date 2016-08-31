<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use wbraganca\dynamicform\DynamicFormWidget;
/* @var $this yii\web\View */
/* @var $model app\models\Pengiriman */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pengiriman-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <?= $form->field($model, 'no_pengiriman')->textInput(['maxlength' => true, 'disabled'=>true]) ?>

    <?= $form->field($model, 'tgl_pengiriman')->widget(kartik\widgets\DateTimePicker::classname(),[
		'value' => '12/31/2010 05:10:20',
		'readonly' => true,
		'pluginOptions' => [
			'autoclose' => true,
			'format' => 'yyyy-mm-dd hh:ii:ss'
		]
		
	]) ?>

    <?= $form->field($model, 'kode_toko')->widget(Select2::classname(),[
		'data'=>$list_toko,
		'options'=>['placeholder'=>'Pilih Toko'],
		'pluginOptions'=>[
			'allowClear'=>true
		]
	]) ?>
	<div class="box panel-default">
        
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 4, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelListDetile[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'id_barang',
                    'stok_s',
                    'stok_m',
                    'stok_l',
                    'stok_xl',
                    'stok_n',
                ],
            ]); ?>
			
		<div class="box-header with-border">
			<h4 class="box-title"><i class="glyphicon glyphicon-envelope"></i> &nbsp;Detile Pesanan Barang</h4>
			<div class="box-tools pull-right">
				<button type="button" class="add-item btn btn-box-tool">
					<i class="glyphicon glyphicon-plus"></i>
				</button>
			</div>
			
		</div>
        <div class="box-body">
			<div class="pull-right">
				
			</div>
			
			<div class="row">
				<table class="table table-bordered">
					
					<thead>
						<tr>
							
							<th rowspan="2" style="vertical-align:middle;text-align:center;">Nama Barang</th>
							<th colspan="5" style="text-align:center;">Stok Untuk Ukuran</th>
							<th rowspan="2" style="vertical-align:middle;text-align:center;">Aksi</th>
						</tr>
						<tr>
							<th style="text-align:center;">S</th>
							<th style="text-align:center;">M</th>
							<th style="text-align:center;">L</th>
							<th style="text-align:center;">XL</th>
							<th style="text-align:center;">N/A</th>
						</tr>
					</thead>
					<tbody class="container-items">
						
						<?php foreach ($modelListDetile as $i => $modelDetile): ?>
						
						<tr class="item">
							<?php
								// necessary for update action.
								if (! $modelDetile->isNewRecord) {
									echo Html::activeHiddenInput($modelDetile, "[{$i}]id");
								}
							?>
							
							<td><?= $form->field($modelDetile, "[{$i}]kode_barang")->widget(Select2::classname(),[
								'data'=>$modelDetile->getListBarang(),
								'options'=>['placeholder'=>'Pilih Barang'],
								'pluginOptions'=>[
									'allowClear'=>true,
								]
							])->label(false) ?></td>
							<td width="10%"><?= $form->field($modelDetile, "[{$i}]stok_s")->textInput(['maxlength' => true])->label(false) ?></td>
							<td width="10%"><?= $form->field($modelDetile, "[{$i}]stok_m")->textInput(['maxlength' => true])->label(false) ?></td>
							<td width="10%"><?= $form->field($modelDetile, "[{$i}]stok_l")->textInput(['maxlength' => true])->label(false) ?></td>
							<td width="10%"><?= $form->field($modelDetile, "[{$i}]stok_xl")->textInput(['maxlength' => true])->label(false) ?></td>
							<td width="10%"><?= $form->field($modelDetile, "[{$i}]stok_n")->textInput(['maxlength' => true])->label(false) ?></td>
							<td style="text-align:center;vertical-align:middle;"><button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
            
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
