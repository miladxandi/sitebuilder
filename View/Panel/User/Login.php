<?php include '../View/Shared/Forms/Header.php' ?>
<?php include '../View/Shared/Forms/Middle.php' ?>

<p><?php echo !empty($Viewbag['Error'])?$Viewbag['Error']:''; ?></p>
<p><?php echo !empty($Viewbag['Success'])?$Viewbag['Success']:''; ?></p>
<form action="/login" method="post" class="signup-from">
    <div class="ui placeholder segment">
        <div class="ui two column very relaxed stackable grid">
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
                    <input type="submit" class="ui blue submit button" name="submit" value="Create">
                </div>
            </div>
            <div class="middle aligned column">
                <div class="ui small button">
                    <a href="/signup"><i class="signup icon"></i>SignUp</a>
                </div>
            </div>
        </div>
        <div class="ui vertical divider">Or</div>
    </div>
</form>

<?php include '../View/Shared/Forms/Footer.php' ?>
