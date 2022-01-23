<?php include '../View/Shared/Forms/Header.php'?>


<?php include '../View/Shared/Forms/Middle.php'?>

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
                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" name="submit">
                        Log in
                    </button>
                    <a href="/Signup">
                        <button class="btn btn-dark" type="button">
                            sign up
                        </button>
                    </a>
                </div>

            </form>


<?php include '../View/Shared/Forms/Footer.php'?>
