<?php


namespace app\modules\admin\controllers;


use app\components\rpc\XmlRpcPublisher;
use app\models\City;
use app\models\Clubs;
use app\models\District;
use app\models\Price;
use app\models\Metro;
use ErrorException;
use SimpleXMLElement;
use Yii;


class UpdateController extends DefaultController
{


    public function actionCity()
    {
        $rpc = new XmlRpcPublisher('request_server');
        $xmlmsg = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<REQUEST type="get_clubs">
    <OPTIONS/>
</REQUEST>
XML;

        $get_as_attr = isset($argv[1]) && !empty($argv[1]) && $argv[1] === 'yes' ? $argv[1] : 'no';

        $xml = new SimpleXMLElement($xmlmsg);

        $xml->OPTIONS->addAttribute('get_as_attr', $get_as_attr);
        try {
            $response = $rpc->call($xml->asXML());
        } catch (ErrorException $e) {
            echo $e->getMessage();
        }
        file_put_contents("../clubs.xml", $response);


        $response_string = "../clubs.xml";
        $parse = simplexml_load_file($response_string);
        foreach ($parse->xpath('//CITIES/CITY') as $city) {

            $model = City::findOne((int)$city['id']) ?: new City();

            $model->id = (int)$city['id'];
            $model->code = (string)$city['code'];
            $model->name = (string)$city['name'];
            $model->service_phone_code = (int)$city['service_phone_code_size'];
            $model->service_phone = (int)$city['service_phone'];
            $model->msktz_bias_min = (int)$city['msktz_bias_min'];

            $model->save(false);
        }
        Yii::$app->session->setFlash('success', 'Города обновлены');
        return $this->redirect(['/admin']);
    }

    public function actionClubs()
    {
        $rpc = new XmlRpcPublisher('request_server');
        $xmlmsg = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<REQUEST type="get_clubs">
    <OPTIONS/>
</REQUEST>
XML;

        $get_as_attr = isset($argv[1]) && !empty($argv[1]) && $argv[1] === 'yes' ? $argv[1] : 'no';

        $xml = new SimpleXMLElement($xmlmsg);

        $xml->OPTIONS->addAttribute('get_as_attr', $get_as_attr);
        try {
            $response = $rpc->call($xml->asXML());
        } catch (ErrorException $e) {
            echo $e->getMessage();
        }
        file_put_contents("../clubs.xml", $response);


        $response_string = "../clubs.xml";
        $parse = simplexml_load_file($response_string);
        foreach ($parse->xpath('//CLUBS/CLUB') as $club) {

            $model = Clubs::findOne((int)$club['num']) ?: new Clubs();

            $model->num = (int)$club['num'];
            $model->site_name = (string)$club['site_name'];
            $model->address = (string)$club['address'];
            $model->category = (int)$club['category'];
            $model->city_id = (int)$club['city_id'];
            $model->type = (int)$club['type'];
            $model->active = (bool)$club['active'];
            $model->map_latitude = (string)$club['map_latitude'];
            $model->map_longitude = (string)$club['map_longitude'];

            $model->save(false);

        }
        Yii::$app->session->setFlash('success', 'Клубы обновлены');
        return $this->redirect(['/admin']);
    }

    public function actionPrice()
    {
        $rpc = new XmlRpcPublisher('request_server');
        $xmlmsg = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<REQUEST type="get_pricelist">
    <OPTIONS/>
</REQUEST>
XML;

        $get_as_attr = isset($argv[1]) && !empty($argv[1]) && $argv[1] === 'yes' ? $argv[1] : 'no';

        $xml = new SimpleXMLElement($xmlmsg);

        $xml->OPTIONS->addAttribute('get_as_attr', $get_as_attr);
        try {
            $response = $rpc->call($xml->asXML());
        } catch (ErrorException $e) {
            echo $e->getMessage();
        }
        file_put_contents("../price.xml", $response);

        Price::deleteAll();

        $response_string = "../price.xml";
        $parse = simplexml_load_file($response_string);
        foreach ($parse->xpath('//PRICELIST/POSITION') as $position) {
            $model = new Price();

            $model->club_num = (int)$position['club_num'];
            $model->type = (string)$position['type'];
            $model->price = (int)$position['price'];
            $model->period = (string)$position['period'];
            $model->cardtime = (string)$position['cardtime'];
            $model->webdiscount = (int)$position['webdiscount'];

            $model->save(false);

        }
        Yii::$app->session->setFlash('success', 'Прайс обновлен');
        return $this->redirect(['/admin']);

    }
    public function actionDistrict()
    {

        $response_string = "../district.xml";
        $parse = simplexml_load_file($response_string);
        foreach ($parse->xpath('//DISTRICTS/DISTRICT') as $district) {

            $model = new District();


            $model->district = (string)$district['district'];
            $model->city_id = (integer)$district['city_id'];


            $model->save(false);
        }
        Yii::$app->session->setFlash('success', 'Районы обновлены');
        return $this->redirect(['/admin']);
    }
    public function actionMetro()
    {
        Metro::deleteAll();
        $response_string = "../district.xml";
        $parse = simplexml_load_file($response_string);
        foreach ($parse->xpath('//METROS/METRO') as $metro) {

            $model = new Metro();

            $model->metro = (string)$metro['metro'];
            $model->district_id = (integer)$metro['district_id'];

            $model->save(false);
        }
        Yii::$app->session->setFlash('success', 'Метро обновлены');
        return $this->redirect(['/admin']);
    }

}