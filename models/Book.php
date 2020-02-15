<?php


namespace app\models;
use yii\db\ActiveRecord;

class Book extends ActiveRecord
{
    public static function tableName()
    {
        return 'book';
    }
    public function getCategory(){
        return $this->hasOne(Category::class(), ['id'=>'category_id' ]);
    }

}