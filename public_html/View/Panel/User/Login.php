<?php

?>
<html>

<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VALENS | Login</title>
    <link rel="stylesheet" href="/Style/Main/bootstrap.min.css">
    <link rel="stylesheet" href="/Style/Panel/signup.css">

</head>


<body>

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
            <a href=""><img src="/Content/Main/VLOGO.jpg" style="width: 80vh" alt=""></a>
        </div>

        <div class="row-lg-12 row-md-12 row-sm-12 text-center">
            <br>
            <form action="/signup" method="post" class="signup-from" style="margin-left: 57vh">
                <div class="row">
                    <div class="row-lg-6 row-md-6 row-sm-12">

                        <div class="form-group m-5">
                            <label for="Username" class="form-control">Username</label><br>
                            <input type="text" name="Username" id="Username" class="form-control">
                        </div>

                        <div class="form-group m-5">
                            <label for="Password" class="form-control">Password</label><br>
                            <input type="password" name="Password" id="Password" class="form-control">
                        </div>

                    </div>
                </div>
                <div class="btn-group">
                    <a href="/login">
                        <button class="btn btn-dark" type="button">
                            Enter
                        </button>
                    </a>
                    <a href="/sinup">
                    <button class="btn btn-dark" type="button" name="submit">
                        Sign up
                    </button>
                    </a>
                </div>

            </form>


</div>

</body>


</html>

