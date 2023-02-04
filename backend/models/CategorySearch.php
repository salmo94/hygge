<?php

namespace backend\models;

use common\models\Category;
use yii\data\ActiveDataProvider;

class CategorySearch extends Category
{
    /**
     * @return array
     */

    public function rules(): array
    {
        return [
            [['id', 'status', 'parent_id'], 'integer'],
            [['title', 'description', 'created_at', 'updated_at'], 'string'],
            ['is_available', 'boolean'],
        ];
    }

    /**
     * @param array $params
     * @return ActiveDataProvider
     */

    public function search(array $params)
    {
        $query = Category::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        $query->andFilterWhere(['id' => $this->id]);

        $query->andFilterWhere(['status' => $this->status]);

        $query->andFilterWhere(['parent_id' => $this->parent_id]);

        $query->andFilterWhere(['is_available' => $this->is_available]);

        $query->andFilterWhere(['like', 'title', $this->title]);

        $query->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
