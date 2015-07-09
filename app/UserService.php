<?php

class UserService
{
    private $resource;
    
    // constructor
    
    public function getAll()
    {
        $handle = fopen("notaproved.csv", "r");
    
        $users = [];
        while (($user = getNextUser($handle)) !== false) {
            $users[] = $user;
        }
        fclose($handle);

        unset($users[0]);
        return $users;       
    }
    
    private function getFatUser(resource $handle)
    {
        $line = fgets($handle);

        if (false === $line) {
            return false;
        }

        $values = array_map('trim', explode(',', $line));

        return array_combine(['firstname', 'lastname', 'nickname', 'email', 'link', 'approved'], $values);
    }
    
    private function getThinUser()
    {
        $fat = $this->getFatUser();
        
        
    }
}