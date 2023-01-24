<?php

namespace common\models;

use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function tableName()
    {
        return 'categories';
    }
    public function rules()
    {
        return [
            ['title', 'required','message' => 'Поле обовязкове для вводу'],
            ['description', 'string'],
            ['status','integer'],
            [['created_at', 'updated_at'], 'safe'],
            ['is_available','safe']
        ];
    }
}