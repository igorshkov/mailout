<?php

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class Mailout extends Widget {

    private $items = [];

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        echo Yii::$app->basePath . '/app/View.php';
        return Yii::$app->view->renderFile(Yii::$app->basePath . '/app/View.php', [
            'items' => $this->items,
        ]);
    }
}