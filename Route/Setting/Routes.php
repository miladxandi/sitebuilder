<?php
return[
    '/' => [
        'target' => 'Main.Home.Index',
        'get'=> true,
        'post'=> false,
        'middleware'=>'Main.Home.Index',
        'important'=>false
    ],
    '/aboutus' => [
        'target'=>'Main.Home.Aboutus',
        'get'=> true,
        'post'=> false,
        'middleware'=>'Main.Home.Aboutus'
    ],
    '/signup' => [
        'target'=>'Panel.User.Signup',
        'get'=> true,
        'post'=> true,
        'middleware'=>'Main.Home.Aboutus',
    ],
    '/login' => [
        'target'=>'Panel.User.Login',
        'get'=> true,
        'post'=> true,
        'middleware'=>'',
    ],
    '/portfolio' => [
        'target'=>'Panel.User.Portfolio',
        'get'=> true,
        'post'=> false,
        'middleware'=>'',
    ],
    '/customers' => [
        'target'=>'Panel.Customer.All',
        'get'=> true,
        'post'=> false,
        'middleware'=>'',
    ],
];
