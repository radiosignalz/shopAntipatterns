<?php

namespace app\controllers;

use app\models\Basket;

class BasketController extends Controller
{
    public function actionIndex()
    {
        $session_id = session_id();
        $basket = Basket::getBasket($session_id);
        echo $this->render('basket', [
            'basket' => $basket
        ]);
    }

    public function actionAdd()
    {
        //TODO request
        $id = $_GET['id'];
        $session_id = session_id();

        $basket = new Basket($session_id, $id);
        $basket->save();

        $response = [
            'status' => 'ok',
            'count' => Basket::getCountWhere('session_id', $session_id)
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        die();
    }
}