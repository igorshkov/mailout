<?php

require_once ('vendor/autoload.php');

mb_internal_encoding("UTF-8");
mb_http_output( "UTF-8" );
ob_start("mb_output_handler");

$app = new App($config);
$app->run();

function sendEmail($name, $email, Mandrill $mail) 
{
    try {
        $result = $mail->messages->send($data);
        print_r($result);
    } catch(Mandrill_Error $error) {
        echo 'Error: ' . get_class($error) . ' - ' . $error->getMessage();
    }
}


$template = file_get_contents('templates/t1.html');
$image = base64_encode(file_get_contents('assets/rr.png'));
    
function getMessage()
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







function main()
{
    // I have mail service
    $mailService = ;
    
    // I have email template
    $template = getTemplate();
    
    // I get users
    $users = getUsers();
    
    // I iterate users
    foreach ($users as $user) {
        sendEmail($user)
    }
    
        // I send email
        // I log
    
    
    
    
    
    
    foreach ($users as $user) {
        if(strpos($user['email'],'@') !== false) {
            if($user['firstname']!=='') {
                $name = $user['firstname'];
            } else {
                $name = $user['nickname'];
            }
        $email = $user['email'];
            //SEND HERE
        //sendEmail($name, $email);
        sendLog($name, $email);
        }
    }
}

function writeToFile($users)
{
    $str = 'firstname,lastname,nickname,email,link,approved';
    $fp = fopen('somefile.csv', 'a');
    foreach ($users as $user) {
        $str.="\n".$user['firstname'].','.$user['lastname'].','.$user['nickname'].','.$user['email'].','.$user['link'].','.$user['approved'];
    }
    fwrite($fp, $str);
}

function sendLog($name, $email)
{
    echo 'An email was sent to "'.$name.'" with an e-address: "'.$email.'".'."</br>";
}

//sendEmail('Александр', 'photo.volkov.a@gmail.com');


class MessageBuilder
{
    private static $content;
    
    public static function build($from, $to)
    {
        if (null === self::$content) {
            self::$content = file_get_contents('file.html');
        }
        
        return compact('from', 'to', 'content');
    }
}

class CoolMessageBuilder extends Service
{
    protected $template;
    
    protected $from_email;
    //...
    
    private $content;
    
    protected init()
    {
        $this->content = file_get_contents($this->template);
    }
    
    public function build($from, $to)
    {   
        return str_replace(['{from}', '{to}'], [$from, $to], $this->content);
    }
}


// precondition
$testFile = 'testFile.html';
// ------
// <p>{from}: {to}</p>
// ------

$from = 'me';
$to = 'you';

// action
$builder = new MessageBuilder($testFile);
$message = $builer->build($from, $to);

// observation
if ($message === '<p>me: you</p>') {
    echo 'ok';
} else {
    echo 'fail';
}

// App.php



// index.php

















