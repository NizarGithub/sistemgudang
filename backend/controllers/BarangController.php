<?php

namespace backend\controllers;

use Yii;
use app\models\Barang;
use app\models\BarangSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\KodeJenis;
/**
 * BarangController implements the CRUD actions for Barang model.
 */
class BarangController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
	
	public function actionGetKode(){
		$model = new Barang();
		
		return $model->generateKodeBarang();
	}

    /**
     * Lists all Barang models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BarangSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Barang model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Barang model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Barang();
		$kode_generate = $model->generateKodeBarang();
		
		$kode = $model->getListKodeJenis();
		$model->kode_barang = $kode_generate;
        if ($model->load(Yii::$app->request->post())) {
			
			if($model->stok_s == null || $model->stok_s ==""){
				$model->stok_s = 0;
			}
			
			if($model->stok_m == null || $model->stok_m ==""){
				$model->stok_m = 0;
			}

			if($model->stok_l == null || $model->stok_l ==""){
				$model->stok_l = 0;
			}
			
			if($model->stok_xl == null || $model->stok_xl ==""){
				$model->stok_xl = 0;
			}

			if($model->stok_n == null || $model->stok_n ==""){
				$model->stok_n = 0;
			}
			
			if($model->save()){
				return $this->redirect(['view', 'id' => $model->id]);
			}
            
        } else {
            return $this->render('create', [
                'model' => $model,
				'kode_jenis'=>$kode,
            ]);
        }
    }

    /**
     * Updates an existing Barang model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$kode = $model->getListKodeJenis();
        if ($model->load(Yii::$app->request->post())) {
			if($model->stok_s == null || $model->stok_s ==""){
				$model->stok_s = 0;
			}
			
			if($model->stok_m == null || $model->stok_m ==""){
				$model->stok_m = 0;
			}

			if($model->stok_l == null || $model->stok_l ==""){
				$model->stok_l = 0;
			}
			
			if($model->stok_xl == null || $model->stok_xl ==""){
				$model->stok_xl = 0;
			}

			if($model->stok_n == null || $model->stok_n ==""){
				$model->stok_n = 0;
			}
			
			if($model->save()){
				return $this->redirect(['view', 'id' => $model->id]);
			}
        } else {
            return $this->render('update', [
                'model' => $model,
				'kode_jenis'=>$kode,
            ]);
        }
    }

    /**
     * Deletes an existing Barang model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Barang model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Barang the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Barang::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
