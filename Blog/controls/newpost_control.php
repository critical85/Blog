<?php

    $table = "posts";

    $post_id_key = "id";
    $post_user_key = "user";
    $post_timestamp_key = "birth";
    $post_head_key = "head";
    $post_body_key = "body";

    $errors = ['head'=>'', 'body'=>''];

    // if there is an id we are in EDIT mode
    if(isset($_SESSION['post_id'])){
        $post_id_value = $_SESSION['post_id'];
        $id = ["$post_id_key"=>"$post_id_value"];
        $post = select_SQL($table, $id);
        //print_array($post);
    }

    // save button
    if(isset($_POST['save-new-post'])){

        // check format of inputs
        if(check_newpost_input()){

            // create parametr variable for insert_SQL function 
            $post_user_value = $_SESSION['user_username'];
            $post_head_value = $_POST['newpost-head'];
            $post_body_value = $_POST['newpost-body'];

            $new_post = ["$post_user_key"=>"$post_user_value", "$post_head_key"=>"$post_head_value",
             "$post_body_key"=>"$post_body_value"];
            
            // insert new post
            insert_SQL($table, $new_post);
        }
    }


// fuctions
// ************************************************************************** //
function check_newpost_input(){

    global $errors;

    if(empty($_POST['newpost-head'])){
        $errors['head'] = 'Title cant be empty';
    }

    if(empty($_POST['newpost-body'])){
        $errors['body'] = 'Post content cant be empty';
    }

    if(!array_filter($errors)){
        return TRUE;
    }

    return FALSE;

}

?>