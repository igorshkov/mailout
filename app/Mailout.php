<?php

use yii\base\Widget;
use yii\helpers\Html;

class Mailout extends \yii\widgets\Widget {

    private $items = [];

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->renderFile('View.php',$this->items);
    }
}