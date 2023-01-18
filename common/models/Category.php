<?php

namespace common\models;

use yii\db\ActiveRecord;

class Category extends ActiveRecord
{

    public static function tableName()
    {
        return 'category';


    }

    public function rules()
    {
        return [
         [ ['id','title'],'required'],
            ['description','string'],
            [['created_at','updated_at'],'safe']
        ];
    }
}