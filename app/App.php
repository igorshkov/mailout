<?php

class App extends Service
{   
    protected $definitions = [];
    
    public $components = [];
    
    public function init()
    {
        Wii::$app = $this;

        foreach ($this->definitions as $alias => $config) {
            $class = $config['class'];
            unset($config['class']);

            $this->components[$alias] = new $class($config);
        }
    }
    
    public function run()
    {
        $users = $this->components['user']->getAll();
        $mandrill = new Mandrill('NxXI6hFvhNO4-IXcneJ9VA');
        foreach ($users as $user) {
            $messages = $this->components['message']->build($user);
            foreach($messages as $message) {
                if($message) {
                    $result = $message;//$mandrill->messages->send($message);
                    print_r($result['to']);
                    print_r('</br>');
                }
            }

        }
    }
}

class Wii {

    public static $app;

}