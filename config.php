<?php
return [
    'definitions' => [
        'message' => [
            'class' => MessageService::class,
            'from_email' => 'sender@mail.com',
            'from_name' => 'Sandy Sender',
            'template' => 'templates/template.html',
            'attachment' => 'assets/asset.png',
            'to_name_rules' => [['firstname','lastname'],['firstname'],['nickname'],],
            'to_email_rules' => [['email','email2'],['email'],['email2'],],
        ],
        'mandrill' => [
            'class' => Mandrill::class,
            'token' => 'API key',
        ],
        'user' => [
            'class' => UserService::class,
            'source' => 'users/users.csv',
        ],

    ]
];