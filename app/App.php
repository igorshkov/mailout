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
        $mandrill = new Mandrill('NjlsGKoNFErYlx-toZmAUw');
        foreach ($users as $user) {
            $message = $this->components['message']->build($user);
            if($message) {
                $result = $mandrill->messages->send($message);
                print_r('<b>DONE: </b>'.$result.'</br>');
            }
        }
    }
}

class Wii
{
    public static $app;
}