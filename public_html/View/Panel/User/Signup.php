

<html>

<head>

    <title>  </title>

</head>


<body style="background-image: url('imageee/pngwing.com.jpg');background-size: 90%;background-position-x: 90px ;background-repeat: no-repeat">

<style>
    .labels{

        font-size: 18px;
    }

    .button{
        background: black;
        color: whitesmoke;
        font-family: "Yu Gothic Light";
        font-size: 20px;
        border-radius: 20px;
        width: 80px;
        height: 50px;


    }
    .titr{

        font-family: "Yu Gothic Medium";
        color: whitesmoke ;
        text-align: left;

    }
    .table{
        background-image: url('imageee/28939169.jpg') ;
        display: block ;
        width: 400px ;
        height: 450px;
        text-align: center ;
        border-radius: 40px;
        box-shadow: black 20px 20px 30px;
    }
    .inputs {
        border-radius: 20px;
        width: 60%;
        border: black solid thin;
        text-align: center  ;
    }

</style>

   <div style="margin: auto; text-align: center ; padding-bottom: 10px" >
        <div>

             <img src="imageee/VLOGO.jpg" style="width: 200px" alt="">

        </div>

    <div style=";display: block ; position:absolute;padding-left: 77vh">

     <form action="Login.php"  method="post" class="table" >

       <div>
           <br>
        <label for="name"  class="titr labels">Name</label><br>
        <input type="text" name="name" id="name" class="inputs">
           <br>
           <br>
        <label for="Fname" class="titr labels">Family</label><br>
        <input type="text" name="Fname" id="Fname" class="inputs">
           <br>
           <br>
        <label for="usen" class="titr labels">User Name</label><br>
        <input type="text" name="Fname" id="usen" class="inputs">
           <br>
           <br>
        <label for="num" class="labels titr">Number</label><br>
        <input type="tel" name="num" id="num" class="inputs">
           <br>
           <br>
        <label for="Email" class="titr labels">Email</label><br>
        <input type="email" name="Email" id="Email" class="inputs">
           <br>
           <br>
        <label for="pass"  class="titr labels">Password</label><br>
        <input type="password" name="pass" id="pass" class="inputs">
           </div>

        <div style="display: block">
            <br>

            <button class="button"  type="submit">
                Creat
            </button>

            <form action="Login.php" method="get" >
                <button class="button" type="submit">
                    Log in
                </button>
            </form>
        </div>

        </form>


        </div>

    </div>

</body>





</html>
