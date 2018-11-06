<?php
namespace frontend\controllers;

use PhpMyAdmin\Di\NotFoundException;
use Yii;
use yii\web\Controller;
use common\models\Publication;
use yii\web\NotFoundHttpException;
use yii\data\Pagination;


/**
 * Publication controller
 */
class PublicationController extends Controller
{
    const STATUS_ACTIVE = 1;
    //TODO: add PhpDoc
    public function actionAll()
    {
        //TODO: magic numbers to constants

        //TODO: return data in JSON format
        //TODO: add portion loading ($limit, $offset)

        $query = Publication::find()->andWhere(['status'=>self::STATUS_ACTIVE]);

        $pagination = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 3,
            'pageSizeParam' => false,
            'forcePageParam' => false,
        ]);

        $publications = $query->offset($pagination->offset)->limit($pagination->limit)->all();

        return $this->render('all', ['publications' => $publications, 'pagination' => $pagination]);

    }

    //TODO: update formatting
    //TODO: add PhpDoc
    public function actionOne($url)
    {
        if($publication = Publication::find()->andWhere(['url'=>$url])->one())
        {
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