<?php 
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use app\models\LaporanPengeluaranBarangSearch;
use yii\helpers\Json;
class LaporanPengeluaranBarangController extends Controller{
	public function actionIndex(){
		// return "Hello Laporan Pengeluaran Barang";
        $modelSearch = new LaporanPengeluaranBarangSearch();
		$dataProvider = $modelSearch->search(Yii::$app->request->queryParams);
		
		// return Json::encode($dataProvider['dataCart']);
		
		return $this->render('index', [
			'searchModel'=>$modelSearch,
			'dataProvider' =>$dataProvider,
		]);
	}
	
}
