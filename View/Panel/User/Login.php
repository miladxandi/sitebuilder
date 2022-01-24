<?php include '../View/Shared/Forms/Header.php'?>


<?php include '../View/Shared/Forms/Middle.php'?>

            <form action="/login" method="post" class="signup-from">
                <div class="ui placeholder segment">
                    <div class="ui two column very relaxed stackable grid">
                        <div class="column">
                            <div class="ui form">
                                <div class="field">
                                    <label>Username</label>
                                    <div class="ui left icon input">
                                        <input type="text" placeholder="Username">
                                        <i class="user icon"></i>
                                    </div>
                                </div>
                                <div class="field">
                                    <label>Password</label>
                                    <div class="ui left icon input">
                                        <input type="password" placeholder="Password">
                                        <i class="lock icon" ></i>
                                    </div>
                                </div>
                                <div class="ui blue submit button">Login</div>
                            </div>
                        </div>
                        <div class="middle aligned column">
                            <div class="ui small button">
                                <a href="/signup"><i class="signup icon"></i></a>
                                SignUp
                            </div>
                        </div>
                    </div>
                    <div class="ui vertical divider">
                        Or
                    </div>
                </div>
            </form>

<?php include '../View/Shared/Forms/Footer.php'?>
