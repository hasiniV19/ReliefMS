<?php

/**@var $login_err*/
/**@var $email*/
/**@var $password*/
///**@var $email*/
///**@var $password*/
///**@var $re_password*/

?>

<style>
    <?php include "css/login.css";?>
</style>

<!--<div class="container animate-bottom" style="display: none" id="main-page">-->
    <div class="forms-container">
        <div class="signin-signup">
            <form action="/login" method="POST" class="sign-in-form">
                <h2 class="title">Login</h2>
                <div class="invalid">
                    <label for="" class="error" style="color: #990000;"><?php if (isset($login_err)) echo $login_err;?></label> <!-- login error -->
                </div>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input name="email" type="text" placeholder="Email" value="<?php if (isset($email)) echo $email;?>" required/>
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input name="password" type="password" placeholder="Password" value="<?php if (isset($password)) echo $password;?>" required/>
                </div>
                <input type="submit" name="login-submit" value="Login"  class="btn solid" />
            </form>

            <form name="myForm" action="/register" onsubmit="return validateForm()" method="POST" class="sign-up-form">
                <h2 class="title">Register</h2>

                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input pattern='^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$'
                           id="email" name="email" type="email" placeholder="Email" value="" required/>
                </div>
                <span role="alert" id="emailError" aria-hidden="true" style="color:#990000;">
                        Invalid Email
                    </span>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" id="password" name="password" type="password" placeholder="Password" value="" required/>
                </div>
                <span class="passwordInfo" style="color:#5f6368;">
                        Use 8 or more characters with a mix of letters and numbers
                    </span>
                <span role="alert" id="passwordError" aria-hidden="true" style="color:#990000;">
                         Password doesn't match the requirements
                    </span>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input id="re-password" name="re-password" type="password" placeholder="Re Enter Password" value="" required/>
                </div>
                <span role="alert" id="re-password-error" aria-hidden="true" style="color:#990000;">
                         Password mismatch
                    </span>
                <input id="register" type="submit" name="register-submit" class="btn" value="Register" >
            </form>
        </div>
    </div>

    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h3>New here ?</h3>
                <p>
                    Wanna join with us? Let's support the community during this pandemic.
                </p>
                <button class="btn transparent" id="sign-up-btn">
                    Register
                </button>
            </div>
            <!-- <img src="img/log.svg" class="image" alt="" /> -->
        </div>
        <div class="panel right-panel">
            <div class="content">
                <h3>One of us ?</h3>
                <p>
                    Welcome back. Please login with your credentials.
                </p>
                <button class="btn transparent" id="sign-in-btn">
                    Login
                </button>
            </div>
        </div>
    </div>
<!--</div>-->

<script>
    <?php include "js/login.js";?>
</script>
<script>
    <?php include "js/login_validate.js";?>
</script>