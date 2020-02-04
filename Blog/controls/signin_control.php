<?php

    $table = "users";
    $user_name_key = "username";
    $user_password_key = "password";

    $errors = array('user_name'=>'', 'password'=>'', 'password_re'=>'');

    $filter = "";
    $sorted_by = "";

    if(isset($_POST['sign-in-submit'])){

        // check format of inputs
        if(check_user_input()){

            // create variable username
            $user_name_value = $_POST['user-name-signin'];
            $filter = ["$user_name_key"=>"$user_name_value"];

            // check if username exists
            if(select_SQL($table, $filter, $sorted_by)){
                $errors['user_name'] = "Username is taken";
            } 
            else{
                // create variable user
                $user_password_value = $_POST['password-signin'];
                $user = ["$user_name_key"=>"$user_name_value", "$user_password_key"=>"$user_password_value"];
                insert_SQL($table, $user);
                header('location:index.php');
            }
        }
    }



// fuctions
// ************************************************************************** //
    function check_user_input(){

        global $errors;

        if(empty($_POST['user-name-signin'])){
            $errors['user_name'] = 'Username cant be empty';
        }
        else{
            $name = $_POST['user-name-signin'];
            if(!preg_match('/^[a-zA-Z0-9]*$/', $name)){
                $errors['user_name'] = 'Only letters and numbers allowed';
            }
        }

        if(empty($_POST['password-signin'])){
            $errors['password'] = 'Password cant be empty';
        }
        
        if($_POST['password-signin'] != $_POST['password-login-re']){
            $errors['password_re'] = 'Passwords is different';
        }

        if(!array_filter($errors)){
            return TRUE;
        }

        return FALSE;
    }

?>