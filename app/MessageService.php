<?php

class MessageService extends Service
{
private $from_email;
private $from_name;
private $template;
private $attachment;

private $content;

    protected function init()
    {
        parent::init();
        $this->content = file_get_contents($this->template);
    }

    public function build($user)
    {
        if(strpos($user['email'],'@') !== false) {
            $name = getName($user);
            $email= $user['email'];
            //sendLog($name, $email);
            print_r($name.'</br>');
            print_r($email.'</br></br>');
        }
    }

    private function getName($user)
    {
        if($user['firstname']!=='') {
            return $user['firstname'];
        } else {
            return $user['nickname'];
        }
    }

    private function getMessage($name, $email)
    {
        return array(
            'html' => $this->$content,
            'text' => '',
            'subject' => 'Приглашение в проект "Дороги России"',
            'from_email' => $this->$from_email,
            'from_name' => $this->$from_name,
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
                    'name' => $this->$attachment,
                    'content' => base64_encode(file_get_contents($this->$attachment))
                )
            ),
            'subaccount' => 'rusroads'
        );
    }

}