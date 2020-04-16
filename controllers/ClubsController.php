<?php

namespace app\controllers;

use app\models\City;
use app\models\Metro;
use Yii;
use app\models\District;
use app\models\ClubsSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ClubsController implements the CRUD actions for Clubs model.
 */
class ClubsController extends Controller
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

    /**
     * Lists all Clubs models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new ClubsSearch();
        $ClubsProvider = $searchModel->search(Yii::$app->request->post());
        $MapkeyProvider = new ActiveDataProvider([
            'query' => City::find()->InnerJoinWith('clubs')->andWhere(['status' => 1]),
            'pagination' => false,
        ]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'ClubsProvider' => $ClubsProvider,
            'MapkeyProvider'=>$MapkeyProvider,

        ]);
    }

    /**
     * @return string
     */


    public function actionDistrict() {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $city_id = $parents[0];
                $out = self::getDistrict($city_id);
                return ['output'=>$out, 'selected'=>''];
            }
        }
        return ['output'=>'', 'selected'=>''];
    }

    public function actionMetro() {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $ids = $_POST['depdrop_parents'];
            $city_id = empty($ids[0]) ? null : $ids[0];
            $district_id = empty($ids[1]) ? null : $ids[1];
            if ($city_id != null) {
                $data = self::getMetro($district_id);

                return ['output'=>$data, 'selected'=>''];
            }
        }
        return ['output'=>'', 'selected'=>''];
    }

    protected function getDistrict($city_id)
    {
        $data=District::find()
            ->where(['city_id' => $city_id])
            ->select(['id','district AS name'])->asArray()->all();
        return $data;
    }

    protected function getMetro($district_id)
    {
        $data=Metro::find()
            ->where(['district_id' => $district_id])
            ->select(['id as id', 'metro AS name'])->asArray()->all();
        return $data;
    }

}
