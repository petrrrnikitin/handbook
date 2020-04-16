<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Clubinfo;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * ClubinfoController implements the CRUD actions for Clubinfo model.
 */
class ClubinfoController extends Controller
{
    /**
     * {@inheritdoc}
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

    public function actionDo($club_num)
    {
        if (($model = Clubinfo::findOne(['club_num' => $club_num])) !== null) {
            $model = Clubinfo::findOne(['club_num' => $club_num]);
        } else {
            $model = new Clubinfo();
            $model->club_num = $club_num;
        }


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Информация о клубе обновлена');
            return $this->redirect(['/admin']);
        }

        return $this->render('do', [
            'model' => $model
        ]);

    }

    /**
     * Finds the Clubinfo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $club_num
     * @return Clubinfo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($club_num)
    {
        if (($model = Clubinfo::findOne(['club_num' => $club_num])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
