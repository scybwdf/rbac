<?php
namespace api\models;
use yii\db\ActiveRecord;
class Customer extends ActiveRecord{
    public function getOrders(){

        return $this->hasMany(Order::className(),array('customer_id'=>'id'))->asArray();
    }
}