<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;
use wbraganca\dynamicform\DynamicFormWidget;
/* @var $this yii\web\View */
/* @var $modelDetile app\modelDetiles\Pesanan */
/* @var $form yii\widgets\ActiveForm */
?>
<!-- Tambah comment -->
<div class="pesanan-form">
	
    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
	<div class="panel panel-default" style="padding:0;">
		<div class="panel-body bg-success">
			<div class="row" style="margin-bottom : 0;">
				<div class="col-md-12">
					<?= $form->field($model, 'no_pesanan')->textInput(['maxlength' => true, 'disabled'=>true]) ?>
					
					
					<?= $form->field($model, 'tgl_pesanan')->widget(DatePicker::classname(), [
						'value'=>date('yyyy-mm-dd', strtotime('+2 days')),
						'options'=>['placeholder'=>'Pilih Tanggal'],
						'pluginOptions'=>[
							'autoclose'=>true, 
							'format'=>'yyyy-mm-dd',
							'todayHighlight'=>true
						]
					]) ?>
					
					<?= $form->field($model, 'supplier')->widget(Select2::classname(), [
						'data'=> $model->getListSupplier(),
						'options'=>['placeholder'=>'Pilih Supplier'],
						'pluginOptions'=>[
							'allowClear'=>true,
						]
					]) ?>
				</div>
			</div>
		</div>
	</div>	
	
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
							
							<td><?= $form->field($modelDetile, "[{$i}]id_barang")->widget(Select2::classname(),[
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

    
	
    

    <div class="box-footer" style="text-align:center;">
        <?= Html::submitButton($modelDetile->isNewRecord ? '<i class="fa fa-save"></i> &nbsp;Tambah' : '<i class="fa fa-pencil"></i> &nbsp;Update', ['class' => $modelDetile->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		<?= Html::a('<i class="fa fa-close"></i>&nbsp;Batal', ['index'], ['class'=>'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
