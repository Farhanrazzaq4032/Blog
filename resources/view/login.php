
<div class="login-main">
    <div class="login-design">
        <h3 class="login-text">Login</h3>
    </div>
    <div class="login-form">
        <form action="login-submit" method="POST">
            <?php echo getMsg("msg"); ?>
            <input class="login-input login-email" placeholder="Email" type="email" name="email"><br>
            <input class="login-input login-password" placeholder="Passworld" type="password" name="password"><br>
            <button type="submit" class="login-btn">Log In</button> 
            <div class="forget">
                <a class="create-account" href="register">Create new Account</a>
            </div>
        </form>
    </div>
</div>
