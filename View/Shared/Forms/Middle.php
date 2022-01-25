</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
            <h2 class="ui text-white image header mt-5 mb-5">
                <a href="/"><img src="/Content/Main/logo-with-text.png" style="width: 250px" alt=""></a>
                <div class="content"> Make your own website</div>
            </h2>
        </div>
        <?php if (isset($Viewbag['Error'])): ?>
            <p><?php echo $Viewbag['Error']; ?></p>
        <?php endif; ?>
        <div class="col-lg-12 col-md-12 col-sm-12 text-center">

