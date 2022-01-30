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
        'middleware'=>'Panel.Admin.checkVerifyPass',
    ],
    '/login' => [
        'target'=>'Panel.User.Login',
        'get'=> true,
        'post'=> true,
        'middleware'=>'',
    ],
    '/templates' => [
        'target'=>'Main.Template.list',
        'get'=> true,
        'post'=> false,
        'middleware'=>'',
    ],
    '/template' => [
        'target'=>'Main.Template.single',
        'get'=> true,
        'post'=> false,
        'middleware'=>'',
    ],
    '/panel' => [
        'target'=>'Panel.Admin.Index',
        'get'=> true,
        'post'=> true,
        'middleware'=>'',
    ],
    '/customers' => [
        'target'=>'Panel.Customer.All',
        'get'=> true,
        'post'=> false,
        'middleware'=>'',
    ],
];
