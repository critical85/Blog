<?php 
$title = "signin";
include "templates/header.php";
include "modules/SQL.php";
include "controls/signin_control.php"


?>

<div class="container">
    <div class="signin-form">
        <form method="post" class="w-25 p-3 mx-auto">
            <div class="row signin-row">
                <label class="signin-label" for="user-name-signin">Username: </label>
                <input type="text" class="form-control signin-input" id="user-name-signin" name="user-name-signin">
                <div style="color:red"><?php echo $errors['user_name'] ?></div>
            </div>
            <div class="row signin-row">
                <label class="signin-label" for="password-signin">Password: </label>
                <input type="password" class="form-control signin-input" id="password-signin" name="password-signin">
                <div style="color:red"><?php echo $errors['password'] ?></div>
            </div>
            <div class="row signin-row">
                <label class="signin-label" for="password-login-re">Password confirm: </label>
                <input type="password" class="form-control signin-input" id="password-login-re" name="password-login-re">
                <div style="color:red"><?php echo $errors['password_re'] ?></div>

            </div>
            <div class="row signin-row">
                <button type="submit" name="sign-in-submit">Submit</button>
            </div>
        </form>
    </div>
</div>

<?php 
include "templates/footer.php";
?>