<?php

use app\models\Clubinfo;
use yii\helpers\Html;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\Clubinfo */

$this->title = 'Информация: ' . $model->clubNum->site_name;
$this->params['breadcrumbs'][] = ['label' => 'Clubinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->club_num, 'url' => ['view', 'id' => $model->club_num]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="clubinfo-do">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

