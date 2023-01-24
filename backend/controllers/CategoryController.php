<?php

namespace backend\controllers;

use common\models\Category;
use Yii;
use yii\web\Controller;

class CategoryController extends Controller
{
    /**
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $category = new Category();
        $categoriesForSelect = Category::find()->select('title')->indexBy('id')->column();

        if (Yii::$app->request->isPost && $category->load(Yii::$app->request->post()) && $category->save()) {
            return $this->redirect(Yii::$app->request->referrer);
        }

        return $this->render('create', [
            'category' => $category,
            'categories' => $categoriesForSelect,
        ]);
    }
}
