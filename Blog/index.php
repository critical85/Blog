<?php 
$title = "mainpage";
include "modules/SQL.php";
include "templates/header.php";
include "controls/index_control.php";
include "controls/login_control.php";
?>

<div class="container">

    <!-- logout / login forms -->
    <?php if(isset($_SESSION['user_username'])){ ?>
        <div class="login-form">
            <form method="post">
                <?php echo "logged as " . "<span class='font-weight-bold'>" . $_SESSION['user_username'] . "</span>"; ?> </p>
                <button type="submit" name="log-out" style="margin-bottom:30px" >Log out</button>
                <button type="button" onclick="window.location.href='myposts.php'">My posts</button>
            </form>
        </div>
    <?php } else{ ?>
        <div class="login-form">
            <form method="post">
                <div class="row">
                    <label class="login-label" for="user-name-login">Username: </label>
                    <input type="text" class="form-control" id="user-name-login" name="user-name-login">
                    <div style="color:red"><?php echo $errors['user_name'] ?></div>
                </div>
                <div class="row">
                    <label class="login-label" for="password-login">Password: </label>
                    <input type="password" class="form-control" id="password-login" name="password-login">
                    <div style="color:red"><?php echo $errors['password'] ?></div>
                </div>
                <div class="row justify-content-center">
                    <button type="submit" name="login" id="login" style="margin-right: 15px">Login</button>
                    <button type="button" onclick="window.location.href='signin.php'">Sing in</button>
                </div>
            </form>
        </div>
    <?php } ?>

    <div class="">
        <?php foreach($all_posts as $post){ ?>
            <form method="post">

                <div class="card mx-auto" style="max-width: 550px; margin-bottom:20px">
                    <div class="card-header">
                        <input style="display:none" name="post-id" readonly value=<?php echo $post[$post_id_key] ?>>
                        <h5><?php echo $post[$post_head_key] ?></h5>
                    </div>
                    <div class="card-body">
                        <p><?php echo $post[$post_body_key] ?></p>
                        <footer class="blockquote-footer"><?php echo $post[$post_user_key] ?>
                            <cite title="Source Title"><?php echo $post[$post_timestamp_key] ?></cite></footer>
                        
                        <?php if(isset($_SESSION['user_access'])){
                                  if($_SESSION['user_access'] > 5){ ?>
                            <button type="submit" name="delete-post">Delete</button>
                        <?php }} ?>

                    </div>
                </div>
            </form>
        <?php } ?>
    </div>
</div>

<?php 
include "templates/footer.php";
?>