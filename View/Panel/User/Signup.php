<?php include '../View/Shared/Forms/Header.php' ?>
<?php include '../View/Shared/Forms/Middle.php' ?>

<div class="ui placeholder segment">
    <form action="/signup" method="post" class="signup-from">

        <div class="ui two column very relaxed stackable grid">
            <div class="column">
                <div class="ui form">
                    <div class="field">
                        <label>First name</label>
                        <div class="ui left icon input">
                            <input type="text" placeholder="Fname" name="Firstname">
                            <i class="user circle outline icon"></i>
                        </div>
                    </div>
                    <div class="field">
                        <label>Last name</label>
                        <div class="ui left icon input">
                            <input type="text" placeholder="Lname" name="Lastname">
                            <i class="user circle icon"></i>
                        </div>
                    </div>
                    <div class="field">
                        <label>Email</label>
                        <div class="ui left icon input">
                            <input type="email" placeholder="email" name="Email">
                            <i class="at icon"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
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
                    <div class="field">
                        <label>Verify password</label>
                        <div class="ui left icon input">
                            <input type="text" placeholder="verify password" name="PasswordVer">
                            <i class="lock icon"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="column">
            <button type="submit" name="submit"
                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"
                    style="background-color: #69D4D7">
                Create
            </button>
        </div>
    </form>

    <div class="ui small segment">
        <a href="/login">
            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"
                    style="background-color: #69D4D7">
                Login
            </button>
        </a>
    </div>
</div>

<?php include '../View/Shared/Forms/Footer.php' ?>
