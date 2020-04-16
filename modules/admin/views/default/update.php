<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Clubs */

$this->title = 'Изменить клуб: ' . $model->site_name;
$this->params['breadcrumbs'][] = ['label' => 'Clubs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->num, 'url' => ['view', 'id' => $model->num]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="clubs-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
