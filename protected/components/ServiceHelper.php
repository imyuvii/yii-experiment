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

    public static function openServiceCall($params,$service)
    {
        $curl = curl_init();
        $url = Yii::app()->params['openCallsUrl'].$service;

        Yii::trace('URL: '.$url);
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
}
