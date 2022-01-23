    <html>

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../../Style/Main/style1.css" type="text/css">

    </head>

    <body style="background-color: whitesmoke" >


    <div style="background-color: black ;display: flex;color: white;padding-bottom: 10px; height: 80px ">


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>
            $(document).ready (function (){
                $('#sidebar-btn').click(function (){
                    $('#sidebar').toggleClass('visibility');
                });
            });

        </script>

        <div id="sidebar" style="display: flex">

            <div id="titr" style="text-decoration-color: black">
                <br>
                <form action=""  method="post" style="display: flex" >
                    <img src="../../../Content/Main/search-icon-white-22.jpg" style="width: 20px;margin: 10px;margin-top: 20px" alt="">
                    <input type="search" name="search" id="" style=" height: 25px;width: 160px;margin-top: 20px;margin-right: 20px">
                </form>
                <br>

                <ul  style="text-decoration-color: black;width: 30vh">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Categories</a></li>
                    <li><a href="#">Contact us</a></li>
                    <li><a href="#">About us</a></li>
                </ul>

            </div>

            <div>
                <img src="../../../Content/Main/loogo.jpg" alt="" style="width: 24vh; padding-top: 20px;margin-left: 93vh;z-index: -100" >
            </div>

            <div id="sidebar-btn" style="padding-top: 27px;padding-left: 20px">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <div>

                <button type="button" style="cursor:pointer;width: 32vh;margin-top: 20px;background-color: black;margin-left: 59vh;border: hidden;display: flex ">
                    <a href="/Signup" style="color: whitesmoke">Sign up</a>
                    <h2 style="color: white">|</h2>
                    <a href="/Login" style="color: whitesmoke" >Log in</a>
                </button>


            </div>

        </div>
        <br>
    </div>
    </body>
    </html>