<?php


namespace app\models;
use yii\db\ActiveRecord;

class Author extends ActiveRecord
{
    public static function tableName()
    {
        return 'author';
    }
    public function getBooks(){
        return $this->hasMany(Author::className(), ['author_id' => 'id']);
    }

}