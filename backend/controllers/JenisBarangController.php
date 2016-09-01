<?php

namespace backend\controllers;

use Yii;
use app\models\JenisBarang;
use app\models\JenisBarangSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * JenisBarangController implements the CRUD actions for JenisBarang model.
 */
class JenisBarangController extends Controller
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
	
	public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
			'page' => [
                'class' => 'yii\web\ViewAction',
            ],
        ];
    }

    /**
     * Lists all JenisBarang models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JenisBarangSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single JenisBarang model.
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
     * Creates a new JenisBarang model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		if(Yii::$app->user->can('tambahJenis')){
			$model = new JenisBarang();
			$kode_generate = $model->generateKodeJenis();
			$model->kode_jenis = $kode_generate;
			if ($model->load(Yii::$app->request->post()) && $model->save()) {
				return $this->redirect(['view', 'id' => $model->id]);
			} else {
				return $this->render('create', [
					'model' => $model,
				]);
			}
		}else{
			Yii::$app->getSession()->setFlash('error','Maaf, Anda tidak mempunyai hak akses dalam melakukan penambahan data');
			
			return $this->redirect(['index']);
		}
        
    }

    /**
     * Updates an existing JenisBarang model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		if(Yii::$app->user->can('updateJenis')){
			$model = $this->findModel($id);

			if ($model->load(Yii::$app->request->post()) && $model->save()) {
				return $this->redirect(['view', 'id' => $model->id]);
			} else {
				return $this->render('update', [
					'model' => $model,
				]);
			}
		}else{
			Yii::$app->getSession()->setFlash('error', 'Maaf Anda tidak memiliki Hak Akses untuk melakukan Perubahan Data');
			return $this->redirect(['index']);
		}
        
    }

    /**
     * Deletes an existing JenisBarang model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
		if(Yii::$app->user->can('deleteJenis')){
			$this->findModel($id)->delete();

			return $this->redirect(['index']);
		}else{
			Yii::$app->getSession->setFlash('error', 'Maaf Anda tidak memiliki hak akses untuk melakukan penghapusan data');
		}
        
    }

    /**
     * Finds the JenisBarang model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return JenisBarang the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = JenisBarang::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
