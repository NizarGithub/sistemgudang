<?php

namespace backend\controllers;

use Yii;
use app\models\Pesanan;
use app\models\Model;
use app\models\Barang;
use app\models\DetilePesanan;
use app\models\PesananSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * PemesananController implements the CRUD actions for Pesanan model.
 */
class PemesananController extends Controller
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
     * Lists all Pesanan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PesananSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pesanan model.
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
     * Creates a new Pesanan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		if(\Yii::$app->user->can('tambahPemesanan')){
			$modelPesanan = new Pesanan;
			$kode_generate = $modelPesanan->generateKodePesanan();
			$modelPesanan->no_pesanan = $kode_generate;
			$persediaan_barang = Barang::find()->all();
			
			$modelListDetile = [new DetilePesanan];
			if ($modelPesanan->load(Yii::$app->request->post())) {

				$modelListDetile = Model::createMultiple(DetilePesanan::classname());
				Model::loadMultiple($modelListDetile, Yii::$app->request->post());

				// ajax validation
				if (Yii::$app->request->isAjax) {
					Yii::$app->response->format = Response::FORMAT_JSON;
					return ArrayHelper::merge(
						ActiveForm::validateMultiple($modelListDetile),
						ActiveForm::validate($modelPesanan)
					);
				}

				// validate all models
				$valid = $modelPesanan->validate();
				$valid = Model::validateMultiple($modelListDetile) && $valid;

				if ($valid) {
					$transaction = \Yii::$app->db->beginTransaction();
					try {
						if ($flag = $modelPesanan->save(false)) {
							
							foreach ($modelListDetile as $modelDetile) {
								$modelDetile->id_pesanan = $modelPesanan->id;
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
								
								if(!($flag = $modelDetile->save(false))) {
									$transaction->rollBack();
									break;
								}
									
								
							}
						}
						
						if($flag){
							$transaction->commit();
							return $this->redirect(['view', 'id' => $modelPesanan->id]);
						}
						
					} catch (Exception $e) {
						$transaction->rollBack();
					}
				}
			}

			return $this->render('create', [
				
				'modelPesanan' => $modelPesanan,
				'modelListDetile' => (empty($modelListDetile)) ? [new DetilePesanan] : $modelListDetile,
				'persediaan_barang'=>$persediaan_barang,
			]);
		}else{
			Yii::$app->getSession()->setFlash('error', 'Anda Tidak mempunyai hak akses untuk melakukan penambahan');
			return $this->redirect(['index']);
		}
        
    }

    /**
     * Updates an existing Pesanan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		
		if(\Yii::$app->user->can('updatePemesanan')){
			$modelPesanan = $this->findModel($id);
			$modelListDetile = $modelPesanan->getDetilePesanans()->all();
			$persediaan_barang = Barang::find()->all();
			if ($modelPesanan->load(Yii::$app->request->post())) {

				$oldIDs = ArrayHelper::map($modelListDetile, 'id', 'id');
				$modelListDetile = Model::createMultiple(DetilePesanan::classname(), $modelListDetile);
				Model::loadMultiple($modelListDetile, Yii::$app->request->post());
				$deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelListDetile, 'id', 'id')));

				// ajax validation
				if (Yii::$app->request->isAjax) {
					Yii::$app->response->format = Response::FORMAT_JSON;
					return ArrayHelper::merge(
						ActiveForm::validateMultiple($modelListDetile),
						ActiveForm::validate($modelPesanan)
					);
				}

				// validate all models
				$valid = $modelPesanan->validate();
				$valid = Model::validateMultiple($modelListDetile) && $valid;

				if ($valid) {
					$transaction = \Yii::$app->db->beginTransaction();
					try {
						if ($flag = $modelPesanan->save(false)) {
							if (! empty($deletedIDs)) {
								DetilePesanan::deleteAll(['id' => $deletedIDs]);
							}
							foreach ($modelListDetile as $detile) {
								$detile->id_pesanan = $modelPesanan->id;
								if (! ($flag = $detile->save(false))) {
									$transaction->rollBack();
									break;
								}
							}
						}
						if ($flag) {
							$transaction->commit();
							return $this->redirect(['view', 'id' => $modelCustomer->id]);
						}
					} catch (Exception $e) {
						$transaction->rollBack();
					}
				}
			}

			return $this->render('update', [
				'modelPesanan' => $modelPesanan,
				'modelListDetile' => (empty($modelListDetile)) ? [new DetilePesanan] : $modelListDetile,
				'persediaan_barang'=>$persediaan_barang,
			]);
			
		}else{
			Yii::$app->getSession()->setFlash('error', 'Anda Tidak mempunyai hak akses untuk melakukan pengubahan data');
			return $this->redirect(['index']);
		}
        
    }

    /**
     * Deletes an existing Pesanan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
		if(\Yii::$app->user->can('deletePemesanan')){
			$model = $this->findModel($id);
		
			if($model->cekKonfirmasi()){
				\Yii::$app->getSession()->setFlash('error', 'Gagal Menghapus Pemesanan : #'.$model->id);
			}else{
				
				$model->delete();
			}

			return $this->redirect(['index']);
		}else{
			Yii::$app->getSession()->setFlash('error', 'Anda Tidak mempunyai hak akses untuk melakukan penghapusan data');
			return $this->redirect(['index']);
		}
        
    }

    /**
     * Finds the Pesanan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pesanan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pesanan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
