<?php
namespace api\models;
use yii\db\ActiveRecord;
class User extends ActiveRecord{
    public static function tableName()
    {
        return 'wf_user';
    }
}