<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Clubinfo */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="clubinfo-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row inline-checkbox">
        <div class="col-xs-3">
            <?= $form->field($model, 'pool')->checkbox()?>
        </div>

        <div class="col-xs-3">
            <?= $form->field($model, 'childrenroom')->checkbox() ?>
        </div>

        <div class="col-xs-3">
            <?= $form->field($model, 'tennistable')->checkbox() ?>
        </div>

        <div class="col-xs-3">
            <?= $form->field($model, 'parking')->checkbox() ?>
        </div>


    </div>


    <?= $form->field($model, 'maininfo')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'gyminfo')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'poolinfo')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'spainfo')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'fightinfo')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'grouptraininfo')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'childreninfo')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'tennisinfo')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'barinfo')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'creditinfo')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'massageinfo')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'schedulelink')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'abonementslink')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fitneslink')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
