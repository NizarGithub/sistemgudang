<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\User;
use yii\helpers\Json;
use frontend\models\SignupForm;
class ManajerUserController extends Controller{
	
	
	
	public function actionIndex(){
		if(Yii::$app->user->can('masukManajemen')){
			$model = User::find()->all();
			return $this->render('index', ['model'=>$model]);
		}else{
			Yii::$app->getSession()->setFlash('error', 'Anda tidak mempunyai hak akses untuk masuk ke halaman ini');
			return $this->goHome();
		}
		
	}
	
	public function actionTambah(){
		
		if(Yii::$app->user->can('tambahUser')){
			$model = new SignupForm();
		
			if($model->load(Yii::$app->request->post())){
				if($user = $model->signup()){
					$auth = Yii::$app->authManager;
					$userAuth = $auth->getRole($model->role);
					$userReg = User::findByUsername($user->username);
					
					$auth->assign($userAuth, $userReg->id);
					
					Yii::$app->getSession()->setFlash('success', 'Berhasil menambahkan user baru');
					
					return $this->redirect(['index']);
				}
			}
			
			return $this->render('tambah', [
				'model'=>$model,
			]);
		}else{
			Yii::$app->getSession()->setFlash('error', 'Anda tidak mempunyai hak akses untuk menambahkan User');
			return $this->goHome();
		}
		
	}
	
	public function actionHapus($id){
		if(Yii::$app->user->can('hapusUser')){
			$model = $this->findModel($id);
		
			$auth = Yii::$app->authManager;
			
			$roleByUser = $auth->getRolesByUser($model->id);
			
			$role = $auth->getRole($roleByUser['user']->name);
			
			if($model->delete()){
				$auth->revoke($role, $model->id);
				Yii::$app->getSession()->setFlash('success', 'Berhasil Menghapus User dengan '.$model->username);
				return $this->redirect(['index']);
			}else{
				Yii::$app->getSession()->setFlash('error', 'Gagal Menghapus User dengan '.$model->username);
				return $this->redirect(['index']);
			}
		}else{
			Yii::$app->getSession()->setFlash('error', 'Anda tidak mempunyai hak akses untuk menghapus User');
			return $this->goHome();			
		}
		
		
	}
	
	protected function findModel($id){
		if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
	}
}