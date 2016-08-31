<?php

namespace backend\controllers;

use Yii;
use app\models\Penerimaan;
use app\models\Barang;
use app\models\PenerimaanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PenerimaanController implements the CRUD actions for Penerimaan model.
 */
class PenerimaanController extends Controller
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

    /**
     * Lists all Penerimaan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PenerimaanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Penerimaan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		$model = $this->findModel($id);
		$detail_pesanan = $model->getNoPesanan()->one();
        return $this->render('view', [
            'model' => $model,
			'detail_pesanan'=>$detail_pesanan,
        ]);
    }

    /**
     * Creates a new Penerimaan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Penerimaan();
		$kode_pesan = $model->getListPesanan();
        if ($model->load(Yii::$app->request->post())) {
			if($model->save() && ($model->status_penerimaan == 'diterima')){
				$detile_pesanan = $model->getNoPesanan()->one()->getDetilePesanans()->all();
				
				foreach($detile_pesanan as $pesanan){
					$barang = Barang::find()->where(['id'=>$pesanan->getBarang()->one()->id])->one();
					
					$barang->stok_s = $barang->stok_s+$pesanan->stok_s;
					$barang->stok_m = $barang->stok_m+$pesanan->stok_m;
					$barang->stok_l = $barang->stok_l+$pesanan->stok_l;
					$barang->stok_xl = $barang->stok_xl+$pesanan->stok_xl;
					$barang->stok_n = $barang->stok_n+$pesanan->stok_n;
					$barang->save();
				}
				
			}
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
				'kode_pesan'=>$kode_pesan
            ]);
        }
    }

    /**
     * Updates an existing Penerimaan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$kode_pesan = $model->getListPesanan();
        if ($model->load(Yii::$app->request->post())) {
			if($model->save() && ($model->status_penerimaan == 'diterima')){
				$detile_pesanan = $model->getNoPesanan()->one()->getDetilePesanans()->all();
				
				foreach($detile_pesanan as $pesanan){
					$barang = Barang::find()->where(['id'=>$pesanan->getBarang()->one()->id])->one();
					
					$barang->stok_s = $barang->stok_s+$pesanan->stok_s;
					$barang->stok_m = $barang->stok_m+$pesanan->stok_m;
					$barang->stok_l = $barang->stok_l+$pesanan->stok_l;
					$barang->stok_xl = $barang->stok_xl+$pesanan->stok_xl;
					$barang->stok_n = $barang->stok_n+$pesanan->stok_n;
					$barang->save();
				}
				
			}
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
				'kode_pesan'=>$kode_pesan
            ]);
        }
    }

    /**
     * Deletes an existing Penerimaan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
		
		if($model->delete() && ($model->status_penerimaan == 'diterima')){
			$detile_pesanan = $model->getNoPesanan()->one()->getDetilePesanans()->all();
				
				foreach($detile_pesanan as $pesanan){
					$barang = Barang::find()->where(['id'=>$pesanan->getBarang()->one()->id])->one();
					
					$barang->stok_s = $barang->stok_s-$pesanan->stok_s;
					$barang->stok_m = $barang->stok_m-$pesanan->stok_m;
					$barang->stok_l = $barang->stok_l-$pesanan->stok_l;
					$barang->stok_xl = $barang->stok_xl-$pesanan->stok_xl;
					$barang->stok_n = $barang->stok_n-$pesanan->stok_n;
					$barang->save();
				}
		}
		
        return $this->redirect(['index']);
    }

    /**
     * Finds the Penerimaan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Penerimaan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Penerimaan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
