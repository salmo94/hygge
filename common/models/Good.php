<?php

namespace common\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property string $title
 * @property string $description
 * @property integer $price
 * @property integer $article
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property boolean $is_available
 * @property boolean $is_deleted
 * @property int $category_id
 * @property-read Category $category
 */

class Good extends ActiveRecord
{
    /**
     * @return string
     */
    public static function tableName(): string
    {
        return 'goods';
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            ['title', 'required', 'message' => 'Поле обовʼязкове для вводу'],
            ['description', 'string'],
            [['price', 'article', 'status', 'category_id'], 'integer'],
            [['is_available', 'is_deleted'], 'boolean'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @return ActiveQuery
     */

    public function getCategory(): ActiveQuery
    {
        return $this->hasOne(Category::class,['id' => 'category_id']);
    }
}
