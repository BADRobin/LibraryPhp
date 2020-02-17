<?php


namespace app\controllers;
use app\models\Category;
use app\models\Book;
use Yii;
use yii\web\HttpException;

class BookController extends AppController
{ public function actionView($id){
//    $id= Yii::$app->request->get('id');
    $book = Category::findOne($id);
    if (empty($book)) throw new HttpException(404, 'Такой книги нет');
    $book = Book::findOne($id);
//    $book = Book::find()->with('category')->where(['id' =>$id])->limit(1)->one();
    $hits = Book::find()->where(['hit' => '1'])->limit(6)->all();
    return $this->render('view', compact('book', 'hits'));
}

}