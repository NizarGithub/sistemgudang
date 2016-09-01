<?php

namespace backend\controllers;

use Yii;
use app\models\Pengiriman;
use app\models\Barang;
use app\models\DetailKirim;
use app\models\Model;
use app\models\PengirimanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/**
 * PengirimanController implements the CRUD actions for Pengiriman model.
 */
class PengirimanController extends Controller
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
     * Lists all Pengiriman models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PengirimanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pengiriman model.
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
     * Creates a new Pengiriman model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		if(Yii::$app->user->can('tambahPengeluaran')){
			$model = new Pengiriman();
			$kode_generate = $model->generateNoPengiriman();
			$model->no_pengiriman = $kode_generate;
			$list_toko = $model->getListToko();
			$modelListDetile = [new DetailKirim];
			if($model->load(Yii::$app->request->post())){
				$modelListDetile = Model::createMultiple(DetailKirim::classname());
				Model::loadMultiple($modelListDetile, Yii::$app->request->post());
				
				//ajax validation
				if(Yii::$app->request->isAjax){
					Yii::$app->response->format = Response::FORMAT_JSON;
					return ArrayHelper::merge(
						ActiveForm::validateMultiple($modelListDetile),
						ActiveForm::validate($model)
					);
				}
				
				//validate all model
				$valid = $model->validate();
				$valid = Model::validateMultiple($modelListDetile) && $valid;
				
				if($valid){
					$transaction = \Yii::$app->db->beginTransaction();
					
					try{
						if($flag = $model->save(false)){
							foreach($modelListDetile as $modelDetile){
								$modelDetile->no_pengiriman = $model->id;
								if($modelDetile->stok_s == null || $modelDetile->stok_s ==""){
									$modelDetile->stok_s = 0;
								}
								
								if($modelDetile->stok_m == null || $modelDetile->stok_m ==""){
									$modelDetile->stok_m = 0;
								}

								if($modelDetile->stok_l == null || $modelDetile->stok_l ==""){
									$modelDetile->stok_l = 0;
								}
								
								if($modelDetile->stok_xl == null || $modelDetile->stok_xl ==""){
									$modelDetile->stok_xl = 0;
								}

								if($modelDetile->stok_n == null || $modelDetile->stok_n ==""){
									$modelDetile->stok_n = 0;
								}
								
								if($modelDetile->save(false)){
									$detile_pesanan = $model->getListDetile()->all();
					
									foreach($detile_pesanan as $pesanan){
										$barang = Barang::find()->where(['id'=>$pesanan->getKodeBarang()->one()->id])->one();
										
										$barang->stok_s = $barang->stok_s-$pesanan->stok_s;
										$barang->stok_m = $barang->stok_m-$pesanan->stok_m;
										$barang->stok_l = $barang->stok_l-$pesanan->stok_l;
										$barang->stok_xl = $barang->stok_xl-$pesanan->stok_xl;
										$barang->stok_n = $barang->stok_n-$pesanan->stok_n;
										$barang->save();
									}
								}else{
									$transaction->rollBack();
									break;
								}
							}
						}
						
						if($flag){
							$transaction->commit();
							return $this->redirect(['view', 'id'=>$model->id]);
						}
					}catch(Exception $e){
						$transaction->rollBack();
					}
				}
			}
			
			return $this->render('create', [
				'model' => $model,
				'list_toko'=>$list_toko,
				'modelListDetile'=> (empty($modelListDetile)) ? [new DetailKirim] : $modelListDetile
			]);
		}else{
			Yii::$app->getSession()->setFlash('error', 'Anda tidak mempunyai hak akses untuk melakukan penambahan data');
			return $this->redirect(['index']);
		}
        
		/*
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
				'list_toko'=>$list_toko
            ]);
        }
		*/
    }

    /**
     * Updates an existing Pengiriman model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		if(Yii::$app->user->can('updatePengeluaran')){
			$model = $this->findModel($id);
			$list_toko = $model->getListToko();
			if ($model->load(Yii::$app->request->post()) && $model->save()) {
				return $this->redirect(['view', 'id' => $model->id]);
			} else {
				return $this->render('update', [
					'model' => $model,
					'list_toko'=>$list_toko
				]);
			}
		}else{
			Yii::$app->getSession()->setFlash('error', 'Anda tidak mempunyai hak untuk melakukan perubahan data');
			return $this->redirect(['index']);
		}
        
    }

    

    /**
     * Finds the Pengiriman model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pengiriman the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
		
		if (($model = Pengiriman::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
        
    }
}
