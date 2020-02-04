<?php

    $table = "posts";

    $post_id_key = "id";
    $post_user_key = "user";
    $post_timestamp_key = "birth";
    $post_head_key = "head";
    $post_body_key = "body";

    $_SESSION['post_id'] = "";

    // get all users post to print them out
    $username_value = $_SESSION['user_username'];
    $filter = ["$post_user_key"=>"$username_value"];
    $all_posts = select_SQL($table, $filter);

    if(isset($_POST['delete-post'])){
        $post_id_value = $_POST['post-id'];
        $id = ["$post_id_key"=>"$post_id_value"];
        delete_SQL($table, $id);
        $all_posts = select_SQL($table, $filter);
    }

    if(isset($_POST['edit-post'])){
        $_SESSION['post_id'] = $_POST['post-id'];
        header("Location:newpost.php");
    }
?>