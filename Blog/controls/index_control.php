<?php

    $table = "posts";

    $post_id_key = "id";
    $post_user_key = "user";
    $post_timestamp_key = "birth";
    $post_head_key = "head";
    $post_body_key = "body";

    $filter = "";
    $sorted_by = ["birth"];
    $order = "DESC";

    $all_posts = select_SQL($table, $filter, $sorted_by, $order);

    if(isset($_POST['delete-post'])){
        $post_id_value = $_POST['post-id'];
        $id = ["$post_id_key"=>"$post_id_value"];
        delete_SQL($table, $id);
        $all_posts = select_SQL($table, $filter, $sorted_by, $order);
    }

// fuctions
// ************************************************************************** //

?>