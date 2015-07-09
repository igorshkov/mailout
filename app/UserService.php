<?php

class UserService extends Service
{

protected $resource;
    
    // returns all users
    public function getAll()
    {
        $handle = fopen($this->$resource, "r");
    
        $users = [];
        while (($user = getNextUser($handle)) !== false) {
            $users[] = $user;
        }
        fclose($handle);

        unset($users[0]);
        return $users;       
    }
    
    private function getNextUser(resource $handle)
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


    private function getMessage()
    {
        return array(
            'html' => $template,
            'text' => '',
            'subject' => 'Приглашение в проект "Дороги России"',
            'from_email' => 'photo.volkov.a@gmail.com',
            'from_name' => 'Александр Волков',
            'to' => array(
                array(
                    'email' => $email,
                    'name' => $name,
                    'type' => 'to'
                )
            ),
            'global_merge_vars' => array(
                array(
                    'name' => 'NAME',
                    'content' => $name
                )
            ),
            'merge_vars' => array(
                array(
                    'rcpt' => $email,
                    'vars' => array(
                        array(
                            'name' => 'NAME',
                            'content' => $name
                        )
                    )
                )
            ),
            'images' => array(
                array(
                    'type' => 'image/png',
                    'name' => 'assets/rr.png',
                    'content' => $image
                )
            ),
            'subaccount' => 'rusroads'
        );
    }
}