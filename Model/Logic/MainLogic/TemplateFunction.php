<?php

namespace Model\Logic\MainLogic;

use Model\Logic\DataContract;
use Model\Repository\MainFunction\TemplateRepository;

class TemplateFunction implements DataContract
{
    private $Template;

    public function __construct()
    {
        $this->Template = new TemplateRepository();
    }

    public function Register($data)
    {
        // TODO: Implement Register() method.
    }

    public function Update($QuerryString)
    {
        // TODO: Implement Update() method.
    }

    public function Delete($QuerryString)
    {
        // TODO: Implement Delete() method.
    }

    public function Show()
    {
        $Viewbag = ['Templates'=>$this->Template->All()];
        return $Viewbag;
    }

    public function Insert()
    {
        $name = $_POST['template_name'];
        $img = $_POST['template_img'];
        $category = $_POST['template_category'];
        $designer = $_POST['template_designer'];
        $price = $_POST['template_price'];
        $description = $_POST['template_description'];
        $url = $_POST['template_link'];
        $date = $_POST['template_date'];
        $Inster = $this->Template->Insert(['Name'=>$name, 'Img'=>$img, 'Category'=>$category, 'Price'=>$price, 'Designer'=>$designer, 'Description'=>$description, 'Url'=>$url, 'Date'=>$date]);
        if ($Inster == 1 )
            $Viewbag = ['Success' => 'template saved successfully!'];
        else
            $Viewbag = ['Error' => 'sth went wrong!please try again'];

        return $Viewbag;
    }
}