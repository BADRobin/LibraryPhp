<?php


namespace app\components;
use app\models\Author;
use yii\base\Widget;
use Yii;
class MenuAuthWidget extends Widget
{
    public $tpl;
    public $data;
    public $tree;
    public $menuHtml;


    public function init()
    {
        parent::init();
        if ($this->tpl === null){
            $this->tpl = 'select';
        }
        $this->tpl .= '.php';
    }

    public function run()
    {
        $select = Yii::$app->cache->get('select');
        if ($select) return $select;
        $this->data=Author::find()->indexBy('id')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuHtml = $this->getMenuHtml($this->tree);
        Yii::$app->cache->set('select', $this->menuHtml, 60);
        return $this->menuHtml;
    }
    protected function getTree(){
        $tree = [];
        foreach ($this->data as $id =>&$node){
            if (!$node['parent_id'])
                $tree[$id] = &$node;
            else
                $this->data[$node['parent_id']]['childs'][$node['id']] = &$node;
        }
        return $tree;
    }
    protected function getMenuHtml($tree){
        $str = '';
        foreach ($tree as $author){
            $str .=$this->catToTemplate($author);
        }
        return $str;
    }
    protected function catToTemplate($author){
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }

}