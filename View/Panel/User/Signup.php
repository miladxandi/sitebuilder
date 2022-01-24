<?php include '../View/Shared/Forms/Header.php'?>


<?php include '../View/Shared/Forms/Middle.php'?>

<form action="/signup" method="post" class="signup-from">

        <div class="ui placeholder segment">

            <div class="ui two column very relaxed stackable grid">

                <div class="column">
                    <div class="ui form">

                        <div class="field">
                            <label>First name</label>
                            <div class="ui left icon input">
                                <input type="text" placeholder="Fname">
                                <i class="user circle outline icon"></i>
                            </div>
                        </div>

                        <div class="field">
                            <label>Last name</label>
                            <div class="ui left icon input">
                                <input type="text" placeholder="Lname">
                                <i class="user circle icon" ></i>
                            </div>
                        </div>

                        <div class="field">
                            <label>Email</label>
                            <div class="ui left icon input">
                                <input type="email" placeholder="email">
                                <i class="at icon" ></i>
                            </div>

                        </div>

                    </div>
                </div>
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

                        <div class="field">
                            <label>Verify password</label>
                            <div class="ui left icon input">
                                <input type="text" placeholder="verify password">
                                <i class="lock icon"></i>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

                <div class="column">
                    <div class="ui blue submit button">Creat</div>
                </div>

                <div class="ui small button segment">
                        <a href="/login"><i class="signup icon"></i></a>
                        Login
                </div>
                </div>
        </div>
    </form>


<?php include '../View/Shared/Forms/Footer.php'?>