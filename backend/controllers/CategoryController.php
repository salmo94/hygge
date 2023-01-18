<?php

namespace backend\controllers;

use common\models\Category;
use yii\web\Controller;

class CategoryController extends Controller
{

    public function actionCreate()
    {

        $category = new Category();

        return $this->render('create', ['category' => $category]);




    }



}