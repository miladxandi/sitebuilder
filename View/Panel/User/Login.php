<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masoud Insurance | Signup</title>
    <link rel="stylesheet" href="/Style/Main/bootstrap.min.css">
    <link rel="stylesheet" href="/Style/Panel/signup.css">
</head>


<body>

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
            <img src="/Content/Main/VLOGO.jpg" style="width: 200px" alt="">
        </div>
        <?php if ($Viewbag): ?>
            <p><?php echo $Viewbag[0]; ?></p>
        <?php endif;?>
        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
            <form action="/login" method="post" class="signup-from">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group m-5">
                            <label for="Username" class="form-control">Username</label><br>
                            <input type="text" name="Username" id="Username" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group m-5">
                            <label for="Password" class="form-control">Password</label><br>
                            <input type="password" name="Password" id="Password" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="btn-group">
                    <button class="btn btn-dark" type="submit" name="submit">
                        Log in
                    </button>
                    <a href="Signup.php">
                        <button class="btn btn-dark" type="submit">
                            sign up
                        </button>
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>

</body>


</html>
