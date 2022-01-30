<?php

namespace Controller\Api;


use Controller\BaseController;
use Plugins\Utility\SendPulse;

class HomeController extends BaseController
{
    public function Index($QueryString)
    {
        $this->MakeJson(["Status"=>["Code"=>200,"Text"=>"Success"],"Response"=>["$QueryString"]]);

    }

    public function Send()
    {
//       var_dump( SendPulse::makeAcessToken());
       if (SendPulse::sendEmail(1,'Milad Xandi','info@miladzandi.ir')->result)
           header("Location: /");
       else
           header("Location: /NotFound");

    }
    public function Verify()
    {
        var_dump( SendPulse::decrypt($_GET['token'],123456789));
    }

}
