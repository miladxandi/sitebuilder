<?php
return[
    '/' => [
        'target' => 'Main.Home.Index',
        'get'=> true,
        'post'=> false,
        'middleware'=>'Main.Home.Index',
        'important'=>false
    ],
    '/Signup' => [
        'target'=>'Main.Home.Signup',
        'get'=> true,
        'post'=> false,
        'middleware'=>'Main.Home.Signup'

    ],
    '/Login' => [
        'target'=>'Helper.Error.Login',
        'get'=> false,
        'post'=> true,
        'middleware'=>''
    ],
    '/aboutus' => [
        'target'=>'Main.Home.Aboutus',
        'get'=> true,
        'post'=> false,
        'middleware'=>'Main.Home.Aboutus'

    ]
];
