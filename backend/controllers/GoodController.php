<?php

namespace backend\controllers;

use backend\models\GoodSearch;
use common\models\Category;
use common\models\Good;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class GoodController extends Controller
{
    /**
     * @return string|Response
     */

    public function actionCreate()
    {
        $good = new Good();
        $categoriesForSelect = Category::find()->select('title')->where(['is_deleted' => false])->indexBy('id')->column();
        if (Yii::$app->request->isPost && $good->load(Yii::$app->request->post()) && $good->save()) {
            return $this->redirect(['view','id' => $good->id]);
        }
        return $this->render('create', [
            'good' => $good,
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
        $good = Good::findOne($id);
        if ($good === null){
            throw new NotFoundHttpException('Not found good id:' . $id);
        }
        return $this->render('show',[
           'good' => $good,
        ]);
    }

    /**
     * @return string
     */

    public function actionIndex(): string
    {
        $goodSearch = new GoodSearch();
        $dataProvider = $goodSearch->search(Yii::$app->request->get());
        $categoriesForSelect = Category::find()->select('title')->where(['is_deleted' => false])->indexBy('id')->column();
        return $this->render('index',[
           'searchModel' => $goodSearch,
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
        $good = Good::findOne($id);
        if ($good->load(Yii::$app->request->post()) && $good->save()){
            return $this->redirect(['index']);
        }
        $categoriesForSelect = Category::find()->select('title')->where(['is_deleted' => false])->indexBy('id')->column();
        return $this->render('update',[
            'good' => $good,
            'categories' => $categoriesForSelect

        ]);
    }

    /**]
     * @param $id
     * @return Response
     */

    public function actionDelete($id): Response
    {
        $good = Good::findOne($id);
        $good->is_deleted = true;
        $good->save();
        return $this->redirect(['index']);
    }
}