<?php include '../View/Shared/Forms/Header.php' ?>
<?php include '../View/Shared/Forms/Middle.php' ?>

    <form action="/signup" method="post" class="signup-from">
        <div class="ui placeholder segment">
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
                <input type="submit" class="ui blue submit button" name="submit" value="Create">
            </div>
            <div class="ui small button segment">
                <a href="/login"><i class="signup icon"></i>Login</a>
            </div>
        </div>
    </form>

<?php include '../View/Shared/Forms/Footer.php' ?>