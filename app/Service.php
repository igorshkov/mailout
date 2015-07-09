<?php

abstract class Service
{   
    public function __construct($config = [])
    {
        foreach ($config as $field => $value) {
            $this->{$field} = $value;
        }
        
        $this->init();
    }
    
    protected function init() {

    }
}