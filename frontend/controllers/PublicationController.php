<?php
namespace frontend\controllers;

use PhpMyAdmin\Di\NotFoundException;
use Yii;
use yii\web\Controller;
use  common\models\Publication;
use yii\web\NotFoundHttpException;


/**
 * Site controller
 */
class PublicationController extends Controller
{
    public function actionAll()
    {
        $publications = Publication::find()->andWhere(['status'=>1])->all();
        return $this->render('all', ['publications' => $publications]);
    }

     public function actionOne($url)
      {
          if($publication = Publication::find()->andWhere(['url'=>$url])->one()){
              return $this->render('one', ['publication' => $publication]);
          }
          throw new NotFoundHttpException('Publication ' .$url. ' not found');
      }
    /*

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Publication();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
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
        if (($model = Publication::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
*/
}