<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClubsSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="clubs-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'id' => 'clubs-search',
        'method' => 'post',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'city_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\City::find()->all(), 'id', 'name'), [ 'prompt' => 'Город', 'options' => ['value' => 'none']]) ?>

    <?= $form->field($model, 'district_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\District::find()->all(), 'id', 'district'), ['prompt' => 'Район', 'options' => ['value' => 'none']]) ?>

    <?= $form->field($model, 'metro_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Metro::find()->all(), 'id', 'metro'), ['prompt' => 'Метро', 'options' => ['value' => 'none' ]]) ?>

    <?= $form->field($model, 'category')->dropDownList(([
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4',
        '5' => '5',
        '6' => '6',
        '7' => '7',
        '8' => '8',
        '9' => '9',
    ]), ['prompt' => 'Категорию', 'options' => ['value' => 'none']]) ?>


    <div class="form-group">
        <?= Html::submitButton('Подобрать', ['class' => 'btn btn-primary filters-btn']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
