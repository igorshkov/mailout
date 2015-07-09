<?php

class App extends Service
{   
    protected $definitions = [];
    
    public $components = [];
    
    public function init()
    {
        foreach ($this->definitions as $alias => $config) {
            $class = $config['class'];
            unset($config['class']);

            $this->components[$alias] = new $class($config);
        }
    }
    
    public function run()
    {
        $users = $this->components['user']->getAll();
    
        foreach ($users as $user) {
            $message = $this->components['message']->build($user);
//            $this->components['mandrill']->messages->send($message);
        }
    }
}