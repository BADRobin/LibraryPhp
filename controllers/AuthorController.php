<?php



namespace app\controllers;
use app\models\Author;
use app\models\Book;
use Yii;
use yii\data\Pagination;
use yii\web\HttpException;

class AuthorController extends AppController
{
    public function actionIndex(){
        $hits = Author::find()->where(['hit' => '1'])-> all() ;
        $this ->setMeta('Book-Library');
        return $this->render('index', compact('hits'));

    }

    public function actionView($id){
        $author = Author::findOne($id);
        if (empty($author)) throw new HttpException(404, 'Такого писателя нет');
        $query = Book::find()->where(['author_id' => $id]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam'=>false, 'pageSizeParam'=>false]);
        $books = $query-> offset($pages->offset)->limit($pages->limit)->all();
        $author = Author::findOne($id);
        $this->setMeta('Book-Library | ' . $author->name);
        return $this->render('view', compact('books', 'pages', 'author'));

    }

}