</head>


<body>

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
            <img src="/Content/Main/VLOGO.jpg" style="width: 200px" alt="">
        </div>
        <?php if (isset($Viewbag['Error'])): ?>
        <p><?php echo $Viewbag['Error']; ?></p>
<?php endif;?>
        <div class="col-lg-12 col-md-12 col-sm-12 text-center">

