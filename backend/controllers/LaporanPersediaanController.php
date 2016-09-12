<?php 
namespace backend\controllers;

use yii;
use yii\web\Controller;
use yii\helpers\Json;
use app\models\Barang;

class LaporanPersediaanController extends Controller{
	
	public function actionIndex(){
		$model = Barang::find()->all();
		return $this->render('index', [
			'model'=>$model,
		]);
	}
}