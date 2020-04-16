<?php

use yii\helpers\Html;
use app\models\Clubs;



/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model \app\models\Clubs */




?>

<div class="club<?=html::encode($model->num)?>">

    <div class="club-name"><?=html::encode($model->site_name)?></div>
    <div class="club-address">Адрес: <?=html::encode($model->address)?></div>
    <div class="club-links">


        <a href="<?=html::encode($model->clubinfos->abonementslink) ?>" target="_blank"><button class="btn club-btn">Прайс  ИМ <br> абонементы</button></a>
        <a href="<?=html::encode($model->clubinfos->fitneslink) ?>" target="_blank"><button class="btn club-btn">Прайс  ИМ <br> фитнес</button></a>
        <a href="<?=html::encode($model->clubinfos->schedulelink)?>" target="_blank"><button class="btn club-btn">Расписание</button></a>
        <button type="button" class="btn club-btn" data-toggle="modal" data-target="#City<?=html::encode($model->city_id) ?>">
            Клубы на карте
        </button>
        <button class="btn club-btn" type="button" data-toggle="collapse" data-target="#collapse<?=html::encode($model->num)?>" aria-expanded="false" aria-controls="collapseExample">
            Прайс клубный
        </button>

</div>


    <div class="collapse" id="collapse<?=html::encode($model->num) ?>">
        <div class="well">
            <div class="price">
                <?  $prices = $model->prices;
                if($prices[0] !== null){ ?>
                    <table class="table table-bordered">
                        <tr>
                            <th>Позиция</th>
                            <th>Цена</th>
                        </tr>

                        <?php foreach($prices as $item):?>
                        <tr>
                            <td><?= $item['type'] ?></td>
                            <td><?= $item['price']?></td>
                            <? endforeach;?>

                        </tr>
                    </table>
              <?  }
                else echo "Прайса для данного клуба нет"
                ?>


            </div>
        </div>
    </div>
    <div class="club-info">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th data-tooltip="<?=html::encode($model->clubinfos->maininfo)?>" scope="col">Основная информация</th>
                <th data-tooltip="<?=html::encode($model->clubinfos->gyminfo)?>" scope="col">Тренажерный Зал</th>
                <th data-tooltip="<?=html::encode($model->clubinfos->poolinfo)?>" scope="col">Бассейн</th>
                <th data-tooltip="<?=html::encode($model->clubinfos->spainfo)?>" scope="col">СПА-зона</th>
                <th data-tooltip="<?=html::encode($model->clubinfos->fightinfo)?>" scope="col">Зал единоборств</th>
                <th data-tooltip="<?=html::encode($model->clubinfos->grouptraininfo)?>" scope="col">Залы групповых занятий</th>
                <th data-tooltip="<?=html::encode($model->clubinfos->childreninfo)?>" scope="col">Детская комната</th>
                <th data-tooltip="<?=html::encode($model->clubinfos->tennisinfo)?>" scope="col">Теннис</th>
                <th data-tooltip="<?=html::encode($model->clubinfos->barinfo)?>" scope="col">Бар</th>
                <th data-tooltip="<?=html::encode($model->clubinfos->creditinfo)?>" scope="col">Рассрочка</th>
                <th data-tooltip="<?=html::encode($model->clubinfos->massageinfo)?>" scope="col">Массажный кабинет</th>
            </tr>
            </thead>
        </table>
    </div>

</div>