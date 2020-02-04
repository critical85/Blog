<?php 
    $title = "mainpage";
    include "modules/SQL.php";
    include "templates/header.php";
    include "controls/myposts_control.php";
?>


<div class="container" style="padding-top:50px">
    <div style="text-align: center;">
        <button type="button" class="btn btn-outline-dark" style="margin-bottom:40px;" name="new-post"
         onclick="window.location.href='newpost.php'">Create new post</button>
    </div>


    <?php foreach($all_posts as $post){ ?>
        <form method="post">
            <div class="card mx-auto" style="max-width: 550px; margin-bottom:20px">
                <div class="card-header">
                    <input name="post-id" readonly value=<?php echo $post[$post_id_key] ?>>
                    <h5><?php echo $post[$post_head_key] ?></h5>
                </div>
                <div class="card-body">
                    <p><?php echo $post[$post_body_key] ?></p>
                    <footer class="blockquote-footer"><?php echo $post[$post_user_key] ?>
                        <cite title="Source Title"><?php echo $post[$post_timestamp_key] ?></cite></footer>
                    <button type="submit" name="delete-post">Delete</button>
                    <button type="submit" name="edit-post">Edit</button>
                </div>
            </div>
        </form>
    <?php } ?>
</div>


<?php 
    include "templates/footer.php";
?>