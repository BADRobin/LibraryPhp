<?php


namespace app\models;
use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function tableName()
    {
        return 'category';
    }
    public function getBooks(){
        return $this->hasMany(Book::class(), ['category_id' => 'id']);
    }

}