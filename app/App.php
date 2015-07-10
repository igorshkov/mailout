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
            $message = $this->components['message']->build($user);
            if($message) {
//                $result = $mandrill->messages->send($message);
            }
        }
    }
}