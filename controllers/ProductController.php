<?php

namespace app\controllers;

use app\engine\Request;
use app\models\Product;

class ProductController extends Controller
{


    public function actionIndex()
    {
        echo $this->render('index');
    }

    public function actionCatalog()
    {

        $page =  (new Request())->getParams()['page'] ?? 0;

        $catalog = Product::getLimit(($page + 1) * 2);
        echo $this->render('product/catalog',[
            'catalog' => $catalog,
            'page' => ++$page
        ]);
    }

    public function actionCard()
    {
        //$id = $_GET['id'];

        $id = (new Request())->getParams()['id'];
        $product = Product::getOne($id);

        echo $this->render('product/card', [
            'product' => $product
        ]);
    }




}