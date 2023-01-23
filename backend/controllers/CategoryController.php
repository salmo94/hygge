<?php

namespace backend\controllers;

use common\models\Category;
use Yii;
use yii\web\Controller;

class CategoryController extends Controller
{
    public function actionCreate()
    {
        $category = new Category();
        if (Yii::$app->request->isPost) {
            var_dump(Yii::$app->request->post());
            die;
        }
        return $this->render('create', ['category' => $category]);
    }
}