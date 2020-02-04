<?php 
    $title = "mainpage";
    include "modules/SQL.php";
    include "templates/header.php";
    include "controls/newpost_control.php";
?>

<div class="container d-flex justify-content-center" style="padding-top:50px">
    <form method="post" style="width:450px">
        <div class="row signin-row">
            <label class="mx-auto" for="newpost-head">Title</label>
            <input type="text" class="form-control" id="newpost-head" name="newpost-head">
            <div class="mx-auto" style="color:red"><?php echo $errors['head'] ?></div>
        </div>
        <div class="row signin-row">
            <label class="mx-auto" for="newpost-body">Content</label>
            <textarea class="form-control" style="min-height:170px" id="newpost-body" name="newpost-body"></textarea>
            <div class="mx-auto" style="color:red"><?php echo $errors['body'] ?></div>
        </div>
        <div class="row signin-row">
            <button class="mx-auto" type="submit" id="save-new-post" name="save-new-post">Save</button>
        </div>
    </form>
</div>

<?php
    if($_SESSION['post_id']){
        $head = $post[0]['head'];
        $body = $post[0]['body'];
        echo "
        <script>
            document.getElementById('newpost-head').value = '$head';
            document.getElementById('newpost-body').value = '$body';
        </script>
        ";
    }

    include "templates/footer.php";
?>

