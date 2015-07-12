<?php

class Mailout {

    private $from_email;
    private $from_name;
    private $template;
    private $to_name_rules;
    private $to_email_rules;

    public function __construct() {
        $this->dev();
    }

    public function init() {

    }

    private function dev() {
        require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');
        $yii2Config = require(__DIR__ . '/../dev/web.php');
        new yii\web\Application($yii2Config); // Do NOT call run()
    }
}