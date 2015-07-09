<?php

class UserService extends Service
{

protected $source;
    
    // returns all users
    public function getAll()
    {
        $handle = fopen($this->source, "r");
    
        $users = [];
        while (($user = $this->getNextUser($handle)) !== false) {
            $users[] = $user;
        }
        fclose($handle);

        array_shift($users);
        return $users;       
    }
    
    private function getNextUser($handle)
    {
        $line = fgets($handle);

        if (false === $line) {
            return false;
        }

        $values = array_map('trim', explode(',', $line));

        return array_combine(['firstname', 'lastname', 'nickname', 'email', 'link', 'approved'], $values);
    }
    
    private function getRecepients($rule)
    {
        $remove;
        switch ($rule) {
            case 'not_approved':
                ['approved', 0];
                break;
        }
        $fat = $this->getFatUser();
        unset($users['link']);
        
    }
}