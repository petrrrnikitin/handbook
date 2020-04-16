<?php

use app\models\ClubsSearch;
use app\models\Metro;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\web\View;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;


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




    <?= $form->field($model, 'city_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\City::find()->all(), 'id', 'name'), [ 'id' => 'city_id','prompt' => 'Город', 'options' => ['value' => 'none']]) ?>

    <?=  $form->field($model, 'district_id')->widget(DepDrop::classname(), [
        'options'=>['id'=>'district_id'],
        'pluginOptions'=>[
            'depends'=>['city_id'],
            'placeholder'=>'Район',
            'url'=>Url::to(['/clubs/district'])
        ]
    ]); ?>

    <?= $form->field($model, 'metro_id')->widget(DepDrop::classname(), [
        'options' => ['id' => 'metro_id'],
        'pluginOptions'=>[
            'depends'=>['city_id','district_id'],
            'placeholder'=>'Метро',
            'url'=>Url::to(['/clubs/metro'])
        ]
    ]); ?>
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
    ]), ['prompt' => 'Категория', 'options' => ['value' => 'none']]) ?>

    <?= $form->field($model, 'pool')->dropDownList(['1' => 'Да','0' => 'Нет'],['prompt' => 'Бассейн','options'=>['value' => 'none']]); ?>

    <?= $form->field($model, 'childrenroom')->dropDownList(['1' => 'Да','0' => 'Нет'],['prompt' => 'Детская комната','options'=>['value' => 'none']]); ?>

    <?= $form->field($model, 'tennistable')->dropDownList(['1' => 'Да','0' => 'Нет'],['prompt' => 'Теннисный стол','options'=>['value' => 'none']]); ?>

    <?= $form->field($model, 'parking')->dropDownList(['1' => 'Да','0' => 'Нет'],['prompt' => 'Парковка','options'=>['value' => 'none']]); ?>

    <div class="form-group">
        <?= Html::submitButton('Подобрать', ['class' => 'btn btn-primary filters-btn']) ?>
    </div>



    <?php ActiveForm::end(); ?>

</div>
