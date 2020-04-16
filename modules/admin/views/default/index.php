<?php

use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClubsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Клубы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clubs-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить прайс', ['update/price'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Обновить клубы', ['update/clubs'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Обновить города', ['update/city'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Обновить районы', ['update/district'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Обновить метро', ['update/metro'], ['class' => 'btn btn-success']) ?>
    </p>


    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'site_name',
            ['attribute'  => 'city_id',
              'label' => 'Город',
              'format' => 'text',
              'content' => function($data){
                return $data->getCityName();
              },

                ],
            ['attribute'  => 'district_id',
                'label' => 'Район',
                'format' => 'text',
                'content' => function($data){
                    return $data->getDistrictDistrict();
                },

            ],
            ['attribute'  => 'metro_id',
                'label' => 'Метро',
                'format' => 'text',
                'content' => function($data){
                    return $data->getMetroMetro();
                },

            ],
            'address',
            'category',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($data){
                    return $data->status ? '<span class="text-success">Показывается</span>' : '<span class="text-danger">Не показывается</span>';
                }
            ],

            [
                'attribute' => 'Информация',
                'value' => function ($model, $key, $index, $column) {
                    return Html::a('<i class="glyphicon glyphicon-plus"></i>', Url::to(['clubinfo/do', 'club_num' => $model->num]));
                },
                'format' => 'raw',
            ],
            ['class' => 'yii\grid\ActionColumn',
                'header'=>'Изменить',
                'headerOptions' => ['width' => '80'],
                'template' => '{update}',
                ],
        ],
    ]); ?>


</div>
