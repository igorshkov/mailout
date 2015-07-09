<?php
return [
    'definitions' => [
        'message' => [
            'class' => MessageService::class,
            'from_email' => 'alex@gmail.com',
            'from_name' => 'Alex',
            'template' => 'templates/template.html',
            'attachment' => 'assets/asset.png',
        ],
        'mandrill' => [
            'class' => Mandrill::class,
            'token' => '<APItoken>',
        ],
        'user' => [
            'class' => UserService::class,
            'source' => 'users/users.csv',
        ],
    ]
];