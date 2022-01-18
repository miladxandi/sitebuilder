<?php

?>
<html>
<head>
    <title></title>
</head>
<body
        style="background-image: url('imageee/pngwing.com.jpg');
    background-size: 90%;background-position-x: 90px ;background-repeat: no-repeat">
<style>
    .labels {

        font-size: 18px;
    }

    .button {

        background: black;
        color: whitesmoke;
        font-family: "Yu Gothic Light";
        font-size: 20px;
        border-radius: 20px;
        width: 80px;
        height: 50px;


    }

    .titr {

        font-family: "Yu Gothic Medium";
        color: whitesmoke;
        text-align: left;

    }

    .table {
        background-image: url('imageee/28939169.jpg');
        display: block;
        width: 400px;
        height: 300px;
        text-align: center;
        border-radius: 40px;
        box-shadow: black 20px 20px 30px;
    }

    .inputs {
        border-radius: 20px;
        width: 60%;
        border: black solid thin;
        text-align: center;
    }

</style>

<div style="margin: auto; text-align: center">
    <div>
        <img src="imageee/VLOGO.jpg" style="width: 200px" alt="">
    </div>
    <div style=";display: block ; position:absolute;padding-left: 77vh">
        <form action="" method="post" class="table">
            <div>
                <br>
                <br>
                <br>
                <label for="usen" class="titr labels">User Name</label><br>
                <input type="text" name="usen" id="usen" class="inputs">
                <br>
                <br>
                <label for="pass" style="font-size: 20px " class="titr labels">Password</label><br>
                <input type="text" name="pass" id="pass" class="inputs">
                <br>
                <br>
            </div>
            <div style="display: block">
                <br>
                <br><br><br>
                <button class="button" type="submit">
                    Log in
                </button>
                <form action="Sign%20up.php">
                    <button type="submit" class="button" style="font-size: 19px">
                        Sign up
                    </button>
                </form>
            </div>
        </form>
    </div>
    <div>
    </div>
</div>
</body>
</html>

