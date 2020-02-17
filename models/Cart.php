<?php


namespace app\models;
use yii\db\ActiveRecord;

class Cart extends ActiveRecord{

    public function addToCart($book, $qty = 1) {
        if(isset($_SESSION['cart'][$product->id])){
            $_SESSION['cart'][$book->id]['qty'] += $qty;
        }else{
            $_SESSION['cart'][$book->id] = [
                'qty' => $qty,
                'name' => $book->name,
                'price' => $book->price,
                'img' => $book->img
            ];
        }
        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty: $qty;
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $qty * $book->price: $qty * $book->price;
    }

    public function recalc($id) {
        if(!isset($_SESSION['cart'][$id])) return false;
        $qtyMinus = $_SESSION['cart'][$id]['qty'];
        $sumMinus = $_SESSION['cart'][$id]['qty'] * $_SESSION['cart'][$id]['price'];
        $_SESSION['cart.qty'] -= $qtyMinus;
        $_SESSION['cart.sum'] -= $sumMinus;
        unset($_SESSION['cart'][$id]);
    }

}