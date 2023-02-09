<?php

namespace backend\models;

use common\models\Good;
use yii\data\ActiveDataProvider;

class GoodSearch extends Good
{
    /**
     * @return array
     */

    public function rules(): array
    {
        return [
            [['id', 'price', 'article', 'status', 'category_id'], 'integer'],
            [['title', 'description', 'created_at', 'updated_at'], 'string'],
            ['is_available', 'boolean']
        ];
    }

    /**
     * @param array $params
     * @return ActiveDataProvider
     */

    public function search(array $params): ActiveDataProvider
    {
        $query = Good::find();
        $query->where(['is_deleted' => false]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        $query->andFilterWhere(['id' => $this->id]);
        $query->andFilterWhere(['price' => $this->price]);
        $query->andFilterWhere(['article' => $this->article]);
        $query->andFilterWhere(['status' => $this->status]);
        $query->andFilterWhere(['category_id' => $this->category_id]);
        $query->andFilterWhere(['like', 'title', $this->title]);
        $query->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
