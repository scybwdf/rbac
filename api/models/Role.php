<?php
namespace api\models;
use yii\db\ActiveRecord;
class Role extends ActiveRecord{
    public static function tableName()
    {
        return 'wf_role';
    }
}