<?php


namespace app\controllers;
use app\models\Category;
use app\models\Book;
use Yii;
use yii\data\Pagination;
use yii\db\Query;
use yii\web\HttpException;

class CategoryController extends AppController
{
    public function actionIndex(){
        $hits = Book::find()->where(['hit' => '1'])-> all() ;
        $this ->setMeta('Book-Library');
        return $this->render('index', compact('hits'));

    }

    public function actionView($id){
$category = Category::findOne($id);
if (empty($category)) throw new HttpException(404, 'Такой категории нет');
$query = Book::find()->where(['category_id' => $id]);
$pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam'=>false, 'pageSizeParam'=>false]);
$books = $query-> offset($pages->offset)->limit($pages->limit)->all();
$category = Category::findOne($id);
$this->setMeta('Book-Library | ' . $category->name, $category->keywords, $category->description);
return $this->render('view', compact('books', 'pages', 'category'));

    }
    public function actionSearch(){

        $q = trim(Yii::$app->request->get('q'));
        $this->setMeta('Book-Library | Поиск:' . $q);
        if(!$q)
            return $this->render('search');
        $query = Book::find()->where(['like', 'name', $q]);
        $pages = new Pagination(['totalCount' => $query->count(),
            'pageSize' => 3,
            'forcePageParam' => FALSE,
            'pageSizeParam' => FALSE]);
        $book = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('search', compact('book', 'pages', 'q'));
    }
}