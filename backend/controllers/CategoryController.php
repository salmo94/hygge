<?php

namespace backend\controllers;

use common\models\Category;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

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

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */

    public function actionView($id)

    {
        $category = Category::findOne($id);
        if ($category === null){
            throw new NotFoundHttpException('Not found category id :' . $id );
        }

        return $this->render('show',[
            'category' => $category,
        ]);
    }
}
