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
        <p><?php echo $Viewbag?$Viewbag[0]:''; ?></p>
        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
            <form action="/signup" method="post" class="signup-from">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group m-5">
                            <label for="Firstname" class="form-control">Firstname</label><br>
                            <input type="text" required name="Firstname" id="Firstname" class="form-control">
                        </div>
                        <div class="form-group m-5">
                            <label for="Lastname" class="form-control">Lastname</label><br>
                            <input type="text" name="Lastname" id="Lastname" class="form-control">
                        </div>
                        <div class="form-group m-5">
                            <label for="Username" class="form-control">Username</label><br>
                            <input type="text" name="Username" id="Username" class="form-control">
                        </div>
                        <div class="form-group m-5">
                            <label for="Phone" class="form-control">Phone</label><br>
                            <input type="tel" name="Phone" id="Phone" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group m-5">
                            <label for="NationalCode" class="form-control">National Code</label><br>
                            <input type="text" name="NationalCode" id="NationalCode" class="form-control">
                        </div>
                        <div class="form-group m-5">
                            <label for="Email" class="form-control">Email</label><br>
                            <input type="text" name="Email" id="Email" class="form-control">
                        </div>
                        <div class="form-group m-5">
                            <label for="Password" class="form-control">Password</label><br>
                            <input type="password" name="Password" id="Password" class="form-control">
                        </div>
                        <div class="form-group m-5">
                            <label for="PasswordVerify" class="form-control">Password Verify</label><br>
                            <input type="password" name="PasswordVerify" id="PasswordVerify" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="btn-group">
                    <button class="btn btn-dark" type="submit" name="submit">
                        Create
                    </button>
                    <a href="/login">
                        <button class="btn btn-dark" type="submit">
                            Log in
                        </button>
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>

</body>


</html>
