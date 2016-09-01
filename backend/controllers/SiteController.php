<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
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
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
	
	public function actionTambahRole(){
		$auth = Yii::$app->authManager;
		
		/** Membuat Hak Akses untuk Barang **/
		
		$tambahBarang = $auth->createPermission('tambahBarang');
		$tambahBarang->description = "Penambahan Barang";
		$auth->add($tambahBarang);
		
		$updateBarang = $auth->createPermission('updateBarang');
		$updateBarang->description = "Perubahan Barang";
		$auth->add($updateBarang);
		
		$deleteBarang = $auth->createPermission('deleteBarang');
		$deleteBarang->description = "Penghapusan Barang";
		$auth->add($deleteBarang);
		
		$viewBarang = $auth->createPermission('viewBarang');
		$viewBarang->description = "Melihat Barang";
		$auth->add($viewBarang);
		
		/** Membuat Hak Akses untuk Barang **/
		
		$tambahPemesanan = $auth->createPermission('tambahPemesanan');
		$tambahPemesanan->description = "Penambahan Pemesanan";
		$auth->add($tambahPemesanan);
		
		$updatePemesanan = $auth->createPermission('updatePemesanan');
		$updatePemesanan->description = "Update Pemesanan";
		$auth->add($updatePemesanan);
		
		$deletePemesanan = $auth->createPermission('deletePemesanan');
		$deletePemesanan->description = "Penghapusan Pemesanan";
		$auth->add($deletePemesanan);
				
		$viewPemesanan = $auth->createPermission('viewPemesanan');
		$viewPemesanan->description = "Melihat Pemesanan";
		$auth->add($viewPemesanan);
		
		/** Membuat Hak Akses untuk Jenis Barang **/
		
		/** Membuat user Role  **/
		$user = $auth->createRole('user');
		$auth->add($user);
		$auth->addChild($user, $tambahPemesanan);
		$auth->addChild($user, $viewPemesanan);
		
		
		/** Membuat admin Role  **/
		$admin = $auth->createRole('admin');
		$auth->add($admin);
		$auth->addChild($admin, $tambahBarang);
		$auth->addChild($admin, $updateBarang);
		$auth->addChild($admin, $deleteBarang);
		$auth->addChild($admin, $viewBarang);
		$auth->addChild($admin, $deletePemesanan);
		$auth->addChild($admin, $updatePemesanan);
		$auth->addChild($admin, $user);
		
		
		/**
		// add "createPost" permission
        $createPost = $auth->createPermission('createPost');
        $createPost->description = 'Create a post';
        $auth->add($createPost);

        // add "updatePost" permission
        $updatePost = $auth->createPermission('updatePost');
        $updatePost->description = 'Update post';
        $auth->add($updatePost);

        // add "author" role and give this role the "createPost" permission
        $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $createPost);

        // add "admin" role and give this role the "updatePost" permission
        // as well as the permissions of the "author" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $updatePost);
        $auth->addChild($admin, $author);

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        $auth->assign($author, 2);
        $auth->assign($admin, 1);
		**/
	}

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
