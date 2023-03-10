<?php

namespace backend\controllers;

use backend\models\CategorySearch;
use common\models\Category;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class CategoryController extends Controller
{
    /**
     * @return string|Response
     */
    public function actionCreate()
    {
        $category = new Category();

        $categoriesForSelect = Category::find()->select('title')->where(['is_deleted' => false])->indexBy('id')->column();

        if (Yii::$app->request->isPost && $category->load(Yii::$app->request->post()) && $category->save()) {
            return $this->redirect(['view','id' => $category->id]);
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

    public function actionView($id): string

    {
        $category = Category::findOne($id);
        if ($category === null) {
            throw new NotFoundHttpException('Not found category id :' . $id);
        }
        return $this->render('show', [
            'category' => $category,
        ]);
    }

    /**
     * @return string
     */

    public function actionIndex(): string
    {
        $categorySearch = new CategorySearch();
        $dataProvider = $categorySearch->search(Yii::$app->request->get());
        $categoriesForSelect = Category::find()->select('title')->where(['is_deleted' => false])->indexBy('id')->column();
        return $this->render('index', [
            'searchModel' => $categorySearch,
            'dataProvider' => $dataProvider,
            'categories' => $categoriesForSelect,
        ]);
    }

    /**
     * @param $id
     * @return string|Response
     */

    public function actionUpdate($id)
    {
        $category = Category::findOne($id);
        if ($category->load(Yii::$app->request->post()) && $category->save()){
            return $this->redirect(['index']);
        }
        $categoriesForSelect = Category::find()->select('title')->where(['is_deleted' => false])->indexBy('id')->column();

        return $this->render('update', [
            'category' => $category,
            'categories' => $categoriesForSelect
        ]);

    }

    /**
     * @param $id
     * @return void|Response
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */

    public function actionDelete($id)
    {
        $category = Category::findOne($id);
        $category->is_deleted = true;
        $category->save();
        return $this->redirect(['index']);
    }
}
