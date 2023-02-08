<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property boolean $is_available
 * @property boolean $is_deleted
 * @property int $parent_id
 * @property-read Category $parent
 */
class Category extends ActiveRecord
{
    /**
     * @return string
     */
    public static function tableName(): string
    {
        return 'categories';
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            ['title', 'required','message' => 'Поле обовязкове для вводу'],
            ['description', 'string'],
            ['status','integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['is_available','is_deleted'],'boolean'],
            ['parent_id','integer'],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent(): \yii\db\ActiveQuery
    {
        return $this->hasOne(Category::class,['id' => 'parent_id']);
    }
}
