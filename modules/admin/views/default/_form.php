<?php

use kartik\depdrop\DepDrop;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Clubs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clubs-form">

    <p>Название: <?= html::encode($model->site_name) ?></p>
    <p>Адрес: <?= html::encode($model->address) ?></p>

    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'district_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\District::find()->where(['city_id' => $model->city_id])->all(), 'id', 'district'), [ 'id' => 'district_id', 'prompt' => 'Район', 'options' => ['value' => 'none']]) ?>



    <?= $form->field($model, 'metro_id')->widget(DepDrop::classname(), [
        'options' => ['id' => 'metro_id'],
        'pluginOptions'=>[
            'depends'=>['district_id'],
            'placeholder'=>'Метро',
            'url'=>Url::to(['default/metro'])
        ]
    ]); ?>

    <?= $form->field($model, 'status')->dropDownList([
            '1' => 'Показывается',
            '0' => 'Не показывается'
        ]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
