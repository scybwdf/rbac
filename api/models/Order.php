<?php
namespace api\models;
use yii\db\ActiveRecord;
class Order extends ActiveRecord{
    public function getCustomer(){
      return $this->hasOne(Customer::className(),array('id'=>'customer_id'))->asArray();
    }
}