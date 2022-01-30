<?php include '../View/Shared/Forms/Header.php' ?>
<?php include '../View/Shared/Forms/Middle.php' ?>

    <div class="ui placeholder segment">
        <div class="ui two column very relaxed stackable grid">
            <div class="column">
                <form action="/login" method="post" class="signup-from">
                    <div class="ui form">
                    <div class="field">
                        <label>Username</label>
                        <div class="ui left icon input">
                            <input type="text" placeholder="Username" name="Username">
                            <i class="user icon"></i>
                        </div>
                    </div>
                    <div class="field">
                        <label>Password</label>
                        <div class="ui left icon input">
                            <input type="password" placeholder="Password" name="Password">
                            <i class="lock icon"></i>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" style="background-color: #69D4D7">
                        Login
                    </button>
                </div>
                </form>
            </div>
            <div class="middle aligned column">
                <a href="/signup">
                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"  style="background-color: #69D4D7">
                        Signup
                    </button>
                </a>
                <a href="/reset-password">
                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"  style="background-color: #69D4D7">
                        Reset Password
                    </button>
                </a>
            </div>
        </div>
        <div class="ui vertical divider">Or</div>
    </div>

<?php include '../View/Shared/Forms/Footer.php' ?>
