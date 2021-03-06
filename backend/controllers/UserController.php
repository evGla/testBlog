<?php

namespace backend\controllers;

use Yii;
use common\models\user;
use common\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


class UserController extends Controller
{
    /**
     * {@inheritdoc}
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
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['index' , 'view' , 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['canAdmin'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->userId]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->userId]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionRole(){
        /*
        //Создание ролей
          $admin = Yii::$app->authManager->createRole('admin');
          $admin->description = 'Admin';
          Yii::$app->authManager->add($admin);

          $user = Yii::$app->authManager->createRole('user');
          $user->description = 'User';
          Yii::$app->authManager->add($user);

          $banned = Yii::$app->authManager->createRole('banned');
          $banned->description = 'Banned user';
          Yii::$app->authManager->add($banned);
          ----

        // Создание прав
          $permit = Yii::$app->authManager->createPermission('canAdmin');
          $permit->description = 'Право на вход в админку';
          Yii::$app->authManager->add($permit);

          ----
          // Наследование прав и ролей
          $role = Yii::$app->authManager->getRole('admin');
          $permit = Yii::$app->authManager->getPermission('canAdmin');
          Yii::$app->authManager->addChild($role, $permit);

          -----
        // Привязка ролей к пользователю
          $userRole = Yii::$app->authManager->getRole('admin');
          Yii::$app->authManager->assign($userRole, Yii::$app->user->getId(1));


          $userRole = Yii::$app->authManager->getRole('user');
          Yii::$app->authManager->assign($userRole, Yii::$app->user->getId(3));
        */
        return 'success';
    }
}
