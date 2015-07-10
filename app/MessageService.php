<?php

class MessageService extends Service
{
    protected $from_email;
    protected $from_name;
    protected $template;
    protected $attachment;
    protected $to_name_rules;
    protected $to_email_rules;

    private $content;

    protected function init()
    {
        parent::init();
        $this->content = file_get_contents($this->template);
    }

    public function build($user)
    {
        $messages = [];
        if(strpos($user['email'],'@') !== false) {
            $name = $this->getName($user);
            $emails= $this->getEmail($user);
            foreach($emails as $email) {
                if($name && $email) {
                    $messages[] = $this->getMessage($name, $email);
                }
            }
            return $messages;
        }
        return false;
    }

    private function getName($user)
    {
        $name='';
        foreach($this->to_name_rules as $rule) {
            foreach($rule as $csv_name) {
                if($user[$csv_name]) {
                    $name .= $user[$csv_name].' ';
                } else {
                    break;
                }
            }
            if($name) {
                return trim($name);
            }
        }
        return false;
    }

    private function getEmail($user)
    {
        $emails=[];
        foreach($this->to_email_rules as $rule) {
            foreach($rule as $csv_email) {
                if($user[$csv_email]) {
                    $emails[] = $user[$csv_email];
                } else {
                    $emails = [];
                    break;
                }
            }
            if($emails) {
                return $emails;
            }
        }
        return false;
    }

    private function getMessage($name, $email)
    {
        $message = array(
            'html' => $this->content,
            'text' => '',
            'subject' => 'Приглашение в проект "Дороги России"',
            'from_email' => $this->from_email,
            'from_name' => $this->from_name,
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
                    'name' => $this->attachment,
                    'content' => base64_encode(file_get_contents($this->attachment))
                )
            )
        );
        return $message;
    }

    public function log($name, $email)
    {
        print_r('Sent to :<b>'.$name.'.</b> Email: <b>'.$email.'</b></br>');
    }

}