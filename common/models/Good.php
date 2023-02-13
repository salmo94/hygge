<?php

namespace common\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

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
     * @var UploadedFile[]
     */
    public array $imageFiles;
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
            [['imageFiles'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'maxFiles' => 4],
        ];
    }

    /**
     * @return ActiveQuery
     */

    public function getCategory(): ActiveQuery
    {
        return $this->hasOne(Category::class,['id' => 'category_id']);
    }



    public function upload()
    {
        if ($this->validate(['imageFiles'])) {
             FileHelper::createDirectory('images/' . $this->id);
            foreach ($this->imageFiles as $file) {
                $path = 'images/'. $this->id . '/' . $file->baseName . '.' . $file->extension;
                $isFileSaved = $file->saveAs($path);
                if ($isFileSaved){
                    $goodsImage = new GoodsImage();
                    $goodsImage->goods_id = $this->id;
                    $goodsImage->path = $path;
                    $goodsImage->save();
                }
            }
            return true;
        } else {
            return false;
        }
    }

    public function getImages(): ActiveQuery
    {
        return $this->hasMany(GoodsImage::class,['goods_id' => 'id']);
    }
}
