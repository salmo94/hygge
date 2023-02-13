<?php

namespace common\models;


use yii\db\ActiveRecord;

/**
 * @property integer $goods_id
 * @property string $path
 */
class GoodsImage extends ActiveRecord
{

    public static function tableName()
    {
        return 'goods_images';
    }

    public function rules()
    {
        return [
            ['goods_id','integer'],
            ['path','string'],
            [['goods_id','path'],'required'],
            [['created_at','updated_at'],'safe'],
        ];
    }
}