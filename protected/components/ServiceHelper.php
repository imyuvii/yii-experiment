<?php
/**
 * Created by PhpStorm.
 * User: Yuvraj
 * Date: 2/27/2015
 * Time: 10:32 PM
 */

class ServiceHelper extends CApplicationComponent{
    public static function serviceCall($params,$service)
    {
        $curl = curl_init();
        $url = Yii::app()->params['serviceUrl'].$service;

        Yii::trace('URL: '.$url);
        Yii::trace('Request: '. $params);

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($params))
        );

        $resp = curl_exec($curl);
        Yii::trace('Response: '.$resp);
        curl_close($curl);
        $result = CJSON::decode($resp);
        if($result['errorCode'] == 101){
            //Yii::app()->request->redirect(array('rewardPartner/logout'));
        } else {
            return $resp;
        }
    }

    public static function openServiceCall($params,$service)
    {
        $curl = curl_init();
        $url = Yii::app()->params['openCallsUrl'].$service;

        Yii::trace('Open Service URL: '.$url);
        Yii::trace($params);

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($params))
        );

        $resp = curl_exec($curl);
        Yii::trace($resp);
        curl_close($curl);
        return $resp;
    }

    public static function getCategories(){
        $response = json_decode(ServiceHelper::openServiceCall('','getAllCategories'));
        $categories = array();
        if($response->result == true){
            foreach($response->data as $category){
                //echo $category->_id;
                $categories[$category->_id]=$category->name;
            }
        } else {
            Yii::trace('Category Error: '.$response->errorDescription);
        }
        return json_encode($categories);
    }

    public static function getAreas(){
        $response = json_decode(ServiceHelper::openServiceCall('','getAllAreas'));

        //Yii::trace('All Areas '.$response->data);

        $areas = array();
        if($response->result==true){
            foreach($response->data as $area){
                $areas[$area->_id]=$area->name;
            }
        } else {
            Yii::trace('getAllArea Error: '.$response->errorDescription);
        }

        return $areas;
        //echo json_decode($areas);

    }

    public static function cMenuName($name){
        $icon = '';
        switch($name){
            case 'Campaigns':
                $icon = 'flag';
                break;
            case 'Reports':
                $icon = 'docs';
                break;
            case 'Locations':
                $icon = 'pointer';
                break;
            case 'Team':
                $icon = 'users';
                break;
            case 'Invoices':
                $icon = 'note';
                break;
        }
        if($name == ucfirst(Yii::app()->controller->id)){
            return "<i class='icon-$icon'></i><span class='title'>$name</span><span class='selected'></span>";
        } else {
            return "<i class='icon-$icon'></i><span class='title'>$name</span>";
        }
        //return Yii::app()->controller->id;
    }
}
