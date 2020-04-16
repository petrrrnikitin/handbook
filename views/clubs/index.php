<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ClubsSearch */



$this->title = 'Веб-справочник';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clubs-index">

    <h1><?= Html::encode($this->title) ?></h1>



    <?php Pjax::begin(); ?>
    <?= $this->render('_search', ['model' => $searchModel]); ?>

    <?= ListView::widget([
        'dataProvider' => $ClubsProvider,
        'itemView' => '_item',

    ]); ?>
    <?php Pjax::end(); ?>
    <script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    <?= ListView::widget([
        'dataProvider' => $MapkeyProvider,
        'itemView' => '_maps',
    ]) ?>



</div>






