<?php


namespace app\controllers;
use app\models\Category;
use app\models\Book;
use Yii;

class CategoryController extends AppController
{
    public function actionIndex(){
        $hits = Book::find()->where(['hit' => '1'])-> all() ;
        $this ->setMeta('Book-Library');
        return $this->render('index', compact('hits'));

    }

    public function actionView($id){
$id=Yii::$app->request->get('id');
$books = Book::find()-> with('category ')->where(['category_id' => $id])->all();
$category = Category::findOne($id);
$this->setMeta('Book-Library |' . $category->name, $category->keywords, $category->description);
return $this->render('view', compact('books'));

    }
}