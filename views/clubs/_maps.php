<?php

use yii\bootstrap\Modal;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use app\models\City;


/* @var $this yii\web\View */
/* @var $MapkeyProvider yii\data\ActiveDataProvider */
/* @var $model \app\models\City */



?>
<script type="text/javascript">
    <? $clubs = $model->clubs;?>
    ymaps.ready(init);
    function init () {
        var myMap = new ymaps.Map("map<?=html::encode($model->code) ?>", {
                center: [<?=$clubs[0]['map_latitude']?>,<?=$clubs[0]['map_longitude']?>],
                zoom: 8
            }),
            // Создаем геообъект с типом геометрии "Точка".
            myGeoObject = new ymaps.GeoObject({
                // Описание геометрии.
                geometry: {
                    type: "Point",
                    coordinates:  [<?=$clubs[0]['map_latitude']?>,<?=$clubs[0]['map_longitude']?>],
                    controls: []
                },
                // Свойства.
                properties: {
                    // Контент метки.
                    iconContent: 'Fitness House'
                }
            }, {
                // Опции.
                // Иконка метки будет растягиваться под размер ее содержимого.
                preset: 'islands#blackStretchyIcon',
                // Метку можно перемещать.
                draggable: true
            });
        myMap.geoObjects

        <?php foreach ($clubs as $club) {?>
            .add(new ymaps.Placemark([<?=$club['map_latitude']?>,<?=$club['map_longitude']?>], {
                balloonContent: '<b><?=$club['site_name']?></b><br>Адрес: <?=$club['address']?><br>Ближайшее метро: <?=$club->getMetroMetro()?>',
                iconCaption: '<?=$club['site_name']?>'
            }, {
                preset: 'islands#redSportIcon',
                iconColor: '#3b5998',
            }))
        <? }?>
        ;}
</script>

<div class="modal fade" id="City<?=html::encode($model->id)?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Клубы на карте</h4>
            </div>
            <div class="modal-body">
                <div id="map<?=html::encode($model->code)?>" style="height: 600px"></div>

            </div>

        </div>
    </div>
</div>
