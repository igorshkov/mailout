<?php
return [
    'definitions' => [
        'message' => [
            'class' => MessageService::class,
            'from_email' => 'a@gmail.com',
            'from_name' => 'Александр',
            'template' => 'templates/template.html',
            'attachment' => 'assets/asset.png',
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