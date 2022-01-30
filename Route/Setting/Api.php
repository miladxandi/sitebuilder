<?php
return[
    '/api/email/verification/send' => [
        'target' => 'Api.Home.Send',
        'allowed'=> 'get',
        'blocked'=> 'DELETE',
        'middleware'=>'Main.Home.Index',
        'important'=>false
    ],
    '/api/email/verification/verify' => [
        'target' => 'Api.Home.Verify',
        'allowed'=> 'get',
        'blocked'=> 'DELETE',
        'middleware'=>'Main.Home.Index',
        'important'=>false
    ]
];
