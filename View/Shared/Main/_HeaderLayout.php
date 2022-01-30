
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="object" property="og:type">
    <meta content="Simplist is a free & open-source framework for developing, creating & designing online blogs simply." name="description">
    <meta name="keywords" content="PHP
     Simplist
     Framework
     PHP Framework
     Simplist Framework
     Simplist PHP Framework
     Simplist PHP
     Simplist Site
     Simple
     Simple Site
     Web Designer
     سیمپلیست
     فریمورک PHP
     فریمورک پی اچ پی
     فریمورک سیمپلیست
     طراحی وب
     طراحی وب بدون دانش برنامه نویسی">
    <title>Webker | <?php echo $Viewbag['Title'] ?></title>

    <meta content="origin-when-cross-origin" name="referrer">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
    <link href="/Content/Main/logo-simple.png" rel="icon" sizes="1000x1000" type="image/png">
    <link rel="apple-touch-icon" href="/Content/Main/logo-simple.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/Content/Main/logo-simple.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/Content/Main/logo-simple.png">
    <link rel="apple-touch-icon" sizes="1000x1000" href="/Content/Main/logo-simple.png" >
    <link rel="icon" type="image/x-icon" href="/Content/Main/logo-simple.png" >
    <link rel="shortcut icon" href="/Content/Main/logo-simple.png" >
    <?php
    $Add = new Core\Requirement\oLoad("Style/Main","Script/Main","Content/Main");
    $Add->Loader("css","semantic.min",'https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist',false);
    $Add->Loader("css","bootstrap.min");
    $Add->Loader("css","splide.min");
    $Add->Loader("css","main");
    $Add->Loader("js","jquery.min");
    $Add->Loader("js","bootstrap.min");
    $Add->Loader("js","main");
    $Add->Loader("js","semantic.min",'https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist',false);
    $Add->Loader("js","bootstrap.bundle.min",'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js',false);
    ?>

</head>
<body style="background-color: white">
