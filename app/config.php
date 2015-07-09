<?php
return [
    'definitions' => [
        'message' => [
            'class' => MessageService::class,
            'from_email' => 'photo.volkov.a@gmail.com',
            'from_name' => 'Александр Волков',
            'template' => 'templates/template.html',
            'attachment' => 'assets/asset.png',
        ],
        'mandrill' => [
            'class' => Mandrill::class,
            'token' => 'NjlsGKoNFErYlx-toZmAUw',
        ],
        'user' => [
            'class' => UserService::class,
            'source' => 'users/users.csv',
        ],

    ]
];

//class MadrillDecorator
//{
//    function __construct(Decorator $product)
//    {
//        $this->product = $product;
//    }
//
//    public $product;
//}
//
//class Product extends Decorator {
//    function getPrice() {return 4;}
//    function __call($method)
//    {
//        return $this->product->$method();
//    }
//}
//class HasMeat extends Decorator {
//    function setRoast(){}
//}
//class Spicy extends Decorator {}
//class Burrito extends Decorator {
//    function __construct()
//    {
//        $this->product = new HasMeat(new Spicy(new Product));
//    }
//}
//
//$product = new Burrito();